<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rights extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		$this->load->library("rightlib");
    }	

	public function index()
	{
		$data = array(
			"rights" => $this->rightlib->get_list()
		);
		$this->load->view("rights/list", $data);		
	}

	public function add() {
		if(empty($_POST['name'])) {
			$this->load->view("rights/add");
		} else {
			$right = new Right();
			$right->set_data($_POST);
			$right->add();
			
			redirect(base_url('/rights'), 'refresh');
		}
	}

	public function edit($id = 0) {
		if($id!=0) {
			$right = new Right();
			$right->set_id($id);
			
			$data = array(
				"right" => $right
			);
			
			$this->load->view("rights/add", $data);
			
		} else {
			redirect(base_url('/rights'), 'refresh');
		}
	}
	
	public function update() {
		$right = new Right();
		$right->set_id($_POST['id']);
    	$right->set_data($_POST);
		$right->update();
		
		redirect(base_url('/rights'), 'refresh');
	}
	
	public function delete($id = 0) {
		if($id!=0) {
			$right = new Right();
			$right->set_id($id);
			$right->delete();
		}
		
		redirect(base_url('/rights'), 'refresh');
	}	
}

?>