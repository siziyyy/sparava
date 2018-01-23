<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function index() {		
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'menu' => $this->baselib->get_categories(false,true),
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			)
		);
		
		$this->load->view('main', $data);
	}

	public function providers_blogs($blog_id = false) {
		
		$months = array(
			1 => 'Январь',
			2 => 'Февраль',
			3 => 'Март',
			4 => 'Апрель',
			5 => 'Май',
			6 => 'Июнь',
			7 => 'Июль',
			8 => 'Август',
			9 => 'Сентябрь',
			10 => 'Октябрь',
			11 => 'Ноябрь',
			12 => 'Декабрь'
		);

		$blogs = $this->baselib->get_blogs($blog_id,'provider');
		
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'blogs' => $blogs['blogs'],
			'counter' => $blogs['counter'],
			'months' => $months,
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			)
		);

		if($blog_id) {
			$this->load->view('provider_blog/post', $data);
		} else {
			$this->load->view('provider_blog/list', $data);
		}
	}	
	
	public function blogs($blog_id = false) {
		
		$months = array(
			1 => 'Январь',
			2 => 'Февраль',
			3 => 'Март',
			4 => 'Апрель',
			5 => 'Май',
			6 => 'Июнь',
			7 => 'Июль',
			8 => 'Август',
			9 => 'Сентябрь',
			10 => 'Октябрь',
			11 => 'Ноябрь',
			12 => 'Декабрь'
		);

		$blogs = $this->baselib->get_blogs($blog_id);
		
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'blogs' => $blogs['blogs'],
			'counter' => $blogs['counter'],
			'months' => $months,
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			)
		);
		
		if($blog_id) {
			$product = $this->baselib->get_product_by_id($data['blogs']['linked_product_id']);
			
			if($product) {
				$data['price'] = $product['price'];
			}
			
			$this->load->view('blog/post', $data);
		} else {
			$this->load->view('blog/list', $data);
		}
	}

	public function logout() {		
		$this->baselib->logout();
		redirect(base_url('/'), 'refresh');
	}	
	
	public function information($page = false) {	

		$blocks = array(
			'delivery',
			'first',
			'bonus',
			'about',
			'testimonials',
			'bloger',
			'claims',
			'agreement',
			'contacts',
			'return'
		);
	
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'first_block' => $page,
			'blocks' => $blocks,
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			)
		);
		
		$this->load->view('information', $data);
	}
	
	public function search() {		
		if(is_null($this->input->post('articul')) or empty($this->input->post('articul'))) {
			redirect(base_url('/'), 'refresh');
		} else {
			$product_id = $this->baselib->get_product_id_from_articul($this->input->post('articul'));
		}
		
		$product = $this->baselib->get_product_by_id($product_id);
		
		if(!$product) {
			redirect(base_url('/'), 'refresh');
		}
		
		$products = array();
		
		foreach($this->baselib->get_product_categories($product_id) as $category_id) {
			$products = array_merge($products,$this->baselib->get_category_products($category_id));
			
			if(count($products) > 5) {
				break;
			}
		}
		
		$products_to_show = array();
		$i = 0;
		
		foreach($products as $product_data) {
			if($i > 4) {
				break;
			}
			
			$products_to_show[] = $product_data;
			$i++;
		}	
	
		$data = array(
			'cart' => $this->get_cart_info_for_header(),
			'product' => $product,
			'products' => $products_to_show,
			'articul' => $this->input->post('articul')
		);
		
		$this->load->view('search', $data);
	}	
	
	public function checkout_success() {	

		$session = array(
			'shipping_method' => NULL,
			'use_bonus' => NULL,
			'shipping_metro' => NULL,
			'shipping_address' => NULL,
			'cart' => NULL
		);
		
		$this->session->set_userdata($session);
	
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'menu' => $this->baselib->get_categories()
		);
		
		$this->load->view('cart/checkout_success', $data);
	}
	
	public function country($country_id) {
		
		switch ($country_id) {
			case 1:
				$country = 'Россия';
				break;
			case 2:
				$country = 'Италия';
				break;
			case 3:
				$country = 'Испания';
				break;
			case 4:
				$country = 'Греция';
				break;
			case 5:
				$country = 'Швейцария';
				break;
			case 6:
				$country = 'Армения';
				break;
			case 7:
				$country = 'Узбекистан';
				break;				
			default:
				$country = 'Россия';
				break;				
		}

		$products = $this->baselib->get_country_products($country);
		$products = $this->baselib->sort_products('country',$country,$products);
		
		$filters = array(
			'category' => (!is_null($this->input->get('category')) ? $this->input->get('category') : 0)
		);
		
		$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);
		
		$products_in_page = $this->baselib->filter_products_for_country($products,$filters,$page);

		$empty_products = count($products_in_page['products'])%5; 
					
		if($empty_products > 0) {
			$empty_products = 5-$empty_products;
		}	
		
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'menu' => array(
				'filters' => $filters
			),
			'products' => $products_in_page['products'],
			'current_page' => $page,
			'pages_count' => $products_in_page['pages_count'],
			'country_id' => $country_id,
			'country' => $country,
			'categories' => $products_in_page['categories_for_country'],
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			),
			'pages' => $this->baselib->create_pager($products_in_page['pages_count'],$page),
			'empty_products' => $empty_products,
			'filters_text' => $products_in_page['filters_text']
		);
		
		$this->load->view('country',$data);
	}
	
	public function provider() {

		if(!is_null($this->input->post('token'))) {
			if($this->baselib->check_admin_token($this->input->post('token'))) {
				$this->load->library('excellib');
				$where = array();

				foreach(explode(';',$this->input->get('provider')) as $provider) {
					if(!empty(trim($provider))) {
						$where[] = $provider;
					}
				}

				if(count($where)) {
					$this->excellib->download_products_in_excel('provider',$where);
					return;
				}
			}			
		}

		$products = $this->baselib->get_products(false,true);
		
		$filters = array(
			'provider' => (!is_null($this->input->get('provider')) ? $this->input->get('provider') : 0)
		);
		
		$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);
		
		$products_in_page = $this->baselib->filter_products_for_provider($products,$filters,$page);
		
		$empty_products = count($products_in_page['products'])%5; 
					
		if($empty_products > 0) {
			$empty_products = 5-$empty_products;
		}		
		
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'menu' => array(
				'filters' => $filters
			),
			'products' => $products_in_page['products'],
			'current_page' => $page,
			'pages_count' => $products_in_page['pages_count'],
			'providers' => $products_in_page['providers_for_provider'],
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			),
			'pages' => $this->baselib->create_pager($products_in_page['pages_count'],$page),
			'empty_products' => $products_in_page['empty_products'],
			'filters_text' => $products_in_page['filters_text']
		);
		
		$this->load->view('provider',$data);
	}

	public function brands() {

		if(!is_null($this->input->post('token'))) {
			if($this->baselib->check_admin_token($this->input->post('token'))) {
				$this->load->library('excellib');
				$where = array();

				foreach(explode(';',$this->input->get('brand')) as $brand) {
					if(!empty(trim($brand))) {
						$where[] = $brand;
					}
				}

				if(count($where)) {
					$this->excellib->download_products_in_excel('brand',$where);
					return;
				}
			}			
		}

		$products = $this->baselib->get_products(false,true);
		
		$filters = array(
			'country' => 0,
			'brand' => (!is_null($this->input->get('brand')) ? $this->input->get('brand') : 0),
			'weight' => 0,
			'pack' => 0,
			'composition' => 0,
			'price' => 0
		);
		
		$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);
		
		$products_in_page = $this->baselib->filter_products($products,$filters,$page);
		
		$empty_products = count($products_in_page['products'])%5; 
					
		if($empty_products > 0) {
			$empty_products = 5-$empty_products;
		}		
		
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'menu' => array(
				'filters' => $filters
			),
			'products' => $products_in_page['products'],
			'current_page' => $page,
			'pages_count' => $products_in_page['pages_count'],
			'attributes' => $this->baselib->handle_brands_attributes($products),
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			),
			'pages' => $this->baselib->create_pager($products_in_page['pages_count'],$page),
			'empty_products' => $products_in_page['empty_products'],
			'filters_text' => $products_in_page['filters_text']
		);

		$this->load->view('brands',$data);
	}	
	
	public function orders() {
		
		$order_id = (!is_null($this->input->get('order_id')) ? $this->input->get('order_id') : 0);
		
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			)
		);
		
		$account = $this->baselib->is_logged();
		if($account) {
			$account_id = $account['account_id'];
		}
		
		$orders = $this->baselib->get_account_orders($account_id);

		if(count($orders) > 0) {
			
			if($order_id == 0) {
				$order_id = key($orders);
			}
			
			$products_ids = $this->baselib->get_order_products($order_id);
			
			$products = $this->baselib->get_products_by_ids($products_ids);
			
			$empty_products = count($products)%5; 
						
			if($empty_products > 0) {
				$empty_products = 5-$empty_products;
			}
			
			$data['products'] = $products;
			$data['orders'] = $orders;
			$data['empty_products'] = $empty_products;
			$data['order_id'] = $order_id;
		}
		
		$this->load->view('orders',$data);
	}	
	
	public function favourites() {
		
		$filters = array(
			'category' => (!is_null($this->input->get('category')) ? $this->input->get('category') : 0)
		);
		
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'menu' => array(
				'filters' => $filters
			),
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			)
		);
		
		$products_ids = $this->baselib->get_favourites();
	
		if(count($products_ids) > 0) {
			$products = $this->baselib->get_products_by_ids($products_ids);		
			
			$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);
			
			$products_in_page = $this->baselib->filter_products_for_favourites($products,$filters,$page);
			
			$empty_products = count($products_in_page['products'])%5; 
						
			if($empty_products > 0) {
				$empty_products = 5-$empty_products;
			}
			
			$data['current_page'] = $page;
			$data['products'] = $products_in_page['products'];
			$data['pages_count'] = $products_in_page['pages_count'];
			$data['categories'] = $products_in_page['categories_for_favourites'];
			$data['pages'] = $this->baselib->create_pager($products_in_page['pages_count'],$page);
			$data['empty_products'] = $products_in_page['empty_products'];
		}
		
		$this->load->view('favourites',$data);
	}	
	
	public function category($category = false) {

		if(!is_null($this->input->post('token'))) {
			if($this->baselib->check_admin_token($this->input->post('token'))) {
				$this->load->library('excellib');

				if($category) {
					$this->excellib->download_products_in_excel('category',$category);
					return;
				}
			}			
		}		
		
		if(!$category) {
			redirect(base_url('/'), 'refresh');
		}

		$parent_category_id = $this->baselib->is_parent_category($category);

		if($parent_category_id) {
			$products = $this->baselib->get_parent_category_products($parent_category_id);

			$menu = $this->baselib->get_categories($category,true);
			$menu_childs = array();
			
			
			foreach($menu as $line) {
				foreach($line as $lcategory) {
					if($lcategory['current_category']) {
						if(isset($lcategory['childs'])) {
							$menu_childs = $lcategory['childs'];
						}
					}
				}
			}			

			$data = array(
				'header' => array(
					'cart' => $this->get_cart_info_for_header()
				),
				'menu' => $menu,
				'category' => $category,
				'footer' => array(
					'account_confirm' => $this->baselib->get_account_data_for_confirm()
				),
				'is_parent_category' => true,
				'products' => $products
			);

			$data['menu']['menu_childs'] = $menu_childs;

			$this->load->view('category', $data);
		} else {			
			$filters = array(
				'country' => (!is_null($this->input->get('country')) ? $this->input->get('country') : 0),
				'brand' => (!is_null($this->input->get('brand')) ? $this->input->get('brand') : 0),
				'weight' => (!is_null($this->input->get('weight')) ? $this->input->get('weight') : 0),
				'pack' => (!is_null($this->input->get('pack')) ? $this->input->get('pack') : 0),
				'composition' => (!is_null($this->input->get('composition')) ? $this->input->get('composition') : 0),
				'price' => (!is_null($this->input->get('price')) ? $this->input->get('price') : 0)
			);

			$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);
			
			$menu = $this->baselib->get_categories($category,true);
			$menu_childs = array();
			
			
			foreach($menu as $line) {
				foreach($line as $lcategory) {
					if($lcategory['current_category']) {
						if(isset($lcategory['childs'])) {
							$menu_childs = $lcategory['childs'];
						}
					}
				}
			}		
			
			$data = array(
				'header' => array(
					'cart' => $this->get_cart_info_for_header()
				),
				'menu' => $menu,
				'category' => $category,
				'footer' => array(
					'account_confirm' => $this->baselib->get_account_data_for_confirm()
				),
				'is_parent_category' => false
			);
			
			$products = $this->baselib->get_category_products($category);
			$products = $this->baselib->sort_products('category',$category,$products);
			
			$data['menu']['menu_childs'] = $menu_childs;
			$data['menu']['attributes'] = $this->baselib->handle_attributes($products);
			$data['menu']['filters'] = $filters;
			
			$products_in_page = $this->baselib->filter_products($products,$filters,$page);

			$empty_products = count($products_in_page['products'])%5; 
						
			if($empty_products > 0) {
				$empty_products = 5-$empty_products;
			}
			
			$data['products'] = $products_in_page['products'];
			$data['pages_count'] = $products_in_page['pages_count'];
			$data['filters_used'] = $products_in_page['filters_used'];
			$data['filters_text'] = $products_in_page['filters_text'];
			$data['filters_count'] = $products_in_page['filters_count'];
			$data['current_page'] = $page;
			$data['menu']['products_count'] = $products_in_page['products_count'];
			$data['pages'] = $this->baselib->create_pager($products_in_page['pages_count'],$page);
			$data['empty_products'] = $empty_products;

			$this->load->view('category', $data);
		}
	}
	
	public function providers($provider = false) {
		
		if(!$provider) {
			redirect(base_url('/'), 'refresh');
		}
		
		$filters = array(
			'category' => (!is_null($this->input->get('category')) ? $this->input->get('category') : 0)
		);

		$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);

		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			)
		);
		
		$products = $this->baselib->get_products_with_categories($provider);
		$products = $this->baselib->sort_products('provider',$provider,$products);
		
		//$data['attributes'] = $this->baselib->handle_attributes($products);
		$data['filters'] = $filters;
		
		$products_in_page = $this->baselib->filter_products_for_providers_full($products,$filters,$page);

		$empty_products = count($products_in_page['products'])%5; 
					
		if($empty_products > 0) {
			$empty_products = 5-$empty_products;
		}
		
		$data['products'] = $products_in_page['products'];
		$data['pages_count'] = $products_in_page['pages_count'];
		$data['filters_used'] = $products_in_page['filters_used'];
		$data['filters_text'] = $products_in_page['filters_text'];
		$data['categories_for_provider'] = $products_in_page['categories_for_provider'];
		$data['current_page'] = $page;
		$data['products_count'] = $products_in_page['products_count'];
		$data['pages'] = $this->baselib->create_pager($products_in_page['pages_count'],$page);
		$data['empty_products'] = $empty_products;
		$data['provider'] = $provider;

		$this->load->view('providers', $data);
	}
	
	
	public function catalog() {
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'menu' => $this->baselib->get_categories(false,true),
			'category' => $this->baselib->get_categories(false,true),
			'footer' => array()
		);
		
		$this->load->view('catalog', $data);
	}

	public function product($product_id = false) {

		if($product_id) {
			$product = $this->baselib->get_product_by_id($product_id);
			$products_ids = $this->baselib->get_favourites();

			if(in_array($product_id, $products_ids)) {
				$product['favourite'] = true;
			}

			$related_products_ids = $this->baselib->get_related_products_ids($product_id);

			$data = array(
				'header' => array(
					'cart' => $this->get_cart_info_for_header(),
					'fb_share' => $this->baselib->craete_fb_share('/product/'.$product['product_id'],$product['title'],$product['description'],$product['image'])
				),
				'menu' => $this->baselib->get_categories(false,true),
				'footer' => array(
					'videos' => $product['youtube']
				),
				'product' => $product,
				'related_products' => $this->baselib->get_products_with_categories(false,'eko'),
				'comments' => $this->baselib->get_comments('product', $product_id),
				'related_products' => $this->baselib->get_products_by_ids($related_products_ids)
			);

			$this->load->view('product', $data);			
		}
	}		

	
	public function eko() {
		
		$filters = array(
			'category' => (!is_null($this->input->get('category')) ? $this->input->get('category') : 0)
		);
		
		$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);
		
		$products = $this->baselib->get_products_with_categories(false,'eko');
		$products = $this->baselib->sort_products('category','eko',$products);
		
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'category' => 'eko',
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			)
		);
		
		$data['filters'] = $filters;

		$products_in_page = $this->baselib->filter_products_for_providers_full($products,$filters,$page);

		$empty_products = count($products_in_page['products'])%5; 
					
		if($empty_products > 0) {
			$empty_products = 5-$empty_products;
		}
		
		$data['products'] = $products_in_page['products'];
		$data['pages_count'] = $products_in_page['pages_count'];
		$data['filters_used'] = $products_in_page['filters_used'];
		$data['filters_text'] = $products_in_page['filters_text'];
		$data['categories_for_provider'] = $products_in_page['categories_for_provider'];
		$data['current_page'] = $page;
		$data['products_count'] = $products_in_page['products_count'];
		$data['pages'] = $this->baselib->create_pager($products_in_page['pages_count'],$page);
		$data['empty_products'] = $empty_products;
		
		$this->load->view('category_alt', $data);
	}

	public function farm() {
		
		$filters = array(
			'category' => (!is_null($this->input->get('category')) ? $this->input->get('category') : 0)
		);
		
		$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);

		$products = $this->baselib->get_products_with_categories(false,'farm');
		$products = $this->baselib->sort_products('category','farm',$products);
		
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'category' => 'farm',
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			)
		);
		
		$data['filters'] = $filters;

		$products_in_page = $this->baselib->filter_products_for_providers_full($products,$filters,$page);

		$empty_products = count($products_in_page['products'])%5; 
					
		if($empty_products > 0) {
			$empty_products = 5-$empty_products;
		}
		
		$data['products'] = $products_in_page['products'];
		$data['pages_count'] = $products_in_page['pages_count'];
		$data['filters_used'] = $products_in_page['filters_used'];
		$data['filters_text'] = $products_in_page['filters_text'];
		$data['categories_for_provider'] = $products_in_page['categories_for_provider'];
		$data['current_page'] = $page;
		$data['products_count'] = $products_in_page['products_count'];
		$data['pages'] = $this->baselib->create_pager($products_in_page['pages_count'],$page);
		$data['empty_products'] = $empty_products;
		
		$this->load->view('category_alt', $data);
	}
	
	public function diet() {
		
		$filters = array(
			'category' => (!is_null($this->input->get('category')) ? $this->input->get('category') : 0)
		);
		
		$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);
		
		$products = $this->baselib->get_products_with_categories(false,'diet');
		$products = $this->baselib->sort_products('category','diet',$products);
		
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'category' => 'diet',
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			)
		);
		
		$data['filters'] = $filters;

		$products_in_page = $this->baselib->filter_products_for_providers_full($products,$filters,$page);

		$empty_products = count($products_in_page['products'])%5; 
					
		if($empty_products > 0) {
			$empty_products = 5-$empty_products;
		}
		
		$data['products'] = $products_in_page['products'];
		$data['pages_count'] = $products_in_page['pages_count'];
		$data['filters_used'] = $products_in_page['filters_used'];
		$data['filters_text'] = $products_in_page['filters_text'];
		$data['categories_for_provider'] = $products_in_page['categories_for_provider'];
		$data['current_page'] = $page;
		$data['menu']['products_count'] = $products_in_page['products_count'];
		$data['pages'] = $this->baselib->create_pager($products_in_page['pages_count'],$page);
		$data['empty_products'] = $empty_products;
		
		$this->load->view('category_alt', $data);
	}	
	
	public function cart() {
		
		$this->load->model('account');
		$products = $this->baselib->get_cart();		
		
		$summ = 0;
		
		foreach($products as $product) {			
			$summ = $summ + $product['price']*$product['quantity_in_cart'];
		}
		
		$totals = array(
			'summ' => array(
				'title' => 'итого',
				'value' => $summ				
			)
		);

		$related_products = $this->baselib->get_related_products_ids();
		
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'menu' => $this->baselib->get_categories(),
			'cart_content' => array(
				'products' => $products
			),
			'cart_info' => array(
				'summ' => $summ
			),
			'totals' => array(
				'totals' => $totals
			),
			'related_products' => $this->baselib->get_products_by_ids($related_products)
		);
		
		if($summ < 1000) {
			$data['cart_info']['need'] = 1000 - $summ;
			$data['cart_info_tpl'] = 'cart_low';
			
			$this->load->view('cart/cart', $data);
			
			return;
		}
		
		$shipping_gruops = $this->baselib->get_shipping_gropus();
		
		foreach($shipping_gruops as $group_id => $group) {
			$shipping_gruops[$group_id]['methods'] = $this->baselib->get_shipping_methods($group_id);
		}

		if(is_null($this->session->userdata('shipping_method')) and is_null($this->input->post('shipping_method'))) {
			$data['cart_info']['shipping_methods'] = $shipping_gruops;
			$data['cart_info_tpl'] = 'shipping_methods';
			
			if(!is_null($this->input->post('shipping_form_submit'))) {
				$data['cart_info']['shipping_form_submit_error'] = true;
			}
			
			$this->load->view('cart/cart', $data);
			
			return;
		} elseif(!is_null($this->input->post('shipping_method'))) {
			$this->session->set_userdata('shipping_method', (int)$this->input->post('shipping_method'));
		}
	
		$data['totals']['totals'] = $this->baselib->get_totals_for_cart($data['totals']['totals']);
		$data['cart_info']['summ'] = $data['totals']['totals']['with_shipping']['value'];
		
		if(!$this->baselib->is_logged()) {
			
			$data['cart_info_tpl'] = 'login_register';
			
			$this->load->view('cart/cart', $data);
			
			return;
		}
		
		if(!is_null($this->input->post('shipping_metro'))) {
			$this->session->set_userdata('shipping_metro', $this->input->post('shipping_metro'));
		}
			
		if(!is_null($this->input->post('shipping_address'))) {
			$this->session->set_userdata('shipping_address', $this->input->post('shipping_address'));
		}

		if(!is_null($this->input->post('shipping_comment'))) {
			$this->session->set_userdata('shipping_comment', $this->input->post('shipping_comment'));
		}

		$account_id = $this->session->userdata('account_id');
		
		
		$account = new Account();
		$account->set_id($account_id);
		
		$data['cart_info']['account'] = $account->get_data();
		//$data['cart_info']['orders'] = $account->get_account_orders();

		if(!is_null($this->session->userdata('shipping_metro'))) {
			$data['cart_info']['account']['shipping_metro'] = $this->session->userdata('shipping_metro');
		}
		
		if(!is_null($this->session->userdata('shipping_address'))) {
			$data['cart_info']['account']['shipping_address'] = $this->session->userdata('shipping_address');
		}	

		if(!is_null($this->session->userdata('shipping_method'))) {
			$data['cart_info']['account']['shipping_method'] = $this->session->userdata('shipping_method');
		}
		
		$data['cart_info']['shipping_methods'] = $shipping_gruops;
		$data['totals']['totals'] = $this->baselib->get_totals_for_cart($data['totals']['totals']);

		$data['cart_info_tpl'] = 'account';		
		
		$this->load->view('cart/cart', $data);
		
		return;
	}	
	
	public function cart_ajax() {
		$json = array();
		
		if(!is_null($this->input->post('product_id')) and !is_null($this->input->post('action'))) {
			if(is_null($this->session->userdata('cart'))) {
				$cart = array();
			} else {
				$cart = $this->session->userdata('cart');
			}
			
			$quantity = 0;
			
			if(isset($cart['p-'.$this->input->post('product_id')])) {
				$quantity = $cart['p-'.$this->input->post('product_id')]['quantity'];
			}
			
			$quantity_in_request = 0;
			
			if(!is_null($this->input->post('quantity'))) {
				if($this->input->post('quantity') > 0) {
					$quantity_in_request = $this->input->post('quantity');
				}
			}
			
			if($this->input->post('action') == 'add') {
				$cart['p-'.$this->input->post('product_id')] = array(
					'quantity' => $quantity_in_request + $quantity
				);
			} elseif($this->input->post('action') == 'update') {
				$cart['p-'.$this->input->post('product_id')] = array(
					'quantity' => $quantity_in_request
				);
			} elseif($this->input->post('action') == 'remove') {
				unset($cart['p-'.$this->input->post('product_id')]);
			}

			$this->session->set_userdata('cart', $cart);
			
			$json['success'] = $this->get_cart_info_for_header();
		} else {
			$json['failed'] = 'failed';
		}
		
		echo json_encode($json);
	}	
	
	private function get_cart_info_for_header() {
		
		$products = $this->baselib->get_cart();		
		
		$summ = 0;
		$total = 0;
		
		foreach($products as $product) {
			$summ = $summ + $product['price']*$product['quantity_in_cart'];
			$total++;
		}

		return array(
			'summ' => $summ,
			'total' => $total,
			'word' => $this->baselib->get_cart_word($total)
		);		
	}
	
	public function ajax_handler() {
		switch ($this->input->post('type')) {
			case 'add_product_comment':

				$data = array(
					'element_id' => $this->input->post('element_id'),
					'content' => $this->input->post('content'),
					'type' => 'product'
				);

				$this->load->model('comment');
				$comment = new Comment();
				$comment->set_data($data);
				$comment->add();

				$json['success'] = $this->baselib->get_comments('product', $this->input->post('element_id'));
				
				break;

			case 'get_product_info':
			
				$products = array();
				
				$product_id = $this->input->post('product_id');
				$product = $this->baselib->get_product_by_id($product_id);
				$product['share_html'] = $this->baselib->get_share_links('/product/'.$product['product_id'], $product['title'], $product['description'], $product['image']);
				
				foreach($product as $attr_id => $attr) {
					if(is_null($attr)) {
						unset($product[$attr_id]);
					}
				}
				
				if($product) {
					$json['success']['product'] = $product;
				}
				
				break;			
			
			case 'check_login':
				
				$email = $this->input->post('login_email');
				$password = $this->input->post('login_password');

				if($email and $password) {
					$this->load->model("account");
					$account = new Account();
					
					if($account->set_id_by_email($email)) {
						if($account->login($password)) {
							$json['success'] = 'success';
						}
					}
					
					if(!isset($json)) {
						$json['error'] = 'Логин и пароль введены неверно';
					}
				}
				
				break;				
				
			case 'check_email':
				
				$email = $this->input->post('email');
				
				if($email) {
					$this->load->model("account");
					$account = new Account();
					
					if($account->set_id_by_email($email)) {
						$json['error'] = 'Данный Email уже занят';
					}
				}
				
				break;
				
			case 'register':
				
				$data = array(
					'email' => $this->input->post('register_email'),
					'name' => $this->input->post('register_name'),
					'phone' => $this->input->post('register_phone')
				);
				
				if(!valid_email($data['email'])) {
					$json['error'] = 'Укажите корректный Email';
					break;
				}
				
				$this->load->model("account");
				$account = new Account();
				
				if($account->set_id_by_email($data['email'])) {
					$json['error'] = 'busy_email';
				} else {
					$account->set_data($data);
					
					if($account->add()) {
						$account->login_without_data();
						$json['success'] = 'success';
					}
				}
				
				break;

			case 'account_details_change':
			
				if(!is_null($this->input->post('account_details_name')) and !is_null($this->input->post('account_details_phone'))) {
					$data = array(
						'name' => $this->input->post('account_details_name'),
						'phone' => $this->input->post('account_details_phone')
					);
					
					$account_id = $this->session->userdata('account_id');
					
					if(!is_null($account_id)) {
						$this->load->model("account");
						$account = new Account();
						$account->set_id($account_id);
						$account->set_data($data);
						
						if($account->update()) {
							
							if(!is_null($this->input->post('account_details_address'))) {
								$this->session->set_userdata('shipping_address', $this->input->post('account_details_address'));
							}
							
							if(!is_null($this->input->post('account_details_metro'))) {
								$this->session->set_userdata('shipping_metro', $this->input->post('account_details_metro'));
							}

							if(!is_null($this->input->post('account_details_shipping_method'))) {
								$this->session->set_userdata('shipping_method', $this->input->post('account_details_shipping_method'));
							}							
							
							$json['redirect'] = '/cart';
							break;	
						}
					}
				}
				
				$json['error'] = 'Ошибка изменения данных';
				
				break;
				
			case 'use_bonus':
			
				if(!is_null($this->input->post('use_bonus'))) {
					$use_bonus = $this->session->userdata('use_bonus');
					
					if(is_null($use_bonus)) {
						$this->session->set_userdata('use_bonus', 1);
					} else {
						$this->session->set_userdata('use_bonus', !$use_bonus);
					}
				}
				
				$json['success'] = 'success';
				
				break;
				
			case 'create_order':
			
				if(!is_null($this->input->post('create_order'))) {
					$this->load->model('order');
					$order = new Order();
					
					if($order->create()) {
						$json['redirect'] = '/checkout_success';
					}
				}
				
				break;

			case 'check_category':
			
				if(!is_null($this->input->post('category'))) {
					if($this->baselib->is_category_exist($this->input->post('category'))) {
						$json['success'] = 'success';
					} else {
						$json['failed'] = 'failed';
					}
				}
				
				break;

			case 'confirm_account_in_modal':
			
				if(!is_null($this->input->post('confirm'))) {
					if($this->input->post('confirm') == 'yes') {
						if($this->baselib->confirm_login()) {
							$json['success'] = 'success';
						}
					} else {
						if($this->baselib->logout()) {
							$json['success'] = 'success';
						}
					}
				}
				
				break;
				
			case 'favourite':
			
				if(!is_null($this->input->post('product_id'))) {
					if($this->baselib->set_favourite($this->input->post('product_id'))) {
						$json['success'] = 'success';
					} else {
						$json['remove'] = 'remove';
					}
				}
				
				break;				

			case 'remind':
			case 'remind2':
			case 'remind3':
			case 'remind4':
			
				if(!is_null($this->input->post('remind_email'))) {
					if(!valid_email($this->input->post('remind_email'))) {
						$json['error'] = 'error';
						break;
					}
					
					$this->load->model("account");
					$account = new Account();
					
					if(!$account->set_id_by_email($this->input->post('remind_email'))) {
						$json['error'] = 'Данный e-mail не зарегистрирован в системе';
						break;
					}
					
					if($account->reset_password()) {
						$json['success'] = 'success';
					} else {
						$json['error'] = 'error';
					}
				}
				
				break;

			case 'load_products':
			
				if((!is_null($this->input->post('category_id')) or !is_null($this->input->post('country_id')) or !is_null($this->input->post('provider_id')) or !is_null($this->input->post('provider_full_id')) or !is_null($this->input->post('brands_id'))) and !is_null($this->input->post('page'))) {

					if(!is_null($this->input->post('category_id'))) {
					
						$filters_post = json_decode($this->input->post('filters'));
						$page = (!is_null($this->input->post('page')) ? $this->input->post('page') : 1);
											
						switch ($this->input->post('category_id')) {
							case 'eko':

								$filters = array(
									'category' => (isset($filters_post->category) ? $filters_post->category : 0)
								);

								$products = $this->baselib->get_products_with_categories(false,'eko');
								$products = $this->baselib->sort_products('category','eko',$products);
								$products_in_page = $this->baselib->filter_products_for_providers_full($products,$filters,$page);
								
								break;
							case 'farm':

								$filters = array(
									'category' => (isset($filters_post->category) ? $filters_post->category : 0)
								);

								$products = $this->baselib->get_products_with_categories(false,'farm');
								$products = $this->baselib->sort_products('category','farm',$products);
								$products_in_page = $this->baselib->filter_products_for_providers_full($products,$filters,$page);
								break;
							case 'diet':

								$filters = array(
									'category' => (isset($filters_post->category) ? $filters_post->category : 0)
								);

								$products = $this->baselib->get_products_with_categories(false,'diet');
								$products = $this->baselib->sort_products('category','diet',$products);
								$products_in_page = $this->baselib->filter_products_for_providers_full($products,$filters,$page);
								break;								
							default:

								$filters = array(
									'country' => (isset($filters_post->country) ? $filters_post->country : 0),
									'weight' => (isset($filters_post->weight) ? $filters_post->weight : 0),
									'pack' => (isset($filters_post->pack) ? $filters_post->pack : 0),
									'composition' => (isset($filters_post->composition) ? $filters_post->composition : 0),
									'price' => (isset($filters_post->price) ? $filters_post->price : 0),
									'brand' => (isset($filters_post->brand) ? $filters_post->brand : 0)
								);

								$products = $this->baselib->get_category_products($this->input->post('category_id'));
								$products = $this->baselib->sort_products('category',$this->input->post('category_id'),$products);
								$products_in_page = $this->baselib->filter_products($products,$filters,$this->input->post('page'));
								break;
						}
						
						
					} elseif(!is_null($this->input->post('country_id'))) {

						switch ($this->input->post('country_id')) {
							case 1:
								$country = 'Россия';
								break;
							case 2:
								$country = 'Италия';
								break;
							case 3:
								$country = 'Испания';
								break;
							case 4:
								$country = 'Греция';
								break;
							case 5:
								$country = 'Швейцария';
								break;
							case 6:
								$country = 'Армения';
								break;
							default:
								$country = 'Россия';
								break;				
						}

						$products = $this->baselib->get_country_products($country);
						$products = $this->baselib->sort_products('country',$country,$products);
						
						$filters_post = json_decode($this->input->post('filters'));
						
						$filters = array(
							'category' => (isset($filters_post->category) ? $filters_post->category : 0)
						);

						$page = (!is_null($this->input->post('page')) ? $this->input->post('page') : 1);
						
						$products_in_page = $this->baselib->filter_products_for_country($products,$filters,$page);
						
					} elseif(!is_null($this->input->post('provider_id'))) {
						$products = $this->baselib->get_products(false,true);
						
						$filters_post = json_decode($this->input->post('filters'));
						
						$filters = array(
							'provider' => (isset($filters_post->provider) ? $filters_post->provider : 0)
						);
						
						$page = (!is_null($this->input->post('page')) ? $this->input->post('page') : 1);

						$products_in_page = $this->baselib->filter_products_for_provider($products,$filters,$page);
					} elseif(!is_null($this->input->post('brands_id'))) {
						$products = $this->baselib->get_products(false,true);

						$filters_post = json_decode($this->input->post('filters'));
						
						$filters = array(
							'country' => 0,
							'brand' => (isset($filters_post->brand) ? $filters_post->brand : 0),
							'weight' => 0,
							'pack' => 0,
							'composition' => 0,
							'price' => 0
						);
						
						$page = (!is_null($this->input->post('page')) ? $this->input->post('page') : 1);

						$products_in_page = $this->baselib->filter_products($products,$filters,$page);
					} elseif(!is_null($this->input->post('provider_full_id'))) {
						
						$products = $this->baselib->get_products_with_categories($this->input->post('provider_full_id'));
						$products = $this->baselib->sort_products('provider',$this->input->post('provider_full_id'),$products);
						
						$filters_post = json_decode($this->input->post('filters'));
						
						$filters = array(
							'country' => (isset($filters_post->country) ? $filters_post->country : 0),
							'weight' => (isset($filters_post->weight) ? $filters_post->weight : 0),
							'pack' => (isset($filters_post->pack) ? $filters_post->pack : 0),
							'composition' => (isset($filters_post->composition) ? $filters_post->composition : 0),
							'price' => (isset($filters_post->price) ? $filters_post->price : 0),
							'brand' => (isset($filters_post->brand) ? $filters_post->brand : 0),
							'category' => (isset($filters_post->category) ? $filters_post->category : 0)
						);
						
						$page = (!is_null($this->input->post('page')) ? $this->input->post('page') : 1);

						$products_in_page = $this->baselib->filter_products_for_providers_full($products,$filters,$page);
					}
					
					
					$html = '';
					
					foreach($products_in_page['products'] as $product) {
						
						$data = array(
							'product' => $product
						);
						
						$html .= $this->load->view('common/load-product', $data, true);
					}
					
					$json['success'] = $html;					
					$json['load_status'] = (count($products_in_page['products']) == 50 ? 'show' : 'hide');
					$json['empty_products'] = $products_in_page['empty_products'];
				}
				
				break;				
		}
		
		if(isset($json)) {
			echo json_encode($json);
		}		
	}	
}
