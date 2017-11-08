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
		$use_bonus = $this->session->userdata('use_bonus');
		$products = $this->baselib->get_cart();
		

		if(!is_null($account_id) and !is_null($shipping_method) and !is_null($use_bonus) and count($products) > 0) {

			$this->load->model('Account');
			$account = new Account();
			$account->set_id($account_id);
		
			$data = array(
				'account_id' => $account_id,
				'shipping_method' => $shipping_methods[$shipping_method]['title'],
				'shipping_method_id' => $shipping_method,
				'shipping_price' => $shipping_methods[$shipping_method]['price'],
				'used_bonus' => ( $use_bonus ? $account->get_data()['bonus'] : 0 ),
				'create_date' => time()
			);
			
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

			if ($this->db->insert("orders", $data))  {
				$this->_id = $this->db->insert_id();
				
				$this->write_order_inners();
				
				if( $use_bonus ) {
					$account->clear_bonus();
				} else {
					$bonus = $this->get_order_summ(true)*0.1;
					$account->set_bonus($bonus);
				}
				
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
