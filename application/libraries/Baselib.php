<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Baselib {

	private $_ci;
	public $_return_url;
	public $_related_products;

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

 	function __construct() {
    	$this->_ci =& get_instance();
    	$this->_ci->load->library('productlib');
    	$this->_ci->load->library('filterlib');

    	if(!is_null($this->_ci->session->userdata('return_url'))) {
    		$this->_return_url = $this->_ci->session->userdata('return_url');
    	} else {
    		$this->_return_url = '/';
    	}

		$this->_ci->session->set_userdata('return_url',$_SERVER['REQUEST_URI']);

		$this->_related_products = $this->_ci->productlib->get_related_products_ids(false,15);
    }

    public function get_setting_value($name) {

    	$query = $this->_ci->db->select("*")->from("settings")->where('name',$name)->get();
    	if ($query->num_rows() > 0) {    		
    		$data = $query->row_array();
    		return $data['value'];
    	}

    	return false;
    } 

    public function get_page_banners($page) {
    	$result = array();

    	$page_details = explode("-",$page);

    	if($page_details[0] == 'category') {
    		$sql = 'SELECT category_id,parent_id FROM categories WHERE category_id = '.$page_details[1].' OR parent_id = '.$page_details[1];
    		$query = $this->_ci->db->query($sql);

    		if ($query->num_rows() > 0) {
    			$pages_blacklist = array();

    			foreach ($query->result_array() as $category) {
    				if($category['parent_id'] > 0) {
    					$pages_blacklist[] = 'category-'.$category['parent_id'];
    				}

    				$pages_blacklist[] = 'category-'.$category['category_id'];
    			}
    		}


    		$sql = 'SELECT b.*,btp.page FROM banners AS b,banner_to_page AS btp WHERE btp.banner_id = b.banner_id ORDER BY RAND()';
    		$query = $this->_ci->db->query($sql);

    		if ($query->num_rows() > 0) {
    			$banners_blacklist = array();

    			foreach ($query->result_array() as $banner) {
    				if(in_array($banner['page'],$pages_blacklist)) {
    					$banners_blacklist[] = $banner['banner_id'];
    				}
    			}

    			$counter = 0;
var_dump(expression);die();
    			foreach ($query->result_array() as $banner) {
    				if(!in_array($banner['banner_id'],$banners_blacklist)) {
    					if(($counter+$banner['type']) <= 3 and !isset($result[$banner['banner_id']])) {
		    				$result[$banner['banner_id']] = array(
		    					'banner_id' => $banner['banner_id'],
		    					'img' => $banner['image_file'],
		    					'href' => $banner['href'],
		    					'type' => $banner['type']
		    				);

		    				$counter = $counter+$banner['type'];
		    			}
    				}
    			}
    		}
    	} else {

    		$sql = 'SELECT b.*,btp.page FROM banners AS b,banner_to_page AS btp WHERE btp.banner_id = b.banner_id ORDER BY RAND()';
    		$query = $this->_ci->db->query($sql);

     		if ($query->num_rows() > 0) {

     			$banners_blacklist = array();

    			foreach ($query->result_array() as $banner) {
    				if($banner['page'] == $page) {
    					$banners_blacklist[] = $banner['banner_id'];
    				}
    			}

    			$counter = 0;

    			foreach ($query->result_array() as $banner) {
    				if(!in_array($banner['banner_id'],$banners_blacklist)) {
    					if(($counter+$banner['type']) <= 3 and !isset($result[$banner['banner_id']])) {
		    				$result[$banner['banner_id']] = array(
		    					'banner_id' => $banner['banner_id'],
		    					'img' => $banner['image_file'],
		    					'href' => $banner['href'],
		    					'type' => $banner['type']
		    				);

		    				$counter = $counter+$banner['type'];
		    			}
    				}
    			}
    		}
    	}

    	return $result;

    	//$query = $this->_ci->db->select("*")->from("banner_to_page")->where('page',$page)->order_by('rand()')->limit(3)->get();

    }    

	public function set_sort_order($type = false, $category = false, $clear_sort = false) {
		if($clear_sort) {
			$sort_order = array();
			$this->_ci->session->set_userdata('sort_order', $sort_order);

			return true;
		}

		if(!in_array($type,array('razves','pack','bbox','clear','eko','diet','recommend','farm'))) {
			return false;
		}

		$sort_order = $this->get_sort_order();

		if($type and $category) {
			$category_id = $this->get_category_id($category);

			if(isset($sort_order[$category_id])) {
				if(isset($sort_order[$category_id][$type])) {
					unset($sort_order[$category_id][$type]);

					if(empty($sort_order[$category_id])) {
						unset($sort_order[$category_id]);
					}
				} else {
					$sort_order[$category_id][$type] = $type;
				}
			} else {
				$sort_order = array();
				$sort_order[$category_id][$type] = $type;
			}
		}

		$this->_ci->session->set_userdata('sort_order', $sort_order);
	}	

	public function get_sort_order() {
		$sort_order = $this->_ci->session->userdata('sort_order');
		
		if(is_null($sort_order)) {
			$sort_order = array();
		}
		
		return $sort_order;
	}    

    public function is_category_exist($category) {
		$query = $this->_ci->db->get_where("categories", array("title" => $category,"parent_id !=" => 0));
		if ($query->num_rows() > 0) {
			return true;
		}

		return false;
    }

    public function is_parent_category($category) {
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
		
		$sql = 'SELECT * FROM categories WHERE category_id = ' . (int)$category_id;
				
		$query = $this->_ci->db->query($sql);

		if ($query->num_rows() > 0) {
			$category = $query->row_array();

			if($category['parent_id'] == 0) {
				return $category_id;
			} else {
				return false;
			}
		}
    }

    public function check_admin_token($token) {
    	$where = array(
    		'name' => 'admin_token',
    		'value' => $token
    	);

    	$query = $this->_ci->db->select("*")->from("settings")->where($where)->get();

    	if ($query->num_rows() > 0) {
    		return true;
    	}

    	return false;
    }
	
	public function get_blogs($blog_id = false, $type = "standart") {
		$result = array();
		
		$query = $this->_ci->db->select("*")->from("blogs");
		
		if($blog_id) {
			$query = $query->where("blog_id",$blog_id);
		}	
		
		$query = $query->where("type",$type)->order_by("blog_id","DESC")->get();
		
		$counter = 0;

		if ($query->num_rows() == 1 and $blog_id) {
			$result = $query->row_array();
			$result['content'] = htmlspecialchars_decode($result['content']);
		} elseif($query->num_rows() > 0 and !$blog_id) {
			foreach ($query->result_array() as $row) {
				$result[date('m-Y',$row['create_date'])][$row['blog_id']] = $row;
				$result[date('m-Y',$row['create_date'])][$row['blog_id']]['content'] = htmlspecialchars_decode($row['content']);
				$counter++;
			}			
		}
		
		return array(
			'blogs' => $result,
			'counter' => $counter
		);
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

	public function craete_fb_share($url,$title,$description,$image) {
		$share_data = array(
			'og:url' => 'https://aydaeda.ru'.$url,
			'og:title' => $title,
			'og:description' => $description,
			'og:image' => 'https://aydaeda.ru/images/'.$image
		);
		
		return $share_data;
	}

	public function get_share_links($url,$title,$description,$image) {

		$share_links = '
	    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://aydaeda.ru'.$url.'" class="share_it_soc">
	        <div class="share_it_soc_img fb_share"></div>
	    </a>
	     <a target="_blank" href="https://twitter.com/share?url=https://aydaeda.ru'.$url.'&text='.$title.'" class="share_it_soc">
	        <div class="share_it_soc_img tw_share"></div>
	    </a>
	    <a target="_blank" href="http://vk.com/share.php?url=https://aydaeda.ru'.$url.'&title='.$title.'&image=https://aydaeda.ru/images/'.$image.'&noparse=true" class="share_it_soc">
	        <div class="share_it_soc_img vk_share"></div>
	    </a>
	    <a target="_blank" href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1&st._surl=https://aydaeda.ru'.$url.'&st.comments='.$title.'" class="share_it_soc">
	        <div class="share_it_soc_img ok_share"></div>
	    </a>
	    <div class="share_it_faster_close">&times;</div>
	    ';
		
		return $share_links;
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


	public function get_category_id($category) {
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

		return $category_id;
	}

	
	public function handle_special_price($products) {
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
				
				$products[$product_id]['articul'] = $this->_ci->productlib->get_product_articul($product['product_id']);
				
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

				$products[$product_id]['href'] = '/product/'.$product['product_id'];

				$default_value = false;

				if(!is_null($product['sr_ves']) and !empty($product['sr_ves'])) {
					$default_value = $product['sr_ves'];

					$default_price = (int)($product['price']*$default_value);

					if(($product['price']*$default_value) > $default_price) {
						$default_price++;
					}

					$products[$product_id]['default_price'] = $default_price;
				} else {
					$products[$product_id]['default_price'] = $products[$product_id]['price'];
				}				

				if($product['type'] == 'шт') {
					$products[$product_id]['default_value'] = '1 шт';
				} elseif($product['bm'] == 1) {
					$products[$product_id]['default_value'] = ($default_value ? $default_value : '1 кг');
				} else {
					$products[$product_id]['default_value'] = ($default_value ? $default_value : '0.1 кг');
				}

				$products[$product_id]['bonus'] = $this->get_bonus_from_summ($products[$product_id]['default_price']);
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
			
			$products['articul'] = $this->_ci->productlib->get_product_articul($products['product_id']);
			
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

			$products['href'] = '/product/'.$products['product_id'];

			$default_value = false;

			if(!is_null($products['sr_ves']) and !empty($products['sr_ves'])) {
				$default_value = $products['sr_ves'];
				$products['default_price'] = $this->round_price($default_value,$products['price']);
			} else {
				$products['default_price'] = $products['price'];
			}				

			if($products['type'] == 'шт') {
				$products['default_value'] = '1 шт';
			} elseif($products['bm'] == 1) {
				$products['default_value'] = ($default_value ? $default_value : '1 кг');
			} else {
				$products['default_value'] = ($default_value ? $default_value : '0.1 кг');
			}

			$products['bonus'] = $this->get_bonus_from_summ($products['default_price']);
		}
		
		return $products;
	}

	public function round_price($quantity,$price) {
		$summ = (int)($price*$quantity);

		if(($price*$quantity) > $summ) {
			$summ++;
		}

		return $summ;
	}

	public function get_bonus_from_summ($price) {
		return (int)($price*0.05);
	}	

	public function handle_attributes($products) {
		$types = array();
		
		$attributes = array(
			'countries' => array(),
			'compositions' => array(),
			'packs' => array(),
			'brands' => array(),
			'weights' => array(),
			'tags' => array()
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

			if(!is_null($product['weight']) and !empty($product['weight'])) {
				$attributes['weights'][] = $product['weight'];
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
		$attributes['weights'] = array_unique($attributes['weights']);
		
		asort($attributes['countries']);
		asort($attributes['compositions']);
		asort($attributes['packs']);
		asort($attributes['brands']);
		
		//asort($attributes['weights']);
		$attributes['weights'] = $this->sort_weights($attributes['weights']);
		
		return $attributes;
	}

	public function sort_weights($values) {

		$kilo = array();
		$gram = array();
		$litr = array();
		$result = array();

		foreach($values as $id => $value) {
			if(mb_stripos($value, 'кг') !== FALSE) {
				$kilo[(float)$value] = $value;
				unset($values[$id]);
			} elseif(mb_stripos($value, 'г') !== FALSE) {
				$gram[(float)$value] = $value;
				unset($values[$id]);
			} elseif(mb_stripos($value, 'л') !== FALSE) {
				$litr[(float)$value] = $value;
				unset($values[$id]);
			}
		}

		ksort($gram);
		ksort($kilo);
		ksort($litr);

		foreach($gram as $value) {
			$result[] = $value;
		}

		foreach($kilo as $value) {
			$result[] = $value;
		}

		foreach($litr as $value) {
			$result[] = $value;
		}

		foreach($values as $value) {
			$result[] = $value;
		}

		return $result;
	}	

	public function handle_sort_attributes($products) {		
		$attributes = array(
			'farm' => false,
			'eko' => false,
			'diet' => false,
			'bbox' => false,
			'recommend' => false,
			'razves' => false,
			'pack' => false
		);
		
		foreach($products as $product_id => $product) {
			if(!$attributes['farm'] and $product['farm']) {
				$attributes['farm'] = true;
			}

			if(!$attributes['eko'] and $product['eko']) {
				$attributes['eko'] = true;
			}

			if(!$attributes['diet'] and $product['diet']) {
				$attributes['diet'] = true;
			}

			if(!$attributes['recommend'] and $product['recommend']) {
				$attributes['recommend'] = true;
			}

			if(!$attributes['bbox'] and ($product['bbox'] or $product['bbox_n'])) {
				$attributes['bbox'] = true;
			}

			if(is_null($product['weight']) or empty($product['weight'])) {
				$attributes['razves'] = true;
			}

			if(!is_null($product['weight']) and !empty($product['weight'])) {
				$attributes['pack'] = true;
			}
		}
		
		return $attributes;
	}	

	public function handle_brands_attributes($products) {
		$types = array();
		$count = array();
		
		$attributes = array(
			'brands' => array()
		);

		foreach($products as $product_id => $product) {			
			if(!is_null($product['brand']) and !empty($product['brand'])) {
				$attributes['brands'][] = $product['brand'];
			}
		}

		$attributes['brands'] = array_unique($attributes['brands']);

		//asort($attributes['brands']);
		
		foreach($products as $product_id => $product) {			
			if(!is_null($product['brand']) and !empty($product['brand'])) {
				if(isset($count[$product['brand']])) {
					$count[$product['brand']]++;
				} else {
					$count[$product['brand']] = 1;
				}
			}
		}

		$attributes = array(
			'brands' => array()
		);

		arsort($count);

		foreach ($count as $brand => $value) {
			$attributes['brands'][] = $brand;
		}
		
		return $attributes;
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
			$product = $this->_ci->productlib->get_product_by_id($product_id);

			if($product) {
				$products[$product['product_id']] = $product;
				$products[$product['product_id']]['quantity_in_cart'] = $element['quantity'];
			} else {
				unset($cart[$element_id]);
				$this->_ci->session->set_userdata('cart',$cart);
			}
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
			
			$shipping_methods = $this->get_shipping_methods();
			
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


	public function get_comments($type,$element_id) {
		$data = array();

		//$query = $this->_ci->db->get_where("comments", array("type" => $type, "element_id" => $element_id));
		$query = $this->_ci->db->select('comment_id')->from("comments")->where(array("type" => $type, "element_id" => $element_id))->order_by('comment_id','DESC')->get();
		if ($query->num_rows() > 0) {
			$this->_ci->load->model('comment');

			foreach ($query->result_array() as $row) {
				$comment = new Comment();
				$comment->set_id($row['comment_id']);
				$data['comments'][$row['comment_id']] = $comment->get_data();
			}
		}

		$data['account'] = $this->is_logged();

		$result = array(
			'desktop' => $this->_ci->load->view('common/comments', $data, true),
			'mobile' => $this->_ci->load->view('common/mobile-comments', $data, true),
		);

		return $result;
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
		} elseif($type == 'weight') {
			$number = (int)substr((string)$count, -1); 
			
			if($number == 1 and (int)($count) != 11) {
				$word = 'вес';
			} elseif($number >= 2 and $number <= 4 and ((int)($count) < 10 or (int)($count) > 20)) {
				$word = 'веса';
			} else {
				$word = 'весов';
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
			$word = 'цена';

			if($count == 'asc') {
				$word = 'по возрастанию';
			} elseif($count == 'desc') {
				$word = 'по убыванию';
			}

			return $word;
		} elseif($type == 'weight') {
			$word = 'упаковка';
			
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