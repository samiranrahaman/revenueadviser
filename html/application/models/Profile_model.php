<?php
/*
    Description : Model for Profile
    Author      : samiran
    Date        : 6/2/2017
*/
class Profile_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    } 
    
	public function subscription_details($user_interanal_id)
    {
		
		//$data['user_info'] =$this->session->userdata('user_info');
		//$user_interanal_id=$data['user_info']->user_interanal_id;
		$sql1="SELECT * FROM  `rev_stripe_payment_history` where user_id=".$user_interanal_id." order by id desc limit 1";
		$query1= $this->db->query($sql1);
	   return $query_res1=$query1->result();
	}
}