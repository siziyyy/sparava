<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Baselib {
	
	private $_rules = array();
	private $_user;

	function __construct()
	{
		$this->_ci =& get_instance();
		$this->is_logged();
	}
	
	public function get_current_user_id() {
		if($this->_ci->session->userdata('id')>0) {			
			return $this->_ci->session->userdata('id');
		}
		
		return false;
	}	
	
	public function get_current_user() {
		if($this->_ci->session->userdata('id')>0) {
			$id=$this->_ci->session->userdata('id');
			
			$this->_ci->load->model("user");
			$user = new User();
			$user->set_id($id);
			$this->_user = $user->get_data();

			return $this->_user;
		}
	}
	
	private function check_session_info_for_login() {
		if($this->_ci->session->userdata('id')>0) {

			$userid = $this->_ci->session->userdata('id');
			
			$where = array(
				"id" => $userid,
				"freeze" => 0
			);
			
			$query = $this->_ci->db->select("*")->from("users")->where($where)->get();

			if ($query->num_rows() > 0) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	public function is_logged() {
		if (!empty($_POST['email']) and !empty($_POST['password'])) {
			if(!$this->auth($_POST['email'],$_POST['password'])) {
				echo $this->_ci->load->view('login', '', TRUE);
				die();
			}
			unset($_POST['email']);
			unset($_POST['password']);
		} else {
			if(!$this->check_session_info_for_login()) {
				echo $this->_ci->load->view('login', '', TRUE);
				die();
			}
		}
	}
	
	public function auth($email,$pass) {
		$pwdhash = md5(md5($pass));
		
		$where = array(
			"email"=>$email,
			"pwdhash" => $pwdhash,
			"freeze" => 0
		);
			
		$query = $this->_ci->db->select("*")->from("users")->where($where)->get();
		if ($query->num_rows() > 0) {
		
			$row = $query->row();
			$data = array(
			   'id' 	=> $row->id,
			   'pwdhash' 	=> $row->pwdhash
			);

			$this->_ci->session->set_userdata($data);

			return true;
		}
		return false;
	}
	
	public function check_user_right_or_die($right_name) {
		
		if(empty($this->_rules)) {
			$this->_ci->load->library("rulelib");
			
			if(!isset($this->_user["group_id"])) {
				$this->_user = $this->get_current_user();
			}
			
			$this->_rules = $this->_ci->rulelib->get_list_for_security_check($this->_user["group_id"]);
		}
		
		if($this->_rules[$right_name]==1) {
			return true;
		} else {
			$data['action'] = $right_name;
			echo $this->_ci->load->view('accessdenied', $data, TRUE);
			die();			
		}
	}
	
	public function check_user_right($right_name) {
		
		if(empty($this->_rules)) {
			$this->_ci->load->library("rulelib");
			
			if(!isset($this->_user["group_id"])) {
				$this->get_current_user();
			}
						
			$this->_rules = $this->_ci->rulelib->get_list_for_security_check($this->_user["group_id"]);
		}
		
		if($this->_rules[$right_name]==1) {
			return true;
		} else {
			return false;		
		}
	}
	
	public function insert_form_element($type,$name,$label="",$value="",$select_opts="",$add_data="") {
		
		if(is_object($value)) {
			$value = $value->get_data();
			$value = $value[$name];
		}
		
		if($type=="text") {
			
			$add = 'class="form-control" id="'.$name.'"';
			
			if(!empty($add_data)) {
				$add = $add_data;
			}			
			
			$html = '
				<div class="form-group">
					<label for="'.$name.'" class="control-label col-sm-4">'.$label.'</label>

					<div class="col-sm-8">
						<input type="text" name="'.$name.'" value="'.$value.'" '.$add.' autocomplete="off" />
					</div>
				</div>		
			';
		} elseif($type=="textarea") {
			$html = '
				<div class="form-group">
					<label for="'.$name.'" class="control-label col-sm-4">'.$label.'</label>

					<div class="col-sm-8">
						<textarea class="form-control" id="'.$name.'" name="'.$name.'" rows="3">'.$value.'</textarea>
					</div>
				</div>
			';
		} elseif($type=="select") {
			
			$add = 'class="form-control" id="'.$name.'"';

			if(!empty($add_data)) {
				$add = $add_data;
			}			
			
			$select = form_dropdown($name, $select_opts, $value, $add);
			
			$html = '
				<div class="form-group">
					<label class="control-label col-sm-4" for="'.$name.'">'.$label.'</label>

					<div class="col-sm-8">'.$select.'</div>
				</div>			
			';
		} elseif($type=="multiselect") {
			$value = explode(";",$value);
			$add = 'class="form-control multiselect" id="'.$name.'"';
			
			$select = form_multiselect($name."[]", $select_opts, $value, $add);
			
			$html = '
				<div class="form-group">
					<label class="control-label col-lg-4" for="'.$name.'">'.$label.'</label>

					<div class="col-lg-8">'.$select.'</div>
				</div>
			';
		} elseif($type=="wysiwyg") {
			
			$html = '
				<div class="form-group">
					<label class="control-label col-lg-4" for="'.$name.'">'.$label.'</label>

					<div class="col-lg-8">
						<textarea class="form-control wysiwyg" rows="10" name="'.$name.'">'.$value.'</textarea>
					</div>
				</div>
			';
		} elseif($type=="checkbox") {
			
			$add = 'id="'.$name.'"';

			if(!empty($add_data)) {
				$add = $add_data;
			}	
			
			$checkbox = form_checkbox($name, '1', FALSE,$add);
			
			if($value==1) {
				$checkbox = form_checkbox($name, '1', TRUE,$add);
			}

			$html = '
				<div class="form-group">
					<label for="'.$name.'" class="control-label col-lg-4">'.$label.'</label>

					<div class="col-lg-8">'.$checkbox.'</div>
				</div>	
			';
		} elseif($type=="date") {
			$html = '
				<div class="form-group">
					<label for="'.$name.'" class="control-label col-lg-4">'.$label.'</label>

					<div class="col-lg-8">
						<input type="text" id="'.$name.'" name="'.$name.'" value="'.(!empty($value) ? date("m/d/Y",$value) : date("m/d/Y") ).'" class="form-control datepicker" autocomplete="off" />
					</div>
				</div>
			';
		} elseif($type=="time") {
			$html = '
				<div class="form-group">
					<label for="'.$name.'" class="control-label col-lg-4">'.$label.'</label>
					<div class="col-lg-8">
						<input type="text" id="'.$name.'" name="'.$name.'" value="'.$value.'" class="form-control timepicker" autocomplete="off" />
					</div>					
				</div>
			';
		} elseif($type=="upload") {
			$html = '
				<div class="form-group">
					<label for="'.$name.'" class="control-label col-lg-4">'.$label.'</label>
					<div class="col-lg-8">
						<input type="file" name="'.$name.'" id="'.$name.'" class="form-control">
					</div>	
                </div>
			';
		}
		
		echo $html;
	}
	
	public function insert_form($url="",$id=0) {

		$attributes = array('class' => 'form-horizontal');
		$url = base_url($url);
		
		if($id>0) {
			echo form_open($url, $attributes,array('id' => $id));
		} else {
			echo form_open($url, $attributes);
		}
		
	}
	
	public function insert_save_cancel_buttons($url="") {
		$url = base_url($url);
		$html = '
			<div class="box-footer">
				<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Сохранить</button>&nbsp;&nbsp;&nbsp;
				<a class="btn btn-primary" href="'.$url.'"><i class="fa fa-remove"></i> Отменить</a>
			</div>		
		';
		echo $html;
	}
}

?>