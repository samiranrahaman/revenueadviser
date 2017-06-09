<?php
class Stripepayment extends CI_Controller {

		public function __construct()
		{ 
			parent::__construct();
			
			   //$this->load->library('session');
			  $this->load->model('Stripepayment_model');				
		}
	

        public function index()
        {
        	//$this->session->unset_userdata('user_info');
			//$user_id =  $this->uri->segment(3);
			//$package=$_POST['package'];
			/* $package=$this->input->post('package');
			$datavalue=explode(",",$package);
			 $plan_id=$datavalue[0];
			 $amount=$datavalue[1]; */
			 $user_id=$this->input->post('user_id');
			// $verificationcode=$this->input->post('verificationcode');
			 
			 //$plan_id=$this->input->post('plan_id');
			//exit;
			if($user_id>0)
			{
				$package=$this->input->post('package');
			$datavalue=explode(",",$package);
			 $plan_id=$datavalue[0];
			 $amount=$datavalue[1];
			 
			 
			$data['user_id'] =$user_id;
			$data['plan_id'] =$plan_id;
			$data['amount'] =$amount;
			$data['package'] =$package;
			//$data['verificationcode'] =$verificationcode;
			
			$this->load->view("stripepayment_view",$data);
			}
			else
			{
				 redirect('registration','refresh');
			}
        }
        
     
		
}
