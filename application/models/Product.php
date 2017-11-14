<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Product extends Fruitcrm {
	
	public function get_data() {
		if(!(empty($this->_id))) {
			if(!array_key_exists("product_id" , $this->_data)) {
				$query = $this->db->get_where("products", array("product_id" => $this->_id));
				if ($query->num_rows() > 0) {
					$this->_data = $query->row_array();
				}
			}
			return $this->_data;
		}
		return false;
	}
	
}
