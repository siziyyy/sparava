<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Productlib {
	private $_ci;

 	function __construct() {
    	$this->_ci =& get_instance();
    }

    public function get_parent_category_products($category_id) {
    	$categories = array();
    	$products = array();

		$sql = 'SELECT * FROM categories WHERE parent_id = ' . (int)$category_id . ' ORDER BY sort_order ASC';
				
		$query = $this->_ci->db->query($sql);

		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$categories[$row['category_id']] = $row;		
			}
		}    	

		foreach ($categories as $child_category_id => $category) {
			$sql = 'SELECT p.*, c.bm FROM products AS p, product_to_category AS ptc, categories AS c WHERE p.product_id = ptc.product_id AND p.status = 1 AND ptc.category_id = c.category_id AND ptc.category_id = ' . (int)$child_category_id . ' ORDER BY product_id ASC';
					
			$query = $this->_ci->db->query($sql);
			$count = $query->num_rows();
			$counted_products = 0;
			$extracted_products = array();

			if ($count > 0) {

				foreach ($query->result_array() as $row) {
					$extracted_products[$row['product_id']] = $row;
				}

				$extracted_products = $this->sort_products('category',$child_category_id,$extracted_products);

				$counted_products = 0;

				$products[$category['category_id']]['products_count'] = $count;

				foreach ($extracted_products as $product) {
					if($counted_products <= 4) {
						$products[$category['category_id']]['products'][$product['product_id']] = $product;
						$products[$category['category_id']]['info'] = $category;
						$counted_products++;
					}
				}

				if($count <= 5) {
					$products[$category['category_id']]['empty_products'] = 5 - $count;
				} else {
					$products[$category['category_id']]['empty_products'] = 0;
				}
			}

			foreach($products as $category_id => $category) {
				$products[$category_id]['products'] = $this->_ci->baselib->handle_special_price($category['products']);
				//$products[$category_id]['products'] = $this->sort_products('category',$category_id,$products[$category_id]['products']);
			}
		}

		return $products;
    }

	public function get_related_products_ids($product_id = false,$limit = false) {
		$result = array();

		if($product_id) {
			$sql = 'SELECT c.parent_id FROM product_to_category AS ptc, categories AS c WHERE ptc.product_id = '.$product_id.' AND ptc.category_id = c.category_id';
			$query = $this->_ci->db->query($sql);

			if ($query->num_rows() > 0) {
				$parent_id = $query->row_array()['parent_id'];

				$sql = 'SELECT p.product_id FROM products AS p, product_to_category AS ptc WHERE p.product_id = ptc.product_id AND p.recommend = 1 AND p.status = 1 AND ptc.category_id IN (SELECT category_id FROM categories WHERE parent_id = ' . $parent_id . ') ORDER BY rand() LIMIT 5';
				$query = $this->_ci->db->query($sql);

				if ($query->num_rows() > 0) {
					foreach ($query->result_array() as $row) {				
						$result[] = $row['product_id'];
					}
				}				
			}
		} else {
			$sql = 'SELECT p.* FROM products AS p, product_to_category AS ptc WHERE p.product_id = ptc.product_id AND p.recommend = 1 AND p.status = 1 ORDER BY rand() LIMIT '.($limit ? $limit : '6');
			$query = $this->_ci->db->query($sql);
			
			if ($query->num_rows() > 0) {
				foreach ($query->result_array() as $row) {
					$result[] = $row['product_id'];
				}
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
		
		return $this->_ci->baselib->handle_special_price($products);
	}

	
	public function get_category_products($category) {
		
		$products = array();
		
		$category_id = $this->_ci->baselib->get_category_id($category);
		
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
		
		return $this->_ci->baselib->handle_special_price($products);
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
		
		return $this->_ci->baselib->handle_special_price($products);
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

		return $this->_ci->baselib->handle_special_price($products);
	}
	
	public function get_products_with_categories($provider_id = false, $type = false) {
		
		$ptc = array();
		
		$sql = 'SELECT * FROM product_to_category';
				
		$query = $this->_ci->db->query($sql);

		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$ptc[$row['product_id']][] = $row['category_id'];		
			}			
		}
		
		$products = array();
		
		$sql = 'SELECT p.*, c.bm, c.title FROM products AS p, product_to_category AS ptc, categories AS c, providers AS pr WHERE p.product_id = ptc.product_id AND ptc.category_id = c.category_id AND p.status = 1';

		if(!$type) {
			$sql .= ' AND pr.store = p.provider AND pr.provider_id = ' . (int)$provider_id;
		} elseif($type == 'farm') {
			$sql .= ' AND p.farm = 1';
		} elseif($type == 'eko') {
			$sql .= ' AND p.eko = 1';
		} elseif($type == 'diet') {
			$sql .= ' AND p.diet = 1';
		} elseif($type == 'child') {
			$sql .= ' AND p.child = 1';
		}
		
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

		return $this->_ci->baselib->handle_special_price($products);
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

		if(count($ids)) {
		
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

		}
		
		ksort($products);

		return $this->_ci->baselib->handle_special_price($products);
	}


	public function get_product_by_id($product_id) {
		
		$sql = 'SELECT p.*, c.bm, c.category_id, c.title AS category_title FROM products AS p, product_to_category AS ptc, categories AS c WHERE p.product_id = ptc.product_id AND ptc.category_id = c.category_id AND p.product_id = "'.$product_id.'" LIMIT 1';

		$query = $this->_ci->db->query($sql);
		
		if ($query->num_rows() > 0) {

			$product = $query->row_array();
			
			$sql = 'SELECT * FROM categories WHERE category_id IN (SELECT parent_id FROM categories WHERE category_id = '.$product['category_id'].')';
			$query = $this->_ci->db->query($sql);

			if ($query->num_rows() > 0) {
				$category = $query->row_array();

				$product['parent_category_id'] = $category['category_id'];
				$product['parent_category_title'] = $category['title'];
			}
			
 			$videos = explode(';',$product['youtube']);
			$product['youtube'] = array();

 			foreach($videos as $video) {
 				if(!empty($video)) {
 					$product['youtube'][] = $video;
 				}
 			}

			return $this->_ci->baselib->handle_special_price($product);
		}
		
		return false;
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
			$deleted_products = array();
			
			$sort_order = unserialize($query->row_array()['sort_data']);

			foreach($sort_order as $index => $product_id) {
				if(isset($products[$product_id])) {
					$products_sorted[$index] = $products[$product_id];
					unset($products[$product_id]);
				} else {
					$deleted_products[$index] = $product_id;
				}
			}

			foreach ($deleted_products as $index => $product_id) {
				if(count($products)) {
					$product = array_pop($products);
					$products_sorted[$index] = $product;
				}
			}
			
			foreach($products as $product) {
				$products_sorted[] = $product;
			}
						
			return $products_sorted;
		}
		
		return $products;
	}

	function filter_products_by_sort($products,$category) {
		$sort_order = $this->_ci->baselib->get_sort_order();
		$category_id = $this->_ci->baselib->get_category_id($category);

		if(count($sort_order)) {
			if(isset($sort_order[$category_id])) {
				foreach($products as $id => $product) {
					$drop_product = true;

					foreach($sort_order[$category_id] as $type) {
						if($type == 'razves') {
							if(empty($product['weight'])) {
								$drop_product = false;
							}
						} elseif($type == 'pack') {
							if(!empty($product['weight'])) {
								$drop_product = false;
							}
						} elseif($type == 'bbox') {
							if($product['bbox'] or $product['bbox_n']) {
								$drop_product = false;
							}
						} elseif($product[$type]) {
							$drop_product = false;
						}
					}

					if($drop_product) {
						unset($products[$id]);
					}					
				}
			} else {
				$this->_ci->baselib->set_sort_order(0, 0, true);
			}
		}

	    return $products;
	}
}