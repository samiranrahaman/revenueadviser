<?php
/*
    Description : Model for Miscellaneous
    Author      : Deepak kv
    Date        : 28/10/2016
*/
class Miscellaneous_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    } 
    
	
	public function post_miscellaneous($cost,$title,$datetime)
	{
		$data['user_info'] =$this->session->userdata('user_info');
		$user_interanal_id=$data['user_info']->user_interanal_id;
       
		 $data = array(
        'datetime' => $datetime,
        'title' =>$title,
        'cost' =>$cost,
		'user_id'=>$user_interanal_id,
		);

		$this->db->insert('rev_miscellaneous', $data);
		//return $this->db->get_compiled_insert()	;
		 $id=$this->db->insert_id() ; 
		if($id)
		{
			return $id;
		}
		else
		{
			return 0;
		}
		
	}
	
	public function get_miscellaneous()
    {
		$data['user_info'] =$this->session->userdata('user_info');
		$user_interanal_id=$data['user_info']->user_interanal_id;
       
		$sql1="SELECT 	* FROM  `rev_miscellaneous` where user_id=".$user_interanal_id;
		$query1= $this->db->query($sql1);
	   return $query_res1=$query1->result();
	}
	public function miscellaneous_delete($id)
	{
		  $sql1="delete FROM  `rev_miscellaneous` where id=".$id;
		$query1= $this->db->query($sql1);
	   return 1;
	}
	
}

