<?php
class Stripepaymentcancle extends CI_Controller {

		public function __construct()
		{ 
			parent::__construct();
			
			   //$this->load->library('session');
			  //$this->load->model('Stripepayment_model');				
		}
	

        public function index()
        {
			
			  $postdata = file_get_contents("php://input");
		      $request = json_decode($postdata);
		        $user_id = $request->user_id;
			   $str_customer_id = $request->str_customer_id; 
			   $str_sub_id = $request->str_sub_id; 
			  
			    /* $user_id = 13;
			  $str_customer_id = 'cus_AmNVhROATf0c1E';
			  $str_sub_id = 'sub_AmNVBx91ITyXXU'; */
			   
			//exit;
			
			if($user_id>0)
			{
				
			$data['user_id'] =$user_id;
			$data['str_customer_id'] =$str_customer_id;
			$data['str_sub_id'] =$str_sub_id;
			//$data['verificationcode'] =$verificationcode;
			
			
			
			$this->load->view("stripepaymentcancle_view",$data);
			}
			else
			{
				 redirect('registration','refresh');
			}
        }
        
     
		
}
