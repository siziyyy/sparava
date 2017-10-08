<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Fruitcrm extends CI_Model {
	
	protected $_id;
	protected $_data = array();

	public function get_id() 		{	return $this->_id;	}
	public function set_id($id)		{	$this->_id = $id;	}
	
	public function get_data()  		{	return $this->_data;	}
	
	public function set_data($value) 	{
		$this->_data = array();
		$this->_data = $value;	
	}
	
}
