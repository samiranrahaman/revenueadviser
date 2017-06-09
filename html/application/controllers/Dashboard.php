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
		$this->load->model('Dashboard_model');

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
      $this->load->view('Dashboard/Main');
	 // $this->load->view('Dashboard/Main',$data);
      $this->load->view('common_footer');        	
    }
	public function get_shipping_analysis()
    {
		$data['user_info'] =$this->session->userdata('user_info');
		 // print_r($data);  
		$user_id=$data['user_info']->user_interanal_id;
		$success=$this->Dashboard_model->get_shipping_analysis($user_id);	
		echo json_encode($success);
		
	}
	public function get_order_analysis() 
    {
		 $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    $countrycode = $request->countrycode;
		   // $countrycode = 0;
			
		$success=$this->Dashboard_model->get_order_analysis($countrycode);	
		echo json_encode($success);
	}
    
 }