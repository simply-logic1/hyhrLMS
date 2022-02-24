<?php

	defined('BASEPATH') or exit("No direct page allowed");

	class Testctrl  extends CI_Controller

	{

			public function __construct()
			{
				parent::__construct();

				
			}
			public function test()
			{
				$this->template->set('title','Employee Test');
				$data['test']="test";
				$this->load->helper('secure');
				$id=$this->uri->segment(3);
				$data['video_id']=decrypt_url($id);
              
				
				$this->load->model('employee/test_model');
				$user_id=$this->session->userdata('user_id');
			 
				$get_test=$this->test_model->get_test_id($data['video_id']);
				


		    $data['test_status']=$this->test_model->get_test_status($user_id,$get_test);
            
          
               
		        $data['result_status']=$this->test_model->get_result_status($user_id,$get_test);
		       // print_r($data['result_status']);


				$data['video_details']=$this->test_model->get_video_details($data['video_id']);
			  
				$this->template->load('user_template', 'contents' , 'employee/test', $data);
			}
			public function take_test()
			{
				
				$this->load->helper('secure');
				$id=$this->uri->segment(3);
				$data['video_id']=decrypt_url($id);
				$data['question_id']=$this->input->post('question_id');

				// print $data['video_id'];
				$this->load->model('employee/test_model');
				$user_id=$this->session->userdata('user_id');
					 
				$data['ques']=$this->test_model->get_test_questions('1',$data['video_id']);
				//print_r($ques);
				$this->template->load('user_template', 'contents' , 'employee/questions', $data);



			}
			   public function view_result()
    {
       
		$this->load->helper('secure');
	
       
		$this->load->model('client/client_model');
		$user_id=$this->session->userdata('user_id');
		$data['test_report']=$this->client_model->get_test_report($user_id);


	    
			$this->template->load('user_template', 'contents' , 'employee/emp_res', $data);
    }

			public function add_emp_test_data()
			{
				$qid= $this->input->post('question');
				$ans_id= $this->input->post('answer');
				$test_id=$this->input->post('test_id');

				
				$this->load->model('employee/test_model');
				$user_id=$this->session->userdata('user_id');
				$now=date('Y-m-d h:i:s');

						$status=$this->test_model->check_user_ans($qid,$ans_id);
					$status= $status['correct_ans'];


					if($status==$ans_id)
					{
						$is_correct=1;
					}
					else
					{
						$is_correct=0;
					}
					$check_exist=$this->test_model->check_exist_test($user_id,$qid,$test_id);

					// print $qid." :".$ans_id."test".$test_id."Correct ans:".$status."is_corect".$is_correct."Count".$check_exist;
					$this->load->model('employee/employee_modal');

					if(!$check_exist)
					{

						$ans_data=array('user_id'=>$user_id,'test_id'=>$test_id,'question_id'=>$qid,'answer'=>$ans_id,'is_correct'=>$is_correct,'correct_ans'=>$status,'created_at'=>$now);
			 	$result=$this->employee_modal->insert('course_test_emp_ans',$ans_data);
					}
					else
					{
						$id=$check_exist['id'];
						$ans_data=array('user_id'=>$user_id,'test_id'=>$test_id,'question_id'=>$qid,'answer'=>$ans_id,'is_correct'=>$is_correct,'correct_ans'=>$status,'updated_at'=>$now);
			 	$result=$this->employee_modal->update('course_test_emp_ans',$ans_data,$id);
						
					}
					if($result)
					{
						echo true;
					}
					else
					{
						echo false;
					}
				


				// print $this->input->post('no_of_ques');
				// $noq= $this->input->post('no_of_ques');
				
				// $this->load->model('employee/employee_modal');
				// $this->load->model('employee/test_model');
				// $user_id=$this->session->userdata('user_id');
				// print $user_id;
				// $test_id=$this->input->post('test_id');
				// $now=date('Y-m-d h:i:s');
				// for($i=1;$i<=$noq;$i++)
				// {
				// 	// print $this->input->post('question'.$i);
				// 	$qid=$this->input->post('question'.$i);
				// 	$ans_id=$this->input->post('answer_q'.$i);


				// 	// print "<br/>Answer" .$this->input->post('answer_q'.$i);
				// 	// print "<br/>";
				// 	$status=$this->test_model->check_user_ans($qid,$ans_id);
				// 	$status= $status['correct_ans'];


				// 	if($status==$ans_id)
				// 	{
				// 		$is_correct=1;
				// 	}
				// 	else
				// 	{
				// 		$is_correct=0;
				// 	}
				// 	$ans_data=array('user_id'=>$user_id,'test_id'=>$test_id,'question_id'=>$qid,'answer'=>$ans_id,'is_correct'=>$is_correct,'correct_ans'=>$status,'created_at'=>$now);
				// 	$result=$this->employee_modal->insert('course_test_emp_ans',$ans_data);

				// 	// echo $result."<br/>";
				// }
				// $this->session->set_flashdata('msg','Test Completed');
				// redirect('library-list');


				
			}

			public function show_result()
			{
				$this->load->helper('secure');

				$no_of_question=$this->input->post('no_of_ques');
				$test_id=$this->input->post('test_id');
				$user_id=$this->session->userdata('user_id');

				//$stid=encrypt_url($test_id);
				$sid=encrypt_url($user_id);
				$now=date('Y-m-d h:i:s');
				$this->load->model('employee/test_model');
				$results=$this->test_model->get_emp_result($test_id,$user_id);
				$score='0';
				foreach($results as $result)
				{
					if($result['is_correct'])
					{
						++$score;


					}

				}
				if($score=='0')
				{
					$exam_result="Fail";

				}
				else
				{
					$exam_result="Pass";
				}



					$ans_data=array('user_id'=>$user_id,'test_id'=>$test_id,'date_of_exam'=>$now,'exam_score'=>$score,
						'exam_result'=>$exam_result,'status'=>'completed','total_question'=>$no_of_question,'created_at'=>$now);
					$this->load->model('employee/employee_modal');
					$result=$this->employee_modal->insert('course_test_emp_result',$ans_data);
				// print_r($results);
				// print_r($result);

					
					$stid=encrypt_url($result);
				

					

				redirect('employee/test_details/'.$stid.'/'.$sid);
				//redirect('library-list');

			}

	}
?>