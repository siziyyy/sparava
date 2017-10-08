<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Baselib {

	private $_ci;

 	function __construct() {
    	$this->_ci =& get_instance();
    }
	
	public function get_categories($current_category = false) {
		
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
					$line = ($row['first_line'] == 1 ? 'categories_first_line' : 'categories_second_line');
					
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
					$line = ($result[$row['parent_id']]['first_line'] == 1 ? 'categories_first_line' : 'categories_second_line');
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
				
				//if($row['category_id'] > 0) {
				//	$products[$row['product_id']]['image'] = $row['category_id'].'/'.$row['image'];
				//}				
			}			
		}
		
		$query = $this->_ci->db->query('SELECT p.* FROM products AS p, product_to_category AS ptc WHERE p.product_id = ptc.product_id AND ptc.category_id IN (SELECT category_id FROM categories WHERE parent_id = ' . (int)$category_id . ' ) ORDER BY product_id ASC');
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$products[$row['product_id']] = $row;
				
				//if($row['category_id'] > 0) {
				//	$products[$row['product_id']]['image'] = $row['category_id'].'/'.$row['image'];
				//}				
			}			
		}
		
		ksort($products);
		
		return $products;
	}

	public function get_product_by_id($product_id) {
		
		$query = $this->_ci->db->get_where("products", array("product_id" => $product_id));
		
		if ($query->num_rows() > 0) {
			return $query->row_array();
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

	public function get_shipping_methods() {
		
		return array(
			'1' => array(
				'shipping_id' => 1,
				'title' => 'Обычная доставка',
				'price' => '199',
				'description' => 'доставим завтра в любое удобное Вам время<br>с интервалом 1 час, с 10:00 до 21:00'
			),
			'2' => array(
				'shipping_id' => 2,
				'title' => 'Экспресс доставка',
				'price' => '399',
				'description' => 'доставим в течении 2 часов, с 10:00 до 21:00'
			),			
		);
		
	}	
	
}