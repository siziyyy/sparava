<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Importexport extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model("excel");
		$this->load->library("categorylib");
    }	
	
	public function index()	{
		$this->load->view("importexport/main");
	}
	
	public function download() {
		$excel = new Excel();
		
		if($_POST['category_id'] > 0) {
			$where = array('category_id',$_POST['category_id']);
		} else {
			$where = false;
		}
		
		$excel->download('products',$where);
	}
	
	public function upload()	{
		$excel = new Excel();
		$excel->upload($_FILES['import_file']['tmp_name']);
		
		redirect(base_url('/importexport'), 'refresh');
	}	
}