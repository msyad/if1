<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct(){
		parent::__construct();

	}

	public function index()
	{
		$data = array (
			'title'		=> "IF1 BP12 UPI YPTK | Welcome",
			'action'	=> "login",
		);
		$this->load->view('login',$data);
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */