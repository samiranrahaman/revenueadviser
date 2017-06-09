<?php
class Paymentsuccess extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			
			   $this->load->library('session');
			  // $this->load->model('Emailverify_model');				
		}
	

        public function index()
        {
			 $this->load->view("Paymentsuccess_view");
			
        }
        
      
		
}
