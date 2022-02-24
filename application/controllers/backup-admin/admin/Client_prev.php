<?php
defined('BASEPATH') OR exit('No direct script access allowed');  

class Client extends CI_Controller
{

	public function __construct()
	{
		parent ::__construct();
		$this->load->model('admin/process');

	}
	public function get_data_id()
	{
			$id=$this->uri->segment(3);
		$this->load->helper('secure');
		$client_id=decrypt_url($id);
		
		$data['client_data']=$this->process->get_data_specfic($client_id,'course_clients');
		$data['employees']=$this->process->get_emp_data($client_id,'course_employee');
		$this->admin_template->set('title','Profile');

		$data['quiz_details']=$this->process->get_quiz_perform($client_id);
		
		$this->admin_template->load('master_template', 'contents' , 'admin/profile', $data);

	}
	/*get specfic employee data */

	public function emp_data()
	{
		$id=$this->uri->segment(3);
		$this->load->helper('secure');
		$emp_id=decrypt_url($id);
		$data['emp_data']=$this->process->get_emp_data_specfic($emp_id,'course_employee');
		$this->admin_template->set('title','Profile');
		$data['videos']=$this->process->get_video_status($emp_id);
			$data['test_report']=$this->process->get_test_report($emp_id);
		
		$this->admin_template->load('master_template', 'contents' , 'admin/employee', $data);
    }
    public function view_test_data()
		{
			$svideo_id=$this->uri->segment(4);
			$this->load->helper('secure');
			$video_id=decrypt_url($svideo_id);

			$this->load->model('client/course_model');
			$client_id=$this->session->userdata('admin_id');
			//$client_id=1;

			$data['test_data']=$this->course_model->get_test_details($client_id,$video_id);
	

			$this->admin_template->load('master_template', 'contents' , 'admin/view_test', $data);

		}
    /*delete Client data */

    public function del_client(){

    	$secure_ids=$this->input->post('ids');
	
		
		 $this->load->helper('secure');
		  $ids=array();
		
		
		 
		   foreach ($secure_ids as $id) {
		         $ids[]=decrypt_url($id);
		 }
	   $tname=$this->input->post('tname');
       if($tname=='client')
       {
           $tblname='course_clients';
       }
        else if($tname=='quiz')
       {
           $tblname='course_test';
       }
       else if($tname=='user')
       {
           $tblname='course_admin';
       }
       print $tblname;

	
		$result=$this->process->delete_client_data($tblname,$ids);
		echo $result;
	}
    
    public function add_partner()
    {
        $data=array();
        $this->admin_template->load('master_template', 'contents' , 'admin/add_partner', $data);
        
    }
    
    public function add_partner_data()
    {
 
    	  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			 // $password = substr( str_shuffle( $chars ), 0, 8 );
			 $this->load->helper('string');
				 $uniquepassword = substr( str_shuffle( $chars ), 0, 8 );
				 print "fff";
				 print $uniquepassword;
			 	$password=password_hash($uniquepassword,PASSWORD_BCRYPT);
			 	$random_id=random_string('numeric',5);
		$fname=$this->input->post('name');
		$userid=$fname."_".$random_id;
                        $acc_data=array(
            
				'primary_email'=>$this->input->post('email'),
				'password'=>$password,
				'acc_type'=>'organization',
				'status'=>TRUE

			);print_r($acc_data);
               $result=$this->process->insert('course_user_acc',$acc_data);
    
               
                   
                if($result)
                {
                    $id=$result;

                        $partner_data = array(
                        	   'user_acc_id'=>$id,
                        	   'userid'=>$userid,
    			'first_name'=>$this->input->post('name'),
				    'email_id'=>$this->input->post('email'),
                        'address'=>$this->input->post('address'),
                        'mobile_no'=>$this->input->post('mobile'),
                      
                );
   
                $result1=$this->process->insert('course_clients',$partner_data);
                    $this->session->flashdata('msg','Add Retail Partner Successfully');
                    
                   // redirect('admin/client');
                    
                }
                else
                {
                     $this->session->flashdata('msg','Error.Try again');
                    
                   // redirect('admin/client');
                }
                      $to_email=$this->input->post('email');
		    
		    
		   
			
		  $from_email = "support@papaandbarkley.com"; 
       
         $config = array(        
		                 'mailtype' => 'html',
		                  'charset'  => 'utf-8',
		                  'priority' => '1'
		                

		        );
   
                  $this->load->library('email',$config); 
          $this->email->set_newline("\r\n");
          $this->email->set_mailtype("html");
         $first_name=$this->input->post('name');
    	
          	 $msg="<p>Hi ".ucwords($first_name).",</p> <p>You have been added to the Papaandbarkley Learning Management Platform.</p><p>Your Login Details are:</p> ";
		    	 $msg .="<p><a href='".base_url('')."';?> Login</a></p><p>Username: ".$to_email."</p><p>Password: ".$uniquepassword."</p>";
		    	

		    	 $msg.="<p>Thank You,</p> <p>Papaandbarkley Learning Management</p>";
   
         $this->email->from($from_email, 'PapaandBarkley'); 
         $this->email->to($to_email);
         $this->email->subject('Retail Partner Registration - Papaandbarkley Learning Management'); 
         $this->email->message($msg); 
    
      
         //Send mail 
         if($result && $result1)
         {
	         if($this->email->send()) 
	         {
	             $this->session->flashdata('msg','Add Retail Partner Successfully');
	                    
	                   // redirect('admin/client');
	        }

	        else
	        {  
	             $this->session->flashdata('msg','Mail Not Sent .Try again');
	                    
	                   // redirect('admin/client');
	        } 

         }
         else
         {
         	 $this->session->flashdata('msg','Error.Try again');
	                    
	                  //  redirect('admin/client');
         }
        

                
        
    }
      public function users()
    {
        $data=array();
            $data['clients']=$this->process->get_data_all('course_admin');
        $this->admin_template->load('master_template', 'contents' , 'admin/users', $data);
        
    }
        public function add_user()
    {
        $data=array();
        $this->admin_template->load('master_template', 'contents' , 'admin/add_user', $data);
        
    }
     public function quiz()
    {
        $data=array();
           $data['test_list']=$this->process->get_test_video_title();
			

			$this->admin_template->load('master_template', 'contents' , 'admin/quiz', $data);
        
    }
        public function add_quiz()
    {
       $data['courses']=$this->process->get_data_all('course_video_courses');

    	   

			$this->admin_template->load('master_template', 'contents' , 'admin/add_quiz', $data);
        
    }
    public function add_test_data()
    	{
			$data['title']="Test";
		
		
			$this->load->model('client/course_model');
			$now=date('Y-m-d h:i:s');
			$client_id=$this->session->userdata('admin_id');
          
          
			$this->load->helper('secure');
			$video_id=decrypt_url($this->input->post('vid'));
			//print 'video_id'.$video_id;

			$client_name=$this->session->userdata('user_name');

			$check_test_id=$this->course_model->check_testid_exist($client_id,$video_id);
			if(!empty($check_test_id))
			{
                    $result=$check_test_id['id'];
			}
			else
			{
			$test_data=array('video_id'=>$video_id,
							 'client_id'=>$client_id,
							 'status'=>1,
							 'createdon'=>1,
							 'created_at'=>$now,


						);
			

			$result=$this->process->insert('course_test',$test_data);
		}

			//if($result)
		//	{
				$question=$this->input->post('question');
			
				//$index=1;
					//$ans_index=1;

				//foreach($questions as $question)
				//{

					//$ques_data=array('test_id'=>$result,'question'=>$question,'correct_ans'=>$this->input->post('crt_ans'));
				$ques_data=array('test_id'=>$result,'question'=>$question);
					$ques_result=$this->process->insert('course_test_question',$ques_data);
				
					if($ques_result)
					{
					
							$answers=$this->input->post('ans');


							
							$is_correct=0;
						foreach($answers as $key=>$answer)
						{
							$crt_ans=$this->input->post('crt_ans');
							if($crt_ans==$answer)
							{

									$is_correct=1;
									
									
							}
							else
							{
								$is_correct=0;
							}
							if(!empty($answer))
							{
							$ans_data=array('question_id'=>$ques_result,'option'=>$answer,'is_correct'=>$is_correct);
							$ans_result=$this->process->insert('course_test_option',$ans_data);
						}
								if($is_correct)
							{

									
									$correct_ans_update=array('correct_ans'=>$ans_result);
							$update_question=$this->process->update('course_test_question',$correct_ans_update,$ques_result);
									//print $is_correct;
							}



							

							
						}
						
						
					}

					 $question_list=$this->course_model->get_test_questions($client_id,$video_id,$ques_result);

					 print json_encode($question_list);

		}

    
    public function add_user_data()
    {
         $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			 // $password = substr( str_shuffle( $chars ), 0, 8 );
			 $this->load->helper('string');
			 	$uniquepassword = substr( str_shuffle( $chars ), 0, 8 );
			 	 $upassword = $this->input->post('password');
			 	$password=password_hash($upassword,PASSWORD_BCRYPT);
 		    $name=$this->input->post('name');
        $user_data = array(
            'password'=>$password,
        		'name'=>$this->input->post('name'),
				    'email'=>$this->input->post('email'),
                        'role'=>$this->input->post('user_type'),
                        'mobile'=>$this->input->post('mobile'),
                      

                );
                $result=$this->process->insert('course_admin',$user_data);
                if($result)
                {
                    
                     $from_email = "support@papaandbarkley.com"; 
                     $to_email= $this->input->post('email');
         // $to_email = "subramanian.saranya@gmail.com"; 
         $config = array(        
    	                 'mailtype' => 'html',
		                  'charset'  => 'utf-8',
		                  'priority' => '1'
		                

		        );
   
         //Load email library 
         $this->load->library('email',$config); 
          $this->email->set_newline("\r\n");
          $this->email->set_mailtype("html");
      
          	 $msg="<p>Hi ".ucwords($name).",</p> <p>You have been added to the Papaandbarkley Learning Management Platform.
 </p>";
		    	 $msg .="<a href='".base_url('admin/')."'> Login  here</a> <br/><p>Username: ".$to_email."</p>";
		    	 $msg .="<p>Password: ".$upassword."</p>";

		    	 $msg.="<p>Thank You,</p> <p>Admin</p><p>Papaandbarkley Learning Management</p>";
   
         $this->email->from($from_email, 'Admin'); 
         $this->email->to($to_email);
         $this->email->subject('User Registration - Papaandbarkley Learning Management'); 
         $this->email->message($msg); 
    
      
         //Send mail 
         if($this->email->send()) 
         {
             $this->session->flashdata('msg','Add User Successfully');
           redirect('admin/users');
        }

          else {  
              $this->session->flashdata('msg','Mail not send');
          	 redirect('admin/users');
          }  
                    
                  
                    
                }
                else
                {
                     $this->session->flashdata('msg','Error.Try again');
                    
                    redirect('admin/users');
                }
        
    }


	
}