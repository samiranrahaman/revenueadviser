<?php
/*
  Description : Controller for Intregation
  Author      : samiran rahaman
  Date        : 16/02/2017
*/
class Intregation extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		 $this->load->library('session');
		$this->load->model('Intregation_model');

		if(!$this->session->userdata('user_info'))
		{
		   redirect('Login');
		} 			
	}
	public function index()
    {   
      $data['user_info'] =$this->session->userdata('user_info');
      $this->load->view('common_header',$data);
      $this->load->view('common_sidemenu',$data);
     // $this->load->view('Itregation/Main');
	 $this->load->view('Intregation/Main',$data);
      $this->load->view('common_footer');        	
    }
	public function store_fulfillment()
    {
		    $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		     $account_name = $request->account_name;
		     $apikey = $request->apikey;
			 $password = $request->password;
		     $url = $request->url; 
			 
			  $success=$this->Intregation_model->post_store_info($account_name,$apikey,$password,$url);	
			  //$success=$this->Intregation_model->post_storeinfo('ddd','ddd','ffff','gggg');	
			// $success=$this->Login_model->verify_login_credintial('admin','admin');	
			 //print_r($success);	
			 // if(isset($success)) 
				 if($success==1)
			 {
			 	
			 	//$this->session->set_userdata('user_info',$success[0]);
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
	
	public function fb_fulfillment()
    {
		    $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    /*  $app_id = $request->app_id;
		     $app_secret = $request->app_secret; */
			 $user_id=$request->user_id;
			 $ads_act=$request->ads_act;
			 
			  //$success=$this->Intregation_model->fb_fulfillment($app_id,$app_secret,$user_id);	
			  $success=$this->Intregation_model->fb_fulfillment($ads_act,$user_id);	
			   if($success==1)
			 {
			 	
			 	//$this->session->set_userdata('user_info',$success[0]);
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
	public function store_list()
    {
		$success=$this->Intregation_model->get_store_list();	
		//print_r($success);
		if(isset($success))
		{
			echo json_encode($success);
		}
		else
		{
			echo json_encode($success);
		}
	}
	public function fb_account_list()
    {
		$success=$this->Intregation_model->fb_account_list();	
		//print_r($success);
		if(isset($success))
		{
			echo json_encode($success);
		}
		else
		{
			echo json_encode($success);
		}
	}
	
		public function store_setup()
    {
		     $postdata = file_get_contents("php://input");
		      $request = json_decode($postdata);
		      $storename = $request->storename;
		     $key = $request->store_key;
			 $password = $request->password; 
			 $store_id=$request->store_id;
			 
			 
		 /* $storename='alldayfreeshipping';
		$key='2eac3486958d276e3a41dd6a6d50456a';
		$password='4f7087ae3a73c2ebf2f76782ec9260c2';  
		 */
		 $success=$this->Intregation_model->store_setup_apicall($storename,$key,$password,$store_id);	
		 
		// echo "<pre>"; print_r($user_info);
		//echo "<pre>"; print_r($success);
		 if($success==1)
		{
			echo json_encode($success);
		}
		else
		{
			echo json_encode($success);
		} 
	}
	
		public function fb_setup()
    {
		
		      $data['user_info']=$this->session->userdata('user_info');
			  $user_id= $data['user_info']->user_interanal_id;
		     $postdata = file_get_contents("php://input");
		      $request = json_decode($postdata); 
		//$app_id=$request->app_id;;
		//$app_secret=$request->app_secret;
		$ads_act=$request->ads_act;
		$fb_account_id=$request->fb_account_id;
		
		//echo $success=$this->Intregation_model->fb_setup($app_id,$app_secret,$user_id);	
		echo $success=$this->Intregation_model->fb_setup($ads_act,$user_id,$fb_account_id);	
		
	}
   
    public function delete_store()
    {
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    $id = $request->id;
			 //$id=18;
		$success=$this->Intregation_model->delete_store($id);	
		echo json_encode($success);
		//echo 1;
		
	} 
	public function delete_fb()
    {
		     $postdata = file_get_contents("php://input");
		     $request = json_decode($postdata);
		    $id = $request->id;
			 //$id=18;
		echo $success=$this->Intregation_model->delete_fb($id);	
		//echo json_encode($success);
		//echo 1;
		
	} 
   
 }