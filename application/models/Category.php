<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Category extends Fruitcrm {
	
	public function get_data() {
		if(!(empty($this->_id))) {
			if(!array_key_exists("category_id" , $this->_data)) {
				$query = $this->db->get_where("categories", array("category_id" => $this->_id));
				if ($query->num_rows() > 0) {
					$this->_data = $query->row_array();
				}
			}
			return $this->_data;
		}
		return false;
	}
	
}
