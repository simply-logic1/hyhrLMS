<?php

 defined('BASEPATH') or exit("not allowed");



 class Course_model extends CI_Model

 {



     public function __construct()

 	{

 		parent::__construct();

 	}



    public function check_user_payment($id)

    {

    	$result=$this->db->query("select * from course_plan where client_id='$id' and  payment_status=1");

    	$count=$result->num_rows();

    	return $count;



    }

 	public function get_courses_free()

 	{



 		$result=$this->db->query("select * from course_video_courses ");

 		return $result->result_array();

 	}



 	public function get_courses_paid_all()

 	{

 		$result=$this->db->query("select * from course_video_courses");

 		return $result->result_array();

  	}

      public function get_new_courses_test()

  {

    //$check=array('client_id',$user_id);

    /*

    $result=$this->db->query("select test.*,video.* from course_video_courses as video lEFT JOIN   course_test as test



       ON  video.id = test.video_id



WHERE  client_id=$user_id AND test.id IS NULL "); 

*/

   $result=$this->db->query("select * from course_video_courses"); 

      



        return $result->result_array();

    }



      



  	public function assign_emp_videos($empids)

  	{

  		$result=$this->db->insert('course_assign_video_emp',$empids);

  		return $result;

  	}



    /*Get Tst list */

    public function get_test_video_title($client_id)

    {

      $check=array('test.client_id'=>$client_id);

      $result=$this->db->select('test.*,test.id as test_id,video.*')

         ->join('course_video_courses as video','video.id=test.video_id','left')

          

        ->where($check)->get('course_test as test');



        return $result->result_array();

    }

    public function get_test_details($client_id,$video_id)

    {

      $check=array('test.client_id'=>$client_id,'test.video_id'=>$video_id);

    // $result=$this->db->select('test.*,questions.*,answers.*')

    //      ->join('course_test_question as questions','questions.test_id=test.id','left')

    //       ->join('course_test_option as answers','answers.question_id=questions.id','left')

    //     ->where($check)->get('course_test as test');

   



    $result=$this->db->select('test.*,test.id as tid,questions.id as qid,video.*,questions.*,COUNT(*) as no_of_ques,answers.*,

      GROUP_CONCAT(CONCAT(answers.id,":",answers.option,":",answers.is_correct) ORDER BY answers.id)  as allanswer')

         ->join('course_test_question as questions','questions.test_id=test.id','left')

          ->join('course_test_option as answers','answers.question_id=questions.id','left')

          ->join('course_video_courses as video','video.id=test.video_id','left')

          ->group_by('questions.id')

        ->where($check)->get('course_test as test');



        return $result->result_array();

    }

    public function delete_test_data($ids)

  {



    $query=$this->db->where_in('id',$ids)->delete('course_test');



    return $query;

  }

 public function delete_ques_data($ids)

  {



    $query=$this->db->where_in('id',$ids)->delete('course_test_question');

    $this->db->where_in('question_id',$ids)->delete('course_test_option');



    return $query;

  }

  public function check_testid_exist($cid,$vid)

  {

     $check=array('client_id'=>$cid,'video_id'=>$vid);

      $result=$this->db->select('id')

                  

        ->where($check)->get('course_test');



        return $result->row_array();

  }



  public function get_test_questions($client_id,$video_id,$qid)

  {

    $check=array('questions.id'=>$qid,'test.client_id'=>$client_id,'test.video_id'=>$video_id,'test.status'=>1);

    // $result=$this->db->select('test.*,questions.*,answers.*')

    //      ->join('course_test_question as questions','questions.test_id=test.id','left')

    //       ->join('course_test_option as answers','answers.question_id=questions.id','left')

    //     ->where($check)->get('course_test as test');

    $this->db->query('SET SESSION group_concat_max_len=15000');



    $result=$this->db->select('test.*,test.id as tid,questions.id as qid,questions.*,COUNT(*) as no_of_ques,answers.*,

      GROUP_CONCAT(CONCAT(answers.id,":",answers.option,":",answers.is_correct) ORDER BY answers.id)  as allanswer')

         ->join('course_test_question as questions','questions.test_id=test.id','left')

          ->join('course_test_option as answers','answers.question_id=questions.id','left')

          ->group_by('questions.id')

        ->where($check)->get('course_test as test');



        return $result->row_array();



  }





 }

?>