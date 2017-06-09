<?php
class Subscription extends CI_Controller {

		public function __construct()
		{ 
			parent::__construct();
			
			   //$this->load->library('session');
			 // $this->load->model('Stripepayment_model');				
		}
	

       /*  public function index()
        {
        	//$this->session->unset_userdata('user_info');
			$user_id =  $this->uri->segment(3);
			//$verificationcode =  $this->uri->segment(4);
			if($user_id>0)
			{
			$data['user_id'] =$user_id;
			//$data['verificationcode'] =$verificationcode;
			$this->load->view("subscription_view",$data);
			}
			else
			{
				 redirect('registration','refresh');
			}
        } */
        
      public function index()
        {
        	//$this->session->unset_userdata('user_info');
			 $user_id =  $this->uri->segment(3);
			$data['user_id'] =$user_id;
			//$data['verificationcode'] =$verificationcode;
			
			/* $this->load->view('front_header');
			$this->load->view("subscription_view",$data);
			$this->load->view('front_footer'); */
			
			$this->load->view("subscription_view",$data);
			
			
        }
		
}
