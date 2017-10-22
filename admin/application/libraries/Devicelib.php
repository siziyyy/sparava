<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Devicelib {

	private $_ci;
	private $_devices_list = array();	

 	function __construct()
    {
    	$this->_ci =& get_instance();
		$this->_ci->load->model("device");
    }
	
	public function get_list() {
		$devices = array();
		$query = $this->_ci->db->select("*")->from("devices")->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$device = new device();
				$device->set_id($row['id']);
				$devices[$row['id']] = $row;
				$devices[$row['id']]["object"] = $device;
			}			
		}
		
		return $devices;
	}
	
	public function get_opts_list($with_empty = true) {
		$devices = array();
		
		if($with_empty = true) {
			$devices[0] = "";
		}
				
		$query = $this->_ci->db->select("id,name")->from("devices")->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$devices[$row['id']] = $row['name'];
			}			
		}
		
		return $devices;
	}
	
	public function get_name_by_id($id = 0) {
		
		if($id != 0) {
			if(empty($this->_devices_list)) {
				$devices = array();
				$query = $this->_ci->db->select("id,name")->from("devices")->get();			
				if ($query->num_rows() > 0) {
					foreach ($query->result_array() as $row) {
						$this->_devices_list[$row['id']] = $row['name'];
					}			
				}
			}
			
			if(isset($this->_devices_list[$id])) {
				return $this->_devices_list[$id];
			} else {
				return '';
			}			
		} else {
			return '';
		}
	}	
}	
?>