<?php  

	if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Register extends CI_Controller {
		    
		function __construct(){
			parent::__construct();

		}

	    function index() {
	        $data = array(
	        	'title' 	=> 'IF1 BP12 UPI YPTK | Welcome',
	        	'action'	=> $this->template->base_url("daftar"),
	        );
	        $this->template->jquery(array('validation'));
	        $this->load->view('register',$data);
	    }

	    function daftar(){
	    	$nama = clean($this->input->post('nama'));
	    	$usr = clean($this->input->post('username'));
	    	$pwd = clean($this->input->post('password'));
	    	$tgl_reg = date('Y-m-d');
	    	$status = 1;
	    	$level = 1;

	    	$data = array(
	    		'usr'	=> $usr,
	    		'pwd'	=> md5($pwd),
	    		'nama'	=> $nama,
	    		'tgl_reg'	=> $tgl_reg,
	    		'status'	=> $status,
	    		'lvl'	=> $level,
	    	);
	    	$this->db->insert('IF1_USER', $data);
	    	redirect('login');
	    }

	    function cek_data(){
	    	$nama = clean($this->input->get('nama'));
	    	$usr = clean($this->input->get('usr'));
	    	$sql = $this->db->query("SELECT ID FROM IF1_USER WHERE nama ='".$nama."' AND usr='".$usr."'");
	    	if($sql->num_rows() == 0){
	    		echo json_encode(0);
	    	}else{
	    		echo json_encode($sql->row());
	    	}
	    }

	}