<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statuses extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		$this->baselib->check_user_right_or_die("statuses-view");
		$this->load->library("statuslib");
    }	

	public function index()
	{
		$data = array(
			"statuses" => $this->statuslib->get_list()
		);
		$this->load->view("statuses/list", $data);		
	}

	public function add() {
		if(empty($_POST['title'])) {
			$this->load->view("statuses/add");
		} else {
			$status = new Status();
			$status->set_data($_POST);
			$status->add();
			
			redirect(base_url('/statuses'), 'refresh');
		}
	}

	public function edit($id = 0) {
		if($id!=0) {
			$status = new Status();
			$status->set_id($id);
			
			$data = array(
				"status" => $status
			);
			
			$this->load->view("statuses/add", $data);
			
		} else {
			redirect(base_url('/statuses'), 'refresh');
		}
	}
	
	public function update() {
		$this->baselib->check_user_right_or_die("statuses-edit");
		$status = new Status();
		$status->set_id($_POST['id']);
    	$status->set_data($_POST);
		$status->update();
		
		redirect(base_url('/statuses'), 'refresh');
	}
	
	public function delete($id = 0) {
		$this->baselib->check_user_right_or_die("statuses-edit");
		if($id!=0) {
			$status = new Status();
			$status->set_id($id);
			$status->delete();
		}
		
		redirect(base_url('/statuses'), 'refresh');
	}	
}

?>