<?php

	defined('BASEPATH') or exit("No direct page allowed");

	class Course_empctrl  extends CI_Controller

	{
		public function __construct()
		{

			parent::__construct();
			$this->load->model('employee/course_emp');
		}
		public function store_emp_video_status()
		{
			$now=date('Y-m-d h:i:s');

			$emp_id=$this->session->userdata('user_id');

			 
			$encrypt_id=$this->input->post('course_id');
			$this->load->helper('secure');
					

			$course_id=decrypt_url($encrypt_id);

			

			$result=$this->course_emp->check_emp_course('course_emp_video_status',$emp_id,$course_id);

			//print_r($result);
			if(!$result)
			{
					$data=array(

				'emp_id'=>$emp_id,
				 
				'course_id'=>$course_id,
				'emp_id'=>$emp_id,
				'view_ratio'=>$this->input->post('view_ratio'),
				'status'=>$this->input->post('status'),
				'video_duration'=>$this->input->post('video_duration'),
				'view_datetime'=>$now,
				'created_on'=>$now
			

				);

				$this->course_emp->insert_emp_video_status('course_emp_video_status',$data);

			}
			else
			{


				$id=$result['id'];
				print $id;
				$data=array(

			
					'view_ratio'=>$this->input->post('view_ratio'),
					'status'=>$this->input->post('status'),
					'update_datetime'=>$now
				
		

			);
					if($result['status']!='completed')
					{
							$this->course_emp->update_emp_video_status('course_emp_video_status',$data,$id);
					}
			

			}
			
			
		}

	 
			public function view_video()
		{
				$encrpt_id=$this->uri->segment(2);
			$this->load->helper('secure');
			$id=decrypt_url($encrpt_id);
			$this->load->model('client/client_model');
			$data['course_det']=$this->client_model->get_courses_det_id($id);
             $valid = preg_match("/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/watch\?v\=\w+$/", $data['course_det'][0]['course_filename']);
    
   if ($valid ) {
       $img_path='';
       
       $videoId=explode('v=',$data['course_det'][0]['course_filename']);
        
			$res=$this->get_youtube_data($videoId[1]);
		 
            $data['title']=$res['items'][0]['snippet']['title'];
            $data['description']=$res['items'][0]['snippet']['description'];
   }
            
			
			$this->template->set('title','Courses');
			$data['userdata']=$this->session->all_userdata();
			$data['course_id']=$encrpt_id;
			$user_id=$this->session->userdata("user_id");
			$data['video_status']=$this->client_model->get_video_status($user_id,$id);
			$video_status=$this->client_model->get_video_status($user_id,$id);
			$data['view_video_length']=$video_status['view_ratio'];
            
            
			$this->template->load('user_template', 'contents' , 'employee/video_details', $data);
		

		

		}
             public function get_youtube_data($vid)
            {
                // $apikey='AIzaSyAAda1H6oz42FDt02fSfsFtt8fJ1QPryuc';
                   $apikey='AIzaSyC5Ea2MLgsOz7oT0y5aniMDCyN99ZA0qys';       
    $googleApiUrl = 'https://www.googleapis.com/youtube/v3/videos?id=' . $vid. '&key=' . $apikey . '&part=snippet';
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
        
    curl_close($ch);
        
    $data = json_decode($response);
        
    $value = json_decode(json_encode($data), true);
    
    return $value;
            }

	}