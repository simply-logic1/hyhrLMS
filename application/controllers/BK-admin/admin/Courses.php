<?php

	defined('BASEPATH') OR exit('No direct script access allowed'); 

	class Courses extends CI_Controller
	{

		public function __construct()
		{

		   parent::__construct();

		   $this->load->model('admin/course_model');
		}

      
		/* Add courses */

  public function add_course()
    {

       
          
                    $title=$this->input->post('course_title');
      $desc=$this->input->post('course_description');
      $video=$this->input->post('course_video');
            $duration=$this->input->post('duration');
              
    


          //   $config['upload_path']='asset/course_video_thumb';
      // $config['allowed_types']='mp4|m4v |mov |wmv |avi |mpg |ogv |3gp |3g2';
          //   $config['max_size']=102400;
          //   $config['max_width']=1024;
          //   $config['max_height']=768;

           $config['upload_path'] = 'asset/course_video/';
     //  $config['allowed_types'] = 'gif|jpg|png';
          $config['allowed_types' ]='mp4|m4v|mov|wmv|avi|mpg|ogv|3gp|3g2|jpg|png|gif';
        $config['max_size']  = 1024002;
        $config['max_width']  = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        $video = "course_video";

        if ( ! $this->upload->do_upload($video))
        {
                $error = array('error' => $this->upload->display_errors());
               // $this->load->view('upload_form', $error);

               
                    $this->session->set_flashdata('msg','Error ,Please try again');
          //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
        redirect('admin/videos');
                
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                   $field_data = $this->upload->data();
             
                $full_path=$field_data['full_path'];
                
                $filename= $field_data['file_name']; 
                $rawname=$field_data['raw_name'];
                
               

                $thumb='thumb_img';
                 if ( ! $this->upload->do_upload($thumb))
        {
                $error = array('error' => $this->upload->display_errors());
               // $this->load->view('upload_form', $error);

           
                    $this->session->set_flashdata('msg','Error ,Please try again');
          //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
                    
        
           $thumb_name=  "none";
        }
        else
        {
                            $field_data1 = $this->upload->data();
             
            
                
                $filename1= $field_data1['file_name']; 
                $rawname1=$field_data1['raw_name'];
            $thumb_name=  $filename1;
        }
     }

                 $now=Date('Y-m-d h:i:sa');

                 $data=array(
                    'course_title'=>$title,
                      'course_description'=>$desc,
                         'duration'=>$duration,
                      'course_filename'=>$filename,
                     
                      'thumbnail_image'=>$thumb_name,
                       'created_on'=>$now,
                       'created_by'=>'Admin'

                 );

           

                $result=$this->course_model->add_course($data);

                if(!$result)
                {
                  $this->admin_template->set('title','Courses');

                  $data['msg']="Successfully Added";
                  $this->session->set_flashdata('msg','Sorry video upload failed.Try again later');
    
          //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
        redirect('admin/videos');
                }
                else
                {
                  $this->admin_template->set('title','Courses');

                  $data['msg']="";
                  
            
                  $this->session->set_flashdata('msg','Video Add Successfully');
          //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
          redirect('admin/videos');

                }

               // $this->load->view('upload_success', $data);
              
        
      
 


      


    }

     /* del video course */
     public function del_video_course()
     {
        $this->load->helper('secure');

         $sid=$this->uri->segment(3);
         $id=decrypt_url($sid);

      



         $vresult=$this->course_model->delete('course_video_courses',$id);
          $this->session->set_flashdata('msg','Video Delete Successfully');
            redirect('admin/videos');

     }

    public function add_course_link()
    {

     
        
       
              
       
                $filename=$this->input->post('course_video');
               
                
                $videoId = explode("v=", $filename);
 
                $value=$this->get_youtube_data($videoId);
           
              

                $title=$value['items'][0]['snippet']['title'];
              
                
                $desc=$value['items'][0]['snippet']['description'];
              $duration1=$value['items'][0]['contentDetails']['duration'];
              $interval = new \DateInterval($duration1);
               $hours=($interval->h*60*60);
               $mins=($interval->i*60);
               $secs=($interval->s);
               if($hours<10){
                   $hrs="0".$hours;
               }else{
                     $hrs=$hours;
               }
                 if($mins<10){
                   $min="0".$mins;
               }else{
                     $min=$mins;
               }
               if($secs<10){
                   $sec="0".$secs;
               }else{
                     $sec=$secs;
               }
    $duration= $hrs.":".
       $min.":".
       $secs;
     
        


         // $duration=$this->convertToSeconds($duration1);
               // $duration="00:00:00";
                $thumb_name='';
                
                
               
               
           

                 $now=Date('Y-m-d h:i:sa');

                 $data=array(
                    'course_title'=>$title,
                      'course_description'=>$desc,
                         'duration'=>$duration,
                      'course_filename'=>$filename,
                    
                      'thumbnail_image'=>$thumb_name,
                       'created_on'=>$now,
                       'created_by'=>'Admin'

                 );

           

                $result=$this->course_model->add_course($data);

                if(!$result)
                {
                  $this->admin_template->set('title','Courses');

                  $data['msg']="Successfully Added";
                  $this->session->set_flashdata('msg','Sorry video upload failed.Try again later' );
    
          //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
        redirect('admin/videos');
                }
                else
                {
                  $this->admin_template->set('title','Courses');

                  $data['msg']="";
                  
            
                  $this->session->set_flashdata('msg','Video Add Successfully');
          //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
          redirect('admin/videos');

                }

               // $this->load->view('upload_success', $data);
              
        
      
 


      


    }
                   public function get_youtube_data($vid)
            {
                 //$apikey='AIzaSyAAda1H6oz42FDt02fSfsFtt8fJ1QPryuc';
                 $apikey='AIzaSyC5Ea2MLgsOz7oT0y5aniMDCyN99ZA0qys';  
                          
    $googleApiUrl = 'https://www.googleapis.com/youtube/v3/videos?id=' . $vid[1]. '&key=' . $apikey . '&part=snippet%2CcontentDetails';
    
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
            
       public      function convertToSeconds($duration){
    $interval = new \DateInterval($duration);

    return 
        ($interval->h * 60 * 60).":".
        ($interval->i * 60) .":".
        $interval->s;
}


	}

?>