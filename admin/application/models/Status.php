<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Status extends Fruitcrm {

	public function get_data() {
		if(!(empty($this->_id))) {
			if(!array_key_exists("status_id" , $this->_data)) {
				$query = $this->db->get_where("statuses", array("status_id" => $this->_id));
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
			'title' => $this->_data['title'],
			'description' => $this->_data['description']
		);
		
		if ($this->db->insert("statuses", $data))  {
			$this->_id = $this->db->insert_id();
			return true;
		} else { 
			return false;
		}
	}
		
	public function delete() {
		if ($this->db->delete('statuses', array('status_id' => $this->_id))) {
			return true;
		} else { 
			return false;
		}
	}

	public function update() {
	
		$data = array(
			'title' => $this->_data['title'],
			'description' => $this->_data['description']
		);
		
		if ($this->db->update("statuses", $data, array("status_id" => $this->_id))) {
			return true;
		} else { 
			return false;
		}
	}	
	
}

?>