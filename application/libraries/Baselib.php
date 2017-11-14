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
	
	public function get_all_categories() {
		
		$categories = array();
		$query = $this->_ci->db->select("*")->from("categories")->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {				
				$categories[$row['category_id']] = $row;
			}
		}
		
		return $categories;
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
							'title' => 'Хиты',
							'current_category' => $mark_as_current_category,
							'seo_url' => NULL
						);
					}
				}
			}
		}
		
		return $categories;
	}

	public function get_random_category_products($category) {
		
		$products = array();

		$category_id = $category;
		
		$sql = 'SELECT p.*, c.bm FROM products AS p, product_to_category AS ptc, categories AS c WHERE p.product_id = ptc.product_id AND p.status = 1 AND ptc.category_id = c.category_id AND ptc.category_id = ' . (int)$category_id . ' ORDER BY rand()';
				
		$query = $this->_ci->db->query($sql);

		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$products[$row['product_id']] = $row;		
			}			
		}
		
		return $this->handle_special_price($products);
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
		
		$sql = 'SELECT p.*, c.bm FROM products AS p, product_to_category AS ptc, categories AS c WHERE p.product_id = ptc.product_id AND p.status = 1 AND ptc.category_id = c.category_id AND ptc.category_id = ' . (int)$category_id . ' ORDER BY product_id ASC';
				
		$query = $this->_ci->db->query($sql);

		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$products[$row['product_id']] = $row;		
			}			
		}
		
		$sql = 'SELECT p.*, c.bm FROM products AS p, product_to_category AS ptc, categories AS c WHERE p.product_id = ptc.product_id AND p.status = 1 AND ptc.category_id = c.category_id AND ptc.category_id IN (SELECT category_id FROM categories WHERE parent_id = ' . (int)$category_id . ' ) ORDER BY product_id ASC';
		
		$query = $this->_ci->db->query($sql);
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$products[$row['product_id']] = $row;		
			}			
		}
		
		ksort($products);
		
		return $this->handle_special_price($products);
	}
	
	public function get_country_products($country) {
		
		$ptc = array();
		
		$sql = 'SELECT * FROM product_to_category';
				
		$query = $this->_ci->db->query($sql);

		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$ptc[$row['product_id']][] = $row['category_id'];		
			}			
		}

		$categories = array();
		
		$sql = 'SELECT * FROM categories';
				
		$query = $this->_ci->db->query($sql);

		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$categories[$row['category_id']] = $row['bm'];		
			}			
		}
		
		$products = array();
		
		$sql = 'SELECT * FROM products WHERE status = 1 AND country = "' . $country . '" ORDER BY product_id ASC';
				
		$query = $this->_ci->db->query($sql);

		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$products[$row['product_id']] = $row;
				if(isset($ptc[$row['product_id']])) {
					$products[$row['product_id']]['categories'] = $ptc[$row['product_id']];
					$products[$row['product_id']]['bm'] = $categories[$ptc[$row['product_id']][0]];
				} else {
					$products[$row['product_id']]['categories'] = array();
				}
			}			
		}
		
		ksort($products);
		
		return $this->handle_special_price($products);
	}	
	
	public function get_products($type) {
		
		$products = array();
		
		$query = $this->_ci->db->select("*")->from("products")->where("status",1);
		
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
				if($product['price'] == 0) {
					$product['price'] = (($product['cost']*$product['percent'])/100) + $product['cost'];
					$products[$product_id]['price'] = $product['price'];
				}
				
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
				} elseif(!$special_begin and $special_end) {
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
			
			if($products['price'] == 0) {
				$products['price'] = (($products['cost']*$products['percent'])/100) + $products['cost'];
			}
			
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
			} elseif(!$special_begin and $special_end) {
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
			'packs' => array(),
			'brands' => array()
		);
		
		foreach($products as $product_id => $product) {
			if(!is_null($product['country'])) {
				$attributes['countries'][] = $product['country'];
			}
			
			if(!is_null($product['composition'])) {
				$attributes['compositions'][] = $product['composition'];
			}
			
			if(!is_null($product['pack'])) {
				$attributes['packs'][] = $product['pack'];
			}			
			
			if(!is_null($product['brand'])) {
				$attributes['brands'][] = $product['brand'];
			}				
		}
		
		
		$attributes['countries'] = array_unique($attributes['countries']);
		$attributes['compositions'] = array_unique($attributes['compositions']);
		$attributes['packs'] = array_unique($attributes['packs']);
		$attributes['brands'] = array_unique($attributes['brands']);
		
		ksort($attributes['countries']);
		ksort($attributes['compositions']);
		ksort($attributes['packs']);
		ksort($attributes['brands']);
		
		return $attributes;
	}

	public function get_product_by_id($product_id) {
		
		$query = $this->_ci->db->get_where("products", array("product_id" => $product_id,"status" => 1));
		
		if ($query->num_rows() > 0) {
			$product = $query->row_array();
			$product['youtube'] = explode(';',$product['youtube']);
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
		
		$shipping_gropus = array();
		$query = $this->_ci->db->select("*")->from("shipping_gropus")->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {				
				$shipping_gropus[$row['shipping_gropu_id']] = $row;
			}
		}

		return $shipping_gropus;
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
		return true;
	}
	
	public function get_product_articul($product_id) {
		$articul = (string)$product_id;
		
		for ($i = strlen($articul); $i <= 3; $i++) {
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
		$shipping_methods = array();
		$query = $this->_ci->db->select("*")->from("shipping_methods")->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {				
				$shipping_methods[$row['shipping_id']] = $row;
			}
		}
		
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
	
	public function create_pager($pages_count,$page) {
		$pages = array();
		
		if($pages_count > 2) {
			$dots_used = false;
			
			for( $i = 1 ; $i <= $pages_count ; $i++ ) {
				if($i == 1) {
					$pages[] = array(
						'page' => $i,
						'current_page' => ($i == $page ? true : false),
						'dots' => false
					);
				} elseif($i == $pages_count) {
					$pages[] = array(
						'page' => $i,
						'current_page' => ($i == $page ? true : false),
						'dots' => false
					);					
				} elseif(abs($page - $i) <= 1 ) {
					$pages[] = array(
						'page' => $i,
						'current_page' => ($i == $page ? true : false),
						'dots' => false
					);
					
					$dots_used = false;
				} elseif(($i - 1) > 1 or ($i + 1) < $pages_count) {
					if(!$dots_used) {
						$pages[] = array(
							'current_page' => false,
							'dots' => true
						);
						
						$dots_used = true;
					}
				}
			}
		} else {
			for( $i = 1 ; $i <= $pages_count ; $i++ ) {
				$pages[] = array(
					'page' => $i,
					'current_page' => ($i == $page ? true : false),
					'dots' => false
				);
			}		
		}
		
		return $pages;
	}
	
	public function filter_products($products,$filters,$page) {
		$price_sort = array();
		
		$filters_arr = array(
			'country' => ($filters['country'] ? explode(';',$filters['country']) : 0),
			'brand' => ($filters['brand'] ? explode(';',$filters['brand']) : 0),
			'pack' => ($filters['pack'] ? explode(';',$filters['pack']) : 0),
			'composition' => ($filters['composition'] ? explode(';',$filters['composition']) : 0)
		);

		$filters_used = false;
		
		foreach($products as $product_id => $product) {
			if($filters_arr['country'] and !in_array($product['country'], $filters_arr['country'])) {
				unset($products[$product_id]);
				$filters_used = true;
				continue;
			}
			
			if($filters_arr['brand'] and !in_array($product['brand'], $filters_arr['brand'])) {
				unset($products[$product_id]);
				$filters_used = true;
				continue;
			}	
			
			if($filters_arr['pack'] and !in_array($product['pack'], $filters_arr['pack'])) {
				unset($products[$product_id]);
				$filters_used = true;
				continue;
			}

			if($filters_arr['composition'] and !in_array($product['composition'], $filters_arr['composition'])) {
				unset($products[$product_id]);
				$filters_used = true;
				continue;
			}
			
			if($filters['weight']) {
				if($filters['weight'] == 'raz' and $product['type'] == 'шт') {
					unset($products[$product_id]);
					$filters_used = true;
					continue;
				} elseif($filters['weight'] == 'upa' and $product['type'] != 'шт') {
					unset($products[$product_id]);
					$filters_used = true;
					continue;
				}
			}			
			
			if($filters['price']) {
				$price_sort[$product_id] = $product['price'];
				$filters_used = true;
			}			
		}
		
		$prodcuts_in_page = array();
		$page_start = ($page-1)*30;
		$page_end = $page*30;
		$i = 0;
		$pages_count = (int)(count($products)/30);
		
		if(count($products)%30 > 0)  {
			$pages_count++;
		}

		if($filters['price'] and count($price_sort) > 0 and $filters['price'] == 'asc') {
			array_multisort($price_sort,SORT_ASC, $products);
		} elseif($filters['price'] and count($price_sort) > 0 and $filters['price'] == 'desc') {
			array_multisort($price_sort,SORT_DESC, $products);
		}
		
		foreach($products as $product_id => $product) {
			if($i >= $page_start and $i <$page_end) {
				$prodcuts_in_page[] = $product;
			}
			
			$i++;
		}
		
		return array(
			'products' => $prodcuts_in_page,
			'pages_count' => $pages_count,
			'products_count' => count($products),
			'filters_used' => $filters_used
		);
	}
	
	public function filter_products_for_country($products,$filters,$page) {
		$categories = $this->get_all_categories();
		$categories_for_country = array();
		
		$filters_arr = array(
			'categories' => ($filters['category'] ? explode(';',$filters['category']) : 0)
		);
		
		$allowed_categories = array();
		
		if(is_array($filters_arr['categories'])) {
			foreach($filters_arr['categories'] as $category_name) {
				foreach($categories as $category_id => $category) {
					if($category['title'] == $category_name) {
						$allowed_categories[] = $category_id;
					}
				}
			}
		}
		
		foreach($products as $product) {
			foreach($product['categories'] as $category) {
				if(isset($categories[$category])) {
					$parent_id = $categories[$category]['parent_id'];
					if($parent_id > 0) {
						$categories_for_country[$parent_id] = $categories[$parent_id];
					} else {
						$categories_for_country[$categories[$category]['category_id']] = $categories[$categories[$category]['category_id']];
					}
				}
			}
		}		
		
		if(count($allowed_categories) > 0) {
			foreach($products as $product_id => $product) {
				$categories_to_compare = array();
				
				foreach($product['categories'] as $category_id) {
					if(isset($categories[$category_id])) {
						$categories_to_compare[] = $categories[$category_id]['parent_id'];
					}
				}
				
				if(count(array_intersect($allowed_categories,$categories_to_compare)) == 0) {
					unset($products[$product_id]);
					continue;
				}
			}
		}
		
		$prodcuts_in_page = array();
		$page_start = ($page-1)*30;
		$page_end = $page*30;
		$i = 0;
		$pages_count = (int)(count($products)/30);
		
		if(count($products)%30 > 0)  {
			$pages_count++;
		}
		
		foreach($products as $product_id => $product) {
			if($i >= $page_start and $i <$page_end) {
				$prodcuts_in_page[] = $product;
			}
			
			$i++;
		}	
		
		return array(
			'products' => $prodcuts_in_page,
			'pages_count' => $pages_count,
			'products_count' => count($products),
			'categories_for_country' => $categories_for_country
		);
	}	
	
	public function get_cart_word($count = 0) {
		
		$count = substr ( (string)$count , -1, 1 );		
		
		if ($count == 0) {
			return 'товаров';
		} elseif ($count == 1) {
			return 'товар';
		} elseif ($count > 1 and $count < 5) {
			return 'товара';
		} elseif ($count >= 5 and $count < 10) {
			return 'товаров';
		}
	}

	public function get_totals_for_cart($totals) {
		if(!is_null($this->_ci->session->userdata('shipping_method'))) {
			
			$shipping_methods = $this->_ci->baselib->get_shipping_methods();
			
			$totals['shipping'] = array(
				'title' => 'доставка',
				'value' => $shipping_methods[$this->_ci->session->userdata('shipping_method')]['price']
			);
			
			$totals['with_shipping'] = array(
				'title' => 'с доставкой',
				'value' => $totals['summ']['value'] + $totals['shipping']['value']
			);
		}
		
		if(!is_null($this->_ci->session->userdata('account_id'))) {
			
			$account = new Account();
			$account->set_id($this->_ci->session->userdata('account_id'));
			$account = $account->get_data();
			
			$totals['bonus'] = array(
				'title' => 'потратить бонусы на',
				'value' => $account['bonus']
			);
			
			if(!is_null($this->_ci->session->userdata('use_bonus'))) {
				$totals['bonus']['use_bonus'] = $this->_ci->session->userdata('use_bonus');
			} else {
				$this->_ci->session->set_userdata('use_bonus',0);
				$totals['bonus']['use_bonus'] = 0;
			}
		}		
		
		$payment_summ = $totals['summ']['value'] + 
		( isset($totals['shipping']) ? $totals['shipping']['value'] : 0 ) -
		( isset($totals['bonus']) ? ( $totals['bonus']['use_bonus'] ? $totals['bonus']['value'] : 0 ) : 0 );

		$totals['payment'] = array(
			'title' => 'к оплате',
			'value' => $payment_summ
		);
		
		return $totals;
	}
	
	public function sort_products($type,$element_id,$products) {
		
		if(!is_numeric($element_id) and $type == 'categories') {
			$query = $this->_ci->db->get_where("categories", array("seo_url" => $element_id));
			if ($query->num_rows() > 0) {
				$element_id = $query->row_array()['category_id'];
			}
		}
		
		$query = $this->_ci->db->get_where("sorts", array("type" => $type, "element_id" => $element_id));
		if ($query->num_rows() > 0) {
			
			$products_sorted = array();
			
			$sort_order = unserialize($query->row_array()['sort_data']);
			
			foreach($sort_order as $index => $product_id) {
				if(isset($products[$product_id])) {
					$products_sorted[$index] = $products[$product_id];
					unset($products[$product_id]);
				}
			}
			
			foreach($products as $product) {
				$products_sorted[] = $product;
			}
			
			return $products_sorted;
		}
		
		return $products;
	}
}