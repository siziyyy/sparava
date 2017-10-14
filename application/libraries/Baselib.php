<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Baselib {

	private $_ci;

 	function __construct() {
    	$this->_ci =& get_instance();
    }
	
	public function get_product_categories($product_id) {
		$result = array();
		
		$query = $this->_ci->db->select("*")->from("product_to_category")->where("product_id",$product_id)->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {				
				$result[] = $row['category_id'];
			}
		}
		
		return $result;
	}
	
	public function get_categories($current_category = false,$all_in_first_line = false) {
		
		$categories = array();
		$query = $this->_ci->db->select("*")->from("categories")->order_by('sort_order', 'ASC')->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {				
				$result[$row['category_id']] = $row;
			}
			
			foreach ($result as $row) {

				if($current_category) {
					if($row['seo_url'] == $current_category or $row['category_id'] == $current_category) {
						$mark_as_current_category = true;
					} else {
						$mark_as_current_category = false;
					}
				} else {
					$mark_as_current_category = false;
				}
			
				if($row['parent_id'] == 0) {
					if($all_in_first_line) {
						$line = 'categories_first_line';
					} else {
						$line = ($row['first_line'] == 1 ? 'categories_first_line' : 'categories_second_line');
					}
					
					if(isset($categories[$line][$row['category_id']])) {
						if(!isset($categories[$line][$row['category_id']]['current_category']) or !$categories[$line][$row['category_id']]['current_category']) {
							$row['current_category'] = $mark_as_current_category;
						}
						
						$categories[$line][$row['category_id']] = array_merge($categories[$line][$row['category_id']],$row);
					} else {
						if(!isset($categories[$line][$row['category_id']]['current_category']) or !$categories[$line][$row['category_id']]['current_category']) {
							$row['current_category'] = $mark_as_current_category;
						}
						
						$categories[$line][$row['category_id']] = $row;
					}
				} else {
					if($all_in_first_line) {
						$line = 'categories_first_line';
					} else {
						$line = ($result[$row['parent_id']]['first_line'] == 1 ? 'categories_first_line' : 'categories_second_line');
					}
					
					$row['current_category'] = $mark_as_current_category;
					$categories[$line][$row['parent_id']]['childs'][$row['category_id']] = $row;
					
					if(!isset($categories[$line][$row['parent_id']]['current_category']) or !$categories[$line][$row['parent_id']]['current_category']) {
						$categories[$line][$row['parent_id']]['current_category'] = $mark_as_current_category;
					}
				}
			}
			
			$mark_as_current_category = true;
			
			foreach($categories as $line_id => $line) {
				foreach($line as $category_id => $category) {
					if($category['current_category'] and isset($category['childs'])) {
						foreach($category['childs'] as $child) {
							if($child['current_category']) {
								$mark_as_current_category = false;
							}
						}
						
						$categories[$line_id][$category['category_id']]['childs'][0] = array(
							'category_id' => $category['category_id'],
							'title' => 'Хиты продаж',
							'current_category' => $mark_as_current_category,
							'seo_url' => NULL
						);
					}
				}
			}
		}
		
		return $categories;
	}
	
	public function get_category_products($category) {
		
		$products = array();
		
		if(!is_numeric($category)) {
			$c_query = $this->_ci->db->get_where("categories", array("seo_url" => $category));
			if ($c_query->num_rows() > 0) {
				$category_id = $c_query->row_array()['category_id'];
			} else {
				$category_id = 0;
			}
		} else {
			$category_id = $category;
		}
		
		$query = $this->_ci->db->query('SELECT p.* FROM products AS p, product_to_category AS ptc WHERE p.product_id = ptc.product_id AND ptc.category_id = ' . (int)$category_id . ' ORDER BY product_id ASC');

		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$products[$row['product_id']] = $row;		
			}			
		}
		
		$query = $this->_ci->db->query('SELECT p.* FROM products AS p, product_to_category AS ptc WHERE p.product_id = ptc.product_id AND ptc.category_id IN (SELECT category_id FROM categories WHERE parent_id = ' . (int)$category_id . ' ) ORDER BY product_id ASC');
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$products[$row['product_id']] = $row;		
			}			
		}
		
		ksort($products);
		
		return $this->handle_special_price($products);
	}
	
	public function get_products($type) {
		
		$products = array();
		
		$query = $this->_ci->db->select("*")->from("products");
		
		if($type == 'farm') {
			$query = $query->where('farm','1');
		} elseif($type == 'eko') {
			$query = $query->where('eko','1');
		}
		
		$query = $query->order_by('product_id', 'ASC')->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$products[$row['product_id']] = $row;
			}
		}

		return $this->handle_special_price($products);
	}
	
	private function handle_special_price($products) {
		if(!isset($products['product_id'])) {
			foreach($products as $product_id => $product) {
				$products[$product_id]['articul'] = $this->get_product_articul($product['product_id']);
				
				$special_begin = false;
				$special_end = false;
				$products[$product_id]['special_end_date'] = false;
				
				if(!is_null($product['special_begin'])) {
					$special_begin = strtotime($product['special_begin']);
				}
				
				if(!is_null($product['special_end'])) {
					$special_end = strtotime($product['special_end']);
				}
				
				if($special_begin and $special_end) {
					if($special_begin < time() and time() < $special_end and $product['special'] > 0) {
						$products[$product_id]['old_price'] = $product['price'];
						$products[$product_id]['price'] = $product['special'];
						$products[$product_id]['special_end_date'] = date('d.m', $special_end);
					}
				} elseif(!$special_begin) {
					if(time() < $special_end and $product['special'] > 0) {
						$products[$product_id]['old_price'] = $product['price'];
						$products[$product_id]['price'] = $product['special'];
						$products[$product_id]['special_end_date'] = date('d.m', $special_end);
					}
				} else {
					if($product['special'] > 0) {
						$products[$product_id]['old_price'] = $product['price'];
						$products[$product_id]['price'] = $product['special'];
					}				
				}
			}
		} else {
			$products['articul'] = $this->get_product_articul($products['product_id']);
			
			$special_begin = false;
			$special_end = false;
			$products['special_end_date'] = false;
			
			if(!is_null($products['special_begin'])) {
				$special_begin = strtotime($products['special_begin']);
			}
			
			if(!is_null($products['special_end'])) {
				$special_end = strtotime($products['special_end']);
			}
			
			if($special_begin and $special_end) {
				if($special_begin < time() and time() < $special_end and $products['special'] > 0) {
					$products['old_price'] = $products['price'];
					$products['price'] = $products['special'];
					$products['special_end_date'] = date('d.m', $special_end);
				}
			} elseif(!$special_begin) {
				if(time() < $special_end and $products['special'] > 0) {
					$products['old_price'] = $products['price'];
					$products['price'] = $products['special'];
					$products['special_end_date'] = date('d.m', $special_end);
				}
			} elseif($products['special'] > 0) {
				$products['old_price'] = $products['price'];
				$products['price'] = $products['special'];	
			}
		}
		
		return $products;
	}

	public function handle_attributes($products) {
		$attributes = array(
			'countries' => array(),
			'compositions' => array(),
			'weights' => array()
		);
		
		foreach($products as $product_id => $product) {
			if(!is_null($product['country'])) {
				$attributes['countries'][] = $product['country'];
			}
			
			if(!is_null($product['composition'])) {
				$attributes['compositions'][] = $product['composition'];
			}

			if(!is_null($product['weight'])) {
				$attributes['weights'][] = $product['weight'];
			}
		}
		
		$attributes['countries'] = array_unique($attributes['countries']);
		$attributes['compositions'] = array_unique($attributes['compositions']);
		$attributes['weights'] = array_unique($attributes['weights']);
		
		ksort($attributes['countries']);
		ksort($attributes['compositions']);
		ksort($attributes['weights']);
		
		return $attributes;
	}

	public function get_product_by_id($product_id) {
		
		$query = $this->_ci->db->get_where("products", array("product_id" => $product_id));
		
		if ($query->num_rows() > 0) {
			$product = $query->row_array();			
			return $this->handle_special_price($product);
		}
		
		return false;
	}

	public function get_cart() {
		$products = array();
		
		if(is_null($this->_ci->session->userdata('cart'))) {
			$cart = array();
		} else {
			$cart = $this->_ci->session->userdata('cart');
		}
		
		foreach($cart as $element_id => $element) {
			$product_id = explode('-',$element_id)[1];
			$product = $this->get_product_by_id($product_id);
			
			$products[$product['product_id']] = $product;
			$products[$product['product_id']]['quantity_in_cart'] = $element['quantity'];
		}
		
		return $products;
	}
	
	public function get_shipping_gropus() {
		
		return array(
			'1' => array(
				'title' => 'Обычная доставка',
				'description' => 'доставим завтра в любое удобное Вам время<br>с интервалом 1 час, с 10:00 до 21:00'
			),
			'2' => array(
				'title' => 'Экспресс доставка',
				'description' => 'доставим в течении 2 часов, с 10:00 до 21:00'
			),			
		);
		
	}
	
	public function is_logged() {
		$account_id = $this->_ci->session->userdata('account_id');
		$this->_ci->load->model('account');
		
		if(!is_null($account_id)) {
			if($account_id > 0) {
				$account = new Account();
				$account->set_id($this->_ci->session->userdata('account_id'));
				return $account->get_data();
			}
		}
		
		return false;
	}	
	
	public function get_account_data_for_confirm() {
		$account_id = $this->_ci->session->userdata('account_id');
		$this->_ci->load->model('account');
		
		if(!is_null($account_id) and !is_null($this->_ci->session->userdata('is_login_confirmed'))) {
			if($account_id > 0 and $this->_ci->session->userdata('is_login_confirmed') < (time() - 86400)) {
				$account = new Account();
				$account->set_id($this->_ci->session->userdata('account_id'));
				return $account->get_data();				
			}
		} elseif(!is_null($account_id) and is_null($this->_ci->session->userdata('is_login_confirmed'))) {
			if($account_id > 0) {
				$account = new Account();
				$account->set_id($this->_ci->session->userdata('account_id'));
				return $account->get_data();
			}
		}
		
		return false;
	}
	
	public function confirm_login() {
		$account_id = $this->_ci->session->userdata('account_id');
		$this->_ci->load->model('account');
		
		if(!is_null($account_id)) {
			$this->_ci->session->set_userdata('is_login_confirmed',time());
			return true;
		}
		
		return false;
	}

	public function logout() {
		$this->_ci->session->set_userdata('account_id',NULL);
		$this->_ci->session->set_userdata('cart',array());
		return true;
	}
	
	public function get_product_articul($product_id) {
		$articul = (string)$product_id;
		
		for ($i = strlen($articul); $i <= 4; $i++) {
			$articul = '0'.$articul;
		}
		
		return $articul;
	}
	
	public function get_product_id_from_articul($articul) {
		$product_id = (string)$articul;
		
		while (substr ( $product_id , 0 ,1 ) == 0) {
			$product_id = substr ( $product_id , 1);
		}
		
		return $product_id ;
	}
	

	public function get_shipping_methods($group_id = false) {
		
		$shipping_methods = array(
			'1' => array(
				'shipping_id' => 1,
				'title' => 'Москва',
				'price' => '199',
				'group_id' => 1
			),
			'2' => array(
				'shipping_id' => 2,
				'title' => 'МO (до 25 км от мкада) - 350 руб.',
				'price' => '350',
				'group_id' => 1
			),
			'3' => array(
				'shipping_id' => 3,
				'title' => 'Москва',
				'price' => '199',
				'group_id' => 2
			),
			'4' => array(
				'shipping_id' => 4,
				'title' => 'МO (до 25 км от мкада) - 350 руб.',
				'price' => '350',
				'group_id' => 2
			)	
		);
		
		if($group_id) {
			$result = array();
			
			foreach($shipping_methods as $method) {
				if($method['group_id'] == $group_id) {
					$result[$method['shipping_id']] = $method;
				}
			}
			
			return $result;
		}
		
		return $shipping_methods;
	}	
	
}