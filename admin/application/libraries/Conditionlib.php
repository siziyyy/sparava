<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Conditionlib {

	private $_ci;
	private $_conditions_list = array();	

 	function __construct()
    {
    	$this->_ci =& get_instance();
		$this->_ci->load->model("condition");
    }
	
	public function get_list() {
		$conditions = array();
		$query = $this->_ci->db->select("*")->from("conditions")->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$condition = new Condition();
				$condition->set_id($row['condition_id']);
				$conditions[$row['condition_id']] = $row;
				$conditions[$row['condition_id']]["object"] = $condition;
			}			
		}
		
		return $conditions;
	}
	
	public function get_opts_list($with_empty = true) {
		$conditions = array();
		
		if($with_empty = true) {
			$conditions[0] = "";
		}
				
		$query = $this->_ci->db->select("condition_id,title")->from("conditions")->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$conditions[$row['condition_id']] = $row['title'];
			}			
		}
		
		return $conditions;
	}
	
	public function get_name_by_id($id = 0) {
		
		if($id != 0) {
			if(empty($this->_conditions_list)) {
				$conditions = array();
				$query = $this->_ci->db->select("condition_id,title")->from("conditions")->get();			
				if ($query->num_rows() > 0) {
					foreach ($query->result_array() as $row) {
						$this->_conditions_list[$row['condition_id']] = $row['title'];
					}			
				}
			}
			
			if(isset($this->_conditions_list[$id])) {
				return $this->_conditions_list[$id];
			} else {
				return '';
			}			
		} else {
			return '';
		}
	}	
}	
?>