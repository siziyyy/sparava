<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class User extends Fruitcrm {
	public $_login;
	public $_pwd;

	public function get_data() {
		if(!(empty($this->_id))) {
			if(!array_key_exists("id" , $this->_data)) {
				$query = $this->db->get_where("users", array("id" => $this->_id));
				if ($query->num_rows() > 0) {
					$this->_data = $query->row_array();
				}
			}
			return $this->_data;
		}
		return false;
	}
	
	public function get_username() {
		if(!(empty($this->_id))) {
			if(!array_key_exists("id" , $this->_data)) {
				$this->get_data();
				return $this->_data["name"];
			}
		}
		return false;
	}
	
	public function get_office_users() {
		if(!(empty($this->_id))) {
			$user_ids=array();
			
			$user = $this->db->select("office_id")->from("users")->where("id",$this->_id)->get()->row_array();
			
			if ($user["office_id"] > 0) {
				$users = $this->db->select("*")->from("users")->where("office_id",$user["office_id"])->get();
				if ($users->num_rows() > 0) {
					foreach ($users->result_array() as $row) {
						$user_ids[]=$row["id"];
					}
				}
			}			
			
			return $user_ids;
		}
		return false;
	}	
	
	public function add() {

		$data = array(
			'pwdhash' => md5(md5($this->_data['pwd'])),
			'name' => $this->_data['name'],
			'telephone' => $this->_data['telephone'],
			'group_id' => $this->_data['group_id'],
			'email' => $this->_data['user_email'],
			'freeze' => $this->_data['freeze'],
			'office_id' => $this->_data['office_id'],
			'comment' => $this->_data['comment']
		);
		
		if ($this->db->insert("users", $data))  {
			$this->_id = $this->db->insert_id();
			$this->send_password($this->_id,$data["pwd"]);
			return true;
		} else { 
			return false;
		}
	}
		
	public function delete() {
		if ($this->db->delete('users', array('id' => $this->_id))) {
			return true;
		} else { 
			return false;
		}
	}

	public function update() {
		
		if($this->_data['pwd']) {
			$pwd = md5(md5($this->_data['pwd']));
		} else { 
			$pwd = $this->_data['pwdhash']; 
		}		
	
		$data = array(
			'pwdhash' => $pwd,
			'name' => $this->_data['name'],
			'telephone' => $this->_data['telephone'],
			'group_id' => $this->_data['group_id'],
			'email' => $this->_data['user_email'],
			'freeze' => $this->_data['freeze'],
			'office_id' => $this->_data['office_id'],
			'comment' => $this->_data['comment']
		);
		
		if ($this->db->update("users", $data, array("id" => $this->_id))) {
			if($this->_data['pwd']) {
				$this->send_password($this->_id,$pwd);
			}			
			return true;
		} else { 
			return false;
		}
	}
	
	public function send_password($id,$pwd) {
		$user = $this->db->get_where("users", array("id" => $id))->row_array();
		$message = '		
Это письмо отправлено из Fruitcrm. Вы получили это письмо, так как были внесены в нашу базу пользователей.

 Ваш логин и пароль на сайте:
------------------------------------------------

 Адрес для входа на сайт: https://Fruitcrm.satsystems.org/
 Логин: '.$user['email'].'
 Пароль: '.$pwd.'

------------------------------------------------
 

С уважением, Администрация.
';
		$to = $user['email'].', tural.huseynov@gmail.com';
		
		$this->load->library('email');

		$this->email->from('info@Fruitcrm.satsystems.org', 'Fruitcrm');
		$this->email->to($to); 

		$this->email->subject('Login and password');
		$this->email->message($message);	
		
		$this->email->send();
	}	
	
}

?>