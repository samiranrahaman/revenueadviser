<?php

class Emailverify_model extends CI_Model
{
		public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function verify_email_credintial($username,$verificationcode)
        {
			$sql="SELECT * FROM `rev_user` WHERE `user_username`='$username' and `mail_verfication_code`='$verificationcode'";
			$query_userdetails = $this->db->query($sql);
			$query_userdetails2=$query_userdetails->result();
			if(!empty($query_userdetails2))
			{
				//echo $user_id=$query_userdetails->row()->user_interanal_id;
				$sql1="update `rev_user` set mail_verfication_code='', user_status=1 where `user_username`='$username'";
		        $query1= $this->db->query($sql1);
				return 1;
			}
			else
				{
					return 0;
				}
			
			
			
        }

        
       

        

}

?>
