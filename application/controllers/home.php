<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
	parent::__construct();
	    $this->load->library('template');
	}
	public function index()
	{
		$data = array (
			'title'		=> "IF1 BP12 UPI YPTK | Welcome"
		);

		//$this->load->view('home', $data,'',TRUE);
		$this->template->display('home',$data);
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */