<?php

defined('BASEPATH') or die("No script allowed");

class Test_model extends CI_Model
{
	
	public function __construct()
	{
	parent::__construct();
	}
	public function get_video_details($video_id)
	{

		$result=$this->db->select('course_title,id')->where('id',$video_id)->get('course_content')->row_array();
		return $result;
	}

	public function get_test_questions($client_id,$video_id)
	{
		$check=array('test.client_id'=>$client_id,'test.video_id'=>$video_id,'test.status'=>1);
		// $result=$this->db->select('test.*,questions.*,answers.*')
		//      ->join('course_test_question as questions','questions.test_id=test.id','left')
		//       ->join('course_test_option as answers','answers.question_id=questions.id','left')
		//     ->where($check)->get('course_test as test');
		$this->db->query('SET SESSION group_concat_max_len=15000');

		$result=$this->db->select('test.*,content.course_title as course_title,test.id as tid,questions.id as qid,questions.*,COUNT(*) as no_of_ques,answers.*,
			GROUP_CONCAT(CONCAT(answers.id,":",answers.option,":",answers.is_correct) ORDER BY answers.id)  as allanswer')
		     ->join('course_test_question as questions','questions.test_id=test.id','left')
			  ->join('course_test_option as answers','answers.question_id=questions.id','left')
			  ->join('course_content as content','test.video_id=content.id','left')
		      ->group_by('questions.id')
		    ->where($check)->get('course_test as test');

		    return $result->result_array();

	}

	public function check_user_ans($qid,$aid)
	{

		$result=$this->db->select('correct_ans')->where('id',$qid)->get('course_test_question');
			return $result->row_array();
	}
	public function check_exist_test($uid,$qid,$test_id)
	{
		$check=array('test_id'=>$test_id,'user_id'=>$uid,'question_id'=>$qid);
		$result=$this->db->select('id')->where($check)->get('course_test_emp_ans');
		$count =$result->num_rows();
		if($count>0)
		{
			return $result->row_array();
		}
		else
		{
			return false;
		}
	}
	public function get_client_id($uid)
	{
		$result=$this->db->select('company_id')->where('id',$uid)->get('course_employee');
		return $result->row_array();
	}

	/* get test status */

	public function get_test_id($video_id)
	{
		$check=array('video_id'=>$video_id);
		$result=$this->db->select('id')->where($check)->get('course_test');
		$count =$result->num_rows();
		if($count>0)
		{
			$data=$result->row_array();
			return $data['id'];
		}
		else
		{
			return false;
		}
	}

	public function get_test_status($user_id,$test_id)
	{
		$check=array('test_id'=>$test_id,'user_id'=>$user_id);
		$result=$this->db->select('question_id')->where($check)->order_by('id','DESC')->get('course_test_emp_ans');
		$count =$result->num_rows();
		if($count>0)
		{
			return $result->row_array();
		}
		else
		{
			return false;
		}
	}

	/* get employee result */

	public function get_emp_result($test_id,$user_id)
	{

		$result=$this->db->select('test.*,question.*,user_ans.*')->join('course_test_question as question','test.id=question.test_id','left')->join('course_test_emp_ans as user_ans','user_ans.question_id=question.id','left')->where('test.id',$test_id)->get('course_test as test');

		return $result->result_array();
	}
    
    public function get_result_status($user_id,$vid)
    {
            $result=$this->db->select('*')->where('test_id',$vid)->where('user_id',$user_id)->get('course_test_emp_result ');

		return $result->result_array();
    }
}
