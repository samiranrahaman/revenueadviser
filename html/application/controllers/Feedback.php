<?php
class Feedback extends CI_Controller {

		public function __construct()
		{ 
			parent::__construct();
			
			   //$this->load->library('session');
			  $this->load->model('Feedback_model');				
		}
	

        public function index()
        {
        	//$this->session->unset_userdata('user_info');
			$this->load->view("feedback_view");
        }
        
       public function feedback_data()
        {        	
			  //$user_name=$this->input->post('username');
			 //$password=$this->input->post('passwrd');
			 
			 $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
			
		     $user_first_name = $request->user_first_name;
		     $user_feedback = $request->user_feedback;
			 $user_email_id = $request->user_email_id;
			 $subject=$request->subject;
			  //print_r($request); exit;
			 $success=$this->Feedback_model->feedback_data_post($user_first_name,$user_feedback,$user_email_id,$subject);	
			// $success=$this->Login_model->verify_login_credintial('admin','admin');	
			echo $success; 
			 
	            
			
		}
		
}
