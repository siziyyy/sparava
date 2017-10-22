<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rules extends CI_Controller {
	
    function __construct()
    {
        parent::__construct();
		$this->load->library("grouplib");
		$this->load->library("rulelib");
    }		

	public function index()
	{		
		$data = array(
			"groups" => $this->grouplib->get_list()
		);
		$this->load->view("rules/list", $data);
	}
	
	public function edit($group_id = 0)
	{
		if($group_id>0) {
			$data["rules"] = $this->rulelib->get_list($group_id);
			$data["group_id"] = $group_id;
			
			$this->load->view("rules/edit", $data);
		} else {
			redirect(base_url('/rules'), 'refresh');
		}
	}
	
	public function update()
	{
		$exist_rules = $this->rulelib->get_exist_rules($_POST["id"]);
		foreach ($_POST as $key => $value) {
			if(is_int((int)$key) and $key>0) {
				
				$data = array(
					"group_id" => $_POST["id"],
					"right_id" => $key,
					"value" => $value,
				);
				
				$rule = new Rule();
				$rule->set_data($data);				
				
				if(in_array($key,$exist_rules)) {
					$rule->update();
				} else {
					$rule->add();
				}
			}
		}
	
		redirect(base_url('/rules'), 'refresh');
	}

}

?>