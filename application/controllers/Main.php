<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();

		if(!is_null($this->input->post('token'))) {
			$s = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
            $user = json_decode($s, true);

            $this->load->model('account');
			$account = new Account();

			if(!isset($user['error']) and !$account->social_login($user['identity'],$user['network'])) {
				$data = array(
					'header' => array(
						'cart' => $this->get_cart_info_for_header()
					),
					'menu' => $this->baselib->get_categories(false,true),
					'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
					'footer' => array(
						'account_confirm' => $this->baselib->get_account_data_for_confirm()
					),
					'return_url' => $_SERVER['REQUEST_URI'],
					'user' => $user
				);
				
				$this->load->view('social', $data);

				return true;
			}
		} elseif(!is_null($this->input->post('profile')) and !is_null($this->input->post('network'))) {

            $this->load->model('account');
			$account = new Account(); 			

			$account->set_data($this->input->post());
			$account->add_social();
			$account->social_login($this->input->post('identity'),$this->input->post('network'));

			redirect(base_url($this->input->post('return_url')), 'refresh');

			return true;
		}
    }

	public function index() {
		$banners = array(
			'slider' => unserialize(base64_decode($this->baselib->get_setting_value('front_page_slider'))),
			'banner_1' => unserialize(base64_decode($this->baselib->get_setting_value('front_page_banner_1'))),
			'banner_2' => unserialize(base64_decode($this->baselib->get_setting_value('front_page_banner_2'))),
			'category' => unserialize(base64_decode($this->baselib->get_setting_value('front_page_category'))),
			'banner_3' => unserialize(base64_decode($this->baselib->get_setting_value('front_page_banner_3'))),
			'banner_4' => unserialize(base64_decode($this->baselib->get_setting_value('front_page_banner_4'))),
			'banner_5' => unserialize(base64_decode($this->baselib->get_setting_value('front_page_banner_5'))),
			'instagram' => unserialize(base64_decode($this->baselib->get_setting_value('front_page_instagram'))),
			'products' => unserialize(base64_decode($this->baselib->get_setting_value('front_page_products'))),
		);

		shuffle($banners['banner_1']);
		shuffle($banners['category']);
		shuffle($banners['banner_3']);
		shuffle($banners['instagram']);
		shuffle($banners['products']);

		$banners['banner_1'] = array_slice($banners['banner_1'], 0, 3);
		$banners['banner_3'] = array_slice($banners['banner_3'], 0, 4);
		$banners['instagram'] = array_slice($banners['instagram'], 0, 4);

		foreach ($banners['products'] as $banner) {
			$product_ids[] = $banner['id'];
		}

		$products = $this->productlib->get_products_by_ids($product_ids);

		foreach ($banners['products'] as $id => $banner) {
			if(isset($products[$banner['id']])) {
				$banners['products'][$id]['price'] = $products[$banner['id']]['price'];
				$banners['products'][$id]['title'] = $products[$banner['id']]['title'];
			}
		}

		$banners_to_shuffle = array();

		foreach ($banners['banner_4'] as $banner) {
			$banners_to_shuffle[$banner['type']][] = $banner;
		}

		$banners['banner_4'] = array();

		foreach ($banners_to_shuffle as $type => $banners_group) {
			shuffle($banners_group);

			if($type == '1') {
				$banners['banner_4'][$type] = array_slice($banners_group, 0, 2);
			} else {
				$banners['banner_4'][$type] = array_slice($banners_group, 0, 1);
			}
		}		


		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'menu' => $this->baselib->get_categories(false,true),
			'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			),
			'banners' => $banners
		);
		
		$this->load->view('main', $data);
	}

	public function callme() {		
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'menu' => $this->baselib->get_categories(false,true),
			'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			)
		);
		
		$this->load->view('callme', $data);
	}

	public function callmeform($subject) {
		$subject_title = '';

		if($subject == 1) {
			$subject_title = 'Сделать заказ';
		} elseif($subject == 2) {
			$subject_title = 'Сотрудничество';
		} elseif($subject == 3) {
			$subject_title = 'Работа';
		} elseif($subject == 4) {
			$subject_title = 'Жалоба';
		}

		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'menu' => $this->baselib->get_categories(false,true),
			'subject' => $subject_title,
			'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			)
		);
		
		$this->load->view('callmeform', $data);
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
			'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
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
			'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			)
		);
		
		if($blog_id) {
			$product = $this->productlib->get_product_by_id($data['blogs']['linked_product_id']);
			
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
		redirect(base_url($this->baselib->_return_url), 'refresh');
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
			'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			)
		);
		
		$this->load->view('information', $data);
	}
	
	public function search() {
		$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);

		if(!is_null($this->input->post('value'))) {
			$value = $this->input->post('value');
			$this->session->set_userdata('search_value',$value);
		} else {
			$value = $this->session->userdata('search_value');
		}

		$products_sort = array();
		$products = array();

		$result = array(
			'products' => array()
		);

		if(empty($value)) {
			redirect(base_url('/'), 'refresh');
		} elseif(is_numeric(trim($value))) {
			$product_id = $this->productlib->get_product_id_from_articul($value);
			$products[] = $this->productlib->get_product_by_id($product_id);
		} else {
			$result = $this->productlib->search_products(trim($value));
			$products_sort = $result['products'];
			$result['products'] = $this->productlib->get_products_by_ids($result['products'],true);
		}

		if(count($products_sort)) {
			foreach ($products_sort as $product_id) {
				$products[$product_id] = $result['products'][$product_id];
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

		$data = array(
			'current_page' => $page,
			'pages_count' => $pages_count,
			'pages' => $this->baselib->create_pager($pages_count,$page),
			'cart' => $this->get_cart_info_for_header(),
			'products' => $prodcuts_in_page,
			'show_categories' => false,
			'empty_products' => $empty_products,
			'is_search' => true,
			'path' => false,
			'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
			'value' => $value,
			'menu' => $this->baselib->get_categories()
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
			'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
			'menu' => $this->baselib->get_categories()
		);
		
		$this->load->view('cart/checkout_success', $data);
	}
	
	public function country($country_id) {
		$countries = $this->baselib->_countries;
		$country = $countries[$country_id];

		if(is_null($this->input->get('category'))) {
			$products = $this->productlib->get_top_five('country',$country);

			$data = array(
				'header' => array(
					'cart' => $this->get_cart_info_for_header()
				),
				'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
				'footer' => array(
					'account_confirm' => $this->baselib->get_account_data_for_confirm()
				),
				'is_first_page' => true,
				'country' => $country,
				'country_id' => $country_id,
				'products' => $products,
				'path' => $country_id,
				'parent_categories_list' => $this->productlib->get_categories_for_page('country',$country),
				'current_category' => NULL,
				'banners' => $this->baselib->get_page_banners('country-'.$country_id)
			);
		} else {
			$products = $this->productlib->get_country_products($country);
			$products = $this->productlib->sort_products('country',$country,$products);
			
			$filters = array(
				'category' => (!is_null($this->input->get('category')) ? $this->input->get('category') : 0)
			);
			
			$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);
			
			$products_in_page = $this->filterlib->filter_products_for_country($products,$filters,$page);

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
				'path' => $country_id,
				'categories' => $products_in_page['categories_for_country'],
				'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
				'footer' => array(
					'account_confirm' => $this->baselib->get_account_data_for_confirm()
				),
				'pages' => $this->baselib->create_pager($products_in_page['pages_count'],$page),
				'empty_products' => $empty_products,
				'is_first_page' => false,
				'filters_text' => $products_in_page['filters_text'],
				'parent_categories_list' => $this->productlib->get_categories_for_page('country',$country),
				'current_category' => $filters['category'],
				'banners' => $this->baselib->get_page_banners('country-'.$country_id)
			);			
		}

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

		$products = $this->productlib->get_products(false,true);
		
		$filters = array(
			'provider' => (!is_null($this->input->get('provider')) ? $this->input->get('provider') : 0)
		);
		
		$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);
		
		$products_in_page = $this->filterlib->filter_products_for_provider($products,$filters,$page);
		
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
			'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			),
			'pages' => $this->baselib->create_pager($products_in_page['pages_count'],$page),
			'empty_products' => $products_in_page['empty_products'],
			'filters_text' => $products_in_page['filters_text'],
			'path' => false
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

		$products = $this->productlib->get_products(false,true);
		
		$filters = array(
			'country' => 0,
			'brand' => (!is_null($this->input->get('brand')) ? $this->input->get('brand') : 0),
			'weight' => 0,
			'pack' => 0,
			'composition' => 0,
			'price' => 0
		);
		
		$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);
		
		$products_in_page = $this->filterlib->filter_products($products,$filters,$page);
		
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
			'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			),
			'pages' => $this->baselib->create_pager($products_in_page['pages_count'],$page),
			'empty_products' => $products_in_page['empty_products'],
			'filters_text' => $products_in_page['filters_text'],
			'path' => false
		);

		$this->load->view('brands',$data);
	}	
	
	public function orders() {
		
		$order_id = (!is_null($this->input->get('order_id')) ? $this->input->get('order_id') : 0);
		
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			),
			'path' => false
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
			
			$products_ids = $this->productlib->get_order_products($order_id);
			
			$products = $this->productlib->get_products_by_ids($products_ids);
			
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
			'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			),
			'path' => false
		);
		
		$products_ids = $this->baselib->get_favourites();
	
		if(count($products_ids) > 0) {
			$products = $this->productlib->get_products_by_ids($products_ids);		
			
			$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);
			
			$products_in_page = $this->filterlib->filter_products_for_favourites($products,$filters,$page);
			
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

		$this->load->model('category');
		$category_obj = new Category();

		if($parent_category_id) {

			$category_obj->set_id($parent_category_id);
			$category_data = $category_obj->get_data();

			$products = $this->productlib->get_top_five('category',$parent_category_id);

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
				'category_data' => $category_data,
				'category' => $category,
				'path' => false,
				'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
				'footer' => array(
					'account_confirm' => $this->baselib->get_account_data_for_confirm()
				),
				'is_parent_category' => true,
				'products' => $products,
				'banners' => $this->baselib->get_page_banners('category-'.$category)
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

			$sort_order = $this->baselib->get_sort_order();

			$category_obj->set_id($category);
			$category_data = $category_obj->get_data();			
			
			$data = array(
				'header' => array(
					'cart' => $this->get_cart_info_for_header()
				),
				'menu' => $menu,
				'category_data' => $category_data,
				'category' => $category,
				'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
				'footer' => array(
					'account_confirm' => $this->baselib->get_account_data_for_confirm()
				),
				'path' => false,
				'sort_order' => (isset($sort_order[$category]) ? $sort_order[$category] : false),
				'is_parent_category' => false,
				'banners' => $this->baselib->get_page_banners('category-'.$category)
			);
			
			$products = $this->productlib->get_category_products($category);

			$data['sort_attr'] = $this->baselib->handle_sort_attributes($products);
			
			$products = $this->productlib->sort_products('category',$category,$products);
			$products = $this->productlib->filter_products_by_sort($products,$category);
			
			$data['menu']['menu_childs'] = $menu_childs;
			$data['menu']['attributes'] = $this->baselib->handle_attributes($products);
			$data['menu']['filters'] = $filters;

			$products_in_page = $this->filterlib->filter_products($products,$filters,$page);

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
			'path' => false,
			'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			)
		);
		
		$products = $this->productlib->get_products_with_categories($provider);
		$products = $this->productlib->sort_products('provider',$provider,$products);
		
		//$data['attributes'] = $this->baselib->handle_attributes($products);
		$data['filters'] = $filters;
		
		$products_in_page = $this->filterlib->filter_products_for_providers_full($products,$filters,$page);

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
			'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
			'footer' => array()
		);
		
		$this->load->view('catalog', $data);
	}

	public function product($product_id = false) {

		if($product_id) {
			$product = $this->productlib->get_product_by_id($product_id);
			$products_ids = $this->baselib->get_favourites();
			$type = (is_null($this->input->get('type')) ? false : $this->input->get('type'));

			if(in_array($product_id, $products_ids)) {
				$product['favourite'] = true;
			}

			$related_products_ids = $this->productlib->get_related_products_ids($product_id, false, $type);			

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
				'comments' => $this->baselib->get_comments('product', $product_id),
				'related_products' => $this->productlib->get_products_by_ids($related_products_ids),
				'breadcrumbs' => $this->productlib->get_breadcrumbs_for_product($product,$type),
				'path' => $type
			);

			$this->load->view('product', $data);
		}
	}		

	public function child() {
		if(is_null($this->input->get('category'))) {
			$products = $this->productlib->get_top_five('child');

			$data = array(
				'header' => array(
					'cart' => $this->get_cart_info_for_header()
				),
				'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
				'footer' => array(
					'account_confirm' => $this->baselib->get_account_data_for_confirm()
				),
				'is_first_page' => true,
				'category' => 'child',
				'path' => 'child',
				'products' => $products,
				'parent_categories_list' => $this->productlib->get_categories_for_page('child'),
				'current_category' => NULL,
				'banners' => $this->baselib->get_page_banners('page-child')
			);
		} else {		
		
			$filters = array(
				'category' => (!is_null($this->input->get('category')) ? $this->input->get('category') : 0)
			);
			
			$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);
			
			$products = $this->productlib->get_products_with_categories(false,'child');
			$products = $this->productlib->sort_products('category','child',$products);
			
			$data = array(
				'header' => array(
					'cart' => $this->get_cart_info_for_header()
				),
				'category' => 'child',
				'path' => 'child',
				'is_first_page' => false,
				'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
				'footer' => array(
					'account_confirm' => $this->baselib->get_account_data_for_confirm()
				),
				'parent_categories_list' => $this->productlib->get_categories_for_page('child'),
				'current_category' => $filters['category'],
				'banners' => $this->baselib->get_page_banners('page-child')
			);
			
			$data['filters'] = $filters;

			$products_in_page = $this->filterlib->filter_products_for_providers_full($products,$filters,$page);

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
		}

		$this->load->view('category_alt', $data);
	}

	public function recommend() {

		if(is_null($this->input->get('category'))) {
			$products = $this->productlib->get_top_five('recommend');

			$data = array(
				'header' => array(
					'cart' => $this->get_cart_info_for_header()
				),
				'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
				'footer' => array(
					'account_confirm' => $this->baselib->get_account_data_for_confirm()
				),
				'path' => 'recommend',
				'is_first_page' => true,
				'category' => 'recommend',
				'products' => $products,
				'parent_categories_list' => $this->productlib->get_categories_for_page('recommend'),
				'current_category' => NULL,
				'banners' => $this->baselib->get_page_banners('page-recommend')
			);
		} else {
		
			$filters = array(
				'category' => (!is_null($this->input->get('category')) ? $this->input->get('category') : 0)
			);
			
			$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);
			
			$products = $this->productlib->get_products_with_categories(false,'recommend');
			$products = $this->productlib->sort_products('category','recommend',$products);
			
			$data = array(
				'header' => array(
					'cart' => $this->get_cart_info_for_header()
				),
				'category' => 'recommend',
				'path' => 'recommend',
				'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
				'footer' => array(
					'account_confirm' => $this->baselib->get_account_data_for_confirm()
				),
				'is_first_page' => false,
				'parent_categories_list' => $this->productlib->get_categories_for_page('recommend'),
				'current_category' => $filters['category'],
				'banners' => $this->baselib->get_page_banners('page-recommend')
			);
			
			$data['filters'] = $filters;

			$products_in_page = $this->filterlib->filter_products_for_providers_full($products,$filters,$page);

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
		}
			
		$this->load->view('category_alt', $data);
	}

	public function bbox() {

		if(is_null($this->input->get('category'))) {
			$products = $this->productlib->get_top_five('bbox');

			$data = array(
				'header' => array(
					'cart' => $this->get_cart_info_for_header()
				),
				'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
				'footer' => array(
					'account_confirm' => $this->baselib->get_account_data_for_confirm()
				),
				'is_first_page' => true,
				'category' => 'bbox',
				'path' => 'bbox',
				'products' => $products,
				'parent_categories_list' => $this->productlib->get_categories_for_page('bbox'),
				'current_category' => NULL,
				'banners' => $this->baselib->get_page_banners('page-bbox')
			);
		} else {
		
			$filters = array(
				'category' => (!is_null($this->input->get('category')) ? $this->input->get('category') : 0)
			);
			
			$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);
			
			$products = $this->productlib->get_products_with_categories(false,'bbox');
			$products = $this->productlib->sort_products('category','bbox',$products);
			
			$data = array(
				'header' => array(
					'cart' => $this->get_cart_info_for_header()
				),
				'category' => 'bbox',
				'path' => 'bbox',
				'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
				'footer' => array(
					'account_confirm' => $this->baselib->get_account_data_for_confirm()
				),
				'is_first_page' => false,
				'parent_categories_list' => $this->productlib->get_categories_for_page('bbox'),
				'current_category' => $filters['category'],
				'banners' => $this->baselib->get_page_banners('page-bbox')
			);
			
			$data['filters'] = $filters;

			$products_in_page = $this->filterlib->filter_products_for_providers_full($products,$filters,$page);

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
		}
			
		$this->load->view('category_alt', $data);
	}
	
	public function eko() {

		if(is_null($this->input->get('category'))) {
			$products = $this->productlib->get_top_five('eko');

			$data = array(
				'header' => array(
					'cart' => $this->get_cart_info_for_header()
				),
				'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
				'footer' => array(
					'account_confirm' => $this->baselib->get_account_data_for_confirm()
				),
				'is_first_page' => true,
				'category' => 'eko',
				'path' => 'eko',
				'products' => $products,
				'parent_categories_list' => $this->productlib->get_categories_for_page('eko'),
				'current_category' => NULL,
				'banners' => $this->baselib->get_page_banners('page-eko')
			);
		} else {
		
			$filters = array(
				'category' => (!is_null($this->input->get('category')) ? $this->input->get('category') : 0)
			);
			
			$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);
			
			$products = $this->productlib->get_products_with_categories(false,'eko');
			$products = $this->productlib->sort_products('category','eko',$products);
			
			$data = array(
				'header' => array(
					'cart' => $this->get_cart_info_for_header()
				),
				'category' => 'eko',
				'path' => 'eko',
				'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
				'footer' => array(
					'account_confirm' => $this->baselib->get_account_data_for_confirm()
				),
				'is_first_page' => false,
				'parent_categories_list' => $this->productlib->get_categories_for_page('eko'),
				'current_category' => $filters['category'],
				'banners' => $this->baselib->get_page_banners('page-eko')
			);
			
			$data['filters'] = $filters;

			$products_in_page = $this->filterlib->filter_products_for_providers_full($products,$filters,$page);

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
		}
			
		$this->load->view('category_alt', $data);
	}

	public function farm() {
		if(is_null($this->input->get('category'))) {
			$products = $this->productlib->get_top_five('farm');

			$data = array(
				'header' => array(
					'cart' => $this->get_cart_info_for_header()
				),
				'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
				'footer' => array(
					'account_confirm' => $this->baselib->get_account_data_for_confirm()
				),
				'is_first_page' => true,
				'category' => 'farm',
				'path' => 'farm',
				'products' => $products,
				'parent_categories_list' => $this->productlib->get_categories_for_page('farm'),
				'current_category' => NULL,
				'banners' => $this->baselib->get_page_banners('page-farm')
			);
		} else {		
		
			$filters = array(
				'category' => (!is_null($this->input->get('category')) ? $this->input->get('category') : 0)
			);
			
			$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);

			$products = $this->productlib->get_products_with_categories(false,'farm');
			$products = $this->productlib->sort_products('category','farm',$products);
			
			$data = array(
				'header' => array(
					'cart' => $this->get_cart_info_for_header()
				),
				'category' => 'farm',
				'path' => 'farm',
				'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
				'is_first_page' => false,
				'footer' => array(
					'account_confirm' => $this->baselib->get_account_data_for_confirm()
				),
				'parent_categories_list' => $this->productlib->get_categories_for_page('farm'),
				'current_category' => $filters['category'],
				'banners' => $this->baselib->get_page_banners('page-farm')
			);
			
			$data['filters'] = $filters;

			$products_in_page = $this->filterlib->filter_products_for_providers_full($products,$filters,$page);

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
		}
		
		$this->load->view('category_alt', $data);
	}
	
	public function diet() {
		if(is_null($this->input->get('category'))) {
			$products = $this->productlib->get_top_five('diet');

			$data = array(
				'header' => array(
					'cart' => $this->get_cart_info_for_header()
				),
				'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
				'footer' => array(
					'account_confirm' => $this->baselib->get_account_data_for_confirm()
				),
				'is_first_page' => true,
				'category' => 'diet',
				'path' => 'diet',
				'products' => $products,
				'parent_categories_list' => $this->productlib->get_categories_for_page('diet'),
				'current_category' => NULL,
				'banners' => $this->baselib->get_page_banners('page-diet')
			);
		} else {		
			$filters = array(
				'category' => (!is_null($this->input->get('category')) ? $this->input->get('category') : 0)
			);
			
			$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);
			
			$products = $this->productlib->get_products_with_categories(false,'diet');
			$products = $this->productlib->sort_products('category','diet',$products);
			
			$data = array(
				'header' => array(
					'cart' => $this->get_cart_info_for_header()
				),
				'category' => 'diet',
				'path' => 'diet',
				'is_first_page' => false,
				'related_products' => $this->productlib->get_products_by_ids($this->baselib->_related_products),
				'footer' => array(
					'account_confirm' => $this->baselib->get_account_data_for_confirm()
				),
				'parent_categories_list' => $this->productlib->get_categories_for_page('diet'),
				'current_category' => $filters['category'],
				'banners' => $this->baselib->get_page_banners('page-diet')
			);
			
			$data['filters'] = $filters;

			$products_in_page = $this->filterlib->filter_products_for_providers_full($products,$filters,$page);

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
		}
		
		$this->load->view('category_alt', $data);
	}	
	
	public function cart() {
		
		$this->load->model('account');
		$products = $this->baselib->get_cart();		
		
		$summ = 0;
		
		foreach($products as $product) {			
			$summ = $summ + $this->baselib->round_price($product['quantity_in_cart'],$product['price']);
		}
		
		$totals = array(
			'summ' => array(
				'title' => 'итого',
				'value' => $summ				
			)
		);

		$related_products = $this->productlib->get_related_products_ids();
		
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
			'related_products' => $this->productlib->get_products_by_ids($related_products)
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
			case 'sort':

				$data = array(
					'category' => $this->input->post('category'),
					'sort' => $this->input->post('sort')
				);

				if($data['sort'] == 'clear') {
					$this->baselib->set_sort_order(0, 0, 1);
				} else {
					$this->baselib->set_sort_order($data['sort'], $data['category']);
				}

				$json['success'] = 'success';

				break;

			case 'feedback':
			case 'feedback_2':

				if(!is_null($this->input->post('feedback_subject'))) {
					$this->email->subject('Обратный звонок');

					$message = 'Тема: '.$this->input->post('feedback_subject').'<br>';
					$message .= 'Имя: '.$this->input->post('feedback_name').'<br>';
					$message .= 'Почта: '.$this->input->post('feedback_email').'<br>';
					$message .= 'Телефон: '.$this->input->post('feedback_phone');
				} else {
					$this->email->subject('Предложение с сайта');

					$message = $this->input->post('feedback_type').'<br>'.$this->input->post('feedback_email').'<br>'.$this->input->post('feedback_comment');
				}

				$this->load->library('email');
				
				$this->email->from('info@aydaeda.ru', 'aydaeda.ru');
				$this->email->to('aydaeda@bk.ru, tural.huseynov@gmail.com');
				//$this->email->to('');
				
				$this->email->message($message);	
				
				if($this->email->send()) {
					$json['success'] = 'success';
				}

				break;

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
				
				$product_id = $this->input->post('product_id');
				$product = $this->productlib->get_product_by_id($product_id);
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
				
				if($email and valid_email($email)) {
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
							case 'bbox':

								$filters = array(
									'category' => (isset($filters_post->category) ? $filters_post->category : 0)
								);

								$products = $this->productlib->get_products_with_categories(false,'bbox');
								$products = $this->productlib->sort_products('category','bbox',$products);
								$products_in_page = $this->filterlib->filter_products_for_providers_full($products,$filters,$page);
								
								break;

							case 'recommend':

								$filters = array(
									'category' => (isset($filters_post->category) ? $filters_post->category : 0)
								);

								$products = $this->productlib->get_products_with_categories(false,'recommend');
								$products = $this->productlib->sort_products('category','recommend',$products);
								$products_in_page = $this->filterlib->filter_products_for_providers_full($products,$filters,$page);
								
								break;

							case 'eko':

								$filters = array(
									'category' => (isset($filters_post->category) ? $filters_post->category : 0)
								);

								$products = $this->productlib->get_products_with_categories(false,'eko');
								$products = $this->productlib->sort_products('category','eko',$products);
								$products_in_page = $this->filterlib->filter_products_for_providers_full($products,$filters,$page);
								
								break;
								
							case 'farm':

								$filters = array(
									'category' => (isset($filters_post->category) ? $filters_post->category : 0)
								);

								$products = $this->productlib->get_products_with_categories(false,'farm');
								$products = $this->productlib->sort_products('category','farm',$products);
								$products_in_page = $this->filterlib->filter_products_for_providers_full($products,$filters,$page);
								break;

							case 'diet':

								$filters = array(
									'category' => (isset($filters_post->category) ? $filters_post->category : 0)
								);

								$products = $this->productlib->get_products_with_categories(false,'diet');
								$products = $this->productlib->sort_products('category','diet',$products);
								$products_in_page = $this->filterlib->filter_products_for_providers_full($products,$filters,$page);
								break;

							case 'child':

								$filters = array(
									'category' => (isset($filters_post->category) ? $filters_post->category : 0)
								);

								$products = $this->productlib->get_products_with_categories(false,'child');
								$products = $this->productlib->sort_products('category','child',$products);
								$products_in_page = $this->filterlib->filter_products_for_providers_full($products,$filters,$page);
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

								$products = $this->productlib->get_category_products($this->input->post('category_id'));
								$products = $this->productlib->sort_products('category',$this->input->post('category_id'),$products);
								$products = $this->productlib->filter_products_by_sort($products,$this->input->post('category_id'));
								$products_in_page = $this->filterlib->filter_products($products,$filters,$this->input->post('page'));
								break;
						}
						
						
					} elseif(!is_null($this->input->post('country_id'))) {

						$countries = $this->baselib->_countries;
						$country = $countries[$this->input->post('country_id')];

						$products = $this->productlib->get_country_products($country);
						$products = $this->productlib->sort_products('country',$country,$products);
						
						$filters_post = json_decode($this->input->post('filters'));
						
						$filters = array(
							'category' => (isset($filters_post->category) ? $filters_post->category : 0)
						);

						$page = (!is_null($this->input->post('page')) ? $this->input->post('page') : 1);
						
						$products_in_page = $this->filterlib->filter_products_for_country($products,$filters,$page);
						
					} elseif(!is_null($this->input->post('provider_id'))) {
						$products = $this->productlib->get_products(false,true);
						
						$filters_post = json_decode($this->input->post('filters'));
						
						$filters = array(
							'provider' => (isset($filters_post->provider) ? $filters_post->provider : 0)
						);
						
						$page = (!is_null($this->input->post('page')) ? $this->input->post('page') : 1);

						$products_in_page = $this->filterlib->filter_products_for_provider($products,$filters,$page);
					} elseif(!is_null($this->input->post('brands_id'))) {
						$products = $this->productlib->get_products(false,true);

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

						$products_in_page = $this->filterlib->filter_products($products,$filters,$page);
					} elseif(!is_null($this->input->post('provider_full_id'))) {
						
						$products = $this->productlib->get_products_with_categories($this->input->post('provider_full_id'));
						$products = $this->productlib->sort_products('provider',$this->input->post('provider_full_id'),$products);
						
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

						$products_in_page = $this->filterlib->filter_products_for_providers_full($products,$filters,$page);
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
