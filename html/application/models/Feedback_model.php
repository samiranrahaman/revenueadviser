<?php

class Feedback_model extends CI_Model
{
		public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function feedback_data_post($user_first_name,$user_feedback,$user_email_id,$subject)
        {
			//echo 1;exit;
			
			/* $sql="SELECT * FROM `rev_feedback_betaform` WHERE `email`='$user_email_id'";
			$query_userdetails = $this->db->query($sql);
			$query_userdetails2=$query_userdetails->result();
			if(!empty($query_userdetails2))
			{
				return 0;
			}
			else
				{ */
					 $data = array(
						'name' => $user_first_name,
						'email' =>$user_email_id,
						'feedback' =>$user_feedback,
						'subject'=>$subject,
						);

						$this->db->insert('rev_feedback_betaform', $data);
						return $id=$this->db->insert_id() ;
					
				//}
			
			
        }

       

}

?>
