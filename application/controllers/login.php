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
			'action'	=> $this->template->base_url("masuk"),
		);
		$this->template->jquery(array('validation'));
		$this->load->view('login',$data);
	}

	public function masuk(){
		$usr = $this->input->post("username");
		$pwd = $this->input->post("password");

		$cek = $this->db->query("SELECT * FROM IF1_USER WHERE usr = '".$usr."' AND pwd = '".md5($pwd)."'");
		$res = $cek->num_rows();
		if($res != 0){
			$session = array(
				'id'		=> $cek->row()->id,
				'usr'		=> $cek->row()->usr,
				'pwd'		=> $cek->row()->pwd,
				'lvl'		=> $cek->row()->lvl,
				'status'	=> $cek->row()->status,
				'nama'		=> $cek->row()->nama,
			);
			$this->session->set_userdata("logged_in", $session);
			$session = $this->session->userdata('logged_in');
			redirect('home');

			$data_log = array(
				'last_login'	=> date('Y-m-d H:i:s')
			);
			$this->db->update('IF1_USER', $data_log, "WHERE ID = '".$session['id']."'");
		}else{
			echo "<script>alert('Login Failed.');</script>";
			redirect('login');
		}
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */