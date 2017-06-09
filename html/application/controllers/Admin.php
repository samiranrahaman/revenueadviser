<?php
class Admin extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			
			   $this->load->library('session');
			   $this->load->model('Admin_model');				
		}
	

        public function index()
        {
        	$this->session->unset_userdata('user_info');
			$this->load->view("Admin/Login");
        }
        
        public function verify_login()
        {        	
			 //$user_name=$this->input->post('username');
			 //$password=$this->input->post('passwrd');
			 
			 $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		     $username = $request->username;
		     $password = $request->passwrd;
			 
			 $success=$this->Admin_model->verify_login_credintial($username,$password);	
			// $success=$this->Login_model->verify_login_credintial('admin','admin');	
			// print_r($success);	
			 if(is_array($success)) 
			 {
			 	
			 	$this->session->set_userdata('admin_info',$success[0]);
			 	//echo true;
			    $return_value=array('status'=>"1");
				echo json_encode($return_value);
			 }
			 else
			 {
				// echo false;
				$return_value=array('status'=>"0");
				echo json_encode($return_value);
			 } 
			 
	            
			
		}
		

		public function logout()
		{
			$this->session->unset_userdata('admin_info');
			redirect('Login','refresh');
		}
		
		 public function dashboard()
        {
			
		   $data['admin_info'] =$this->session->userdata('admin_info');
		  $this->load->view('admin_common_header',$data);
		  $this->load->view('admin_common_sidemenu',$data);
		  $this->load->view('Admin/Dashboard');
		  // $this->load->view('Dashboard/Main',$data);
		  $this->load->view('admin_common_footer');  
        }
		public function userlist()
        {
			
		   $data['admin_info'] =$this->session->userdata('admin_info');
		  $this->load->view('admin_common_header',$data);
		  $this->load->view('admin_common_sidemenu',$data);
		  $this->load->view('Admin/Userlist');
		  // $this->load->view('Dashboard/Main',$data);
		  $this->load->view('admin_common_footer');  
        }
		public function getuserlist()
		{
			$success=$this->Admin_model->get_userlist();	
		    echo json_encode($success);
		}
}
