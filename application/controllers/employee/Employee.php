<?php

	defined('BASEPATH') or exit("No direct page allowed");
	require APPPATH .'third_party\cloudinary\src\Cloudinary.php';
	require APPPATH .'third_party\cloudinary\src\Uploader.php';
	require APPPATH .'third_party\cloudinary\src\Api.php';
	require APPPATH .'third_party\cloudinary\src\Helpers.php';
	require APPPATH .'third_party\cloudinary\src\Error.php';
	class Employee extends CI_Controller

	{

		public function __construct()
		{
			parent::__construct();
			$this->load->library('image_lib');
			$this->load->model('employee/Employee_modal');
			Cloudinary::config(array( "cloud_name" => "hyhr-inc", "api_key" => "475554631921755", "api_secret" => "3pO-GHrGhQfrDo3fyzcqUpa6wjs" ));

		}
	
		public function index()
		{
			$this->template->set('title', 'Dashboard');
			$data['test']="test";
			$user_id=$this->session->userdata('user_id');
		/*	$empid=$this->session->userdata('id');
            $user_id=$this->session->userdata('user_id');
                $client_data=$this->Employee_modal->get_client_id($user_id);
                $client_id= $client_data['company_id'];*/
          $data['list']=$this->Employee_modal->get_list($user_id,$client_id);
		  $data['no']=$this->Employee_modal->get_quiz_list($user_id);
		  
      		$this->template->load('user_template', 'contents' , 'employee/dashboard', $data);
		}
		public function register_site()
		{

		 
 
                $data['invite_type']='website';

	
			$this->template->set('title', 'Register');

      		 $this->template->load('master_view', 'contents' , 'employee/register', $data);

		
		}
		public function register()
		{

			$client_id=$this->uri->segment(3);
			$secure_mail=$this->uri->segment(2);

			$this->load->helper('secure');
			

			$data['emp_mail']=decrypt_url($secure_mail);
			$comp_id=decrypt_url($client_id);
			$data['client_id']=$client_id;
           
			$this->load->model('client/client_model');
		 	$status=$this->client_model->check_invite_email($comp_id,$data['emp_mail']);
			if(is_array($status))
			{
			$data['invite_status']=$status['invite_status'];
			$data['invite_type']=$status['invite_type'];
		    }
		    else
		    {

			
			$data['invite_status']=1;
		     }
		      
		      
 


	
			$this->template->set('title', 'Register');

      		 $this->template->load('master_view', 'contents' , 'employee/register', $data);

		
		}

		public function signup_process()
		{

			/* register employee data */
			$this->load->helper('secure');
                	$process=new Employee_modal();
		
		 
			$hash_password=password_hash($this->input->post('password'),PASSWORD_DEFAULT);
			
				$this->load->helper('string');
		
			/* create user id random */
			 $now=date("Y-m-d h:i:sa");

		$random_id=random_string('numeric',5);
		$fname=$this->input->post('first_name');
		$userid=$fname."_".$random_id;
		$invite_type=$this->input->post('invite_type');

   
		    $data=array(
				'userid'=>$userid,
		
			'primary_mail'=>$this->input->post('primary_email'),
			 
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'phone_no'=>$this->input->post('phone_no'),

			'address'=>$this->input->post('address'),
			'password'=>$hash_password,
			 
			'status'=>TRUE
		

			);
		 
			if($invite_type=='website')
			{
			$tblname='course_employee';
			 
			$result=$process->insert($tblname,$data);
			 
			}
			else if(($invite_type=='invite'))
			{
				$tblname='course_employee';
				$id=decrypt_url($this->input->post('client_id'));
				//	$result=$process->insert($tblname,$udata);
				$result=$process->update($tblname,$data,$id);
				 
			}
			else
			{
				 
				$id=decrypt_url($this->input->post('client_id'));
		$udata=array(
			'userid'=>$userid,
                
			'user_name'=>$this->input->post('user_name'),
			 
			 
			
			'password'=>$hash_password,
			 
            'join_date'=>$now,
			
			'createdon'=>$now,	
			'invite_status'=>1,
			'status'=>1


			);
			 
                 		$tblname='course_employee';
				//	$result=$process->insert($tblname,$udata);
				$result=$process->update($tblname,$udata,$id);
			}
		 
			if(!empty($result))
			{
   //               $data=array(

			// 'first_name'=>$this->input->post('first_name'),
			// 'last_name'=>$this->input->post('last_name'),
			// 'primary_mail'=>$this->input->post('primary_email'),
			// 'company_mail'=>$this->input->post('company_email'),
			// 'company_id'=>$comp_id,
			// 'password'=>password_hash($this->input->post('password'),PASSWORD_BCRYPT),
			// 'user_acc_id'=>$result,
			// 'createdon'=>$now,	


			// );
                	  
				
				
					 
						$this->session->set_flashdata('email_status',"Registration Completed");
					
					  

					// if(!empty($result))
					// {
					// 	$invite_data=array('status'=>TRUE);
					// 	$process->update_invite_status('invite_employee',$invite_data,$data['company_mail']);
					// }	
			}
			else
			{
				$this->session->set_flashdata('email_status',"Error Please Try again");
			}

		    // $this->template->set('title', 'Employee');

	  //  	$this->template->load('master_view', 'contents' , 'home/thankyou', $data);
	  
	      
			redirect('thankyou');

			

		}
		public function category()
	{
		$this->template->set('title','Content');
		$this->load->model('employee/course_emp');
		$data['test']="test";
		$data['courses']=$this->course_emp->get_data_all('course_category');
		$data['count_courses']=$this->course_emp->get_data_user_assign('course_cat_links');
		//$data['category']=$this->course_emp->course_get_content_cat();
		$this->template->load('user_template', 'contents' , 'employee/category', $data);
	}
		public function document()
		{
			$this->admin_template->set('title','Client');
			$this->load->model('employee/course_emp');
			$id=$this->session->userdata('user_id');
		 
			$data['clients']=$this->course_emp->get_document_assign('media_type','document','course_media',$id);
			$data['test']="test";

			$data['category']=$this->course_emp->get_data_all('course_category');
			$this->template->load('user_template', 'contents' , 'employee/document', $data);
		}
		public function course_library()
		{

			$this->load->model('employee/course_emp');
			$id=$this->session->userdata('user_id');

			
			//$comp_id=$this->course_emp->get_user_comp_id($id);
			
			 $comp_id="";
	        
	        	$data['courses']=$this->course_emp->get_course_assign($id,$comp_id);
				$data['category']=$this->course_emp->get_data_all('course_category');
		 

	        	//print_r($courses);
	       
		 
		   
		        $this->template->set('title', 'Employee');
              
	  
			 $this->template->load('user_template', 'contents' , 'employee/videos', $data);
			
		}
        public function content_list()
		{

			$this->load->model('employee/course_emp');
			$id=$this->session->userdata('user_id');

			
			//$comp_id=$this->course_emp->get_user_comp_id($id);
			
			 $comp_id="";
	        
	        	 $data['courses']=$this->course_emp->get_content_assign($id,$comp_id);

				 $data['category']=$this->course_emp->get_data_all('course_category');
		 
	       
		 
		   
		        $this->template->set('title', 'Employee');
              
	  
			 $this->template->load('user_template', 'contents' , 'employee/content_list', $data);
			
		}

	}//EOF class

?>