<?php
/*
  Description : Controller for Suppliercost
  Author      : Deepak kv
  Date        : 18/08/2016
*/
class Suppliercost extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		 $this->load->library('session');
		$this->load->model('Reports_model');
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
      $this->load->view('Suppliercost/Main');
	 // $this->load->view('Dashboard/Main',$data);
      $this->load->view('common_footer');        	
    }
	
    public function get_productlist()
    {
		
		$success=$this->Reports_model->get_productlist();	
		echo json_encode($success);
		//echo 1;
		
	}
	public function get_storelist()
    {
		
		$success=$this->Reports_model->get_storelist();	
		echo json_encode($success);
		//echo 1;
		
	}
	public function get_campaignlist()
    {
		 $data['user_info']=$this->session->userdata('user_info');
			  $user_id= $data['user_info']->user_interanal_id;
		$success=$this->Reports_model->get_campaignlist($user_id);	
		echo json_encode($success);
		//echo 1;
		
	}
	public function supplierproduct_cost_list()
    {
		
		$success=$this->Suppliercost_model->supplierproduct_cost_list();	
		echo json_encode($success);
		//echo 1;
		
	}
	public function supplierproduct_delete()
    {
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    $id = $request->id;
			 //$id=18;
		$success=$this->Suppliercost_model->supplierproduct_delete($id);	
		echo json_encode($success);
		//echo 1;
		
	}
	public function post_suppliercost()
	{
		    $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		     $reportname = $request->reportname;
			 $pvalue = $request->pvalue;
			 $plabel = $request->plabel;
			 $svalue = $request->svalue;
			 $slabel=$request->slabel;
			  //$quantity = 1;
			// $cost = 3;
		$success=$this->Suppliercost_model->post_suppliercost($reportname,$pvalue,$plabel,$svalue,$slabel);	
		//echo $success=1;
		echo json_encode($success);
	}
	public function post_suppliercost_other()
	{
		    $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
			 //print_r($request);exit;
			 $dist_cost = $request->dist_cost;
			  $dist_shippingcost = $request->dist_shippingcost;
			 $reportid=$request->reportid; 
			 
			 $packaging=$request->packaging; 
			 $ship_delevery=$request->ship_delevery; 
			 $gate_charge_fix=$request->gate_charge_fix; 
			 $gate_charge_percent=$request->gate_charge_percent; 
			 $desire_margin=$request->desire_margin;
             $fb_ads_campaign=$request->fb_ads_campaign;			 
			 
			 
		$success=$this->Suppliercost_model->post_suppliercost_other($dist_cost,$dist_shippingcost,$reportid,$packaging,$ship_delevery,$gate_charge_fix,$gate_charge_percent,$desire_margin,$fb_ads_campaign);	
		//echo $success=1;
		echo json_encode($success);
	}
	public function get_suppliercost_other()
    {
		
		    $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
			$reportID = $request->reportid;
		  //$reportID =  $this->uri->segment(3);
		  //$reportID=12;
		$success=$this->Suppliercost_model->get_suppliercost_otherlist($reportID);	
		echo json_encode($success);
		//echo 1;
		
	}
	
 }