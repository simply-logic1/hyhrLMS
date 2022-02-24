<?php

	defined('BASEPATH') OR exit('No direct script access allowed'); 

	class Courses_client extends CI_Controller
	{

		public function __constructor()
		{
			parent::__constructor();
			$this->load->model('client/client_model');
			
		}

		public function get_course_det()
		{
			$encrpt_id=$this->uri->segment(2);
			$this->load->helper('secure');
			$id=decrypt_url($encrpt_id);
			$this->load->model('client/client_model');
			$data['course_det']=$this->client_model->get_courses_det_id($id);
           
			
			$this->template->set('title','Courses');
			$data['userdata']=$this->session->all_userdata();
			$data['course_id']=$encrpt_id;
                   $valid = preg_match("/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/watch\?v\=\w+$/", $data['course_det'][0]['course_filename']);
    
   if ($valid ) {
       $img_path='';
       
       $videoId=explode('v=',$data['course_det'][0]['course_filename']);
      
            $res=$this->get_youtube_data($videoId[1]);
            $data['title']=$res['items'][0]['snippet']['title'];
            $data['description']=$res['items'][0]['snippet']['description'];
   }
            
			$this->template->load('user_template', 'contents' , 'client/course_detail', $data);
		}

		public function view_course_video()
		{
			$encrpt_id=$this->uri->segment(3);
			$this->load->helper('secure');
			$id=decrypt_url($encrpt_id);
			$this->load->model('client/client_model');
			$data['course_det']=$this->client_model->get_courses_det_id($id);
			$user_id=$this->session->userdata("user_id");
			$data['video_status']=$this->client_model->get_video_status($user_id,$id);
			$video_status=$this->client_model->get_video_status($user_id,$id);
			$data['view_video_length']=$video_status['view_ratio'];

			
			$this->template->set('title','Courses');
			$data['userdata']=$this->session->all_userdata();
			$data['course_id']=$encrpt_id;
            
		//	$this->template->load('master_view', 'contents' , 'client/course_video', $data);

			 $this->load->view('client/course_video',$data);

		}

		/*assign video to employee  */

		public function assign_video()
		{

			$emp_ids=$this->input->post('ids');
			$user_id=$this->session->userdata("user_id");
			$secure_cid=$this->input->post('course_id');
			$ctype=$this->input->post('ctype');

			 $ids=array();
			 $this->load->helper('secure');
			 $course_id=decrypt_url($secure_cid);
		
			 foreach ($emp_ids as $id) {
		         $ids[]=decrypt_url($id);
		 	}
		 $now=date('Y-m-d h:i:s');
	
			$this->load->model('client/course_model');
			if(in_array("all",$emp_ids))
			{
				
					 $data=array(
			 	 
			 	'emp_id'=>0,
				 'course_id'=>$course_id,
				 'course_type'=>$ctype,
				  'createdon'=>$now,
				  'view_status'=>0
				 );
				$result=$this->course_model->assign_emp_videos($data);
				
			}

			else
			{
				foreach($ids as $id)
				{
					 $data=array(
			 	 
			 	'emp_id'=>$id,
				 'course_id'=>$course_id,
				 'course_type'=>$ctype,
				  'createdon'=>$now,
				  'view_status'=>0
				 );
				$result=$this->course_model->assign_emp_videos($data);
				}
		  }
			echo $result;

		}
            public function get_youtube_data($vid)
            {
				 //$apikey='AIzaSyAAda1H6oz42FDt02fSfsFtt8fJ1QPryuc';
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
?>