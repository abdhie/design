<?php
class users {

	protected $CI;
	public function access_page(){
		$this->CI = &get_instance();
		return $this->CI->session->userdata('email') == true;
	}
}
?>
