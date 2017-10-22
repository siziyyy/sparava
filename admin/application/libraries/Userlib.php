<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Userlib {

	private $_ci;

 	function __construct()
    {
    	$this->_ci =& get_instance();
		$this->_ci->load->model("user");
    }
	
	public function get_list() {
		$users = array();
		$query = $this->_ci->db->select("*")->from("users")->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$user = new User();
				$user->set_id($row['id']);
				$users[$row['id']] = $row;
				$users[$row['id']]["object"] = $user;					
			}			
		}
		
		return $users;
	}
	
	public function get_opts_list($with_empty = true) {
		$users = array();
		
		if($with_empty = true) {
			$users[0] = "";
		}
		
		$query = $this->_ci->db->select("id,name")->from("users")->get();		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$users[$row['id']] = $row['name'];
			}			
		}
		
		return $users;
	}	
}	
?>