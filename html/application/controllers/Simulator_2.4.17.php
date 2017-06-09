<?php
/*
  Description : Controller for Simulator
  Author      : Deepak kv
  Date        : 18/08/2016
*/
class Simulator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		 $this->load->library('session');
		$this->load->model('Simulator_model');

		if(!$this->session->userdata('user_info'))
		{
		   redirect('Login');
		} 			
	}
	public function index()
    {   
      $data['user_info'] =$this->session->userdata('user_info');
	 // $this->reports_model->get_reports_data();
	 // echo $success=$this->Reports_model->get_reports_data($account_name,$apikey,$password,$url);	
      $this->load->view('common_header');
      $this->load->view('common_sidemenu',$data);
      $this->load->view('Simulator/Main');
	 // $this->load->view('Dashboard/Main',$data);
      $this->load->view('common_footer');        	
    }
	
	
	
	public function get_champain_reports()
    {   
            //$postdata = file_get_contents("php://input");
		    // $request = json_decode($postdata);
		   // $datevalue = $request->datevalue;
			//$datevalue='2016';
		$success=$this->Simulator_model->get_champain_reports();	
		echo json_encode($success);     	
    }
	
    
 }