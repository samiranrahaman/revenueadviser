<?php
/*
  Description : Controller for Home
  Author      : samiran
  Date        : 04/30/2017
*/
class Howitwork extends CI_Controller {

	
		public function __construct()
		{
			parent::__construct();
			
			   $this->load->library('session');
			 //  $this->load->model('Login_model');				
		}
	

        public function index()
        {
        	$this->session->unset_userdata('user_info');
			
			$this->load->view('front_header');
			$this->load->view("howitwork_view");
			$this->load->view('front_footer');
        }
    
 }