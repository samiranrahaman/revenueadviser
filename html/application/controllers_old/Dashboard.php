<?php
/*
  Description : Controller for Department Management
  Author      : Deepak kv
  Date        : 18/08/2016
*/
class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		 $this->load->library('session');
		/*$this->load->model('dashboard_model');

		if(!$this->session->userdata('user_info'))
		{
		   redirect('Login');
		} */			
	}
	public function index()
    {   
      
      $this->load->view('common_header');
      $this->load->view('common_sidemenu');
      $this->load->view('Dashboard/Main');
	 // $this->load->view('Dashboard/Main',$data);
      $this->load->view('common_footer');        	
    }
    
 }