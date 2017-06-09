<?php
/*
  Description : Controller for Miscellaneous
  Author      : Deepak kv
  Date        : 18/08/2016
*/
class Miscellaneous extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		 $this->load->library('session');
		//$this->load->model('Reports_model');
			$this->load->model('Miscellaneous_model');
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
      $this->load->view('Miscellaneous/Main');
	 // $this->load->view('Dashboard/Main',$data);
      $this->load->view('common_footer');        	
    }
	
 
	public function post_miscellaneous()
	{
		    $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		     $cost = $request->cost;
			 $title = $request->title;
			 $datetime = $request->datetime; 
			 /* $cost =1;
			 $title = 'gggg';
			 $datetime = '10'; */
			 
			  //$quantity = 1;
			// $cost = 3;
		$success=$this->Miscellaneous_model->post_miscellaneous($cost,$title,$datetime);	
		//echo $success=1;
		echo json_encode($success);
	}
	
    public function get_miscellaneous()
    {
		
		$success=$this->Miscellaneous_model->get_miscellaneous();	
		echo json_encode($success);
		//echo 1;
		
	}
	public function miscellaneous_delete()
    {
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    $id = $request->id;
			 //$id=18;
		$success=$this->Miscellaneous_model->miscellaneous_delete($id);	
		echo json_encode($success);
		//echo 1;
		
	}
 }