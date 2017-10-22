<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {

    function __construct()
    {
        parent::__construct();
		$this->baselib->check_user_right_or_die("categories-view");
		$this->load->library("categorylib");
    }	

	public function index()
	{
		$data = array(
			"categories" => $this->categorylib->get_list()
		);
		$this->load->view("categories/list", $data);		
	}

	public function add() {
		if(empty($_POST['title'])) {
			$this->load->view("categories/add");
		} else {
			$category = new Category();
			$category->set_data($_POST);
			$category->add();
			
			redirect(base_url('/categories'), 'refresh');
		}
	}

	public function edit($id = 0) {
		if($id!=0) {
			$category = new Category();
			$category->set_id($id);
			
			$data = array(
				"category" => $category
			);
			
			$this->load->view("categories/add", $data);
			
		} else {
			redirect(base_url('/categories'), 'refresh');
		}
	}
	
	public function update() {
		$this->baselib->check_user_right_or_die("categories-edit");
		$category = new Category();
		$category->set_id($_POST['id']);
    	$category->set_data($_POST);
		$category->update();
		
		redirect(base_url('/categories'), 'refresh');
	}
	
	public function delete($id = 0) {
		$this->baselib->check_user_right_or_die("categories-edit");
		if($id!=0) {
			$category = new Category();
			$category->set_id($id);
			$category->delete();
		}
		
		redirect(base_url('/categories'), 'refresh');
	}	
}

?>