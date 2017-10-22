<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		$this->load->library("userlib");
		$this->load->library("grouplib");
		$this->load->library("officelib");		
    }	

	public function index()
	{
		$data = array(
			"users" => $this->userlib->get_list()
		);
		$this->load->view("users/list", $data);		
	}

	public function add() {
		if(empty($_POST['name'])) {
			$this->load->view("users/add");
		} else {
			$user = new User();
			$user->set_data($_POST);
			$user->add();
			
			redirect(base_url('/users'), 'refresh');
		}
	}

	public function edit($id = 0) {
		if($id!=0) {
			$user = new User();
			$user->set_id($id);
			
			$data = array(
				"user" => $user
			);
			
			$this->load->view("users/add", $data);
			
		} else {
			redirect(base_url('/users'), 'refresh');
		}
	}
	
	public function update() {
		
		$user = new User();
		$user->set_id($_POST['id']);
		$user->set_data($_POST);
		$user->update();
		
		redirect(base_url('/users'), 'refresh');
	}
	
	public function delete($id = 0) {
		if($id!=0) {
			$user = new User();
			$user->set_id($id);
			$user->delete();
		}
		
		redirect(base_url('/users'), 'refresh');
	}	
}

?>