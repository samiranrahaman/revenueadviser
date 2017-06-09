<?php
/*
  Description : Controller for Profile
  Author      : Samiran
  Date        : 6/2/2017
*/
class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		 $this->load->library('session');
		$this->load->model('Profile_model');

		if(!$this->session->userdata('user_info'))
		{
		   redirect('Login');
		} 			
	}
	public function index()
    {   
      $data['user_info'] =$this->session->userdata('user_info');
	   $data['subscription'] =$this->Profile_model->subscription_details($data['user_info']->user_interanal_id); 
	  $this->load->view('common_header',$data);
      $this->load->view('common_sidemenu',$data);
      $this->load->view('Profile/Main',$data);
	  $this->load->view('common_footer');        	
    }
}