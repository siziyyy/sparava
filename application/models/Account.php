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
						$this->_data['shipping_metro'] = $address->row_array()['shipping_metro'];
					} else {
						$this->_data['shipping_address'] = '';
						$this->_data['shipping_metro'] = '';
					}

					if(!empty($this->_data['personal_data'])) {
						$this->_data['personal_data'] = unserialize(base64_decode($this->_data['personal_data']));
					}

					if(!empty($this->_data['link_data'])) {
						$this->_data['link_data'] = unserialize(base64_decode($this->_data['link_data']));
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

				$this->session->set_userdata('is_login_confirmed',time());
				return true;
			}
		}
		
		return false;
	}

	public function social_login($identity, $network) {		
		$query = $this->db->get_where("accounts", array("identity" => $identity,"network" => $network));
		if ($query->num_rows() > 0) {
			$this->_data = $query->row_array();

			$this->session->set_userdata('account_id', $this->_data['account_id']);

			$this->session->set_userdata('is_login_confirmed',time());			
			return true;
		}
		
		return false;
	}

	public function add_social() {
		if(!(empty($this->_data['email']))) {
			if(!$this->set_id_by_email($this->_data['email'])) {
				$password = mt_rand();
				
				$data = array(
					'email' => $this->_data['email'],
					'password' => md5(md5( $password )),
					'name' => $this->_data['name'],
					'phone' => $this->_data['phone'],
					'bonus' => 0,
					'create_date' => time(),
					'profile' => $this->_data['profile'],
					'identity' => $this->_data['identity'],
					'network' => $this->_data['network']
				);
				
				if ($this->db->insert("accounts", $data))  {
					$this->_id = $this->db->insert_id();	

					$this->load->model('mail');
					$mail = new Mail();
					$mail->send_register_email($this->_id,$password);				

					return true;
				}
			}
		}
		
		return false;
	}		
	
	public function add() {
		if(!(empty($this->_data['email']))) {
			if(!$this->set_id_by_email($this->_data['email'])) {
				$password = mt_rand();
				
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

					$this->load->model('mail');
					$mail = new Mail();
					$mail->send_register_email($this->_id,$password);
					
					return true;
				}
			}
		}
		
		return false;
	}
	
	public function reset_password() {
		$password = mt_rand();
		
		$data = array(
			'password' => md5(md5( $password ))
		);
		
		if ($this->db->update("accounts", $data, array("account_id" => $this->_id)))  {
			$this->load->model('mail');
			$mail = new Mail();

			if($mail->send_reseted_password($this->_id,$password)) {
				return true;
			}
		}
		
		return false;
	}

	
	public function update() {
		$data = array();

		$data['name'] = (isset($this->_data['name']) ? $this->_data['name'] : NULL);
		$data['phone'] = (isset($this->_data['phone']) ? $this->_data['phone'] : NULL);
		$data['phone_2'] = (isset($this->_data['phone_2']) ? $this->_data['phone_2'] : NULL);
		$data['prefered_shipping_address'] = (isset($this->_data['prefered_shipping_address']) ? $this->_data['prefered_shipping_address'] : NULL);
		$data['prefered_shipping_metro'] = (isset($this->_data['prefered_shipping_metro']) ? $this->_data['prefered_shipping_metro'] : NULL);
		$data['prefered_shipping_time'] = (isset($this->_data['prefered_shipping_time']) ? $this->_data['prefered_shipping_time'] : NULL);
		$data['personal_data'] = (isset($this->_data['personal_data']) ? base64_encode(serialize($this->_data['personal_data'])) : NULL);
		
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

	public function set_link_data($data) {

		$data = base64_encode(serialize($data));

		if ($this->db->update("accounts", array("link_data" => $data), array("account_id" => $this->_id)))  {
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
