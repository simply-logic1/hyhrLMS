<?php

	defined('BASEPATH') OR exit('No direct script access allowed'); 

	class Test extends CI_Controller
	{

		public function __constructor()
		{
			parent::__constructor();
			
			
		}

		public function index()
		{
			$data['title']="Test";
			$this->load->model('client/course_model');
			$client_id=$this->session->userdata('user_id');
			$data['test_list']=$this->course_model->get_test_video_title($client_id);
			

			$this->template->load('user_template', 'contents' , 'client/test', $data);

		}

		public function add_test()
		{
			$data['title']="Test";
		
			$id=$this->session->userdata('user_id');
			$this->load->model('client/course_model');
			$result=$this->course_model->check_user_payment($id);
		
	        if($result)
	        {
	        	$data['courses']=$this->course_model->get_new_courses_test($id);

	        	//print_r($courses);
	        }
	        else
	        {
		        $data['courses']=$this->course_model->get_courses_free();

		        //print_r($courses);
		    }
		    $data['courses']=$this->course_model->get_new_courses_test($id);

		   

			$this->template->load('user_template', 'contents' , 'client/add_test', $data);

		}

		public function add_test_data()
		{
			$data['title']="Test";
			$now=date('Y-m-d h:i:s');
			$client_id=$this->session->userdata('user_id');
			$this->load->helper('secure');
			$video_id=decrypt_url($this->input->post('video_id'));
			//print 'video_id'.$video_id;

			$client_name=$this->session->userdata('user_name');
			$test_data=array('video_id'=>$video_id,
							 'client_id'=>$client_id,
							 'status'=>1,
							 'createdon'=>$client_name,
							 'created_at'=>$now,


						);
			$this->load->model('Home/process');
			$result=$this->process->insert('course_test',$test_data);

			if($result)
			{
				$questions=$this->input->post('question');
			
				$index=1;
					$ans_index=1;

				foreach($questions as $question)
				{

					$ques_data=array('test_id'=>$result,'question'=>$question,'correct_ans'=>$this->input->post('ans_correct_q'.$index));
					$ques_result=$this->process->insert('course_test_question',$ques_data);
					$correct_ans=$this->input->post('ans_correct_q'.$index);
					$index++;
					if($ques_result)
					{
					
							$answers=$this->input->post('answer_qno'.$ans_index++);

							
							$is_correct=0;
						foreach($answers as $key=>$answer)
						{
							if($key==$correct_ans)
							{

									$is_correct=1;
									
									
							}
							else
							{
								$is_correct=0;
							}
							$ans_data=array('question_id'=>$ques_result,'option'=>$answer,'is_correct'=>$is_correct);
							$ans_result=$this->process->insert('course_test_option',$ans_data);
							if($key==$correct_ans)
							{

									
									$correct_ans_update=array('correct_ans'=>$ans_result);
							$update_question=$this->process->update('course_test_question',$correct_ans_update,$ques_result);
									//print $is_correct;
							}

							
						}
						
						
					}


				}
				
			}
			$this->session->set_flashdata('msg',"Add Test Completed");
			
			redirect('client/test');
			// print_r($this->input->post('question'));
			// 	print "<br/>";
			// 	print_r($this->input->post('answer_qno1'));print "<br/>";
			// 		print_r($this->input->post('ans_correct_q1'));print "<br/>";
			// 	print_r($this->input->post('answer_qno2'));print "<br/>";
			// 	print_r($this->input->post('ans_correct_q2'));print "<br/>";

			//$this->template->load('user_template', 'contents' , 'client/test', $data);
		}

		/* view test data */

		public function view_test_data()
		{
			$svideo_id=$this->uri->segment(3);
			$this->load->helper('secure');
			$video_id=decrypt_url($svideo_id);

			$this->load->model('client/course_model');
			$client_id=$this->session->userdata('user_id');
			$data['test_data']=$this->course_model->get_test_details($client_id,$video_id);
		

			$this->template->load('user_template', 'contents' , 'client/view_test', $data);

		}
		/* delete employee datas */
	public function del_test()
	{
		$secure_ids=$this->input->post('ids');
		print_r($secure_ids);
		
		 $this->load->helper('secure');
		  $ids=array();
		
		
		 
		   foreach ($secure_ids as $id) {
		         $ids[]=decrypt_url($id);
		 }
		 print_r($ids);

		$this->load->model('client/course_model');
		$result=$this->course_model->delete_test_data($ids);
		echo $result;


	}
    public function result_details()
    {
            $id=$this->uri->segment(2);
	
		$this->load->helper('secure');
		$emp_id=decrypt_url($id);
       
		$this->load->model('client/client_model');
		$data['emp_data']=$this->client_model->get_emp_data($emp_id);
		$data['assign_videos']=$this->client_model->get_assign_videos($emp_id);
		$data['test_report']=$this->client_model->get_test_report($emp_id);


	    
			$this->template->load('user_template', 'contents' , 'client/result_detail', $data);
    }
    public function result()
    {
			
		$this->template->set('title','Dashboard');
		$data['userdata']=$this->session->all_userdata();
	
		$this->load->model('client/client_model');
		$company_id=$this->session->userdata('user_id');
	
		
		$data['employees']=$this->client_model->get_all_employee($company_id);

	
		
		$this->template->load('user_template', 'contents' , 'client/result', $data);
		
		//$this->load->view('client/dashboard');

	}

	public function del_test_data()

	{



		$secure_ids=$this->input->post('qid');

		



		$this->load->model('client/course_model');

		$result=$this->course_model->delete_test_data($secure_ids);

		echo $result;

	}


}
?>