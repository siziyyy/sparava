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
	
	public function logout() {		
		$this->baselib->logout();
		redirect(base_url('/'), 'refresh');
	}	
	
	public function information() {		
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
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
			$products = array_merge($products,$this->baselib->get_products($category_id));
			
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
			default:
				$country = 'Россия';
				break;				
		}

		$products = $this->baselib->get_country_products($country);
		
		$filters = array(
			'category' => (!is_null($this->input->get('category')) ? $this->input->get('category') : 0)
		);
		
		$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);
		
		$products_in_page = $this->filter_products_for_country($products,$filters,$page);
		
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
			)
		);
		
		$this->load->view('country',$data);
	}
	
	public function category($category = false) {
		
		if(!$category) {
			redirect(base_url('/'), 'refresh');
		}
		
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
			)
		);
		
		ksort($menu_childs);
		
		$products = $this->baselib->get_category_products($category);
		
		$data['menu']['menu_childs'] = $menu_childs;
		$data['menu']['attributes'] = $this->baselib->handle_attributes($products);
		$data['menu']['filters'] = $filters;
		
		$products_in_page = $this->filter_products($products,$filters,$page);
		
		$data['products'] = $products_in_page['products'];
		$data['pages_count'] = $products_in_page['pages_count'];
		$data['filters_used'] = $products_in_page['filters_used'];
		$data['current_page'] = $page;
		$data['menu']['products_count'] = $products_in_page['products_count'];
		
		$this->load->view('category', $data);
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
	
	private function filter_products($products,$filters,$page) {
		$price_sort = array();
		
		$filters_arr = array(
			'country' => ($filters['country'] ? explode(';',$filters['country']) : 0),
			'brand' => ($filters['brand'] ? explode(';',$filters['brand']) : 0),
			'weight' => ($filters['weight'] ? explode(';',$filters['weight']) : 0),
			'pack' => ($filters['pack'] ? explode(';',$filters['pack']) : 0),
			'composition' => ($filters['composition'] ? explode(';',$filters['composition']) : 0)
		);

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
			
			if($filters_arr['weight'] and !in_array($product['weight'], $filters_arr['weight'])) {
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
			
			if($filters['price']) {
				$price_sort[$product_id] = $product['price'];
				$filters_used = true;
			}			
		}
		
		$prodcuts_in_page = array();
		$page_start = ($page-1)*10;
		$page_end = $page*10;
		$i = 0;
		$pages_count = (int)(count($products)/10);
		
		if(count($products)%10 > 0)  {
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
		
		return array(
			'products' => $prodcuts_in_page,
			'pages_count' => $pages_count,
			'products_count' => count($products),
			'filters_used' => $filters_used
		);
	}
	
	private function filter_products_for_country($products,$filters,$page) {
		$categories = $this->baselib->get_all_categories();
		$categories_for_country = array();
		
		$filters_arr = array(
			'categories' => ($filters['category'] ? explode(';',$filters['category']) : 0)
		);
		
		$allowed_categories = array();
		
		if(is_array($filters_arr['categories'])) {
			foreach($filters_arr['categories'] as $category_name) {
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
		$page_start = ($page-1)*10;
		$page_end = $page*10;
		$i = 0;
		$pages_count = (int)(count($products)/10);
		
		if(count($products)%10 > 0)  {
			$pages_count++;
		}
		
		foreach($products as $product_id => $product) {
			if($i >= $page_start and $i <$page_end) {
				$prodcuts_in_page[] = $product;
			}
			
			$i++;
		}	
		
		return array(
			'products' => $prodcuts_in_page,
			'pages_count' => $pages_count,
			'products_count' => count($products),
			'categories_for_country' => $categories_for_country
		);
	}
	
	public function eko() {
		
		$filters = array(
			'country' => (!is_null($this->input->get('country')) ? $this->input->get('country') : 0),
			'weight' => (!is_null($this->input->get('weight')) ? $this->input->get('weight') : 0),
			'pack' => (!is_null($this->input->get('pack')) ? $this->input->get('pack') : 0),
			'composition' => (!is_null($this->input->get('composition')) ? $this->input->get('composition') : 0),
			'price' => (!is_null($this->input->get('price')) ? $this->input->get('price') : 0),
			'brand' => (!is_null($this->input->get('brand')) ? $this->input->get('brand') : 0)
		);
		
		$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);
		
		$menu = $this->baselib->get_categories(false,true);
		$products = $this->baselib->get_products('eko');
		
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'menu' => $menu,
			'category' => 'eko',
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			)
		);
		
		$data['menu']['attributes'] = $this->baselib->handle_attributes($products);
		$data['menu']['filters'] = $filters;

		$products_in_page = $this->filter_products($products,$filters,$page);
			
		$data['products'] = $products_in_page['products'];
		$data['pages_count'] = $products_in_page['pages_count'];
		$data['filters_used'] = $products_in_page['filters_used'];
		$data['current_page'] = $page;
		$data['menu']['products_count'] = $products_in_page['products_count'];
		
		$this->load->view('category', $data);
	}

	public function farm() {
		
		$filters = array(
			'country' => (!is_null($this->input->get('country')) ? $this->input->get('country') : 0),
			'weight' => (!is_null($this->input->get('weight')) ? $this->input->get('weight') : 0),
			'pack' => (!is_null($this->input->get('pack')) ? $this->input->get('pack') : 0),
			'composition' => (!is_null($this->input->get('composition')) ? $this->input->get('composition') : 0),
			'price' => (!is_null($this->input->get('price')) ? $this->input->get('price') : 0),
			'brand' => (!is_null($this->input->get('brand')) ? $this->input->get('brand') : 0),
		);
		
		$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);
		
		$menu = $this->baselib->get_categories(false,true);
		$products = $this->baselib->get_products('farm');
		
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'menu' => $menu,
			'category' => 'farm',
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			)
		);
		
		$data['menu']['attributes'] = $this->baselib->handle_attributes($products);
		$data['menu']['filters'] = $filters;

		$products_in_page = $this->filter_products($products,$filters,$page);
		
		$data['products'] = $products_in_page['products'];
		$data['pages_count'] = $products_in_page['pages_count'];
		$data['filters_used'] = $products_in_page['filters_used'];
		$data['current_page'] = $page;
		$data['menu']['products_count'] = $products_in_page['products_count'];
		
		$this->load->view('category', $data);
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
			)
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
			
			$this->load->view('cart/cart', $data);
			
			return;
		} elseif(!is_null($this->input->post('shipping_method'))) {
			$this->session->set_userdata('shipping_method', (int)$this->input->post('shipping_method'));
		}
	
		$data['totals']['totals'] = $this->get_totals_for_cart($data['totals']['totals']);
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
		
		$data['totals']['totals'] = $this->get_totals_for_cart($data['totals']['totals']);

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
			'word' => $this->get_cart_word($total)
		);		
	}	
	
	private function get_cart_word($count = 0) {
		
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
	
	private function get_totals_for_cart($totals) {
		if(!is_null($this->session->userdata('shipping_method'))) {
			
			$shipping_methods = $this->baselib->get_shipping_methods();
			
			$totals['shipping'] = array(
				'title' => 'доставка',
				'value' => $shipping_methods[$this->session->userdata('shipping_method')]['price']
			);
			
			$totals['with_shipping'] = array(
				'title' => 'с доставкой',
				'value' => $totals['summ']['value'] + $totals['shipping']['value']
			);
		}
		
		if(!is_null($this->session->userdata('account_id'))) {
			
			$account = new Account();
			$account->set_id($this->session->userdata('account_id'));
			$account = $account->get_data();
			
			$totals['bonus'] = array(
				'title' => 'потратить бонусы на',
				'value' => $account['bonus']
			);
			
			if(!is_null($this->session->userdata('use_bonus'))) {
				$totals['bonus']['use_bonus'] = $this->session->userdata('use_bonus');
			} else {
				$this->session->set_userdata('use_bonus',0);
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
	
	public function ajax_handler() {
		switch ($this->input->post('type')) {
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

			case 'remind':
			case 'remind2':
			
				if(!is_null($this->input->post('remind_email'))) {
					if(!valid_email($this->input->post('remind_email'))) {
						break;
					}
					
					$this->load->model("account");
					$account = new Account();
					$account->set_id_by_email($this->input->post('remind_email'));
					if($account->reset_password()) {
						$json['success'] = 'success';
					} else {
						$json['error'] = 'error';
					}
				}
				
				break;					

			case 'load_products':
			
				if((!is_null($this->input->post('category_id')) or !is_null($this->input->post('country_id'))) and !is_null($this->input->post('page'))) {
					
					$filters_post = json_decode($this->input->post('filters'));
										
					$filters = array(
						'country' => (isset($filters_post->country) ? $filters_post->country : 0),
						'weight' => (isset($filters_post->weight) ? $filters_post->weight : 0),
						'pack' => (isset($filters_post->pack) ? $filters_post->pack : 0),
						'composition' => (isset($filters_post->composition) ? $filters_post->composition : 0),
						'price' => (isset($filters_post->price) ? $filters_post->price : 0)
					);
					
					if(!is_null($this->input->post('category_id'))) {
						switch ($this->input->post('category_id')) {
							case 'eko':
								$products = $this->baselib->get_products('eko');
								break;
							case 'farm':
								$products = $this->baselib->get_products('farm');
								break;
							default:
								$products = $this->baselib->get_category_products($this->input->post('category_id'));
								break;
						}
						
						$products_in_page = $this->filter_products($products,$filters,$this->input->post('page'));
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
						
						$filters_post = json_decode($this->input->post('filters'));
						
						$filters = array(
							'category' => (isset($filters_post->category) ? $filters_post->category : 0)
						);

						$page = (!is_null($this->input->post('page')) ? $this->input->post('page') : 1);
						
						$products_in_page = $this->filter_products_for_country($products,$filters,$page);
					}
					
					
					
					$html = '';
					
					foreach($products_in_page['products'] as $product) {
						
						$data = array(
							'product' => $product
						);
						
						$html .= $this->load->view('common/load-product', $data, true);
					}
					
					$json['success'] = $html;
				}
				
				break;				
		}
		
		if(isset($json)) {
			echo json_encode($json);
		}		
	}	
}
