<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Account extends Fruitcrm {
	
	public function get_data() {
		if(!(empty($this->_id))) {
			if(!array_key_exists("account_id" , $this->_data)) {
				$query = $this->db->get_where("accounts", array("account_id" => $this->_id));
				if ($query->num_rows() > 0) {
					$this->_data = $query->row_array();
					
					$address = $this->db->select("*")->from("orders")->where("account_id",$this->_id)->order_by('order_id', 'DESC')->limit(1)->get();
					
					if ($address->num_rows() > 0) {
						$this->_data['shipping_address'] = $address->row_array()['shipping_address'];
					} else {
						$this->_data['shipping_address'] = '';
					}
				}
			}
			return $this->_data;
		}
		return false;
	}
	
	public function set_id_by_email($email) {
		$query = $this->db->get_where("accounts", array("email" => $email));
		
		if ($query->num_rows() > 0) {
			$this->_data = $query->row_array();
			$this->_id = $this->_data['account_id'];
			return $this->_id;
		}
		
		return false;
	}
	
	public function login($password) {
		if(!(empty($this->_id))) {
			if(!array_key_exists("account_id" , $this->_data)) {
				$this->get_data();
			}
		}
		
		if(array_key_exists("account_id" , $this->_data)) {
			if(md5(md5($password)) == $this->_data['password']) {
				$this->session->set_userdata('account_id', $this->_data['account_id']);
				return true;
			}
		}
		
		return false;
	}
	
	public function add() {
		if(!(empty($this->_data['email']))) {
			if(!$this->set_id_by_email($this->_data['email'])) {
				$password = substr(sha1(uniqid(mt_rand(), true)), 0, 10);
				
				$data = array(
					'email' => $this->_data['email'],
					'password' => md5(md5( $password )),
					'name' => $this->_data['name'],
					'phone' => $this->_data['phone'],
					'bonus' => 0,
					'create_date' => time()
				);
				
				if ($this->db->insert("accounts", $data))  {
					$this->_id = $this->db->insert_id();
					return true;
				}
			}
		}
		
		return false;
	}
	
	public function update() {
		$data = array(
			'name' => $this->_data['name'],
			'phone' => $this->_data['phone']
		);
		
		if ($this->db->update("accounts", $data, array("account_id" => $this->_id)))  {
			return true;
		}
		
		return false;
	}

	public function clear_bonus() {
		if ($this->db->update("accounts", array("bonus" => 0), array("account_id" => $this->_id)))  {
			return true;
		}
	}	
	
	public function set_bonus($bonus) {
		if ($this->db->update("accounts", array("bonus" => $bonus), array("account_id" => $this->_id)))  {
			return true;
		}
	}
	
	public function login_without_data() {
		if(!(empty($this->_id))) {
			$this->session->set_userdata('account_id', $this->_id);
			return true;
		}
		
		return false;
	}

	public function get_account_orders() {
		$orders = array();
		$this->load->model('order');
		
		if(!(empty($this->_id))) {
			$query = $this->db->select("*")->from("orders")->where("account_id", $this->_id)->order_by("order_id","DESC")->limit(7)->get();
			if ($query->num_rows() > 0) {
				foreach($query->result_array() as $row) {
					$order = new Order();
					$order->set_id($row['order_id']);
					
					$order_data = $order->get_data();
					$order_data['order_summ'] = $order->get_order_summ();
					
					$orders[] = $order_data;
				}
			}
		}
		
		return $orders;
	}
	
}
