<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Rightlib {

	private $_ci;

 	function __construct()
    {
    	$this->_ci =& get_instance();
		$this->_ci->load->model("right");
    }
	
	public function get_list() {
		$rights = array();
		$query = $this->_ci->db->select("*")->from("rights")->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$right = new Right();
				$right->set_id($row['id']);
				$rights[$row['id']] = $row;
				$rights[$row['id']]["object"] = $right;				
			}			
		}
		
		return $rights;
	}
	
	public function get_opts_list($with_empty = true) {
		$rights = array();
		
		if($with_empty = true) {
			$rights[0] = "";
		}
				
		$query = $this->_ci->db->select("id,name")->from("rights")->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$rights[$row['id']] = $row['name'];
			}			
		}
		
		return $rights;
	}	
}	
?>