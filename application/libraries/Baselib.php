<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Baselib {

	private $_ci;

 	function __construct() {
    	$this->_ci =& get_instance();
    }
	
	public function get_blogs($blog_id = false) {
		$result = array();
		
		$query = $this->_ci->db->select("*")->from("blogs");
		
		if($blog_id) {
			$query = $query->where("blog_id",$blog_id);
		}
		
		$query = $query->get();
		
		if ($query->num_rows() == 1) {
			$result = $query->row_array();
			$result['content'] = htmlspecialchars_decode($result['content']);
		} elseif($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {				
				$result[date('m-Y',$row['create_date'])][$row['blog_id']] = $row;
				$result[date('m-Y',$row['create_date'])][$row['blog_id']]['content'] = htmlspecialchars_decode($row['content']);
			}			
		}
		
		return $result;
	}	

	public function set_favourite($product_id) {
		$favourites = $this->get_favourites();
		
		if(isset($favourites[$product_id])) {
			unset($favourites[$product_id]);
			$this->_ci->session->set_userdata('favourites',$favourites);
			return false;
		} else {
			$favourites[$product_id] = $product_id;
			$this->_ci->session->set_userdata('favourites',$favourites);
			return true;
		}
	}	
	
	public function get_favourites() {
		$favourites = $this->_ci->session->userdata('favourites');
		
		if(is_null($favourites)) {
			$favourites = array();
		}
		
		return $favourites;
	}
	
	public function get_account_orders($account_id) {
		$result = array();
		
		$query = $this->_ci->db->select("*")->from("orders")->where("account_id",$account_id)->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {				
				$result[$row['order_id']] = date('d.m.Y',$row['create_date']);
			}
		}
		
		return $result;
	}
	
	public function get_order_products($order_id) {
		$result = array();
		
		$query = $this->_ci->db->select("*")->from("order_inners")->where("order_id",$order_id)->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {				
				$result[] = $row['product_id'];
			}
		}
		
		return $result;
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
		$query = $this->_ci->db->select("*")->from("categories")->where('status',1)->order_by('sort_order','ASC')->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {				
				$categories[$row['category_id']] = $row;
			}
		}
		
		return $categories;
	}
	
	public function get_categories($current_category = false,$all_in_first_line = false) {
		
		$categories = array();
		$query = $this->_ci->db->select("*")->from("categories")->where('status',1)->order_by('sort_order', 'ASC')->get();
		
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
						
						$first_element = array(
							'category_id' => $category['category_id'],
							'title' => $category['title'],
							'sort_order' => 0,
							'current_category' => $mark_as_current_category,
							'seo_url' => NULL
						);
						
						array_unshift($categories[$line_id][$category['category_id']]['childs'],$first_element);
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
			$c_query = $this->_ci->db->get_where("categories", array("seo_url" => $category,"status" => 1));
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
	
	public function get_products($type = false,$show_hidden = false) {
		
		$products = array();
		
		$sql = 'SELECT p.*, c.bm FROM products AS p, product_to_category AS ptc, categories AS c WHERE p.product_id = ptc.product_id AND ptc.category_id = c.category_id';
		
		if(!$show_hidden) {
			$sql .= ' AND p.status = 1';
		}
		
		if($type == 'farm') {
			$sql .= ' AND p.farm = 1';
		} elseif($type == 'eko') {
			$sql .= ' AND p.eko = 1';
		} elseif($type == 'diet') {
			$sql .= ' AND p.diet = 1';
		}
		
		if($show_hidden) {
			$sql .= ' ORDER BY p.status DESC,p.product_id ASC';
		}		
		
		$query = $this->_ci->db->query($sql);
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$products[$row['product_id']] = $row;
			}
		}

		return $this->handle_special_price($products);
	}
	
	public function get_provider_products($provider_id) {
		
		$ptc = array();
		
		$sql = 'SELECT * FROM product_to_category';
				
		$query = $this->_ci->db->query($sql);

		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$ptc[$row['product_id']][] = $row['category_id'];		
			}			
		}		
		
		
		$products = array();
		
		$sql = 'SELECT p.*, c.bm, c.title FROM products AS p, product_to_category AS ptc, categories AS c, providers AS pr WHERE pr.store = p.provider AND p.product_id = ptc.product_id AND ptc.category_id = c.category_id AND p.status = 1 AND pr.provider_id = ' . (int)$provider_id;
		
		$query = $this->_ci->db->query($sql);
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$products[$row['product_id']] = $row;
				if(isset($ptc[$row['product_id']])) {
					$products[$row['product_id']]['categories'] = $ptc[$row['product_id']];
				} else {
					$products[$row['product_id']]['categories'] = array();
				}				
			}
		}

		return $this->handle_special_price($products);
	}	
	
	public function get_products_by_ids($ids) {
		
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
		
		$query = $this->_ci->db->select("*")->from("products")->where("status",1)->where_in("product_id",$ids)->order_by('product_id', 'ASC')->get();
		
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
	
	private function handle_special_price($products) {
		$favourites = $this->get_favourites();
		
		if(!isset($products['product_id'])) {
			foreach($products as $product_id => $product) {
				if($product['price'] == 0) {
					$product['price'] = $product['cost']*(($product['percent']/100)+1);
					
					if($product['price'] > 0) {
						if($product['price'] / ((int)$product['price']) > 1) {
							$product['price'] = ((int)$product['price'])+1;
						}
					}
					
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
				
				if(isset($favourites[$product_id])) {
					$products[$product_id]['favourite'] = true;
				}
			}
		} else {
			
			if($products['price'] == 0) {
				$products['price'] = $products['cost']*(($products['percent']/100)+1);
				
				if($products['price'] > 0) {
					if($products['price'] / ((int)$products['price']) > 1) {
						$products['price'] = ((int)$products['price'])+1;
					}
				}
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
			
			if(isset($favourites[$products['product_id']])) {
				$products['favourite'] = true;
			}		
		}
		
		return $products;
	}

	public function handle_attributes($products) {
		$types = array();
		
		$attributes = array(
			'countries' => array(),
			'compositions' => array(),
			'packs' => array(),
			'brands' => array()
		);
		
		foreach($products as $product_id => $product) {
			if(!is_null($product['country']) and !empty($product['country'])) {
				$attributes['countries'][] = $product['country'];
			}
			
			if(!is_null($product['composition']) and !empty($product['composition'])) {
				$attributes['compositions'][] = $product['composition'];
			}
			
			if(!is_null($product['pack']) and !empty($product['pack'])) {
				$attributes['packs'][] = $product['pack'];
			}			
			
			if(!is_null($product['brand']) and !empty($product['brand'])) {
				$attributes['brands'][] = $product['brand'];
			}

			$types[$product['type']] = $product['type'];
		}
		
		if(count($types) > 1 and isset($types['шт'])) {
			$attributes['show_weights'] = true;
		} else {
			$attributes['show_weights'] = false;
		}
		
		$attributes['countries'] = array_unique($attributes['countries']);
		$attributes['compositions'] = array_unique($attributes['compositions']);
		$attributes['packs'] = array_unique($attributes['packs']);
		$attributes['brands'] = array_unique($attributes['brands']);
		
		asort($attributes['countries']);
		asort($attributes['compositions']);
		asort($attributes['packs']);
		asort($attributes['brands']);
		
		return $attributes;
	}

	public function get_product_by_id($product_id) {
		
		//$query = $this->_ci->db->get_where("products", array("product_id" => $product_id,"status" => 1));
		
		$sql = 'SELECT p.*, c.bm FROM products AS p, product_to_category AS ptc, categories AS c WHERE p.product_id = ptc.product_id AND ptc.category_id = c.category_id AND p.product_id = '.$product_id.' LIMIT 1';
		
		$query = $this->_ci->db->query($sql);
		
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
		$filters_count = 0;
		
		$filters_arr = array(
			'country' => ($filters['country'] ? explode(';',$filters['country']) : 0),
			'brand' => ($filters['brand'] ? explode(';',$filters['brand']) : 0),
			'pack' => ($filters['pack'] ? explode(';',$filters['pack']) : 0),
			'composition' => ($filters['composition'] ? explode(';',$filters['composition']) : 0)
		);
		
		foreach($filters_arr as $key => $value) {
			if(isset($filters_arr[$key]) and $filters_arr[$key]) {
				foreach($filters_arr[$key] as $index_of_value_to_check => $value_to_check) {
					$filters_count++;
					
					if(empty($value_to_check)) {
						unset($filters_arr[$key][$index_of_value_to_check]);
						$filters_count--;
					}
				}
				
				if(empty($filters_arr[$key])) {
					$filters_arr[$key] = 0;
				}
			}
		}

		if($filters['price']) {
			$filters_count++;
		}

		if($filters['weight']) {
			$filters_count++;
		}		

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
		
		$empty_products = count($prodcuts_in_page)%5; 
					
		if($empty_products > 0) {
			$empty_products = 5-$empty_products;
		}
		
		$filters_text = array();
		
		foreach($filters_arr as $key => $value) {
			if(isset($filters_arr[$key]) and $filters_arr[$key]) {
				$filters_text[$key] = $this->get_filter_text($key,count($filters_arr[$key]));
			}
		}
		
		if($filters['price']) {
			$filters_text['price'] = $this->get_filter_text('price',$filters['price']);
		}
		
		if($filters['weight']) {
			$filters_text['weight'] = $this->get_filter_text('weight',$filters['weight']);
		}
		
		return array(
			'products' => $prodcuts_in_page,
			'pages_count' => $pages_count,
			'products_count' => count($products),
			'filters_used' => $filters_used,
			'empty_products' => $empty_products,
			'filters_text' => $filters_text,
			'filters_count' => $filters_count
		);
	}
	
	public function filter_products_for_country($products,$filters,$page) {
		$categories = $this->get_all_categories();
		$categories_for_country = array();
		
		$filters_arr = array(
			'category' => ($filters['category'] ? explode(';',$filters['category']) : 0)
		);
		
		$allowed_categories = array();
		
		if(is_array($filters_arr['category'])) {
			foreach($filters_arr['category'] as $category_name) {
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

		asort($categories_for_country);
		
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
		
		$empty_products = count($prodcuts_in_page)%5; 
					
		if($empty_products > 0) {
			$empty_products = 5-$empty_products;
		}	

		$filters_text = array();
		
		foreach($filters_arr as $key => $value) {
			if(isset($filters_arr[$key]) and $filters_arr[$key]) {
				$filters_text[$key] = $this->get_filter_text($key,count($filters_arr[$key]));
			}
		}
		
		return array(
			'products' => $prodcuts_in_page,
			'pages_count' => $pages_count,
			'products_count' => count($products),
			'categories_for_country' => $categories_for_country,
			'empty_products' => $empty_products,
			'filters_text' => $filters_text
		);
	}	
	
	public function filter_products_for_provider($input_products,$filters,$page) {
		
		$filters_arr = array(
			'provider' => ($filters['provider'] ? explode(';',$filters['provider']) : 0)
		);
		
		foreach($filters_arr as $key => $value) {
			if(isset($filters_arr[$key]) and $filters_arr[$key]) {
				foreach($filters_arr[$key] as $index_of_value_to_check => $value_to_check) {
					if(empty($value_to_check)) {
						unset($filters_arr[$key][$index_of_value_to_check]);
					}
				}
				
				if(empty($filters_arr[$key])) {
					$filters_arr[$key] = 0;
				}
			}
		}	
		
		
		$providers_for_provider = array();
		
		foreach($input_products as $product_id => $product) {
			if(!empty($product['provider'])) {
				$providers_for_provider[] = $product['provider'];
			}
		}		
		
		$providers_for_provider = array_unique($providers_for_provider);
		asort($providers_for_provider);

		$products = array();
		
		if(is_array($filters_arr['provider'])) {
			foreach($input_products as $product_id => $product) {
				if(in_array($product['provider'],$filters_arr['provider'])) {
					$products[$product_id] = $product;
				}
			}
		} else {
			$products = $input_products;
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
		
		$empty_products = count($prodcuts_in_page)%5; 
					
		if($empty_products > 0) {
			$empty_products = 5-$empty_products;
		}
		
		$filters_text = array();
		
		foreach($filters_arr as $key => $value) {
			if(isset($filters_arr[$key]) and $filters_arr[$key]) {
				$filters_text[$key] = $this->get_filter_text($key,count($filters_arr[$key]));
			}
		}		
		
		return array(
			'products' => $prodcuts_in_page,
			'pages_count' => $pages_count,
			'products_count' => count($products),
			'providers_for_provider' => $providers_for_provider,
			'empty_products' => $empty_products,
			'filters_text' => $filters_text
		);
	}
	
	public function filter_products_for_providers_full($products,$filters,$page) {
		$categories = $this->get_all_categories();
		$categories_for_provider = array();
		$filters_used = false;
		
		$filters_arr = array(
			'category' => ($filters['category'] ? explode(';',$filters['category']) : 0)
		);
		
		$allowed_categories = array();
		
		if(is_array($filters_arr['category'])) {
			foreach($filters_arr['category'] as $category_name) {
				foreach($categories as $category_id => $category) {
					if($category['title'] == $category_name) {
						$allowed_categories[] = $category_id;
					}
				}
			}
			
			$filters_used = true;
		}
		
		foreach($products as $product) {
			foreach($product['categories'] as $category) {
				if(isset($categories[$category])) {
					$parent_id = $categories[$category]['parent_id'];
					if($parent_id > 0) {
						$categories_for_provider[$parent_id] = $categories[$parent_id];
					} else {
						$categories_for_provider[$categories[$category]['category_id']] = $categories[$categories[$category]['category_id']];
					}
				}
			}
		}

		asort($categories_for_provider);
		
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
		
		$empty_products = count($prodcuts_in_page)%5; 
					
		if($empty_products > 0) {
			$empty_products = 5-$empty_products;
		}
		
		$filters_text = array();
		
		foreach($filters_arr as $key => $value) {
			if(isset($filters_arr[$key]) and $filters_arr[$key]) {
				$filters_text[$key] = $this->get_filter_text($key,count($filters_arr[$key]));
			}
		}
		
		return array(
			'products' => $prodcuts_in_page,
			'pages_count' => $pages_count,
			'products_count' => count($products),
			'filters_used' => $filters_used,
			'empty_products' => $empty_products,
			'filters_text' => $filters_text,
			'categories_for_provider' => $categories_for_provider
		);
	}

	public function filter_products_for_favourites($products,$filters,$page) {
		$categories = $this->get_all_categories();
		$categories_for_country = array();
		
		$filters_arr = array(
			'category' => ($filters['category'] ? explode(';',$filters['category']) : 0)
		);
		
		$allowed_categories = array();
		
		if(is_array($filters_arr['category'])) {
			foreach($filters_arr['category'] as $category_name) {
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

		asort($categories_for_country);
		
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
		
		$empty_products = count($prodcuts_in_page)%5; 
					
		if($empty_products > 0) {
			$empty_products = 5-$empty_products;
		}	
		
		$filters_text = array();
		
		foreach($filters_arr as $key => $value) {
			if(isset($filters_arr[$key]) and $filters_arr[$key]) {
				$filters_text[$key] = $this->get_filter_text($key,count($filters_arr[$key]));
			}
		}	
		
		return array(
			'products' => $prodcuts_in_page,
			'pages_count' => $pages_count,
			'products_count' => count($products),
			'categories_for_favourites' => $categories_for_country,
			'empty_products' => $empty_products,
			'filters_text' => $filters_text
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
	
	public function get_filter_text($type,$count) {
		if($type == 'country') {
			$number = (int)substr((string)$count, -1); 
			
			if($number == 1) {
				$word = 'страна';
			} elseif($number >= 2 and $number <= 4) {
				$word = 'страны';
			} else {
				$word = 'стран';
			}
		} elseif($type == 'brand') {
			$number = (int)substr((string)$count, -1); 
			
			if($number == 1 and (int)($count) != 11) {
				$word = 'бренд';
			} elseif($number >= 2 and $number <= 4 and ((int)($count) < 10 or (int)($count) > 20)) {
				$word = 'бренда';
			} else {
				$word = 'брендов';
			}			
		} elseif($type == 'composition') {
			$number = (int)substr((string)$count, -1); 
			
			if($number == 1 and (int)($count) != 11) {
				$word = 'состав';
			} elseif($number >= 2 and $number <= 4 and ((int)($count) < 10 or (int)($count) > 20)) {
				$word = 'состава';
			} else {
				$word = 'составов';
			}			
		} elseif($type == 'pack') {
			$number = (int)substr((string)$count, -1); 
			
			if($number == 1 and (int)($count) != 11) {
				$word = 'упаковка';
			} elseif($number >= 2 and $number <= 4 and ((int)($count) < 10 or (int)($count) > 20)) {
				$word = 'упаковки';
			} else {
				$word = 'упаковок';
			}			
		} elseif($type == 'price') {
			if($count == 'asc') {
				$word = 'по возрастанию';
			} elseif($count == 'desc') {
				$word = 'по убыванию';
			}

			return $word;			
		} elseif($type == 'weight') {
			if($count == 'raz') {
				$word = 'на развес';
			} elseif($count == 'upa') {
				$word = 'в упаковке';
			}

			return $word;			
		} elseif($type == 'category') {
			$number = (int)substr((string)$count, -1); 
			
			if($number == 1 and (int)($count) != 11) {
				$word = 'категория';
			} elseif($number >= 2 and $number <= 4 and ((int)($count) < 10 or (int)($count) > 20)) {
				$word = 'категории';
			} else {
				$word = 'категорий';
			}			
		} elseif($type == 'provider') {
			$number = (int)substr((string)$count, -1); 
			
			if($number == 1 and (int)($count) != 11) {
				$word = 'поставщик';
			} elseif($number >= 2 and $number <= 4 and ((int)($count) < 10 or (int)($count) > 20)) {
				$word = 'поставщика';
			} else {
				$word = 'поставщиков';
			}			
		}
		
		return $count.' '.$word;
	}
}