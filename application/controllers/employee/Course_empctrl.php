<?php

	defined('BASEPATH') or exit("No direct page allowed");
	require APPPATH .'third_party\cloudinary\src\Cloudinary.php';
	require APPPATH .'third_party\cloudinary\src\Uploader.php';
	require APPPATH .'third_party\cloudinary\src\Api.php';
	require APPPATH .'third_party\cloudinary\src\Helpers.php';
	require APPPATH .'third_party\cloudinary\src\Error.php';

	class Course_empctrl  extends CI_Controller

	{
		public function __construct()
		{

			parent::__construct();
			$this->load->model('employee/course_emp');
			Cloudinary::config(array( "cloud_name" => "hyhr-inc", "api_key" => "475554631921755", "api_secret" => "3pO-GHrGhQfrDo3fyzcqUpa6wjs" ));
		}
		public function store_emp_video_status()
		{
			$now=date('Y-m-d h:i:s');

			$emp_id=$this->session->userdata('user_id');

			 
			$encrypt_id=$this->input->post('course_id');
			$this->load->helper('secure');
					

			$course_id=decrypt_url($encrypt_id);

			

			$result=$this->course_emp->check_emp_course('course_emp_video_status',$emp_id,$course_id);
  print "resut";
			print_r($result);
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

				$tet=$this->course_emp->insert_emp_video_status('course_emp_video_status',$data);
  print_r($tet);
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
			$data['category']=$this->course_emp->get_data_all('course_category');
			//$data['videos']=$this->course_emp->get_data_all_video($id);
			//$id=$this->session->userdata('user_id');

			
			//$comp_id=$this->course_emp->get_user_comp_id($id);
			
			 $comp_id="";
	        
				$data['videos']=$this->course_emp->get_course_assign($user_id,$comp_id);
				$data['test_status']=$this->course_emp->get_emp_video_status($user_id,$id);
				$this->load->model('employee/Employee_modal');
				$tblname="course_assign_video_emp";
				$now=date('Y-m-d h:i:s');
				$update_data=array(
					'view_status'=>1,
					'is_reminder'=>1,
					'viewed_on'=>$now
				);
				$this->Employee_modal->update($tblname,$update_data,$id);
			$this->template->load('user_template', 'contents' , 'employee/video_details', $data);
		

		

		} 
		public function view_content()
		{
				$encrpt_id=$this->uri->segment(2);
			$this->load->helper('secure');
			$id=decrypt_url($encrpt_id);
			$this->load->model('client/client_model');
			$data['course_det']=$this->client_model->get_courses_det_id($id);
    
            
			
			$this->template->set('title','Courses');
			$data['userdata']=$this->session->all_userdata();
			$data['course_id']=$encrpt_id;
			$user_id=$this->session->userdata("user_id");
			$data['video_status']=$this->client_model->get_video_status($user_id,$id);
			$video_status=$this->client_model->get_video_status($user_id,$id);
			$data['view_video_length']=$video_status['view_ratio'];
			$data['category']=$this->course_emp->get_data_all('course_category');
			//$data['videos']=$this->course_emp->get_data_all_video('course_content');
			$data['videos']=$this->course_emp->get_content_assign($id,$comp_id);
			$this->load->model('employee/Employee_modal');
			$tblname="course_assign_video_emp";
			$now=date('Y-m-d h:i:s');
			$update_data=array(
				'view_status'=>1,
				'is_reminder'=>1,
				'viewed_on'=>$now
			);
			$this->Employee_modal->update($tblname,$update_data,$id);
			$this->template->load('user_template', 'contents' , 'employee/content_details', $data);
		

		

		}
		public function view_category()
		{
				$encrpt_id=$this->uri->segment(2);
			$this->load->helper('secure');
			$id=decrypt_url($encrpt_id);
			$uid=$this->session->userdata('user_id');

			$data['category']=$this->course_emp->get_data_all('course_category');
			$data['courses']=$this->course_emp->get_category_list($uid,$id);
		//	$data['clients']=$this->course_emp->get_category_list_video($uid,$id);
            
          
			$this->template->load('user_template', 'contents' , 'employee/category', $data);
		

		

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