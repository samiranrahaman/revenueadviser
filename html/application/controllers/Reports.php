<?php
/*
  Description : Controller for Reports
  Author      : Samiran
  Date        : 6/2/2017
*/
class Reports extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		 $this->load->library('session');
		$this->load->model('Reports_model');

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
      $this->load->view('Reports/Main');
	 // $this->load->view('Dashboard/Main',$data);
      $this->load->view('common_footer');        	
    }
	public function get_setup_productlist()
    {
		    
		$success=$this->Reports_model->get_setup_productlist();	
		echo json_encode($success);
		
	}
	public function viewreport()
    {
		 $data['user_info'] =$this->session->userdata('user_info');
	     $reportID =  $this->uri->segment(3);   
		$success=$this->Reports_model->view_setup_product($reportID); 
		$data['resultview']=$success;
         //echo "<pre>"; print_r($success);	exit;	 
		//echo json_encode($success);	
		  $this->load->view('common_header',$data);
		  $this->load->view('common_sidemenu',$data);
		  $this->load->view('Reports/Report');
		 // $this->load->view('Dashboard/Main',$data);
		  $this->load->view('common_footer');  
	  
		
		
	}
	public function yearly_reports()
    {   
      $data['user_info'] =$this->session->userdata('user_info');
      $this->load->view('common_header',$data);
      $this->load->view('common_sidemenu',$data);
      $this->load->view('Reports/Yearly');
      $this->load->view('common_footer');        	
    }
	public function daily_reports()
    {   
      $data['user_info'] =$this->session->userdata('user_info');
      $this->load->view('common_header',$data);
      $this->load->view('common_sidemenu',$data);
      $this->load->view('Reports/dailyreport');
      $this->load->view('common_footer');        	
    }
	public function report_delete()
    { $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    $id = $request->id;
			 //$id=18;
		$success=$this->Reports_model->report_delete($id);	
		echo json_encode($success);
		
	}
	public function get_reports_data()
    {
		    $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    $datevalue = $request->datevalue;
			//$datevalue='2017';
		$success=$this->Reports_model->get_reports_data($datevalue);	
		echo json_encode($success);
		
	}
	
	public function get_dailyreports_data()
    {
		    $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    //$datevalue = $request->datevalue;
			$datevalue='2017';
		$success=$this->Reports_model->get_dailyreports_data($datevalue);	
		echo json_encode($success);
		
	}
	
	public function get_analysis_data()
    {
		    $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata); 
		     $datevalue1 = $request->datevalue1; 
			 $datevalue2 = $request->datevalue2; 
			  $report_id=$request->report_id;  
		
     		/* $datevalue1='2017-02-23';
			$datevalue2='2017-04-23'; 
			$report_id=0; */
			
		$success=$this->Reports_model->get_analysis_data($datevalue1,$datevalue2,$report_id);	
		echo json_encode($success);
		
	} 
	public function get_prev_analysis_data()
    {
		    $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata); 
		     $datevalue1 = $request->datevalue1; 
			 $datevalue2 = $request->datevalue2; 
			  $report_id=$request->report_id; 
			 /* $datevalue1='2017-02-23';  
			$datevalue2='2017-04-23'; 
			$report_id=0; */
		$success=$this->Reports_model->get_prev_analysis_data($datevalue1,$datevalue2,$report_id);	
		echo json_encode($success);
		
	}
	public function get_analysis_graph_data()
    {
		    $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata); 
		      $datevalue1 = $request->datevalue1; 
			$datevalue2 = $request->datevalue2; 
			$report_id=$request->report_id;   
			 /*  $datevalue1 = '2017-03-14'; 
			 $datevalue2 = '2017-04-01'; 
			  $report_id=0; */  
			
		$success=$this->Reports_model->get_analysis_graph_data($datevalue1,$datevalue2,$report_id);	
		echo json_encode($success);
		
	}
    
 }