<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rule extends Fruitcrm {
	
	public function add()  {
	
		//$this->baselib->check_user_right_or_die("rule-add");
		
		$data = array(
			'group_id' => $this->_data['group_id'],
			'right_id' => $this->_data['right_id'],
			'value' => $this->_data['value']
		);

		if ($this->db->insert("rules", $data))  {
			return true;
		} else { 
			return false;
		}

	}

	public function update()  {
	
		//$this->baselib->check_user_right_or_die("rule-edit");
	
		$where = array(
			'group_id' => $this->_data['group_id'],
			'right_id' => $this->_data['right_id']
		);
		
		if ($this->db->update("rules",array("value" => $this->_data['value']),$where))  {
			return true;
		} else { 
			return false;
		}
	}
}

?>