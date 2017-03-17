<?php  

	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Register extends CI_Controller {
		    
		function __construct(){
			parent::__construct();

		}

	    function index() {
	        $data = array(
	        	'title' 	=> 'IF1 BP12 UPI YPTK | Welcome',
	        	'action'	=> $this->template->base_url("/daftar"),
	        );
	        $this->template->jquery(array('validation'));
	        $this->load->view('register',$data);
	    }

	    function daftar(){
	    	$nama = $this->input->post('nama');
	    	$usr = $this->input->post('username');
	    	$pwd = $this->input->post('password');
	    	$tgl_reg = date('Y-m-d');
	    	$status = 1;

	    	$data = array(
	    		'usr'	=> $nama,
	    		'pwd'	=> md5($pwd),
	    		'nama'	=> $nama,
	    		'tgl_reg'	=> $tgl_reg,
	    		'status'	=> $status,
	    	);
	    	$this->db->insert('IF1_USER', $data);
	    	echo json_encode($data);
	    }
	}
	        


?>