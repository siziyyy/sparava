<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Order extends Fruitcrm {
	
	public function get_data() {
		if(!(empty($this->_id))) {
			if(!array_key_exists("order_id" , $this->_data)) {
				$query = $this->db->get_where("orders", array("order_id" => $this->_id));
				if ($query->num_rows() > 0) {
					$this->_data = $query->row_array();
					
					$inners = $this->db->query('SELECT o.*,oi.* FROM orders AS o, order_inners AS oi WHERE o.order_id = oi.order_id AND o.order_id = '.$this->_id);
					
					if ($inners->num_rows() > 0) {
						$this->_data['inners'] = $inners->result_array();
					} else {
						$this->_data['inners'] = array();
					}
				}
			}
			return $this->_data;
		}
		return false;
	}
	
	public function create() {
		
		$account_id = $this->session->userdata('account_id');
		$shipping_methods = $this->baselib->get_shipping_methods();
		$shipping_method = $this->session->userdata('shipping_method');
		$products = $this->baselib->get_cart();

		if(!is_null($account_id) and !is_null($shipping_method) and count($products) > 0) {

			$this->load->model('Account');
			$account = new Account();
			$account->set_id($account_id);
		
			$data = array(
				'account_id' => $account_id,
				'shipping_method' => $shipping_methods[$shipping_method]['title'],
				'shipping_method_id' => $shipping_method,
				'shipping_comment' => $this->session->userdata('shipping_comment'),
				'shipping_price' => 0,
				'shipping_time' => $this->session->userdata('shipping_time'),
				'shipping_date' => $this->session->userdata('shipping_date'),
				'used_bonus' => 0,
				'create_date' => time()
			);

			$link_data = $this->baselib->get_link_data();

			if($link_data) {				
				if($link_data['type'] == 1) {
					$data['shipping_price'] = 0;
				}
			}

			if($shipping_method == 3 or $shipping_method == 4) {
				$data['shipping_time'] = NULL;
				$data['shipping_date'] = NULL;
			}
			
			if(is_null($this->session->userdata('shipping_metro'))) {
				$data['shipping_metro'] = $account->get_data()['shipping_metro'];
			} else {
				$data['shipping_metro'] = $this->session->userdata('shipping_metro');
			}
			
			if(is_null($this->session->userdata('shipping_address'))) {
				$data['shipping_address'] = $account->get_data()['shipping_address'];
			} else {
				$data['shipping_address'] = $this->session->userdata('shipping_address');
			}

			$add = 0;

			$cart = $this->baselib->get_cart();

			foreach ($cart as $product_id => $product) {
				if(!empty($product['weight'])) {
					if((float)$product['weight'] > 1) {
						$ppkg = $product['price']/$product['weight'];
					} else {
						$ppkg = $product['price']*(1/(float)$product['weight']);
					}

					if((float)$ppkg < 50) {
						$ppkg = (float)$ppkg + 2;

						if((float)$product['weight'] > 1) {
							$p_add = ((int)($ppkg*$product['weight']) + 1);
						} else {
							$p_add = ((int)($ppkg/(1/(float)$product['weight'])) + 1);
						}
						
						$add = $add + (($p_add-$product['price'])*$product['quantity_in_cart']);
					}
				}
			}

			if ($this->db->insert("orders", $data))  {
				$this->_id = $this->db->insert_id();

				$this->session->set_userdata('last_order_id',$this->_id);
				
				$this->write_order_inners();

				if($link_data) {
					$link_insert = array(
						'link_id' => $link_data['link_id'],
						'type' => $link_data['type'],
						'value' => $link_data['value']
					);

					if($link_data['count'] == 1) {
						$link_insert['is_used'] = true;
						$link_insert['count'] = $link_data['count']-1;
					} else {
						$link_insert['value'] = $link_data['value'] - ($link_data['value']/$link_data['count']);
						$link_insert['count'] = $link_data['count']-1;
						$link_insert['is_used'] = false;
					}

					$account->set_link_data($link_insert);
				}

				if($link_data['type'] != 1) {
					$summ = $this->get_order_summ(true);

					if((int)$summ < 23800) {
						$shipping_price = 1190;
					} else {
						$shipping_price = (int)$summ + ((int)$summ*5)/100;
					}

					$shipping_price = $shipping_price+$add;
					
					$this->db->update("orders", array('shipping_price' => $shipping_price), array("order_id" => $this->_id));
				}				
				
				$this->load->model('mail');
				$mail = new Mail();
				$mail->send_order_email($this->_id);
				
				return true;
			}
		}
		
		return false;
	}
	
	private function write_order_inners() {

		$products = $this->baselib->get_cart();

		foreach($products as $product) {
			$data = array(
				'order_id' => $this->_id,
				'product_id' => $product['product_id'],
				'title' => $product['title'],
				'quantity' => $product['quantity_in_cart'],
				'price' => $product['price']
			);
	
			$this->db->insert("order_inners", $data);
			
			$query = $this->db->get_where("products", array("product_id" => $product['product_id']));
			if ($query->num_rows() > 0) {
				$quantity = $query->row_array()['quantity'];
			}
			
			$data = array(
				'quantity' => $quantity - $product['quantity_in_cart']
			);

			$this->db->update("products", $data, array("product_id" => $product['product_id']));			
		}
		
		return true;
	}
	
	public function get_order_summ($only_products = false) {
		if(!(empty($this->_id))) {
			if(!array_key_exists("order_id" , $this->_data)) {
				$this->get_data();
			}
			
			$summ = 0;
			
			foreach($this->_data['inners'] as $product) {
				$summ = $summ + $product['price']*$product['quantity'];
			}
			
			if(!$only_products) {
				$summ = $summ+$this->_data['shipping_price'];
				$summ = $summ-$this->_data['used_bonus'];
			}
			
			return $summ;
		}
		
		return false;
	}

}
