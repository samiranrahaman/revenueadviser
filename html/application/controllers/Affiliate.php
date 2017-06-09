<?php
class Affiliate extends CI_Controller {

		public function __construct()
		{ 
			parent::__construct();
			
			   //$this->load->library('session');
			  //$this->load->model('Affiliate_model');				
		}
	

        public function index()
        {
        	
			 $user_id=$this->input->post('user_id');
			// $verificationcode=$this->input->post('verificationcode');
			 
			 //$plan_id=$this->input->post('plan_id');
			//exit;
			if($user_id>0)
			{
			$data['user_id'] =$user_id;
			
			//$this->load->view('front_header');
			$this->load->view("Affiliate_view",$data);
			//$this->load->view('front_footer');
			}
			else
			{
				 redirect('registration','refresh');
			}
        }
        
     
		
}
