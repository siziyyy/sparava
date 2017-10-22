<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Statuslib {

	private $_ci;
	private $_statuses_list = array();	

 	function __construct()
    {
    	$this->_ci =& get_instance();
		$this->_ci->load->model("status");
    }
	
	public function get_list() {
		$statuses = array();
		$query = $this->_ci->db->select("*")->from("statuses")->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$status = new Status();
				$status->set_id($row['status_id']);
				$statuses[$row['status_id']] = $row;
				$statuses[$row['status_id']]["object"] = $status;
			}			
		}
		
		return $statuses;
	}
	
	public function get_opts_list($with_empty = true) {
		$statuses = array();
		
		if($with_empty = true) {
			$statuses[0] = "";
		}
				
		$query = $this->_ci->db->select("id,title")->from("statuses")->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$statuses[$row['status_id']] = $row['title'];
			}			
		}
		
		return $statuses;
	}
	
	public function get_name_by_id($id = 0) {
		
		if($id != 0) {
			if(empty($this->_statuses_list)) {
				$statuses = array();
				$query = $this->_ci->db->select("status_id,title")->from("statuses")->get();			
				if ($query->num_rows() > 0) {
					foreach ($query->result_array() as $row) {
						$this->_statuses_list[$row['status_id']] = $row['title'];
					}			
				}
			}
			
			if(isset($this->_statuses_list[$id])) {
				return $this->_statuses_list[$id];
			} else {
				return '';
			}			
		} else {
			return '';
		}
	}	
}	
?>