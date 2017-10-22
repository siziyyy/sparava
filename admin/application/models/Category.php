<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Category extends Fruitcrm {

	public function get_data() {
		if(!(empty($this->_id))) {
			if(!array_key_exists("category_id" , $this->_data)) {
				$query = $this->db->get_where("categories", array("category_id" => $this->_id));
				if ($query->num_rows() > 0) {
					$this->_data = $query->row_array();
					
					$this->_data['sub_categories'] = array();
					
					$query = $this->db->select("*")->from("categories")->where('parent_id',$this->_id)->get();
					if ($query->num_rows() > 0) {
						foreach ($query->result_array() as $row) {
							$this->_data['sub_categories'][] = $row;
						}
					}
				}
			}
			return $this->_data;
		}
		return false;
	}
	
	public function add() {

		$data = array(
			'title' => $this->_data['title'],
			'description' => (empty($this->_data['description']) ? NULL : $this->_data['description']),
			'status' => $this->_data['status'],
			'parent_id' => $this->_data['parent_id'],
			'sort_order' => $this->_data['sort_order'],
			'in_main_menu' => $this->_data['in_main_menu'],
			'class' => (empty($this->_data['class']) ? NULL : $this->_data['class']),
			'first_line' => $this->_data['first_line'],
			'seo_url' => (empty($this->_data['seo_url']) ? NULL : $this->_data['seo_url'])
		);
		
		if ($this->db->insert("categories", $data))  {
			$this->_id = $this->db->insert_id();
			return true;
		} else { 
			return false;
		}
	}
		
	public function delete() {
		if ($this->db->delete('categories', array('category_id' => $this->_id))) {
			return true;
		} else { 
			return false;
		}
	}

	public function update() {
	
		$data = array(
			'title' => $this->_data['title'],
			'description' => (empty($this->_data['description']) ? NULL : $this->_data['description']),
			'status' => $this->_data['status'],
			'parent_id' => $this->_data['parent_id'],
			'sort_order' => $this->_data['sort_order'],
			'in_main_menu' => $this->_data['in_main_menu'],
			'class' => (empty($this->_data['class']) ? NULL : $this->_data['class']),
			'first_line' => $this->_data['first_line'],
			'seo_url' => (empty($this->_data['seo_url']) ? NULL : $this->_data['seo_url'])
		);
		
		if ($this->db->update("categories", $data, array("category_id" => $this->_id))) {
			return true;
		} else { 
			return false;
		}
	}	
	
}

?>