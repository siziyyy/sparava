<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Category extends Fruitcrm {
	
	public function get_data() {
		if(!(empty($this->_id))) {
			if(!array_key_exists("category_id" , $this->_data)) {
				$query = $this->db->get_where("categories", array("category_id" => $this->_id));
				if ($query->num_rows() > 0) {
					$this->_data = $query->row_array();

					if(!is_null($this->_data['tags']) and !empty($this->_data['tags'])) {
						$tags = base64_decode($this->_data['tags']);

						$tags = explode(PHP_EOL,$tags);
						$this->_data['tags'] = array();

						foreach($tags as $tag) {
							$tag = explode(';',$tag);
							if(isset($tag[1])) {
								$this->_data['tags'][$tag[0]] = $tag[1];
							}
						}
					} else {
						$this->_data['tags'] = array();
					}
				}
			}
			return $this->_data;
		}
		return false;
	}
	
}
