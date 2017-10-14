<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function index() {		
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'menu' => $this->baselib->get_categories(),
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			)
		);
		
		$this->load->view('main', $data);
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
		
		foreach($products as $product) {
			if($i > 4) {
				break;
			}
			
			$products_to_show[] = $product;
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
	
	public function category($category) {
		
		$filters = array(
			'country' => (!is_null($this->input->get('country')) ? $this->input->get('country') : 0),
			'weight' => (!is_null($this->input->get('weight')) ? $this->input->get('weight') : 0),
			'composition' => (!is_null($this->input->get('composition')) ? $this->input->get('composition') : 0),
			'price' => (!is_null($this->input->get('price')) ? $this->input->get('price') : 0)
		);

		$page = (!is_null($this->input->get('page')) ? $this->input->get('page') : 1);
		
		$menu = $this->baselib->get_categories($category,true);
		$menu_childs = array();
		
		foreach($menu as $line) {
			foreach($line as $lcategory) {
				if($lcategory['current_category']) {
					$menu_childs = $lcategory['childs'];
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
		
		$price_sort = array();
		
		foreach($products as $product_id => $product) {
			if($filters['country'] and $product['country'] != $filters['country']) {
				unset($products[$product_id]);
				continue;
			}
			
			if($filters['weight'] and $product['weight'] != $filters['weight']) {
				unset($products[$product_id]);
				continue;
			}	

			if($filters['composition'] and $product['composition'] != $filters['composition']) {
				unset($products[$product_id]);
				continue;
			}
			
			if($filters['price']) {
				$price_sort[$product_id] = $product['price'];
			}			
		}
		
		$prodcuts_in_page = array();
		$page_start = ($page-1)*10;
		$page_end = $page*10;
		$i = 0;
		$pages_count = ((int)count($products)/10);
		
		if(count($products)%10 > 0)  {
			$pages_count++;
		}
		
		foreach($products as $product_id => $product) {
			if($i >= $page_start and $i <$page_end) {
				$prodcuts_in_page[] = $product;
			}
			
			$i++;
		}
			
		
		if($filters['price'] and count($price_sort) > 0 and $filters['price'] == 'asc') {
			array_multisort($price_sort,SORT_ASC, $products);
		} elseif($filters['price'] and count($price_sort) > 0 and $filters['price'] == 'desc') {
			array_multisort($price_sort,SORT_DESC, $products);
		}
			
		$data['products'] = $prodcuts_in_page;
		$data['pages_count'] = $pages_count;
		$data['current_page'] = $page;
		$data['menu']['products_count'] = count($products);
		
		$this->load->view('category', $data);
	}
	
	public function eko() {
		
		$filters = array(
			'country' => (!is_null($this->input->get('country')) ? $this->input->get('country') : 0),
			'weight' => (!is_null($this->input->get('weight')) ? $this->input->get('weight') : 0),
			'composition' => (!is_null($this->input->get('composition')) ? $this->input->get('composition') : 0),
			'price' => (!is_null($this->input->get('price')) ? $this->input->get('price') : 0)
		);
		
		$menu = $this->baselib->get_categories(false,true);
		$products = $this->baselib->get_products('eko');
		
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'menu' => $menu,
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			)
		);
		
		$data['menu']['attributes'] = $this->baselib->handle_attributes($products);
		$data['menu']['filters'] = $filters;
		
		$price_sort = array();
		
		foreach($products as $product_id => $product) {
			if($filters['country'] and $product['country'] != $filters['country']) {
				unset($products[$product_id]);
				continue;
			}
			
			if($filters['weight'] and $product['weight'] != $filters['weight']) {
				unset($products[$product_id]);
				continue;
			}	

			if($filters['composition'] and $product['composition'] != $filters['composition']) {
				unset($products[$product_id]);
				continue;
			}
			
			if($filters['price']) {
				$price_sort[$product_id] = $product['price'];
			}			
		}
		
		if($filters['price'] and count($price_sort) > 0 and $filters['price'] == 'asc') {
			array_multisort($price_sort,SORT_ASC, $products);
		} elseif($filters['price'] and count($price_sort) > 0 and $filters['price'] == 'desc') {
			array_multisort($price_sort,SORT_DESC, $products);
		}
			
		$data['products'] = $products;
		$data['menu']['products_count'] = count($products);		
		
		$this->load->view('category', $data);
	}

	public function farm() {
		
		$filters = array(
			'country' => (!is_null($this->input->get('country')) ? $this->input->get('country') : 0),
			'weight' => (!is_null($this->input->get('weight')) ? $this->input->get('weight') : 0),
			'composition' => (!is_null($this->input->get('composition')) ? $this->input->get('composition') : 0),
			'price' => (!is_null($this->input->get('price')) ? $this->input->get('price') : 0)
		);
		
		$menu = $this->baselib->get_categories(false,true);
		$products = $this->baselib->get_products('farm');
		
		$data = array(
			'header' => array(
				'cart' => $this->get_cart_info_for_header()
			),
			'menu' => $menu,
			'footer' => array(
				'account_confirm' => $this->baselib->get_account_data_for_confirm()
			)
		);
		
		$data['menu']['attributes'] = $this->baselib->handle_attributes($products);
		$data['menu']['filters'] = $filters;

		$price_sort = array();
		
		foreach($products as $product_id => $product) {
			if($filters['country'] and $product['country'] != $filters['country']) {
				unset($products[$product_id]);
				continue;
			}
			
			if($filters['weight'] and $product['weight'] != $filters['weight']) {
				unset($products[$product_id]);
				continue;
			}	

			if($filters['composition'] and $product['composition'] != $filters['composition']) {
				unset($products[$product_id]);
				continue;
			}
			
			if($filters['price']) {
				$price_sort[$product_id] = $product['price'];
			}			
		}
		
		if($filters['price'] and count($price_sort) > 0 and $filters['price'] == 'asc') {
			array_multisort($price_sort,SORT_ASC, $products);
		} elseif($filters['price'] and count($price_sort) > 0 and $filters['price'] == 'desc') {
			array_multisort($price_sort,SORT_DESC, $products);
		}
			
		$data['products'] = $products;
		$data['menu']['products_count'] = count($products);			
		
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
				
				$this->load->model("account");
				$account = new Account();
				
				if($account->set_id_by_email($data['email'])) {
					$json['error'] = 'Данный Email уже занят';
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
			
				if(!is_null($this->input->post('email'))) {
					if(!valid_email($this->input->post('email'))) {
						break;
					}
					
					$this->load->model("account");
					$account = new Account();
					$account->set_id_by_email($this->input->post('email'));
					if($account->reset_password()) {
						$json['success'] = 'success';
					}
				}
				
				break;				
		}
		
		if(isset($json)) {
			echo json_encode($json);
		}		
	}	
}
