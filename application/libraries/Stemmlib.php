<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

require_once APPPATH."/third_party/Stemmer.php";

class Stemmlib extends Stemmer {
    public function clear_value($value) {
    	return $this->getWordBase($value);
    }
}