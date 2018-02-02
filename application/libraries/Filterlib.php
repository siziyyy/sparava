<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Filterlib {
	private $_ci;

 	function __construct() {
    	$this->_ci =& get_instance();
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
		$page_start = ($page-1)*50;
		$page_end = $page*50;
		$i = 0;
		$pages_count = (int)(count($products)/50);
		
		if(count($products)%50 > 0)  {
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
				$filters_text[$key] = $this->_ci->baselib->get_filter_text($key,count($filters_arr[$key]));
			}
		}
		
		if($filters['price']) {
			$filters_text['price'] = $this->_ci->baselib->get_filter_text('price',$filters['price']);
		}
		
		if($filters['weight']) {
			$filters_text['weight'] = $this->_ci->baselib->get_filter_text('weight',$filters['weight']);
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
		$categories = $this->_ci->baselib->get_all_categories();
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
		$page_start = ($page-1)*50;
		$page_end = $page*50;
		$i = 0;
		$pages_count = (int)(count($products)/50);
		
		if(count($products)%50 > 0)  {
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
				$filters_text[$key] = $this->_ci->baselib->get_filter_text($key,count($filters_arr[$key]));
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
		$page_start = ($page-1)*50;
		$page_end = $page*50;
		$i = 0;
		$pages_count = (int)(count($products)/50);
		
		if(count($products)%50 > 0)  {
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
				$filters_text[$key] = $this->_ci->baselib->get_filter_text($key,count($filters_arr[$key]));
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
		$categories = $this->_ci->baselib->get_all_categories();
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
		$page_start = ($page-1)*50;
		$page_end = $page*50;
		$i = 0;
		$pages_count = (int)(count($products)/50);
		
		if(count($products)%50 > 0)  {
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
				$filters_text[$key] = $this->_ci->baselib->get_filter_text($key,count($filters_arr[$key]));
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
		$categories = $this->_ci->baselib->get_all_categories();
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
		$page_start = ($page-1)*50;
		$page_end = $page*50;
		$i = 0;
		$pages_count = (int)(count($products)/50);
		
		if(count($products)%50 > 0)  {
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
				$filters_text[$key] = $this->_ci->baselib->get_filter_text($key,count($filters_arr[$key]));
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
}