<?php

	class Template{

		protected $_ci;
		function __construct(){
			$this->_ci=&get_instance();
		}

		function display($template,$data=null){
			$data['main']=$this->_ci->load->view('main',$data, true);
			$data['navTop']=$this->_ci->load->view('nav-top',$data, true);
			$data['navSide']=$this->_ci->load->view('nav-side',$data, true);
			$data['footer']=$this->_ci->load->view('footer',$data, true);
			$this->_ci->load->view('home.php',$data);
		}

	}