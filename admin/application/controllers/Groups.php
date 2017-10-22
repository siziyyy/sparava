<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groups extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		$this->load->library("grouplib");
    }	

	public function index()
	{
		$data = array(
			"groups" => $this->grouplib->get_list()
		);
		$this->load->view("groups/list", $data);		
	}

	public function add() {
		if(empty($_POST['name'])) {
			$this->load->view("groups/add");
		} else {
			$group = new Group();
			$group->set_data($_POST);
			$group->add();
			
			redirect(base_url('/groups'), 'refresh');
		}
	}

	public function edit($id = 0) {
		if($id!=0) {
			$group = new Group();
			$group->set_id($id);
			
			$data = array(
				"group" => $group
			);
			
			$this->load->view("groups/add", $data);
			
		} else {
			redirect(base_url('/groups'), 'refresh');
		}
	}
	
	public function update() {
		$group = new Group();
		$group->set_id($_POST['id']);
    	$group->set_data($_POST);
		$group->update();
		
		redirect(base_url('/groups'), 'refresh');
	}
	
	public function delete($id = 0) {
		if($id!=0) {
			$group = new Group();
			$group->set_id($id);
			$group->delete();
		}
		
		redirect(base_url('/groups'), 'refresh');
	}	
}

?>