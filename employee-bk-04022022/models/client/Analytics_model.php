<?php
 defined('BASEPATH') or exit("not allowed");

 class Analytics_model extends CI_Model
 {
 	public function __construct()
 	{
 		parent::__construct();
 	}

    public function get_emp_details($id)
    {
    	$this->db->where('company_id',$id)->where('status',1);
    	$result=$this->db->get('course_employee');
    	$count=$result->num_rows();
    	if($count>0)
    	{
    		return $result->result_array();

    	}
    	else
    	{
    		return FALSE;
    	}

    }

    public function get_emp_video_status($id)
    {
    	//$data=$this->db->select("emp.*,evs.*,SEC_TO_TIME(AVG(evs.view_ratio)) as test_ratio")->from('employee as emp')->join('emp_video_status as evs' ,'emp.id=evs.emp_id','left')->where('emp.company_id',$id)->group_by('evs.emp_id')->get();
//         $this->db->select('emp_id')->from('emp_video_status')->order_by('emp_id')->limit('5');   

// $subquery = $this->db->_compile_select();
//         $this->db->select("*")->from('employee as e1')->join("($subquery) e2"),"e2.emp_id"="e1.id")->get();
        
//         $sub->subquery->end_subquery();
//         $this->db
//         ->select('emp_id ')
//         ->from('emp_video_status');
          

// $subquery = $this->db->get_compiled_select();

// $this->db->reset_query(); 
//      $this->db
//         ->select("*")
//         ->from('emp_video_status');
     
        

// $subquery = $this->db->get_compiled_select();

// $this->db->reset_query(); 


         

             $query=$this->db->select("emp.*,COUNT(emp.id) as total_emp,evs.*,MAX(logs.action_time) as action_time,COUNT(DISTINCT(evs.course_id)) as no_course,SEC_TO_TIME(SUM(TIME_TO_SEC(evs.view_ratio))) as view_ratio1")->from('course_employee as emp')->join('course_emp_video_status as evs' ,'emp.id=evs.emp_id','left')
             ->join('course_userlogs as logs','emp.user_acc_id=logs.user_id ','left')
       ->where('emp.company_id',$id)->where('emp.status',1)
        ->group_by('evs.emp_id')->get();
             
    // $query=$this->db->query("select emp.*,evs.*,COUNT(DISTINCT(evs.course_id)) as no_course,SEC_TO_TIME(AVG(evs.view_ratio)) as view_ratio ,MAX(logs.action_time) as action_time,logs.* from employee as emp left join emp_video_status as evs on emp.id=evs.emp_id 
    //     left join userlogs as logs on emp.user_acc_id=logs.user_id 
    //     where emp.company_id= $id group by evs.emp_id ");
      
             
  return $query->result_array();


    }

    public function get_course_details($id)
    {

  
               // $get_course=$this->db->select("*")->from('video_courses')->get();
            $get_course=$this->db->select('video.*,emp.*,SEC_TO_TIME(SUM(TIME_TO_SEC(emp.view_ratio))) as view_time,COUNT(emp.id) as members,SEC_TO_TIME(AVG(TIME_TO_SEC(emp.view_ratio))) as avg_time')->from("course_video_courses as video")->join('course_emp_video_status as emp','video.id=emp.course_id','left')->group_by('video.id')->get();
                $courses= $get_course->result_array();
                return $courses;
       

    }

    public function get_all_details($id)
    {
        //$query=$this->db->select("COUNT('emp.*') as total_emp, SEC_TO_TIME(SUM(TIME_TO_SEC(video.view_ratio))) as view_time,SEC_TO_TIME(AVG(TIME_TO_SEC(video.view_ratio))) as avg_time")->from('employee as  emp')->join('emp_video_status as video','emp.id=video.emp_id','left')->where('company_id',$id)->group_by('emp.company_id')->get();
        $query=$this->db->select("COUNT('emp.*') as total_emp" )->from('course_employee as  emp')->where('company_id',$id)->where('status',1)->group_by('emp.company_id')->get();
    $time= $query->row_array();
        $get_det=$this->db->select(" COUNT(DISTINCT(video.course_id)) as no_course,SEC_TO_TIME(SUM(TIME_TO_SEC(video.view_ratio))) as view_time,SEC_TO_TIME(AVG(TIME_TO_SEC(video.view_ratio))) as avg_time")->from('course_employee as  emp')->join('course_emp_video_status as video','emp.id=video.emp_id','left')->where('company_id',$id)->group_by('emp.company_id')->get();
        $data= $get_det->row_array();

        $all_data=array('total_emp'=>$time['total_emp'],'view_time'=>$data['view_time'],'avg_time'=>$data['avg_time'],'no_of_courses'=>$data['no_course']);
        return $all_data;





    }

    public function get_test_details($res_id,$emp_id)
    {
        $check=array('res.id'=>$res_id,'user_ans.user_id'=>$emp_id);
        // $query=$this->db->select('res.*,test.*,questions.*,answer.*,user_ans.*')
        //     ->join('course_test as test','test.id=res.test_id','left')
        //     ->join('course_test_question as questions','questions.test_id=questions.id','left')
        //     ->join('course_test_option as answer','answer.question_id=questions.id','left')                
        //     ->join('course_test_emp_ans as user_ans','user_ans.question_id=questions.id','left')
        //   ->where($check)->get('course_test_emp_result as res');

        $this->db->query("SET @score:=0");

               $query=$this->db->select('user_ans.is_correct as user_ans,res.*,vid.*,test.*,questions.*,test.id as tid,questions.id as qid,answers.*,user_ans.*,GROUP_CONCAT(CONCAT(answers.id,":",answers.option,":",answers.is_correct) ORDER BY answers.id)  as allanswer,

                 IF((user_ans.is_correct),(@score:=@score+1),0) as score,count("questions.question") as tot_ques


                ')

            ->join('course_test as test','test.id=res.test_id','left')
               ->join('course_video_courses as vid','vid.id=test.video_id','left')
             ->join('course_test_question as questions','questions.test_id=test.id','left')
             ->join('course_test_option as answers','answers.question_id=questions.id','left')  
             ->join('course_test_emp_ans as user_ans','user_ans.question_id=questions.id','left')  
           
          ->where($check)->group_by('questions.id')->get('course_test_emp_result as res');
          return $query->result_array();
    }
   
    public function get_user_perform($id)
    {
         $get_det=$this->db->select(" COUNT(DISTINCT(video.course_id)) as no_course,SEC_TO_TIME(SUM(TIME_TO_SEC(video.view_ratio))) as view_time,SEC_TO_TIME(AVG(TIME_TO_SEC(video.view_ratio))) as avg_time")->from('course_employee as  emp')->join('course_emp_video_status as video','emp.id=video.emp_id','left')->where('emp.company_id',$id)->group_by('emp.company_id')->get();
        $data= $get_det->result_array();

        return $data;



    }

    public function get_quiz_perform($id)
    {

      $this->db->query("SET @Rank:=0");

        $res=$this->db->select('res.*,ques.id as qid,SUM(res.exam_score) as score,emp.*,SUM(ques.id) as tot_ques ,

            if((res.exam_score>0),(@Rank:=@Rank+1),"0") as Rank




            ')
           


             ->join('course_test_emp_result as res','res.user_id=emp.id','left')
             ->join('course_test as test','test.id=emp.company_id','left')

             ->join('course_test_question as ques','ques.test_id=test.id','left')
          ->group_by('res.user_id')
       
        ->order_by('score','DESC')

            ->from('course_employee as emp')
            ->where('emp.company_id',$id)->get();

            $data= $res->result_array();


            $res1=$this->db->select(' ques.*,count(*) as all_question ')
                 

             ->join('course_test_question as ques','ques.test_id=test.id','left')
     
       
     

            ->from('course_test as test')
            ->get();
               $data1= $res1->row_array();
               $data[0]['all_question']=$data1['all_question'];
            return $data;
             //  return $data1;
    }

 }
 ?>