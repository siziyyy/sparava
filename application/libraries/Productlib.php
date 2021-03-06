<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Productlib {
	private $_ci;
	public $_countries = array(
		1 => 'Россия',
		2 => 'Италия',
		3 => 'Испания',
		4 => 'Греция',
		5 => 'Швейцария',
		6 => 'Армения',
		7 => 'Узбекистан',
		8 => 'Азербайджан',
		9 => 'Молдова',
		10 => 'Беларусь',
		11 => 'Турция'
	);

	private $_blacklist = array('.','_','(',')','/','\\',',','!','-',':',';','@','#','$','%','^','&','*','=','+','|','№','?','<','>','[',']','{','}','"');

 	function __construct() {
    	$this->_ci =& get_instance();
    }

    public function get_categories_struct() {
		$categories_struct = $this->_ci->cache->file->get('categories_struct');

		if(!$categories_struct) {
	    	$categories = $this->_ci->cache->file->get('categories_list');
	    	$result = array();

			$sql = "SELECT p.*, c.category_id, c.parent_id FROM categories AS c, product_to_category AS ptc, products AS p WHERE p.status = 1 AND c.category_id = ptc.category_id AND p.product_id = ptc.product_id AND c.parent_id > 0 ORDER BY c.category_id ASC,c.sort_order ASC";

			$query = $this->_ci->db->query($sql);

			if ($query->num_rows() > 0) {
				foreach ($query->result_array() as $row) {
					if(!isset($result['categories'][$row['parent_id']])) {
						$result['categories'][$row['parent_id']]['info'] = $categories[$row['parent_id']];

						foreach ($categories as $category) {
							if($category['parent_id'] == $row['parent_id']) {
								$result['categories'][$row['parent_id']]['childs'][$category['category_id']] = $category;
							}
						}

						$result['categories'][$row['parent_id']]['count'] = 1;
					} else {
						$result['categories'][$row['parent_id']]['count']++;
					}

					if($row['eko']) {
						if(isset($result['types']['eko']['count'])) {
							$result['types']['eko']['count']++;
						} else {
							$result['types']['eko']['count'] = 1;
						}

						if(!isset($result['types']['eko'][$row['parent_id']])) {
							$result['types']['eko']['categories'][$row['parent_id']] = $categories[$row['parent_id']];
							$result['types']['eko']['title'] = 'Эко и органик';
						}
					}

					if($row['farm']) {
						if(isset($result['types']['farm']['count'])) {
							$result['types']['farm']['count']++;
						} else {
							$result['types']['farm']['count'] = 1;
						}

						if(!isset($result['types']['farm'][$row['parent_id']])) {
							$result['types']['farm']['categories'][$row['parent_id']] = $categories[$row['parent_id']];
							$result['types']['farm']['title'] = 'Фермерские';
						}
					}

					if($row['diet']) {
						if(isset($result['types']['diet']['count'])) {
							$result['types']['diet']['count']++;
						} else {
							$result['types']['diet']['count'] = 1;
						}

						if(!isset($result['types']['diet'][$row['parent_id']])) {
							$result['types']['diet']['categories'][$row['parent_id']] = $categories[$row['parent_id']];
							$result['types']['diet']['title'] = 'Диетические';
						}
					}

					if($row['child']) {
						if(isset($result['types']['child']['count'])) {
							$result['types']['child']['count']++;
						} else {
							$result['types']['child']['count'] = 1;
						}

						if(!isset($result['types']['child'][$row['parent_id']])) {
							$result['types']['child']['categories'][$row['parent_id']] = $categories[$row['parent_id']];
							$result['types']['child']['title'] = 'Для детей';
						}
					}

					if($row['recommend']) {
						if(isset($result['types']['recommend']['count'])) {
							$result['types']['recommend']['count']++;
						} else {
							$result['types']['recommend']['count'] = 1;
						}

						if(!isset($result['types']['recommend'][$row['parent_id']])) {
							$result['types']['recommend']['categories'][$row['parent_id']] = $categories[$row['parent_id']];
							$result['types']['recommend']['title'] = 'Особо рекомендуем';
						}
					}

					if($row['bbox'] or $row['bbox_n']) {
						if(isset($result['types']['bbox']['count'])) {
							$result['types']['bbox']['count']++;
						} else {
							$result['types']['bbox']['count'] = 1;
						}

						if(!isset($result['types']['bbox'][$row['parent_id']])) {
							$result['types']['bbox']['categories'][$row['parent_id']] = $categories[$row['parent_id']];
							$result['types']['bbox']['title'] = 'Большая упаковка';
						}
					}

					if(in_array($row['country'],$this->_countries)) {
						if(isset($result['countries'][$row['country']]['count'])) {
							$result['countries'][$row['country']]['count']++;
						} else {
							$result['countries'][$row['country']]['count'] = 1;
						}

						if(!isset($result['countries'][$row['country']]['categories'][$row['parent_id']]) ) {
							$result['countries'][$row['country']]['categories'][$row['parent_id']] = $categories[$row['parent_id']];
							$result['countries'][$row['country']]['country_id'] = array_search($row['country'], $this->_countries); ;
						}
					}
				}
			}

			$this->_ci->cache->file->save('categories_struct', $result, 86400);

			return $result;
		}

		return $categories_struct;
    }

	public function get_breadcrumbs_for_product($product,$type = false) {

		$this->_ci->load->model('Category');

		$breadcrumbs = array();

		if($type) {
			$breadcrumbs['/'] = 'Главная';

			if($type == 'eko') {
				$breadcrumbs['/eko'] = 'Эко товары';
			} elseif($type == 'child') {
				$breadcrumbs['/child'] = 'Детские товары';
			} elseif($type == 'diet') {
				$breadcrumbs['/diet'] = 'Диетические товары';
			} elseif($type == 'farm') {
				$breadcrumbs['/farm'] = 'Фермерские товары';
			} elseif($type == 'recommend') {
				$breadcrumbs['/recommend'] = 'Рекомендуемые товары';
			} elseif($type == 'bbox') {
				$breadcrumbs['/bbox'] = 'Товары в большой упаковке';
			} elseif($type == 'search') {

				if(!is_null($this->_ci->input->get('value'))) {
					$value = $this->_ci->input->get('value');
					$this->_ci->session->set_userdata('search_value',$value);
				} else {
					$value = $this->_ci->session->userdata('search_value');
				}

				$breadcrumbs['/search?value='.$value] = 'Поиск';
			} else {
				$countries = $this->_ci->baselib->_countries;
				$breadcrumbs['/country/'.(int)$type] = $countries[$type];
			}

			$breadcrumbs['self'] = (is_null($product['title_full']) ? $product['title'] : $product['title_full']);
		} else {
			$breadcrumbs['/'] = 'Главная';

			$category = new Category();
			$category->set_id($product['parent_category_id']);
			$category_data = $category->get_data();

			$breadcrumbs['/'.$category_data['seo_url']] = $product['parent_category_title'];

			$parent_seo_url = $category_data['seo_url'];

			$category = new Category();
			$category->set_id($product['category_id']);
			$category_data = $category->get_data();

			$breadcrumbs['/'.$parent_seo_url.'/'.$category_data['seo_url']] = $product['category_title'];
			$breadcrumbs['self'] = (is_null($product['title_full']) ? $product['title'] : $product['title_full']);
		}

		return $breadcrumbs;
	}

   	public function get_categories_for_page($type = false,$element_id = false) {
		$categories = array();

		if($type == 'category') {
			$sql = "SELECT * FROM categories WHERE parent_id = " . (int)$element_id . " ORDER BY sort_order ASC";
			$query = $this->_ci->db->query($sql);

			if ($query->num_rows() > 0) {
				foreach ($query->result_array() as $row) {
					$categories[$row['category_id']] = $row;
				}
			}			
		} else {
			$parent_categories = array();

			$sql = "SELECT * FROM categories";
			$query = $this->_ci->db->query($sql);

			if ($query->num_rows() > 0) {
				foreach ($query->result_array() as $row) {
					$parent_categories[$row['category_id']] = $row;
				}
			}

			$sql = "SELECT c.* FROM categories AS c, product_to_category AS ptc, products AS p WHERE p.status = 1 AND c.category_id = ptc.category_id AND p.product_id = ptc.product_id";

			if($type == 'country') {
				$sql .= " AND p.country = '" . $element_id . "';";
			} elseif($type == 'diet') {
				$sql .= " AND p.diet = 1;";
			} elseif($type == 'eko') {
				$sql .= " AND p.eko = 1;";
			} elseif($type == 'child') {
				$sql .= " AND p.child = 1;";
			} elseif($type == 'farm') {
				$sql .= " AND p.farm = 1;";
			} elseif($type == 'recommend') {
				$sql .= " AND p.recommend = 1;";
			} elseif($type == 'bbox') {
				$sql .= " AND (p.bbox = 1 OR p.bbox_n = 1);";
			}

			$query = $this->_ci->db->query($sql);

			if ($query->num_rows() > 0) {
				foreach ($query->result_array() as $row) {
					if(isset($parent_categories[$row['parent_id']])) {
						$categories[$row['parent_id']] = $parent_categories[$row['parent_id']];
					}
				}
			}			
		}

		$categories_structed = array();

		$col = 0;

		do {
			$current_category = array_shift($categories);
			$categories_structed[$col][] = $current_category;
		
			$col++;

			if($col >= 5) {
				$col = 0;
			}

		} while(count($categories));

		for($i=0;$i<5;$i++) {
			if(!isset($categories_structed[$i])) {
				$categories_structed[$i] = array();
			}
		}
		
		return $categories_structed;
	} 

	public function get_top_five($type = false,$element_id = false) {
		$products = array();

		if($type == 'category') {
			$sql = "SELECT p.*, c.category_id, c.title AS category, c.bm, c.seo_url AS c_seo_url FROM categories AS c, product_to_category AS ptc, products AS p WHERE p.status = 1 AND c.category_id = ptc.category_id AND p.product_id = ptc.product_id AND c.parent_id = " . (int)$element_id . " ORDER BY c.sort_order ASC";

			$query = $this->_ci->db->query($sql);

			if ($query->num_rows() > 0) {
				foreach ($query->result_array() as $row) {
					$products[$row['category_id']]['products'][$row['product_id']] = $row;

					if(!isset($products[$row['category_id']]['info'])) {
						$products[$row['category_id']]['info'] = array(
							'title' => $row['category'],
							'category_id' => $row['category_id'],
							'seo_url' => $row['c_seo_url']
						);
					}
				}
			}			
		} else {
			$categories = array();

			$sql = "SELECT * FROM categories";
			$query = $this->_ci->db->query($sql);

			if ($query->num_rows() > 0) {
				foreach ($query->result_array() as $row) {
					$categories[$row['category_id']] = $row;
				}
			}

			$sql = "SELECT p.*, c.title AS category, c.parent_id, c.bm, c.seo_url AS c_seo_url FROM categories AS c, product_to_category AS ptc, products AS p WHERE p.status = 1 AND c.category_id = ptc.category_id AND p.product_id = ptc.product_id";

			if($type == 'country') {
				$sql .= " AND p.country = '" . $element_id . "';";
			} elseif($type == 'diet') {
				$sql .= " AND p.diet = 1;";
			} elseif($type == 'eko') {
				$sql .= " AND p.eko = 1;";
			} elseif($type == 'child') {
				$sql .= " AND p.child = 1;";
			} elseif($type == 'farm') {
				$sql .= " AND p.farm = 1;";
			} elseif($type == 'recommend') {
				$sql .= " AND p.recommend = 1;";
			} elseif($type == 'bbox') {
				$sql .= " AND (p.bbox = 1 OR p.bbox_n = 1);";
			}

			$query = $this->_ci->db->query($sql);

			if ($query->num_rows() > 0) {
				foreach ($query->result_array() as $row) {
					if(!isset($categories[$row['parent_id']])) {
						continue;
					}

					$products[$row['parent_id']]['products'][$row['product_id']] = $row;

					if(!isset($products[$row['parent_id']]['info'])) {
						$products[$row['parent_id']]['info'] = array(
							'title' => $categories[$row['parent_id']]['title'],
							'category_id' => $row['parent_id'],
							'seo_url' => $row['c_seo_url']
						);
					}
				}
			}			
		}

		foreach($products as $category_id => $category) {
			$count = count($category['products']);

			if($count >= 5) {
				$products[$category_id]['products_count'] = $count;
			} else {
				unset($products[$category_id]);
			}
		}

		$top_struct = array(
			'category' => 'top_category',
			'country' => 'top_country',
			'eko' => 'top_eko',
			'child' => 'top_child',
			'diet' => 'top_diet',
			'farm' => 'top_farm',
			'recommend' => 'recommend'
		);

		if($type == 'bbox') {
			foreach($products as $category_id => $category) {
				foreach($category['products'] as $product_id => $product) {
					if(!$product['bbox'] and !$product['bbox_n']) {
						unset($products[$category_id]['products'][$product_id]);
					}
				}
			}			
		} else {
			foreach($products as $category_id => $category) {
				foreach($category['products'] as $product_id => $product) {
					if(!$product[$top_struct[$type]]) {
						unset($products[$category_id]['products'][$product_id]);
					}
				}
			}			
		}		

		foreach($products as $category_id => $category) {
			$products[$category_id]['products'] = $this->_ci->baselib->handle_special_price($category['products']);
			//shuffle($products[$category_id]['products']);

			while(count($products[$category_id]['products']) > 5) {
				array_pop($products[$category_id]['products']);
			}
		}

		foreach($products as $category_id => $category) {
			$count = count($products[$category_id]['products']);

			if($count <= 5) {
				$products[$category_id]['empty_products'] = 5-$count;
			} else {
				$products[$category_id]['empty_products'] = 0;
			}
		}
		
		return $products;
	}

	public function get_related_products_ids($product_id = false, $limit = false, $type=false) {
		$result = array();

		if($type) {
			$sql = "SELECT product_id FROM products WHERE status = 1";

			if($type == 'diet') {
				$sql .= " AND diet = 1";
			} elseif($type == 'eko') {
				$sql .= " AND eko = 1";
			} elseif($type == 'child') {
				$sql .= " AND child = 1";
			} elseif($type == 'farm') {
				$sql .= " AND farm = 1";
			} elseif($type == 'recommend' or $type == 'search') {
				$sql .= " AND recommend = 1";
			} elseif($type == 'bbox') {
				$sql .= " AND (bbox = 1 OR bbox_n = 1)";
			} else {
				$sql .= " AND country = '" . $type . "'";
			}

			$sql .= " ORDER BY rand() LIMIT 6";

			$query = $this->_ci->db->query($sql);

			if ($query->num_rows() > 0) {
				foreach ($query->result_array() as $row) {
					$result[] = $row['product_id'];
				}
			}

		} elseif($product_id) {
			$sql = 'SELECT c.parent_id FROM product_to_category AS ptc, categories AS c WHERE ptc.product_id = '.$product_id.' AND ptc.category_id = c.category_id';
			$query = $this->_ci->db->query($sql);

			if ($query->num_rows() > 0) {
				$parent_id = $query->row_array()['parent_id'];

				$sql = 'SELECT p.product_id FROM products AS p, product_to_category AS ptc WHERE p.product_id = ptc.product_id AND p.recommend = 1 AND p.status = 1 AND ptc.category_id IN (SELECT category_id FROM categories WHERE parent_id = ' . $parent_id . ') ORDER BY rand() LIMIT 6';
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

	public function get_related_products_ids_by_brand($product_id = false) {
		$result = array(
			'list_type' => 'brand',
			'products' => array()
		);

		$sql = "SELECT brand FROM products WHERE product_id = ".(int)$product_id;
		$query = $this->_ci->db->query($sql);

		if ($query->num_rows() > 0) {
			$product = $query->row_array();
		}

		if(!empty($product['brand'])) {
			$sql = "SELECT p.product_id FROM products AS p, product_to_category AS ptc WHERE status = 1 AND p.brand IN (SELECT brand FROM products WHERE product_id = ".(int)$product_id.") AND ptc.product_id = p.product_id AND ptc.category_id IN (SELECT category_id FROM product_to_category WHERE product_id = ".(int)$product_id.")";
			$query = $this->_ci->db->query($sql);

			if ($query->num_rows() > 0) {
				foreach ($query->result_array() as $row) {
					if($row['product_id'] != $product_id) {
						$result['products'][] = $row['product_id'];
					}					
				}
			}
		}

		if(count($result['products']) <= 3) {
			$result = array(
				'list_type' => 'category',
				'products' => array()
			);

			$sql = "SELECT product_id FROM products WHERE status = 1 AND product_id IN (SELECT product_id FROM product_to_category WHERE category_id IN (SELECT category_id FROM product_to_category WHERE product_id = ".(int)$product_id."))";
			$query = $this->_ci->db->query($sql);

			if ($query->num_rows() > 0) {
				foreach ($query->result_array() as $row) {
					if($row['product_id'] != $product_id) {
						$result['products'][] = $row['product_id'];
					}
				}
			}
		}

		$result['products'] = $this->_ci->productlib->get_products_by_ids($result['products']);

		$sql = "SELECT category_id FROM product_to_category WHERE product_id = ".(int)$product_id;
		$query = $this->_ci->db->query($sql);
		if ($query->num_rows() > 0) {
			$category_id = $query->row_array()['category_id'];

			$filters_data = $this->_ci->session->userdata('filters_data');
			if(isset($filters_data[$category_id])) {				
				$filtered_products = $this->_ci->filterlib->filter_products($result['products'],$filters_data[$category_id],1,$category_id,true);

				$result['products'] = $filtered_products['products'];
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
		
		$category_id = $this->_ci->baselib->get_category_id_by_param($category);
		
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
	
	public function get_products($type = false, $show_hidden = false, $filters = array(), $skip_handle = false) {
		
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

		if(count($filters)) {
			foreach ($filters as $type => $value) {
				$sql .= ' AND p.'.$type.' = "'.$value.'"';
			}
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

		if(!$skip_handle) {
			$products = $this->_ci->baselib->handle_special_price($products);
		}

		return $products;
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
		
		$sql = 'SELECT p.*, c.bm, c.title FROM products AS p, product_to_category AS ptc, categories AS c';

		if(!$type) {
			$sql .= ', providers AS pr';
		}

		$sql .= ' WHERE p.product_id = ptc.product_id AND ptc.category_id = c.category_id AND p.status = 1';

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
		} elseif($type == 'recommend') {
			$sql .= ' AND p.recommend = 1';
		} elseif($type == 'bbox') {
			$sql .= ' AND (p.bbox = 1 OR p.bbox_n = 1)';
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
	
	public function get_products_by_ids($ids,$dont_order = false) {
		
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
		
			$query = $this->_ci->db->select("*")->from("products")->where("status",1)->where_in("product_id",$ids);

			if(!$dont_order) {
				$query = $query->order_by('product_id', 'ASC');
			}

			$query = $query->get();
			
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

 			$sql = 'SELECT blog_id FROM blogs WHERE linked_product_id = '.$product['product_id'];
			$query = $this->_ci->db->query($sql);

			if ($query->num_rows() > 0) {
				$blog = $query->row_array();

				$product['blog_id'] = $blog['blog_id'];
			} else {
				$product['blog_id'] = NULL;
			}

			$product = $this->_ci->baselib->handle_special_price($product);

			$product['add_images'] = array();

 			$sql = 'SELECT * FROM `product_images` WHERE `product_id` = '.$product['product_id'];
			$query = $this->_ci->db->query($sql);
			if ($query->num_rows() > 0) {
				foreach ($query->result_array() as $row) {
					$product['add_images'][$row['image_id']] = $row['url'];
				}
			}

			return $product;
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

	public function filter_products_by_sort($products,$category) {
		$sort_order = $this->_ci->baselib->get_sort_order();
		$category_id = $this->_ci->baselib->get_category_id_by_param($category);

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

	public function search_products($value) {
		$this->_ci->load->library('stemmlib');

		$result = array(
			'products' => array()
		);

		$stemmed = array();
		$search_words = array();
		$products = array();
		$fixed_words = true;

		$charset = mb_detect_encoding($value);
		$value = iconv($charset, "UTF-8", $value);
		$value = trim(preg_replace("/[^а-яА-Яa-zA-z0-9\-\s]/ui", "%", $value));

		$value = mb_strtolower($value);
		$value = str_replace($this->_blacklist,'',$value);

		$exp_words = $this->_ci->baselib->get_setting_value('search_exp_words');
		$exp_words = unserialize(base64_decode($exp_words));

		$stop_words = $this->_ci->baselib->get_setting_value('search_stop_words');
		$stop_words = unserialize(base64_decode($stop_words));

		$minus_words = $this->_ci->baselib->get_setting_value('search_minus_words');
		$minus_words = unserialize(base64_decode($minus_words));

		foreach ($minus_words as $wid => $word) {
			$word = trim($word);

			$minus_words[$wid] = $word;
			
			if(empty($word)) {
				unset($minus_words[$wid]);
			}
		}

		foreach ($stop_words as $wid => $word) {
			$word = trim($word);

			$stop_words[$wid] = $word;
			
			if(empty($word)) {
				unset($stop_words[$wid]);
			}
		}

		foreach ($exp_words as $wid => $word) {
			$word = trim($word);

			$exp_words[$wid] = $word;
			
			if(empty($word)) {
				unset($exp_words[$wid]);
			}
		}

		foreach ($stop_words as $word) {
			$value = trim(str_replace($word,'',$value));
		}

		if(empty(trim($value))) {
			return false;
		} 

		$words = explode(' ',$value);

		foreach ($words as $word) {
			$word = trim($word);
			if(!empty($word)) {
				$search_words[] = $word;
			}
		}

		if(in_array($value,$exp_words)) {
			$stemmed = $search_words;
		} else {
			if(count($search_words) > 1) {
				foreach ($search_words as $wid => $word) {
					if(in_array($word,$minus_words)) {
						unset($search_words[$wid]);
					}
				}
			}

			$fixed_words = false;

			foreach ($search_words as $word) {
				$stemmed[] = $this->_ci->stemmlib->clear_value($word);
			}
		}

		$search_result = array(
			'first_wave' => array(),
			'second_wave' => array(),
			'third_wave' => array()
		);

		$sql = "SELECT category_id,title,description,parent_id FROM categories";
		$query = $this->_ci->db->query($sql);

		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				if(str_replace($this->_blacklist,'',mb_strtolower($row['title'], 'UTF-8')) == $value) {
					if($row['parent_id'] == '0') {
						$search_result['second_wave'][] = $row['category_id'];
					} else {
						$search_result['first_wave'][] = $row['category_id'];
					}					
				} else {
					$description = explode(PHP_EOL,$row['description']);

					foreach ($description as $descr) {
						if(str_replace($this->_blacklist,'',mb_strtolower(trim($descr), 'UTF-8')) == $value) {
							if($row['parent_id'] == '0') {
								$search_result['second_wave'][] = $row['category_id'];
							} else {
								$search_result['first_wave'][] = $row['category_id'];
							}
						}
					}
				}
			}
		}

		foreach ($search_result['first_wave'] as $category_id) {
			$products = array_merge($products, $this->get_category_products($category_id));
		}

		foreach ($products as $product) {
			$result['products'][] = $product['product_id'];
		}

		$products = array();

		foreach ($search_result['second_wave'] as $category_id) {
			$products = array_merge($products, $this->get_category_products($category_id));
		}

		foreach ($products as $product) {
			$result['products'][] = $product['product_id'];
		}

		$search_result = array(
			'first_wave' => array(),
			'second_wave' => array(),
			'third_wave' => array()
		);

		$sql = "SELECT p.product_id, p.title, p.title_full, p.brand, p.country, p.manufacturer, p.composition, p.consist, c.category_id,p.assortiment FROM products AS p, categories AS c, product_to_category AS ptc WHERE p.status = 1 AND c.category_id = ptc.category_id AND p.product_id = ptc.product_id";

		$query = $this->_ci->db->query($sql);		
		if ($query->num_rows() > 0) {

			foreach ($query->result_array() as $row) {
				if($fixed_words) {
					if($this->compare_words($row['title'], $value) or $this->compare_words($row['title_full'], $value)) {
						$search_result['first_wave'][] = $row['product_id'];
					} elseif($this->compare_words($row['brand'], $value) or $this->compare_words($row['country'], $value) or $this->compare_words($row['manufacturer'], $value)) {
						$search_result['second_wave'][] = $row['product_id'];
					} elseif($this->compare_words($row['assortiment'], $value)) {
						$search_result['third_wave'][] = $row['product_id'];
					}
				} else {
					$use_product = true;

					foreach ($stemmed as $word) {
						if(mb_stripos($row['title'],$word,0,'UTF-8') !== FALSE or mb_stripos($row['title_full'],$word,0,'UTF-8') !== FALSE) {
							$use_product = 'first_wave';
						} elseif(mb_stripos($row['brand'],$word,0,'UTF-8') !== FALSE or mb_stripos($row['country'],$word,0,'UTF-8') !== FALSE or mb_stripos($row['manufacturer'],$word,0,'UTF-8') !== FALSE) {
							$use_product = 'second_wave';
						} elseif(mb_stripos($row['assortiment'],$word,0,'UTF-8') !== FALSE) {
							$use_product = 'third_wave';
						} else {
							$use_product = false;
							break;
						}
					}

					if($use_product) {
						$search_result[$use_product][] = $row['product_id'];
					}
				}
			}
		}

		foreach ($search_result['first_wave'] as $product_id) {
			$result['products'][] = $product_id;
		}

		foreach ($search_result['second_wave'] as $product_id) {
			$result['products'][] = $product_id;
		}

		foreach ($search_result['third_wave'] as $product_id) {
			$result['products'][] = $product_id;
		}

	    return $result;
	}
	
	private function compare_words($word,$value) {
		$word = mb_strtolower(trim($word));
		//$word = str_replace($this->_blacklist,'',$word);

		if($word == $value) {
			return true;
		} elseif(mb_stripos($word,$value.' ',0) === 0) {
			return true;
		} elseif(mb_stripos($word,' '.$value.' ',0) !== FALSE) {
			return true;
		} elseif(mb_stripos($word,' '.$value,0) !== FALSE and ((mb_stripos($word,$value.' ',0) - 1 ==  strlen(str_replace($value,'',$word)) - strlen($value)))) {
			return true;
		}

		return false;
	}
}