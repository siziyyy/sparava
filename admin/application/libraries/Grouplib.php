<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Grouplib {

	private $_ci;
	private $_groups_list = array();	

 	function __construct()
    {
    	$this->_ci =& get_instance();
		$this->_ci->load->model("group");
    }
	
	public function get_list() {
		$groups = array();
		$query = $this->_ci->db->select("*")->from("groups")->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$group = new Group();
				$group->set_id($row['id']);
				$groups[$row['id']] = $row;
				$groups[$row['id']]["object"] = $group;				
			}			
		}
		
		return $groups;
	}
	
	public function get_opts_list($with_empty = true) {
		$groups = array();
		
		if($with_empty = true) {
			$groups[0] = "";
		}
				
		$query = $this->_ci->db->select("id,name")->from("groups")->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$groups[$row['id']] = $row['name'];
			}			
		}
		
		return $groups;
	}
	
	public function get_name_by_id($id = 0) {
		
		if($id != 0) {
			if(empty($this->_groups_list)) {
				$groups = array();
				$query = $this->_ci->db->select("id,name")->from("groups")->get();			
				if ($query->num_rows() > 0) {
					foreach ($query->result_array() as $row) {
						$this->_groups_list[$row['id']] = $row['name'];
					}			
				}
			}
			
			if(isset($this->_groups_list[$id])) {
				return $this->_groups_list[$id];
			} else {
				return '';
			}			
		} else {
			return '';
		}
	}	
}	
?>