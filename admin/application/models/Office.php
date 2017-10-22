<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Office extends Fruitcrm {

	public function get_data() {
		if(!(empty($this->_id))) {
			if(!array_key_exists("id" , $this->_data)) {
				$query = $this->db->get_where("offices", array("id" => $this->_id));
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
			'description' => $this->_data['description']
		);
		
		if ($this->db->insert("offices", $data))  {
			$this->_id = $this->db->insert_id();
			return true;
		} else { 
			return false;
		}
	}
		
	public function delete() {
		if ($this->db->delete('offices', array('id' => $this->_id))) {
			return true;
		} else { 
			return false;
		}
	}

	public function update() {
	
		$data = array(
			'name' => $this->_data['name'],
			'description' => $this->_data['description']
		);
		
		if ($this->db->update("offices", $data, array("id" => $this->_id))) {
			return true;
		} else { 
			return false;
		}
	}	
	
}

?>