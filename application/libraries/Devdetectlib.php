<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

require_once APPPATH."/third_party/Mobile_Detect.php";

class Devdetectlib extends Mobile_Detect {
    public function is_mobile() {
    	return ($this->isMobile() && !$this->isTablet());
    }
}