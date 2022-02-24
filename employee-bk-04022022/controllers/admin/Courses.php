<?php

	defined('BASEPATH') OR exit('No direct script access allowed'); 

	class Courses extends CI_Controller
	{

		public function __construct()
		{

		   parent::__construct();

       $this->load->model('admin/course_model');
       $this->load->model('admin/process');
		}

      
    /* Add courses */
     

  public function add_course()
    {

     
          
                    $title=$this->input->post('course_title');
      $desc=$this->input->post('course_description');
      $video=$this->input->post('course_video');
            $duration=$this->input->post('duration');
            $cat_id=$this->input->post('cat_id');
            if($cat_id !='')
            {
            $category=implode(',',$cat_id);
            }
            else
            {
              $category="uncategories";
            }
    
  

          //   $config['upload_path']='asset/course_video_thumb';
      // $config['allowed_types']='mp4|m4v |mov |wmv |avi |mpg |ogv |3gp |3g2';
          //   $config['max_size']=102400;
          //   $config['max_width']=1024;
          //   $config['max_height']=768;
          if($_FILES['course_video']['name'] !='')
          {

           $config['upload_path'] = 'asset/course_video/';
     //  $config['allowed_types'] = 'gif|jpg|png';
          $config['allowed_types' ]='mp4|m4v|mov|wmv|avi|mpg|ogv|3gp|3g2|jpg|png|gif';
          $config['max_size']  = 1024002;
          $config['max_width']  = 6000;
          $config['max_height'] = 6000;

        $this->load->library('upload', $config);

        $video = "course_video";

        if ( ! $this->upload->do_upload($video))
        {
                $error = array('error' => $this->upload->display_errors());
               // $this->load->view('upload_form', $error);

               
                    $this->session->set_flashdata('video-msg','Error ,Please try again');
          //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
       
                
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                   $field_data = $this->upload->data();
             
                $full_path=$field_data['full_path'];
                
                $filename= $field_data['file_name']; 
                $rawname=$field_data['raw_name'];
                
        }
      }   
      else{

        $filename="";
      }     
      if($_FILES['thumb_img']['name'] !='')
          {

           $config['upload_path'] = 'asset/course_video/';
     //  $config['allowed_types'] = 'gif|jpg|png';
          $config['allowed_types' ]='mp4|m4v|mov|wmv|avi|mpg|ogv|3gp|3g2|jpg|png|gif';
        $config['max_size']  = 1024002;
        $config['max_width']  = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);
                $thumb='thumb_img';
                 if ( ! $this->upload->do_upload($thumb))
        {
                $error = array('error' => $this->upload->display_errors());
               // $this->load->view('upload_form', $error);

           
                    $this->session->set_flashdata('video-msg','Error ,Please try again');
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
     else
     {
      $thumb_name="";
     }
     

                 $now=Date('Y-m-d h:i:sa');

                 $data=array(
                    'course_title'=>$title,
                      'course_description'=>$desc,
                         'duration'=>$duration,
                      'course_filename'=>$filename,
                      'category'=>$category,
                      'course_type'=>"video",
                      'thumbnail_image'=>$thumb_name,
                       'created_on'=>$now,
                       'created_by'=>'Admin'

                 );

         

              $result=$this->course_model->add_course($data);
              

                if(!$result)
                {
                  $this->admin_template->set('title','Courses');

                  $data['msg']="Successfully Added";
                  $this->session->set_flashdata('video-msg','Sorry video upload failed.Try again later');
    
          //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
   redirect('admin/videos');
                }
                else
                {
                  $this->admin_template->set('title','Courses');

                  $data['msg']="";
                  foreach($cat_id as $cat){
                   
                    $data1=array('post_id'=>$result,'cat_id'=>$cat);
                    $this->course_model->insert_data('course_cat_links',$data1);
                  }
            
                  $this->session->set_flashdata('video-msg','Video Add Successfully');
          //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
          redirect('admin/videos');

                }

               // $this->load->view('upload_success', $data);
              
        
      
 


      


    } 
    
    public function update_content()
    {
   
          
             
                       
      $title=$this->input->post('course_title');
      $desc=$this->input->post('course_description');
      $video=$this->input->post('course_video');
            $duration=$this->input->post('duration');
            $thumb=$this->input->post('thumb_img');
            $config['upload_path'] = 'asset/course_content/';
            //  $config['allowed_types'] = 'gif|jpg|png';
                 $config['allowed_types' ]='mp4|m4v|mov|wmv|avi|mpg|ogv|3gp|3g2|jpg|png|gif';
               $config['max_size']  = 1024002;
               $config['max_width']  = 6000;
               $config['max_height'] = 6000;
       
               $this->load->library('upload', $config);
       
               if($_FILES['thumb_img']['name'] !='')
               {
       
                       $thumb='thumb_img';
                        if ( ! $this->upload->do_upload($thumb))
               {
                       $error = array('error img' => $this->upload->display_errors());
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
              else{
                $thumb_name=$this->input->post('featured_img');
               }
                 $course_file="content_file";
               
             if($_FILES['content_file']['name'] !='')
             {
               $config['upload_path'] = 'asset/course_content/'; 
                                       $config['allowed_types'] = 'zip';
                                      // $config['encrypt_name'] = TRUE; 
                                       $this->load->library('upload');
                                      $this->upload->initialize($config);
                 if ( ! $this->upload->do_upload('content_file'))
                 {
                         $error = array('error img' => $this->upload->display_errors());
                        // $this->load->view('upload_form', $error);
         
                    
                             $this->session->set_flashdata('msg','Error ,Please try again');
                   //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
                             
                 
                    $file_name=  "none";
                 }
                 else
                 {
                                     $field_data2 = $this->upload->data();
                      
                     
                         
                         $filename2= $field_data2['file_name']; 
                         $rawname2=$field_data2['raw_name'];
                     $file_name=  $filename2;
                 }
               }
               else{
                $file_name=$this->input->post('doc_name');
               }
             
                        $now=Date('Y-m-d h:i:sa');
                        $cat_id=$this->input->post('cat_id');
                        if($cat_id !='')
                        {
                        $category=implode(',',$cat_id);
                        }
                        else
                        {
                          $category='uncategories';
                        }
                        $data=array(
                           'course_title'=>$title,
                             'course_description'=>$desc,
                                 
                              
                             'course_docname'=>$file_name,
                             'category'=>$category,
                             'thumbnail_image'=>$thumb_name,
                              'created_on'=>$now,
                              'created_by'=>'Admin'
       
                        );
       
                          $enc_id=$this->input->post('content_id');
                          $this->load->helper('secure');
                          $id=decrypt_url($enc_id);
                       $result=$this->process->update('course_content',$data,$id);
                       
       
                       if(!$result)
                       {
                         $this->admin_template->set('title','Courses');
       
                         $data['msg']="Successfully Added";
                         $this->session->set_flashdata('msg','Sorry Ambassador Education update failed.Try again later');
           
                 //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
               redirect('admin/all_content');
                       }
                       else
                       {
                         $this->admin_template->set('title','Courses');
       
                         $data['msg']="";
                         
                   
                         $this->session->set_flashdata('msg','Ambassador education updated successfully');
                 //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
                redirect('admin/all_content');
       
                       }
       
                      // $this->load->view('upload_success', $data);
    }
    
    public function add_content()
    {
   
          
             
                       
      $title=$this->input->post('course_title');
      $desc=$this->input->post('course_description');
      $video=$this->input->post('course_video');
            $duration=$this->input->post('duration');
            $thumb=$this->input->post('thumb_img');
            $cat_id=$this->input->post('cat_id');
            if($cat_id!='')
            {
              $category=implode(',',$cat_id);
            } 
            else
            { $category='uncategories';
            }
     

          //   $config['upload_path']='asset/course_video_thumb';
      // $config['allowed_types']='mp4|m4v |mov |wmv |avi |mpg |ogv |3gp |3g2';
          //   $config['max_size']=102400;
          //   $config['max_width']=1024;update
          //   $config['max_height']=768;

           $config['upload_path'] = 'asset/course_content/';
     //  $config['allowed_types'] = 'gif|jpg|png';
          $config['allowed_types' ]='mp4|m4v|mov|wmv|avi|mpg|ogv|3gp|3g2|jpg|png|gif|doc|docx|zip';
        $config['max_size']  = 1024002;
        $config['max_width']  = 6000;
        $config['max_height'] = 6000;

        $this->load->library('upload', $config);
/*
        $video = "course_video";

        if ( ! $this->upload->do_upload($video))
        {
                $error = array('error video' => $this->upload->display_errors());
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
                
        }   
        */
        $file_name=  "";
        $thumb_name="";
        $course_file="content_file";
               
             if($_FILES['content_file']['name'] !='')
             {
               $config['upload_path'] = 'asset/course_content/'; 
                                       $config['allowed_types'] = 'zip';
                                      // $config['encrypt_name'] = TRUE; 
                                       $this->load->library('upload');
                                      $this->upload->initialize($config);
                 if ( ! $this->upload->do_upload('content_file'))
                 {
                         $error = array('error img' => $this->upload->display_errors());
                        // $this->load->view('upload_form', $error);
         
                    
                             $this->session->set_flashdata('msg','Error ,Please try again');
                   //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
                             
                 
                    $file_name=  "none";
                 }
                 else
                 {
                                     $field_data2 = $this->upload->data();
                      
                     
                         
                         $filename2= $field_data2['file_name']; 
                         $rawname2=$field_data2['raw_name'];
                     $file_name=  $filename2;
                 }
               }
      
          $course_file="thumb_img";
         
        
      if($_FILES['thumb_img']['name'] !='')
			{
				$config['upload_path'] = 'asset/course_content/'; 
                                $config['allowed_types'] = 'mp4|m4v|mov|wmv|avi|mpg|ogv|3gp|3g2|jpg|png|gif';
                               // $config['encrypt_name'] = TRUE; 
                                $this->load->library('upload');
             	                $this->upload->initialize($config);
          if ( ! $this->upload->do_upload('thumb_img'))
          {
                  $error = array('error img' => $this->upload->display_errors());
                 // $this->load->view('upload_form', $error);
  
             
                      $this->session->set_flashdata('msg','Error ,Please try again');
            //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
                      
          
             $thumb_name=  "none";
          }
          else
          {
                              $field_data3 = $this->upload->data();
               
              
                  
                  $filename3= $field_data3['file_name']; 
                  $rawname3=$field_data3['raw_name'];
              $thumb_name=  $filename3;
          }
        }
      
                 $now=Date('Y-m-d h:i:sa');

                 $data=array(
                    'course_title'=>$title,
                      'course_description'=>$desc,
                         'duration'=>$duration,
                         'category'=>$category,
                        
                      
                      'course_docname'=>$file_name,
                      'course_type'=>"post",
                     
                      'thumbnail_image'=>$thumb_name,
                       'created_on'=>$now,
                       'created_by'=>'Admin'

                 );

                   
                $result=$this->course_model->add_content($data);
                

                if(!$result)
                {
                  $this->admin_template->set('title','Courses');

                  $data['msg']="Successfully Added";
                  $this->session->set_flashdata('msg','Sorry  Ambassador Education upload failed.Try again later');
    
          //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
        redirect('admin/all_content');
                }
                else
                {
                  $this->admin_template->set('title','Courses');

                  $data['msg']="";
                  
                  
                  foreach($cat_id as $cat){
                   
                    $data1=array('post_id'=>$result,'cat_id'=>$cat);
                    $this->course_model->insert_data('course_cat_links',$data1);
                  }
                
            
                  $this->session->set_flashdata('msg','Ambassador education added successfully ');
          //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
        redirect('admin/all_content');

                }

               // $this->load->view('upload_success', $data);
   
   
       }
       /* add media data */

       public function media_data()
       {
        if($_FILES['uploadfile']['name'] !='')
        {
          $config['upload_path'] = 'asset/course_content/'; 
                                  $config['allowed_types'] = 'mp4|m4v|mov|wmv|avi|mpg|ogv|3gp|3g2|jpg|png|gif|zip';
                                 // $config['encrypt_name'] = TRUE; 
                                  $this->load->library('upload');
                                 $this->upload->initialize($config);

            
            if ( ! $this->upload->do_upload('uploadfile'))
            {
                    $error = array('error img' => $this->upload->display_errors());
                   // $this->load->view('upload_form', $error);
    
               
                        $this->session->set_flashdata('media-msg','Error ,Please try again');
              //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
                        
            
               $file_name=  "none";
              
            }
            else
            {
                                $field_data2 = $this->upload->data();
                 
                
                    
                    $filename2= $field_data2['file_name']; 
                    $rawname2=$field_data2['raw_name'];
                $file_name=  $filename2;
            }
          }
        
                   $now=Date('Y-m-d h:i:sa');
  
                   $data=array(
                      'media_title'=>$file_name,
                        
                        'filename'=>$file_name,
                        'created_on'=>$now
                       
                        
  
                   );
      
                     
                  $result=$this->course_model->add_media($data);
                  
    
    
                  if(!$result)
                  {
                    $this->admin_template->set('title','Courses');
  
                    $data['msg']="Successfully Added";
          
      
            //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
         // redirect('admin/all_content'); 
         print  false;
                  }
                  else
                  {
                    $this->admin_template->set('title','Courses');
  
                    $data['msg']="";
                    
              
            //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
          // redirect('admin/all_content');
         print true;
                  }
       }

       /* add doc data */
       
       public function add_doc_data()
       {
         print "fsd";
        if($_FILES['uploadfile']['name'] !='')
        {
          $config['upload_path'] = 'asset/course_content/'; 
                                  $config['allowed_types'] = 'mp4|m4v|mov|wmv|avi|mpg|ogv|3gp|3g2|jpg|png|gif|zip|pdf';
                                 // $config['encrypt_name'] = TRUE; 
                                 $config['max_size']  = 1024002;
                                 $config['max_width']  = 6000;
                                 $config['max_height'] = 6000;
                         
                                 $this->load->library('upload', $config);
                                   

            
            if ( ! $this->upload->do_upload('uploadfile'))
            {
                    $error = array('error img' => $this->upload->display_errors());
                   // $this->load->view('upload_form', $error);
    
               
                        $this->session->set_flashdata('media-msg','Error ,Please try again');
              //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
                        
            
               $file_name=  "none";
               print_r($error);
              
            }
            else
            {
                                $field_data2 = $this->upload->data();
                 
                
                    
                    $filename2= $field_data2['file_name']; 
                    $rawname2=$field_data2['raw_name'];
                $file_name=  $filename2;
            }
          }
        
                   $now=Date('Y-m-d h:i:sa');
                  $media_title=$this->input->post('name');
                   $data=array(
                      'media_title'=>$media_title,
                      'media_type'=>"document",
                        
                        'filename'=>$file_name,
                        'created_on'=>$now
                       
                        
  
                   );
      
                     
                  $result=$this->course_model->add_media($data);
                  
    
    
                  if(!$result)
                  {
                    $this->admin_template->set('title','Courses');
  
                    $data['doc_msg']="Successfully Added";
          
      
             //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
         redirect('admin/document'); 
         
                  }
                  else
                  {
                    $this->admin_template->set('title','Courses');
  
                    $data['doc_msg']="Sorry upload failed ,Please try again";
                    
              
            //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
          redirect('admin/document');
          

                  }
                  
       }

     /* del video course */
     public function del_video_course()
     {
        $this->load->helper('secure');

         $sid=$this->uri->segment(3);
         $id=decrypt_url($sid);

        



         $vresult=$this->course_model->delete('course_content',$id);
       
          $this->session->set_flashdata('video-msg','Video Delete Successfully');
            redirect('admin/videos');

     }
     public function add_category()
     { 
     $cat_name= $this->input->post('name');
     $desc= $this->input->post('description');
     $slug= $this->input->post('slug');
     if($desc!='')
     {
       $desc1=$desc;
     }
     else
     {
       $desc1="";
     }
     if($slug!='')
     {
       $slug1=$slug;
     }
     else
     {
       $slug1=strtolower($cat_name);
     }
     $now=Date('Y-m-d h:i:sa');
      $slug=strtolower($cat_name);
     $data=array(
        'category_name'=>$cat_name,
        'category_description'=>$desc1,
           'category_slug'=>$slug1,
           'created_on'=>$now,
           'created_by'=>'Admin'

     );
      
         $result=$this->course_model->insert_data('course_category',$data);
        // print $result;
       
     }

    public function add_course_link()
    {

     
        
       
              
       
                $filename=$this->input->post('course_video');
               
                
                $videoId = explode("v=", $filename);
 
                $value=$this->get_youtube_data($videoId);
           
                $cat_id=$this->input->post('cat_id');
               if($cat_id !='')
               {
                $category=implode(',',$cat_id);
               }
               else
               {
                 $category="uncategories";
               }

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
                      'course_type'=>'video',
                     'category'=>$category,
                      'thumbnail_image'=>$thumb_name,
                       'created_on'=>$now,
                       'created_by'=>'Admin'

                 );

           

                $result=$this->course_model->add_course($data);

                if(!$result)
                {
                  $this->admin_template->set('title','Courses');

                  $data['msg']="Successfully Added";
                  $this->session->set_flashdata('video-msg','Sorry video upload failed.Try again later' );
    
          //$this->admin_template->load('master_view', 'contents' , 'admin/courses', $data);
        redirect('admin/videos');
                }
                else
                {
                  $this->admin_template->set('title','Courses');

                  $data['msg']="";
                  
                  foreach($cat_id as $cat){
                   
                    $data1=array('post_id'=>$result,'cat_id'=>$cat);
                    $this->course_model->insert_data('course_cat_links',$data1);
                  }
                  $this->session->set_flashdata('video-msg','Video Add Successfully');
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