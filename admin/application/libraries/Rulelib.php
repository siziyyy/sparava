<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Rulelib {

	private $_ci;

 	function __construct()
    {
    	$this->_ci =& get_instance();
		$this->_ci->load->model("rule");
    }
	
	public function get_list($group_id) {
		$rules = array();
		
		$query = $this->_ci->db->select("*")->from('rights')->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$rights[$row['id']] = $row["description"];
			}			
		}
		
		
		$query = $this->_ci->db->get_where('rules', array('group_id' => $group_id));		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$rules[$row['right_id']] = $row["value"];
			}
		}
		
		foreach($rights as $right_id => $right_name) {
			if(isset($rules[$right_id])) {
				$result[$right_id]["name"] = $right_name;
				$result[$right_id]["value"] = $rules[$right_id];
			} else {
				$result[$right_id]["name"] = $right_name;
				$result[$right_id]["value"] = 0;				
			}
		}
				
		return $result;
	}
	
	public function get_exist_rules($group_id) {
		
		$rules = array();
		$query = $this->_ci->db->get_where('rules', array('group_id' => $group_id));		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$rules[] = $row['right_id'];
			}
		}
		
		return $rules;
	}
	
	public function get_list_for_security_check($group_id) {
		$rules = array();
		
		$query = $this->_ci->db->select("*")->from('rights')->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$rights[$row['id']] = $row["name"];
			}			
		}		
		
		$query = $this->_ci->db->get_where('rules', array('group_id' => $group_id));		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$rules[$row['right_id']] = $row["value"];
			}
		}
		
		foreach($rights as $right_id => $right_name) {
			if(isset($rules[$right_id])) {
				$result[$right_name] = $rules[$right_id];
			} else {
				$result[$right_name] = 0;				
			}
		}
				
		return $result;
	}	
	
}