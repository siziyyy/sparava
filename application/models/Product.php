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

	public function upload_image($name, $file) {
		$upload_path = getcwd().'/images/upload';
		$extension = strtolower(pathinfo($file['name'])['extension']);

		if($extension == 'png' or $extension == 'jpg' or $extension == 'jpeg') {
			do {
				$file_name_whithout_ex = $this->baselib->get_random_str_32();
				$file_name = $upload_path.'/'.$file_name_whithout_ex.'.'.$extension;
				$url = 'upload/'.$file_name_whithout_ex.'.'.$extension;
			} while(file_exists($file_name));

			file_put_contents($file_name, file_get_contents($file['tmp_name']));

			if($name == 'product_upload_image_main') {
				$this->db->update("products", array('image' => $url), array("product_id" => $this->_id));
			} else {
				$data = array(
					'url' => $url,
					'product_id' => $this->_id
				);

				$this->db->insert("product_images", $data);
			}			
		}
	}	
}
