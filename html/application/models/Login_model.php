<?php

class Login_model extends CI_Model
{
		public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }

        public function verify_login_credintial($username,$password)
        {
			
			//$password=base64_encode($password);
			$password=md5($password);
        	
			$sql="SELECT * FROM `rev_user` WHERE `user_username`='$username' and `user_password`='$password' and user_status=1";
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
			
			
        }

        public function get_user_menu_access($user_internal_id)
        {       
                $this->db->select('GROUP_CONCAT(hm.module_name) as module_name', false);
                // $this->db->select('hm.internal_id,hm.module_name,hm.is_main_menu');
                $this->db->from('hims_module AS hm');
                $this->db->join('hims_user_access AS hua','hua.ref_menu_internal_id=hm.internal_id','INNER');
                $this->db->where('hua.ref_user_internal_id',$user_internal_id);
                $query=$this->db->get();
                if($query->num_rows()>0)
                {
                        return $query->result();
                }
                
        }
        public function password_update($user_username="",$user_email_id="")
        {
                if(!empty($user_username)&& !empty($user_email_id))
                {
                        $this->db->select('user_interanal_id,user_email_id,user_username');
                        $this->db->from("rev_user");
                       // $this->db->or_where($where);
					    $this->db->where("user_email_id",$user_email_id);
						$this->db->where("user_username",$user_username);
                }
                $query=$this->db->get();
                if($query->num_rows()>0)
                {       
                        $result=$query->result();
                        $id=$result[0]->user_interanal_id;
                        $email=$result[0]->user_email_id;
                        $new_password=$this->randomPassword();               
                        $new_password_encoded=md5($new_password);
                        $set=array("user_password"=>$new_password_encoded);
                        $this->db->where('user_interanal_id',$id);
                        $this->db->update('rev_user',$set);

                        $data['result']=$result;
                        $data["new_password"]=$new_password;

                        return $data;
                }
                else
                {
                        $data['result']="0";
                        return $data;
                }

        }

        public function change_password($table="",$where="",$update="")
        {
                
               if(!empty($table) && !empty($where))
                {
                        $this->db->select('user_interanal_id,user_email_id,user_username');
                        $this->db->from($table);
                        $this->db->where($where);
                }
                $query=$this->db->get();
                if($query->num_rows()>0)
                {
                        $this->db->where($where);
                        $this->db->update($table,$update);
                        //return $this->db->affected_rows()>0;
						return  2;

                }
                else
                {
                        //return false;
						return 1;
                }

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
