<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Categorylib {

	private $_ci;
	private $_categories_list = array();	

 	function __construct()
    {
    	$this->_ci =& get_instance();
		$this->_ci->load->model("category");
    }
	
	public function get_list() {
		$categories = array();
		$query = $this->_ci->db->select("*")->from("categories")->where('parent_id',0)->get();
		
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$category = new Category();
				$category->set_id($row['category_id']);
				$categories[$row['category_id']] = $category->get_data();
				$categories[$row['category_id']]["object"] = $category;
			}			
		}
		
		return $categories;
	}
	
	public function get_opts_list($with_empty = true) {
		$categories = array();
		
		if($with_empty = true) {
			$categories[0] = "";
		}
				
		$query = $this->_ci->db->select("category_id,title")->from("categories")->order_by("title","ASC")->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$categories[$row['category_id']] = $row['title'];
			}			
		}
		
		return $categories;
	}
	
	public function get_name_by_id($id = 0) {
		
		if($id != 0) {
			if(empty($this->_categories_list)) {
				$categories = array();
				$query = $this->_ci->db->select("category_id,title")->from("categories")->get();			
				if ($query->num_rows() > 0) {
					foreach ($query->result_array() as $row) {
						$this->_categories_list[$row['category_id']] = $row['title'];
					}			
				}
			}
			
			if(isset($this->_categories_list[$id])) {
				return $this->_categories_list[$id];
			} else {
				return '';
			}			
		} else {
			return '';
		}
	}	
}	
?>