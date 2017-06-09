<?php
/*
  Description : Controller for Department Management
  Author      : Deepak kv
  Date        : 18/08/2016
*/
class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		 $this->load->library('session');
		$this->load->model('dashboard_model');

		if(!$this->session->userdata('user_info'))
		{
		   redirect('Login');
		} 			
	}
	public function index()
    {   
      $data['user_info'] =$this->session->userdata('user_info');
     $this->load->view('common_header',$data);
      $this->load->view('common_sidemenu',$data);
      $this->load->view('Welcome/Main');
	 // $this->load->view('Dashboard/Main',$data);
      $this->load->view('common_footer');        	
    }
    
 }