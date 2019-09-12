<?php
defined('BASEPATH') or exit('No direct script access allowed');

Class Util {
	protected $ci;

	function __construct(){
		$this->ci=& get_instance();
	}
	function is_logged(){

		if($this->ci->session->userdata('login')==null)
		{
			session_destroy();
			redirect(base_url());
		}

	}





}
