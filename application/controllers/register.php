<?php  

	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Register extends CI_Controller {
		    
	    function index() {
	        $data = array('title' => 'Register');
	        $this->load->view('register',$data);
	    }
	}
	        


?>