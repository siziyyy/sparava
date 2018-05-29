<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Baselib {

	private $_ci;
	private $_seo_cahce;

	public $_return_url;
	public $_related_products;
	public $_categories_list;

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
		$this->_related_products = $this->_ci->productlib->get_related_products_ids(false,15);

    	$this->_categories_list = $this->_ci->cache->file->get('categories_list');

    	if(!$this->_categories_list) {
	    	$query = $this->_ci->db->select("*")->from("categories")->where('status',1)->order_by('sort_order', 'ASC')->get();
	    	if ($query->num_rows() > 0) {
	    		foreach ($query->result_array() as $row) {
	    			$this->_categories_list[$row['category_id']] = $row;
	    		}

	    		foreach ($this->_categories_list as $category_id => $category) {
	    			if($category['parent_id'] > 0 and isset($this->_categories_list[$category['parent_id']])) {
	    				$this->_categories_list[$category_id]['full_seo_url'] = '/'.$this->_categories_list[$category['parent_id']]['seo_url'].'/'.$category['seo_url'];
	    			} else {
	    				$this->_categories_list[$category_id]['full_seo_url'] = '/'.$category['seo_url'];
	    			}
	    		}
	    	}

    		$this->_ci->cache->file->save('categories_list', $this->_categories_list, 3600);
	    }
    }

	public function get_seo_url_by_category_id($category_id) {
		if(isset($this->_categories_list[$category_id])) {
			return $this->_categories_list[$category_id]['full_seo_url'];
		}
		
		return false;
	}
	
	public function get_link_data($link_id = false) {
		$account = $this->is_logged();
		
		if(isset($account['link_data']['is_used']) and $account['link_data']['is_used']) {
			$this->_ci->session->set_userdata('link_data',NULL);
			return false;
		} elseif(isset($account['link_data']['count']) and $account['link_data']['count'] > 0 and $account['link_data']['link_id'] == 2) {
			$link_data_insert = array(
				'link_id' => $account['link_data']['link_id'],
				'count' => $account['link_data']['count'],
				'value' => $account['link_data']['value'],
				'product_id' => 0
			);

			$this->_ci->session->set_userdata('link_data',$link_data_insert);

			return $link_data_insert;			
		}

		if($link_id) {

			$query = $this->_ci->db->select("*")->from("links")->where('link_id',$link_id)->get();
	    	if ($query->num_rows() > 0) {
	    		$link_data = $query->row_array();

				$link_data_insert = array(
					'link_id' => $link_data['link_id'],
					'count' => $link_data['count'],
					'value' => $link_data['value'],
					'product_id' => $link_data['product_id']
				);

				$this->_ci->session->set_userdata('link_data',$link_data_insert);

				return $link_data_insert;
	    	}
		} else {
			$link_data = $this->_ci->session->userdata('link_data');
			if(isset($link_data['link_id'])) {
				return $link_data;
			}
		}

		return false;
	}
/*
	public function get_link_data() {
		$link_data = $this->_ci->session->userdata('link_data');

		if(isset($link_data['link_id']) and !$link_data['is_used']) {
			$account = $this->is_logged();

			if(isset($account['link_data']['is_used']) and $account['link_data']['is_used']) {
				return false;
			}

			$query = $this->_ci->db->select("*")->from("links")->where('link_id',$link_data['link_id'])->get();
	    	if ($query->num_rows() > 0) {
	    		return $query->row_array();
	    	}
		}
		
		return false;
	}
*/
	public function text_limiter($text, $count) {
		if (mb_strlen($text) > $count) {
			$text = mb_substr($text,0,$count);
		}
		
		return $text;
	}

	public function handle_seo_data($data,$type = false) {
		$seo_data = array(
			'seo_url' => false,
			'seo_title' => false,
			'seo_h1' => false,
			'seo_keywords' => false,
			'seo_description' => false,
			'seo_article' => false,
			'seo_canonical' => false
		);

		if($type == 'category') {
			foreach ($seo_data as $key => $value) {
				if(isset($data[$key]) and !empty($data[$key])) {
					$seo_data[$key] = $data[$key];
				}
			}			
		} elseif($type == 'product') {
			$seo_data['seo_url'] = $data['seo_url'];
			$seo_data['seo_title'] = trim((empty($data['title_full']) ? $data['title'] : $data['title_full'])).' купить в Москве с доставкой на дом - интернет-магазин Ай Да Еда';
			$seo_data['seo_description'] = trim((empty($data['title_full']) ? $data['title'] : $data['title_full'])).' в интернет магазине Ай Да Еда. Широкий ассортимент. Быстрая доставка. Звоните: +7 495 544-88-64';
			$seo_data['seo_keywords'] = 'купить '.trim((empty($data['title_full']) ? $data['title'] : $data['title_full'])).' в Ай Да Еда';
			$seo_data['seo_h1'] = trim((empty($data['title_full']) ? $data['title'] : $data['title_full']));
		}

		if($seo_data['seo_url']) {
			$url = base_url();

			if($this->_seo_cahce['type'] == 'category') {
				if($this->_seo_cahce['parent_1_slug']) {
					$url .= $this->_seo_cahce['parent_1_slug'].'/';
				}
			} elseif($this->_seo_cahce['type'] == 'product') {
				if($this->_seo_cahce['parent_1_slug']) {
					$url .= $this->_seo_cahce['parent_1_slug'].'/';
				}

				if($this->_seo_cahce['parent_2_slug']) {
					$url .= $this->_seo_cahce['parent_2_slug'].'/';
				}
			}

			$seo_data['seo_canonical'] = $url.$seo_data['seo_url'];
		}
		
		return $seo_data;
	}

    public function get_data_by_seo_url($seo_url) {

	    $categories = array();

		foreach ($this->_categories_list as $category) {
			$categories[$category['category_id']] = array(
				'category_id' => $category['category_id'],
				'seo_url' => $category['seo_url'],
				'parent_id' => $category['parent_id']
			);
		}

    	$query = $this->_ci->db->select("category_id,seo_url,parent_id")->from("categories")->where('seo_url', $seo_url)->get();
    	if ($query->num_rows() > 0) {
    		$category = $query->row_array();

    		$data = array(
    			'type' => 'category',
    			'categories' => $categories,
    			'element_id' => $category['category_id'],
    			'seo_url' => $category['seo_url'],
    			'parent_id' => $category['parent_id'],
    			'parent_1_slug' => false,
    			'parent_2_slug' => false
    		);

    		if($category['parent_id'] == '0') {
    			$data['parent_1_slug'] = false;
    		} else {
    			if(isset($categories[$category['parent_id']])) {
    				$data['parent_1_slug'] = $categories[$category['parent_id']]['seo_url'];
    			}    			
    		}

    		$this->_seo_cahce = $data;

    		return $data;
    	} else {
    		$query = $this->_ci->db->select("*")->from("products")->where('seo_url', $seo_url)->get();
    		if ($query->num_rows() > 0) {
    			$product = $query->row_array();

	    		$data = array(
	    			'type' => 'product',
	    			'categories' => $categories,
	    			'element_id' => $product['product_id'],
	    			'seo_url' => $product['seo_url'],
	    			'parent_1_slug' => false,
	    			'parent_2_slug' => false
	    		);

	    		$query = $this->_ci->db->select("*")->from("product_to_category")->where('product_id', $product['product_id'])->get();
	    		if ($query->num_rows() > 0) {
	    			$category_id = $query->row_array()['category_id'];

	    			if(isset($categories[$category_id])) {
	    				$data['parent_1_slug'] = $categories[$category_id]['seo_url'];

	    				if($categories[$category_id]['parent_id'] != '0' and isset($categories[$category_id]['parent_id'])) {
	    					$data['parent_2_slug'] = $categories[$categories[$category_id]['parent_id']]['seo_url'];
	    				}
		    			
	    			}
	    		}

	    		$this->_seo_cahce = $data;

	    		return $data;
	    	}
    	}

    	$this->_seo_cahce = array(
    		'categories' => $categories,
    		'type' => false
    	);

    	return false;
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
    }  

	public function save_filters($data,$category) {
		$filters_data = $this->_ci->session->userdata('filters_data');
		$filters_data[$category] = $data;

		$this->_ci->session->set_userdata('filters_data', $filters_data);
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
			$category_id = $this->get_category_id_by_param($category);

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

    public function get_category_id_by_param($category) {
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

    public function get_product_id_by_param($product) {
 		if(!is_numeric($product)) {
			$c_query = $this->_ci->db->get_where("products", array("seo_url" => $product,"status" => 1));
			if ($c_query->num_rows() > 0) {
				$product_id = $c_query->row_array()['product_id'];
			} else {
				$product_id = 0;
			}
		} else {
			$product_id = $product;
		}
		
		return $product_id;
    }

    public function is_parent_category($category) {
    	$category_id = $this->get_category_id_by_param($category);
		
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
		return $this->_categories_list;
	}
	
	public function get_categories($category_id) {
		$categories = array();

		if($this->_categories_list[$category_id]['parent_id'] == 0) {
			$categories[] = array(
				'category_id' => $category_id,
				'title' => $this->_categories_list[$category_id]['title'],
				'sort_order' => 0,
				'current_category' => true,
				'seo_url' => $this->_categories_list[$category_id]['seo_url']
			);

			foreach ($this->_categories_list as $category) {
				if($category['parent_id'] == $category_id) {
					$categories[] = array(
						'category_id' => $category['category_id'],
						'title' => $category['title'],
						'sort_order' => $category['sort_order'],
						'current_category' => false,
						'seo_url' => $category['seo_url']
					);
				}
			}
		} else {
			$parent_id = $this->_categories_list[$category_id]['parent_id'];

			$categories[] = array(
				'category_id' => $parent_id,
				'title' => $this->_categories_list[$parent_id]['title'],
				'sort_order' => 0,
				'current_category' => false,
				'seo_url' => $this->_categories_list[$parent_id]['seo_url']
			);

			foreach ($this->_categories_list as $category) {
				if($category['parent_id'] == $parent_id) {
					if($category['category_id'] == $category_id) {
						$mark_as_current_category = true;
					} else {
						$mark_as_current_category = false;
					}

					$categories[] = array(
						'category_id' => $category['category_id'],
						'title' => $category['title'],
						'sort_order' => $category['sort_order'],
						'current_category' => $mark_as_current_category,
						'seo_url' => $category['seo_url']
					);
				}
			}
		}

		return $categories;
	}
	
	public function handle_special_price($products) {
		$favourites = $this->get_favourites();
		
		if(!isset($products['product_id'])) {
			$query = $this->_ci->db->select("*")->from("product_to_category")->get();
    		if ($query->num_rows() > 0) {
	    		foreach ($query->result_array() as $ptc) {
	    			$product_to_category[$ptc['product_id']] = $ptc['category_id'];
	    		}
    		}			

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

				$href = base_url();

				if(isset($product_to_category[$product_id])) {
					$category_id = $product_to_category[$product_id];
				}

				if(!isset($this->_categories_list[$category_id]) or !isset($this->_categories_list[$this->_categories_list[$category_id]['parent_id']])) {
					unset($products[$product_id]);
					continue;
				}

				if(isset($this->_categories_list[$this->_categories_list[$category_id]['parent_id']])) {
					$href .= $this->_categories_list[$this->_categories_list[$category_id]['parent_id']]['seo_url'].'/';
				}

				if(isset($this->_categories_list[$category_id])) {
					$href .= $this->_categories_list[$category_id]['seo_url'].'/';
				}

				$products[$product_id]['href'] = $href.$product['seo_url'];
		
				$default_value = false;

				if(!is_null($product['sr_ves']) and !empty($product['sr_ves'])) {
					$default_value = $product['sr_ves'];
					$products[$product_id]['default_price'] = $this->round_price($default_value,$product['price']);
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

			$href = '/';

			$query = $this->_ci->db->select("*")->from("product_to_category")->where('product_id',$products['product_id'])->get();
    		if ($query->num_rows() > 0) {
	    		$category_id = $query->row_array()['category_id'];
    		}				

			if(isset($this->_categories_list[$this->_categories_list[$category_id]['parent_id']])) {
				$href .= $this->_categories_list[$this->_categories_list[$category_id]['parent_id']]['seo_url'].'/';
			}

			if(isset($this->_categories_list[$category_id])) {
				$href .= $this->_categories_list[$category_id]['seo_url'].'/';
			}

			$href .= $href.$products['seo_url'];

			$products['href'] = '/product/'.(empty($products['seo_url']) ? $products['product_id'] : $products['seo_url']);

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
			'assortiments' => array(),
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

			if(!is_null($product['assortiment']) and !empty($product['assortiment'])) {
				$attributes['assortiments'][] = $product['assortiment'];
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
		$attributes['assortiments'] = array_unique($attributes['assortiments']);
		
		asort($attributes['countries']);
		asort($attributes['compositions']);
		asort($attributes['packs']);
		asort($attributes['brands']);
		asort($attributes['assortiments']);
		
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
				$kilo[$value] = $value;
				unset($values[$id]);
			} elseif(mb_stripos($value, 'г') !== FALSE) {
				$gram[$value] = $value;
				unset($values[$id]);
			} elseif(mb_stripos($value, 'л') !== FALSE) {
				$litr[$value] = $value;
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
		
		$link_data = $this->get_link_data();

		if($link_data) {
			if($link_data['link_id'] >= 3) {
				$cart['p-'.$link_data['product_id']]['quantity'] = 1;
			} elseif($link_data['link_id'] == 2) {
				$skidka = $link_data['value']/$link_data['count'];
			}
		}

		foreach($cart as $element_id => $element) {
			$product_id = explode('-',$element_id)[1];
			$product = $this->_ci->productlib->get_product_by_id($product_id);

			if($product) {
				$products[$product['product_id']] = $product;				

				if(isset($element['box'])) {
					$where = array(
						'product_id' => $product['product_id'],
						'provider_id' => $element['box'],
						'cko >' => 0
					);

					$query = $this->_ci->db->select("*")->from("product_to_provider")->where($where)->get();
		    		if ($query->num_rows() > 0) {
		    			$provider_data = $query->row_array();

		    			$cko = (int)($provider_data['cko']+($provider_data['cko']*15)/100) + 1;
			    		$products[$product['product_id']]['price'] = (int)($cko * $provider_data['kol']);
		    		} else {
		    			unset($cart[$element_id]);
		    		}
				} elseif($link_data) {
					if($link_data['product_id'] == $product['product_id']) {
						$products[$product['product_id']]['price'] = $link_data['value'];
						$products[$product['product_id']]['quantity_in_cart'] = $link_data['value'];
					} elseif($link_data['link_id'] == 2) {
						if($skidka <= ($products[$product['product_id']]['price']*$element['quantity'])) {
							$products[$product['product_id']]['price'] = $products[$product['product_id']]['price'] - (int)($skidka/$element['quantity']);
						} else {
							$skidka = $skidka - ($products[$product['product_id']]['price']*$element['quantity']);
							$products[$product['product_id']]['price'] = 0;
						}
					}
				}

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

			if($page > 1) {
				$pages[0] = array(
					'page' => $page-1,
					'current_page' => false,
					'dots' => false,
					'back_button' => true
				);
			}
			
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
			if($page > 1) {
				$pages[0] = array(
					'page' => $page-1,
					'current_page' => false,
					'dots' => false,
					'back_button' => true
				);
			}

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

			$link_data = $this->get_link_data();
			
			if($link_data['link_id'] == 1) {
				$totals['shipping']['value'] == 0;
			}

			$totals['with_shipping'] = array(
				'title' => 'с доставкой',
				'value' => $totals['summ']['value'] + $totals['shipping']['value']
			);
		}

		$link_data = $this->get_link_data();

		if($link_data) {
			if($link_data['link_id'] == 2) {
				$skidka = $link_data['value']/$link_data['count'];
				$totals['skidka'] = array(
					'title' => 'скидка',
					'value' => (int)$skidka
				);				
			} elseif($link_data['link_id'] == 1) {
				$totals['shipping'] = array(
					'title' => 'бесплатная доставка',
					'value' => 0
				);				
			}
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
			'mobile' => $this->_ci->load->view('mobile/common/comments', $data, true),
		);

		return $result;
	}
}