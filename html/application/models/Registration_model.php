<?php

class Registration_model extends CI_Model
{
		public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function registration_post($user_first_name,$user_last_name,$user_mobile_number,$user_email_id,$user_username,$user_password)
        {
			
			
			$sql="SELECT * FROM `rev_user` WHERE `user_username`='$user_username'";
			$query_userdetails = $this->db->query($sql);
			$query_userdetails2=$query_userdetails->result();
			if(!empty($query_userdetails2))
			{
				return 0;
			}
			else
				{
					     $verificationcode=$this->randomPassword(); 
						$data = array(
						'user_first_name' => $user_first_name,
						'user_last_name' =>$user_last_name,
						'user_mobile_number' =>$user_mobile_number,
						'user_email_id' =>$user_email_id,
						'user_username' =>$user_username,
						'user_password' =>md5($user_password),
						'user_status' =>0,
						'mail_verfication_code'=>$verificationcode,
						);

						$this->db->insert('rev_user', $data);
						$id=$this->db->insert_id() ; 
						
						$to = "samiran1109@gmail.com,".$user_email_id;
						$subject = "Inubaan Software Product - Registration verification Link ";

						/* $message ='<table width="480" cellspacing="0" cellpadding="0" border="0">
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
<p>Hi <a style="color:black;text-decoration:none" rel="noreferrer">'.$user_first_name.'  '.$user_last_name.'</a>,</p>
<p><b>Username:</b> '.$user_username.'</p>
<p><b>Email:</b> '.$user_email_id.'</p>
<p><a href="http://profitandloss.io/index.php/emailverify/index/'.$user_username.'/'.$verificationcode.'">Please click on this link to verify your Login.</a></p>
<br>

<p>Kind regards,<br>Inubaan Software Team</p>
</font>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>'; */
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
<p>Hi <a style="color:black;text-decoration:none" rel="noreferrer">'.$user_first_name.'  '.$user_last_name.'</a>,</p>
<p><b>Username:</b> '.$user_username.'</p>
<p><b>Email:</b> '.$user_email_id.'</p>
<p><a href="http://profitandloss.io/index.php/subscription/index/'.$id.'/'.$verificationcode.'">Please click on this link to verify your Login.</a></p>
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
						
						
						
						
						return $id;
					
				}
			
			
        }

       public function profile_update($user_first_name,$user_interanal_id,$user_last_name,$user_mobile_number)
        {
			           $data = array(
						'user_first_name' => $user_first_name,
						'user_last_name' =>$user_last_name,
						'user_mobile_number' =>$user_mobile_number,
						);
						$this->db->where('user_interanal_id', $user_interanal_id);
						$this->db->update('rev_user', $data);
						
						
						$sql="SELECT * FROM `rev_user` WHERE user_interanal_id=".$user_interanal_id;
						$query_userdetails = $this->db->query($sql);
						$query_userdetails2=$query_userdetails->result();
						//echo "<pre>";print_r($query_userdetails2);
						if(!empty($query_userdetails2))
						{
							//echo "<pre>";print_r($query_userdetails2);
							return $query_userdetails2;
							// print_r($this->db->last_query());
						}
						else
						{
							return 0;
						}
						
						
						
						
						//return 1;
		}
       function randomPassword() {
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $pass = array(); //remember to declare $pass as an array
            $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
            for ($i = 0; $i < 8; $i++) {
                $n = rand(0, $alphaLength);
                $pass[] = $alphabet[$n];
            }
            return implode($pass); //turn the array into a string
        }
}

?>
