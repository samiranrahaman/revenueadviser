<?php
class Stripepaymentupgrade extends CI_Controller {

		public function __construct()
		{ 
			parent::__construct();
			
			   //$this->load->library('session');
			  //$this->load->model('Stripepayment_model');				
		}
	

        public function index()
        {
			
			  //$postdata = file_get_contents("php://input");
		      //$request = json_decode($postdata);
		       $user_id = $this->input->post('user_id');
				
			 
			if($user_id>0)
			{
			/* $str_customer_id = $request->str_customer_id;	
			$stripe_payment_history_id = $request->stripe_payment_history_id;	
			
			
			$package=$request->package; */
			$str_customer_id = $this->input->post('str_customer_id');	
			$stripe_payment_history_id =  $this->input->post('stripe_payment_history_id');	
			
			
			$package=$this->input->post('package');
			$datavalue=explode(",",$package);
			 $plan_id=$datavalue[0];
			 $amount=$datavalue[1];
			 
			 
			$data['user_id'] =$user_id;
			$data['plan_id'] =$plan_id;
			$data['amount'] =$amount;
			$data['package'] =$package;
          
			$data['str_customer_id'] =$str_customer_id;
			$data['stripe_payment_history_id'] =$stripe_payment_history_id;
			
				
				/* 
			$data['user_id'] =$user_id;
			$data['str_customer_id'] =$str_customer_id;
			$data['str_sub_id'] =$str_sub_id; */
			//$data['verificationcode'] =$verificationcode;
			
			
			
			$this->load->view("stripepaymentupgrade_view",$data);
			}
			else
			{
				 redirect('registration','refresh');
			}
        }
        
     
		
}
