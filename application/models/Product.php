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

			if(copy($file['tmp_name'], $file_name)) {
				list($width, $height, $type, $attr) = getimagesize($file_name);
				
				if($width > 400) {
					$img = array(
						'image_library' => 'gd2',
						'source_image' => $file_name,
						'maintain_ratio' => TRUE,
						'width' => 400,
						'height' => 1000
					);
					
					$this->load->library('image_lib', $img, 'img_to_400');
					$this->img_to_400->resize();
				}
			}

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

	public function delete_image($image_id) {
		$upload_path = getcwd().'/images/';
		$query = $this->db->get_where("product_images", array("product_id" => $this->_id,"image_id" => $image_id));
		if ($query->num_rows() > 0) {
			$image_data = $query->row_array();

			$this->db->delete('product_images', array('product_id' => $this->_id,"image_id" => $image_id));

			unlink($upload_path.$image_data['url']);
		}
	}	
}
