<?php

	class Template{

		protected $_ci;
		private $_base_url = '';
		private $_css			= '';		
		private $_javascript	= '';
		private $_controller	= '';
		private $_submodul		= '';
		private $_base_link		= '';
		private $_jquery = array (
	
			'datepicker' 	=> array (
					'dir'	=> 'assets/plugins/datepicker',
					'css'	=> array('datepicker3'),
					'js'	=> array('bootstrap-datepicker'),
			),
			'validation' 	=> array (
					'dir'	=> 'assets/plugins/validate',
					'js'	=> array('jquery.validation'),
			),
		);

		function __construct(){
			$this->_ci=&get_instance();
			$submodul	= $this->_ci->uri->segment(1);
			$controller	= $this->_ci->uri->segment(2);
			
			$this->_base_url	= site_url($submodul.'/'.$controller);
			$this->_base_link	= site_url($submodul);
			
			$this->_submodul	= ucwords(str_replace('_', ' ', $submodul));


		}

		function display($template,$data=null){
			// $data['main']=$this->_ci->load->view('main',$data, true);
			$data['title']	= "IF1 BP12 UPI YPTK";
			$data['navTop']=$this->_ci->load->view('nav-top',$data, true);
			$data['navSide']=$this->_ci->load->view('nav-side',$data, true);
			$data['footer']=$this->_ci->load->view('footer',$data, true);
			$data['content']=$this->_ci->load->view($template,$data, true);
			$this->_ci->load->view('templates/template.php',$data);
		}

		function set_base_url($url){
			$this->_base_url = $url;
		}

		function base_url($uri = ''){
			// check first slash
			// if ($uri != '') {
			// 	if ($uri[0] != '/') {
			// 		$uri = '/'.$uri;
			// 	}
			// }
			
			// return the base URL
			return $this->_base_url.$uri;
		}


		public function jquery($plugins = array()){
			$list = $this->_jquery;
			
			foreach ($plugins as $p) {
				if(isset($list[$p]['css'])){
					foreach ($list[$p]['css'] as $css) {
						$this->_css .= 
							'<link rel="stylesheet" href="'.base_url().$list[$p]['dir'].'/'.$css.'.css" type="text/css" />';
					}
				}
				if(isset($list[$p]['js'])){
					foreach ($list[$p]['js'] as $js) {
						$this->_javascript .= 
							'<script type="text/javascript" src="'.base_url().$list[$p]['dir'].'/'.$js.'.js"></script>';
					}
				}
			}
		}
	}