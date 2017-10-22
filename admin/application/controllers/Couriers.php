<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Couriers extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		$this->baselib->check_user_right_or_die("couriers-view");
		$this->load->library("courierlib");
    }	

	public function index()
	{
		$data = array(
			"couriers" => $this->courierlib->get_list()
		);
		$this->load->view("couriers/list", $data);		
	}

	public function add() {
		if(empty($_POST['name'])) {
			$this->load->view("couriers/add");
		} else {
			$courier = new Courier();
			$courier->set_data($_POST);
			$courier->add();
			
			redirect(base_url('/couriers'), 'refresh');
		}
	}

	public function edit($id = 0) {
		if($id!=0) {
			$courier = new Courier();
			$courier->set_id($id);
			
			$data = array(
				"courier" => $courier
			);
			
			$this->load->view("couriers/add", $data);
			
		} else {
			redirect(base_url('/couriers'), 'refresh');
		}
	}
	
	public function update() {
		$this->baselib->check_user_right_or_die("couriers-edit");
		$courier = new Courier();
		$courier->set_id($_POST['id']);
    	$courier->set_data($_POST);
		$courier->update();
		
		redirect(base_url('/couriers'), 'refresh');
	}
	
	public function delete($id = 0) {
		$this->baselib->check_user_right_or_die("couriers-edit");
		if($id!=0) {
			$courier = new Courier();
			$courier->set_id($id);
			$courier->delete();
		}
		
		redirect(base_url('/couriers'), 'refresh');
	}	
}

?>