<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Comment extends Fruitcrm {
	
	public function get_data() {
		if(!(empty($this->_id))) {
			if(!array_key_exists("comment_id" , $this->_data)) {
				$query = $this->db->get_where("comments", array("comment_id" => $this->_id));
				if ($query->num_rows() > 0) {
					$this->_data = $query->row_array();

					$this->load->model('account');
					$account = new Account();
					$account->set_id($this->_data['account_id']);
					$this->_data['account'] = $account->get_data();
				}
			}
			return $this->_data;
		}
		return false;
	}

	public function add() {

		$account = $this->baselib->is_logged();

		if(!$account or empty(trim(strip_tags($this->_data['content'])))) {
			return false;
		}

		$data = array(
			'account_id' => $account['account_id'],
			'content' => strip_tags($this->_data['content']),
			'type' => $this->_data['type'],
			'element_id' => $this->_data['element_id'],
			'create_date' => time()
		);
		
		if ($this->db->insert("comments", $data))  {
			$this->_id = $this->db->insert_id();
			return true;
		} else { 
			return false;
		}
	}	
}


