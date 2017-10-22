<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Courier extends Fruitcrm {

	public function get_data() {
		if(!(empty($this->_id))) {
			if(!array_key_exists("courier_id" , $this->_data)) {
				$query = $this->db->get_where("couriers", array("courier_id" => $this->_id));
				if ($query->num_rows() > 0) {
					$this->_data = $query->row_array();
				}
			}
			return $this->_data;
		}
		return false;
	}
	
	public function add() {

		$data = array(
			'name' => $this->_data['name'],
			'phone' => $this->_data['phone'],
			'comments' => $this->_data['comments']
		);
		
		if ($this->db->insert("couriers", $data))  {
			$this->_id = $this->db->insert_id();
			return true;
		} else { 
			return false;
		}
	}
		
	public function delete() {
		if ($this->db->delete('couriers', array('courier_id' => $this->_id))) {
			return true;
		} else { 
			return false;
		}
	}

	public function update() {
	
		$data = array(
			'name' => $this->_data['name'],
			'phone' => $this->_data['phone'],
			'comments' => $this->_data['comments']
		);
		
		if ($this->db->update("couriers", $data, array("courier_id" => $this->_id))) {
			return true;
		} else { 
			return false;
		}
	}	
	
}

?>