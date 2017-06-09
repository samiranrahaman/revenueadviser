<?php
/*
  Description : Controller for Newproductadd
  Author      : Deepak kv
  Date        : 18/08/2016
*/
class Newproductadd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		 $this->load->library('session');
		
		$this->load->model('Suppliercost_model');
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
      $this->load->view('common_header',$data);
      $this->load->view('common_sidemenu',$data);
      $this->load->view('Newproductadd/Main');
	 // $this->load->view('Dashboard/Main',$data);
      $this->load->view('common_footer');        	
    }
	public function othercost()
	{
		//echo $id;exit;
	   $reportID =  $this->uri->segment(3);
		$data['user_info'] =$this->session->userdata('user_info');
		$data['reportID'] =$reportID;
	 // $this->reports_model->get_reports_data();
	 // $success=$this->Suppliercost_model->edit_report_data($reportID);
      // $data['edit']=$success;
	  
      $this->load->view('common_header',$data);
      $this->load->view('common_sidemenu',$data);
      $this->load->view('Newproductadd/Othercost');
	 // $this->load->view('Dashboard/Main',$data);
      $this->load->view('common_footer');
	}
	public function othercostedit()
	{
		//echo $id;exit;
	    $reportID =  $this->uri->segment(3);
		$data['user_info'] =$this->session->userdata('user_info');
		$data['reportID'] =$reportID;
	 // $this->reports_model->get_reports_data();
	 // $success=$this->Suppliercost_model->edit_report_data($reportID);
     //  $data['edit']=$success;
	  
      $this->load->view('common_header',$data);
      $this->load->view('common_sidemenu',$data);
      $this->load->view('Newproductadd/Othercostedit');
	 // $this->load->view('Dashboard/Main',$data);
      $this->load->view('common_footer');
	}
	public function complete()
	{
		//echo $id;exit;
	   $reportID =  $this->uri->segment(3);
		$data['user_info'] =$this->session->userdata('user_info');
		$data['reportID'] =$reportID;
	 // $this->reports_model->get_reports_data();
	 // echo $success=$this->Reports_model->get_reports_data($account_name,$apikey,$password,$url);	
      $this->load->view('common_header',$data);
      $this->load->view('common_sidemenu',$data);
      $this->load->view('Newproductadd/Complete');
	 // $this->load->view('Dashboard/Main',$data);
      $this->load->view('common_footer');
	}
	
 }