<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Devices extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		$this->baselib->check_user_right_or_die("devices-view");
		$this->load->library("devicelib");
    }	

	public function index()
	{
		$data = array(
			"devices" => $this->devicelib->get_list()
		);
		$this->load->view("devices/list", $data);		
	}

	public function add() {
		if(empty($_POST['name'])) {
			$this->load->view("devices/add");
		} else {
			$device = new Device();
			$device->set_data($_POST);
			$device->add();
			
			redirect(base_url('/devices'), 'refresh');
		}
	}

	public function edit($id = 0) {
		if($id!=0) {
			$device = new Device();
			$device->set_id($id);
			
			$data = array(
				"device" => $device
			);
			
			$this->load->view("devices/add", $data);
			
		} else {
			redirect(base_url('/devices'), 'refresh');
		}
	}
	
	public function update() {
		$this->baselib->check_user_right_or_die("devices-edit");
		$device = new Device();
		$device->set_id($_POST['id']);
    	$device->set_data($_POST);
		$device->update();
		
		redirect(base_url('/devices'), 'refresh');
	}
	
	public function delete($id = 0) {
		$this->baselib->check_user_right_or_die("devices-edit");
		if($id!=0) {
			$device = new Device();
			$device->set_id($id);
			$device->delete();
		}
		
		redirect(base_url('/devices'), 'refresh');
	}	
}

?>