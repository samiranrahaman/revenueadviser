<?php
/*
    Description : Model for Dashboard
    Author      : Deepak kv
    Date        : 28/10/2016
*/
class Dashboard_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }
    public function get_dashboard_count()
    {
        //SELECT *,COUNT(DISTINCT userId) as count FROM `answers` A left join questions Q on Q.qno=A.quesNo GROUP BY Q.questionType
    
        $this->db->select("questionType name,COUNT(fid) as y");
        $this->db->from('answers A');
        $this->db->join('questions Q','Q.qno=A.quesNo');
        $this->db->group_by('Q.questionType');

        $query = $this->db->get();
        if($query->num_rows())
            return $query->result_array();
    }
    public function get_user_count()
    {
        $this->db->select("COUNT(DISTINCT unique_id) user_count,type");
        $this->db->from('users');
        $this->db->group_by('type');

        $query = $this->db->get();
        if($query->num_rows())
            return $query->result_array();
    }
    public function get_question_status($data)
    {
        $this->db->select("(CASE answer WHEN 1 THEN 'EXCELLENT' WHEN 2 THEN 'GOOD' ELSE 'POOR' END) as name,COUNT(ano) as y");
        $this->db->from('answers ANS');

        $this->db->join('questions QUS','QUS.qno=ANS.quesNo');
        $this->db->join('feedbacks FB','FB.fid=ANS.fid');
        $this->db->join('users USR','USR.unique_id=FB.fuserid');

        $this->db->where('ANS.quesNo',$data['ques_id']);

        if(isset($data['from_date']) && $data['from_date']!='')
            $this->db->where("ANS.created_at >= '".$data['from_date']."'");

        if(isset($data['to_date']) && $data['to_date']!='')
            $this->db->where("ANS.created_at <= '".$data['to_date']."'");

        if(isset($data['user_type']) && $data['user_type']!='')
            $this->db->where('USR.type',$data['user_type']);

        if(isset($data['location']) && $data['location']!='')
            $this->db->where('USR.location',$data['location']);

        $this->db->group_by('answer');

        $query = $this->db->get();
        if($query->num_rows())
            return $query->result_array();
    }
    public function get_questions($data)
    {
        $this->db->select("qno,questionHeading heading,QUS.type qtype,questionTitle question,questionType type,COUNT(ANS.answer) total,COUNT(CASE ANS.answer WHEN 1 THEN 1 END) excellent,COUNT(CASE ANS.answer WHEN 2 THEN 1 END) good,COUNT(CASE ANS.answer WHEN 3 THEN 1 END) poor");
        $this->db->from('answers ANS');
        $this->db->join('questions QUS','QUS.qno=ANS.quesNo');
        $this->db->join('feedbacks FB','FB.fid=ANS.fid');
        $this->db->join('users USR','USR.unique_id=FB.fuserid');

        $this->db->where('questionType','smiley');
        $this->db->group_by('ANS.quesNo');

        if(isset($data['from_date']) && $data['from_date']!='')
            $this->db->where("ANS.created_at >= '".$data['from_date']."'");

        if(isset($data['to_date']) && $data['to_date']!='')
            $this->db->where("ANS.created_at <= '".$data['to_date']."'");

        if(isset($data['user_type']) && $data['user_type']!='')
            $this->db->where('QUS.type',$data['user_type']);

        if(isset($data['location']) && $data['location']!='')
            $this->db->where('FB.location',$data['location']);
	
		if(isset($data['department']) && $data['department']!='')
            $this->db->where('(QUS.questionHeading like \'%'.$data['department'].'%\' or QUS.questionTitle like \'%'.$data['department'].'%\')');
		

		
	   //echo $this->db->get_compiled_select(); exit();
	   //return $this->db->get_compiled_select(); 
       $query = $this->db->get();
        if($query->num_rows())
            return $query->result_array(); 
    }
    public function agent_feedback_count()
    {
        $this->db->select("COUNT(FB.fid) count,AG.a_name agent");
        $this->db->from('feedbacks FB');
        $this->db->join('agents AG','AG.a_id=FB.agent_id');
        $this->db->group_by('FB.agent_id');
        $query = $this->db->get();
        if($query->num_rows())
            return $query->result_array();
        
    }
    public function location_customer_count($location =null)
    {
        $this->db->select("COUNT(sno) count,type");
        $this->db->from('users');
        if($location!=null)
            $this->db->where('location',$location);
        
        $this->db->group_by('type');
        $query = $this->db->get();
        if($query->num_rows())
            return $query->result_array();
    }
    public function get_user_list($data)
    {
        $this->db->select("USR.name,USR.phoneNo mobile,USR.location,USR.type,FB.fid,DATE(ANS.created_at) date");
        $this->db->from('answers ANS');
        $this->db->join('feedbacks FB','FB.fid=ANS.fid');
        $this->db->join('users USR','USR.unique_id=FB.fuserid');

        if(isset($data['question_id'])&&$data['question_id']!='')
            $this->db->where('ANS.quesNo',$data['question_id']);
        if(isset($data['rating'])&&$data['rating']!='')
            $this->db->where('ANS.answer',$data['rating']);

        if(isset($data['from_date']) && $data['from_date']!='')
            $this->db->where("ANS.created_at >= '".$data['from_date']."'");

        if(isset($data['to_date']) && $data['to_date']!='')
            $this->db->where("ANS.created_at <= '".$data['to_date']."'");

        if(isset($data['user_type']) && $data['user_type']!='')
            $this->db->where('USR.type',$data['user_type']);

        if(isset($data['location']) && $data['location']!='')
            $this->db->where('USR.location',$data['location']);
        

        $query = $this->db->get();
        if($query->num_rows())
            return $query->result_array();
    }
    public function get_status_count($location)
{
    $this->db->select("answer,count(ano) count");
    $this->db->from('answers ANS');
    $this->db->join('questions QUS','QUS.qno=ANS.quesNo');
    $this->db->join('feedbacks FB','FB.fid=ANS.fid');
    $this->db->join('users USR','USR.unique_id=FB.fuserid');

    $ans = array('1', '2','3');

    $this->db->where_in('answer',$ans);

    if(isset($location) && $location!='')
            $this->db->where('USR.location',$location);

    $this->db->group_by('ANS.answer');
	//echo $this->db->get_compiled_select(); exit();
    $query = $this->db->get();
    if($query->num_rows())
        return $query->result_array();
	
}

}

/*SELECT US.name,ANS.quesNo,ANS.answer,ANS.created_at FROM users US 
inner join  
feedbacks FD
on
US.unique_id = FD.fuserid
inner join
answers ANS
on
FD.fid = ANS.fid
where 
ANS.created_at between '2016-10-01 00:00:00' and '2016-10-31 06:42:50';
*/
