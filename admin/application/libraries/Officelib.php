<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Officelib {

	private $_ci;
	private $_offices_list = array();

 	function __construct()
    {
    	$this->_ci =& get_instance();
		$this->_ci->load->model("office");
    }
	
	public function get_list() {
		$offices = array();
		$query = $this->_ci->db->select("*")->from("offices")->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$office = new Office();
				$office->set_id($row['id']);
				$offices[$row['id']] = $row;
				$offices[$row['id']]["object"] = $office;					
			}			
		}
		
		return $offices;
	}
	
	public function get_opts_list($with_empty = true) {
		$offices = array();
		
		if($with_empty = true) {
			$offices[0] = "";
		}
		
		$query = $this->_ci->db->select("id,name")->from("offices")->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$offices[$row['id']] = $row['name'];
			}			
		}
		
		return $offices;
	}
	
	public function get_name_by_id($id = 0) {
		
		if($id != 0) {
			if(empty($this->_offices_list)) {
				$offices = array();
				$query = $this->_ci->db->select("id,name")->from("offices")->get();			
				if ($query->num_rows() > 0) {
					foreach ($query->result_array() as $row) {
						$this->_offices_list[$row['id']] = $row['name'];
					}			
				}
			}
			
			if(isset($this->_offices_list[$id])) {
				return $this->_offices_list[$id];
			} else {
				return '';
			}			
		} else {
			return '';
		}
	}
	
}	
?>