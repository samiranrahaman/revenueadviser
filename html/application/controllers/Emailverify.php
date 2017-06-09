<?php
class Emailverify extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			
			   $this->load->library('session');
			   $this->load->model('Emailverify_model');				
		}
	

        public function index()
        {
			  $username =  $this->uri->segment(3);
			  $verificationcode =  $this->uri->segment(4);
			 //exit;
        	$this->session->unset_userdata('user_info');
			$this->load->view("Emailverify_view");
			 $success=$this->Emailverify_model->verify_email_credintial($username,$verificationcode);
			 if($success>0)
			 {
				 redirect('Login','refresh');
			 }
			  else
			 {
				echo "Authentication Failed!";
			 } 
				 
        }
        
      
		
}
