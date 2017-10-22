<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Conditions extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		$this->baselib->check_user_right_or_die("conditions-view");
		$this->load->library("conditionlib");
    }	

	public function index()
	{
		$data = array(
			"conditions" => $this->conditionlib->get_list()
		);
		$this->load->view("conditions/list", $data);		
	}

	public function add() {
		if(empty($_POST['title'])) {
			$this->load->view("conditions/add");
		} else {
			$condition = new Condition();
			$condition->set_data($_POST);
			$condition->add();
			
			redirect(base_url('/conditions'), 'refresh');
		}
	}

	public function edit($id = 0) {
		if($id!=0) {
			$condition = new Condition();
			$condition->set_id($id);
			
			$data = array(
				"condition" => $condition
			);
			
			$this->load->view("conditions/add", $data);
			
		} else {
			redirect(base_url('/conditions'), 'refresh');
		}
	}
	
	public function update() {
		$this->baselib->check_user_right_or_die("conditions-edit");
		$condition = new Condition();
		$condition->set_id($_POST['id']);
    	$condition->set_data($_POST);
		$condition->update();
		
		redirect(base_url('/conditions'), 'refresh');
	}
	
	public function delete($id = 0) {
		$this->baselib->check_user_right_or_die("conditions-edit");
		if($id!=0) {
			$condition = new Condition();
			$condition->set_id($id);
			$condition->delete();
		}
		
		redirect(base_url('/conditions'), 'refresh');
	}	
}

?>