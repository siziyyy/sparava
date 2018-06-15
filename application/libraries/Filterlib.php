<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Filterlib {
	private $_ci;

 	function __construct() {
    	$this->_ci =& get_instance();
    }

	public function filter_products($products,$filters,$page,$category = false) {
		$price_sort = array();
		$filters_count = 0;
		
		$filters_arr = array(
			'country' => ((isset($filters['country']) and $filters['country']) ? explode(';',$filters['country']) : 0),
			'brand' => ((isset($filters['brand']) and $filters['brand']) ? explode(';',$filters['brand']) : 0),
			'pack' => ((isset($filters['pack']) and $filters['pack']) ? explode(';',$filters['pack']) : 0),
			'composition' => ((isset($filters['composition']) and $filters['composition']) ? explode(';',$filters['composition']) : 0),
			'weight' => ((isset($filters['weight']) and $filters['weight']) ? explode(';',$filters['weight']) : 0),
			'assortiment' => ((isset($filters['assortiment']) and $filters['assortiment']) ? explode(';',$filters['assortiment']) : 0)
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

			if($filters_arr['weight'] and !in_array($product['weight'], $filters_arr['weight'])) {
				unset($products[$product_id]);
				$filters_used = true;
				continue;
			}

			if($filters_arr['assortiment'] and !in_array($product['assortiment'], $filters_arr['assortiment'])) {
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


		if($filters['price'] and count($price_sort) > 0 and $filters['price'] == 'asc') {
			array_multisort($price_sort,SORT_ASC, $products);
		} elseif($filters['price'] and count($price_sort) > 0 and $filters['price'] == 'desc') {
			array_multisort($price_sort,SORT_DESC, $products);
		}

		$sort_attr = $this->_ci->baselib->handle_sort_attributes($products);

		$filters_text = array();
		
		foreach($filters_arr as $key => $value) {
			if(isset($filters_arr[$key]) and $filters_arr[$key]) {
				$filters_text[$key] = $this->get_filter_text($key,$filters_arr[$key]);
			}
		}
		
		if($filters['price']) {
			$filters_text['price'] = $this->get_filter_text('price',$filters['price']);
		}

		if($category) {
			$pre_products = $this->_ci->productlib->filter_products_by_sort($products,$category);
			$result_array = array();

			$this->_ci->load->model('category');
			$category_obj = new Category();
			$category_obj->set_id($category);
			$category_data = $category_obj->get_data();

			if($category_data['view_type'] == '0') {
				foreach ($pre_products as $product) {
					$result_array[$product['assortiment']][] = $product;
				}
			} elseif($category_data['view_type'] == '1') {
				foreach ($pre_products as $product) {
					$result_array[$product['brand']][] = $product;
				}
			} elseif($category_data['view_type'] == '2') {
				foreach ($pre_products as $product) {
					$result_array[$product['composition']][] = $product;
				}
			}

			$sort_array = array();

			foreach ($result_array as $index => $products) {
				$sort_array[$index] = count($products);
			}

			array_multisort($sort_array, SORT_DESC, SORT_NUMERIC, $result_array);

			foreach ($result_array as $index => $products) {
				if(!empty($index) and count($products) < 3) {
					foreach ($products as $product) {
						$result_array['Остальные товары'][] = $product;
					}

					unset($result_array[$index]);
				} elseif(empty($index)) {
					foreach ($products as $product) {
						$result_array['Остальные товары'][] = $product;
					}

					unset($result_array[$index]);					
				}
			}

			foreach ($result_array as $index => $products) {
				$empty_products = count($products)%5; 
							
				if($empty_products > 0) {
					$empty_products = 5-$empty_products;
				}

				for($i=0;$i<$empty_products;$i++) {
					$result_array[$index][] = '';
				}
			}
			
			return array(
				'products' => $result_array,
				'products_count' => count($pre_products),
				'filters_used' => $filters_used,
				'empty_products' => $empty_products,
				'filters_text' => $filters_text,
				'filters_count' => $filters_count,
				'sort_attr' => $sort_attr
			);	
		} else {
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
			
			return array(
				'products' => $prodcuts_in_page,
				'pages_count' => $pages_count,
				'products_count' => count($products),
				'filters_used' => $filters_used,
				'empty_products' => $empty_products,
				'filters_text' => $filters_text,
				'filters_count' => $filters_count,
				'sort_attr' => $sort_attr
			);			
		}
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
				$filters_text[$key] = $this->get_filter_text($key,$filters_arr[$key]);
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
		$all_products = array();
		
		$sql = 'SELECT ptp.product_id, pr.* FROM products AS p, product_to_provider AS ptp, providers AS pr WHERE p.product_id = ptp.product_id AND ptp.provider_id = pr.provider_id';
		$query = $this->_ci->db->query($sql);
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$providers_for_provider[] = $row['store'];
				$all_products[$row['product_id']] = $row;
			}
		}	
		
		$providers_for_provider = array_unique($providers_for_provider);
		asort($providers_for_provider);

		$products = array();
		
		if(is_array($filters_arr['provider'])) {
			foreach($all_products as $product_id => $product) {
				if(in_array($product['store'],$filters_arr['provider'])) {
					if(isset($input_products[$product_id])) {
						$products[$product_id] = $input_products[$product_id];
					}					
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
				$filters_text[$key] = $this->get_filter_text($key,$filters_arr[$key]);
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
				$filters_text[$key] = $this->get_filter_text($key,$filters_arr[$key]);
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
				$filters_text[$key] = $this->get_filter_text($key,$filters_arr[$key]);
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
	
	public function get_filter_text($type,$filter_array) {
		if($type != 'product') {
			$count = count($filter_array);

			if($count == 1) {
				return current($filter_array);
			}
		}

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
		} elseif($type == 'assortiment') {
			$number = (int)substr((string)$count, -1); 
			
			if($number == 1 and (int)($count) != 11) {
				$word = 'ассортимент';
			} elseif($number >= 2 and $number <= 4 and ((int)($count) < 10 or (int)($count) > 20)) {
				$word = 'ассортимента';
			} else {
				$word = 'ассортиментов';
			}			
		} elseif($type == 'product') {
			$count = $filter_array;

			$number = (int)substr((string)$count, -1); 
			
			if($number == 1 and (int)($count) != 11) {
				$word = 'товар';
			} elseif($number >= 2 and $number <= 4 and ((int)($count) < 10 or (int)($count) > 20)) {
				$word = 'товара';
			} else {
				$word = 'товаров';
			}			
		}
		
		return $count.' '.$word;
	}		
}