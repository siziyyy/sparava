<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offices extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		$this->load->library("officelib");
    }	

	public function index()
	{
		$data = array(
			"offices" => $this->officelib->get_list()
		);
		$this->load->view("offices/list", $data);		
	}

	public function add() {
		if(empty($_POST['name'])) {
			$this->load->view("offices/add");
		} else {
			$office = new Office();
			$office->set_data($_POST);
			$office->add();
			
			redirect(base_url('/offices'), 'refresh');
		}
	}

	public function edit($id = 0) {
		if($id!=0) {
			$office = new Office();
			$office->set_id($id);
			
			$data = array(
				"office" => $office
			);
			
			$this->load->view("offices/add", $data);
			
		} else {
			redirect(base_url('/offices'), 'refresh');
		}
	}
	
	public function update() {
		$office = new Office();
		$office->set_id($_POST['id']);
    	$office->set_data($_POST);
		$office->update();
		
		redirect(base_url('/offices'), 'refresh');
	}
	
	public function delete($id = 0) {
		if($id!=0) {
			$office = new Office();
			$office->set_id($id);
			$office->delete();
		}
		
		redirect(base_url('/offices'), 'refresh');
	}	
}

?>