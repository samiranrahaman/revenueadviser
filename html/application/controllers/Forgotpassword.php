<?php
class Forgotpassword extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			
			   $this->load->library('session');
			   $this->load->model('Login_model');				
		}
	

        public function index()
        {
        	$this->session->unset_userdata('user_info');
			$this->load->view("forgotpassword_view");
        }
		public function newpassword()
		{
			
			//echo $this->input->post('username');
			//echo $this->input->post('user_email_id');
			//exit;
			$user_email_id=$this->input->post('user_email_id');
			$user_username=$this->input->post('username');
			/* $where=array();
			$where=array(
				"user_username"=>$this->input->post('username'),
				"user_email_id"=>$this->input->post('user_email_id')
				); */
			//$success=$this->Login_model->password_update("rev_user",$where);
			$success=$this->Login_model->password_update($user_username,$user_email_id);
			//print_r($success);exit;
			
			if($success['result']==0)
			{
				header("Location: http://profitandloss.io/forgotpassword?success=0");
				//echo 0;
				//echo "User Name/Email does not exists!";
			}
			else
			{
				//$response=$this->send_mail($success);
				//echo "New Password sent to your mail id";
				
								$new_password=$success['new_password'];
				$to = "samiran1109@gmail.com,".$user_email_id;
						$subject = "Inubaan Software Product - Autogenarated New Password ";

$message ='<table width="480" cellspacing="0" cellpadding="0" border="0">
<tbody><tr>
<td valign="top" align="center">
<table style="border-bottom:1px solid #eee;padding:0 16px" width="480" height="50" cellspacing="0" cellpadding="24" border="0">
<tbody><tr>
<td style="background-color:#ffffff" valign="top">
<h1><span style="color:#f0b41c">Inubaan</span><span style="color:#002745">Software</span><sup><small style="color:#f0b41c;">™</small></sup>
</span></a></h1>
</td>
<td style="text-align:right">
</td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td valign="top" align="center">
<table style="padding:0 16px 10px" width="480" cellspacing="0" cellpadding="24" border="0">
<tbody><tr>
<td style="background-color:#ffffff" valign="top">
<font style="font-size:16px;color:#444;">
<p>Hi <a style="color:black;text-decoration:none" rel="noreferrer">'.$user_username.'</a>,</p>
<p><b>Username:</b> '.$user_username.'</p>
<p><b>Email:</b> '.$user_email_id.'</p>
<p><b>Password:</b> '.$new_password.'</p>
<p><a href="http://profitandloss.io/index.php/login">Please click on this link to verify your Login.</a></p>
<br>

<p>Kind regards,<br>Inubaan Software Team</p>
</font>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>';

						// Always set content-type when sending HTML email
						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

						// More headers
						$headers .= 'From: Inubaan Software<register@profitandloss.io>' . "\r\n";
						//$headers .= 'Cc: myboss@example.com' . "\r\n";

						mail($to,$subject,$message,$headers);
				
				
				header("Location: http://profitandloss.io/forgotpassword?success=1");
				
			}
			// print_r($where);

		}
}