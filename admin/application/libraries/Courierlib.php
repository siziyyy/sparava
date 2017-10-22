<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Courierlib {

	private $_ci;
	private $_couriers_list = array();	

 	function __construct()
    {
    	$this->_ci =& get_instance();
		$this->_ci->load->model("courier");
    }
	
	public function get_list() {
		$couriers = array();
		$query = $this->_ci->db->select("*")->from("couriers")->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$courier = new Courier();
				$courier->set_id($row['courier_id']);
				$couriers[$row['courier_id']] = $row;
				$couriers[$row['courier_id']]["object"] = $courier;
			}			
		}
		
		return $couriers;
	}
	
	public function get_opts_list($with_empty = true) {
		$couriers = array();
		
		if($with_empty = true) {
			$couriers[0] = "";
		}
				
		$query = $this->_ci->db->select("courier_id,name")->from("couriers")->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$couriers[$row['courier_id']] = $row['name'];
			}			
		}
		
		return $couriers;
	}
	
	public function get_name_by_id($id = 0) {
		
		if($id != 0) {
			if(empty($this->_couriers_list)) {
				$couriers = array();
				$query = $this->_ci->db->select("courier_id,name")->from("couriers")->get();			
				if ($query->num_rows() > 0) {
					foreach ($query->result_array() as $row) {
						$this->_couriers_list[$row['courier_id']] = $row['name'];
					}			
				}
			}
			
			if(isset($this->_couriers_list[$id])) {
				return $this->_couriers_list[$id];
			} else {
				return '';
			}			
		} else {
			return '';
		}
	}	
}	
?>