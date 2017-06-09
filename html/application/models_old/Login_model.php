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
        	/* $where_array=array(
        					'zu.admin_username'=>$username,
        					'zu.admin_password'=>base64_encode($password)
        				);

        	$this->db->select("CONCAT( zu.user_first_name, ' ', zu.user_middle_name,' ',zu.user_last_name) AS name", FALSE);
                $this->db->select('zu.user_interanal_id, zu.user_mobile_number,zu.user_email_id');
        	$this->db->from('user_admin AS zu');
        	$this->db->where($where_array);
        	$query=$this->db->get();
			if($query->num_rows()>0)
			{
				return $query->result();
                                // print_r($this->db->last_query());
								
								
			} */
           return $return_value=array('status'=>"1");
			//	echo json_encode($return_value);
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
        public function password_update($table="",$where="")
        {
                if(!empty($table) && !empty($where))
                {
                        $this->db->select('admin_interanal_id,admin_email_id,admin_username');
                        $this->db->from($table);
                        $this->db->or_where($where);
                }
                $query=$this->db->get();
                if($query->num_rows()>0)
                {       
                        $result=$query->result();
                        $id=$result[0]->admin_interanal_id;
                        $email=$result[0]->admin_email_id;
                        $new_password=$this->randomPassword();               
                        $new_password_encoded=base64_encode($new_password);
                        $set=array("admin_password"=>$new_password_encoded);
                        $this->db->where('admin_interanal_id',$id);
                        $this->db->update($table,$set);

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
                        $this->db->select('admin_interanal_id,admin_email_id,admin_username');
                        $this->db->from($table);
                        $this->db->where($where);
                }
                $query=$this->db->get();
                if($query->num_rows()>0)
                {
                        $this->db->where($where);
                        $this->db->update($table,$update);
                        return $this->db->affected_rows()>0;

                }
                else
                {
                        return false;
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
