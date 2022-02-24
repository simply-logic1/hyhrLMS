<?php

	defined('BASEPATH') or exit("No direct page allowed");

	class Validate  extends CI_Controller

	{
		public function __construct()
		{

			parent::__construct();
			$this->load->model('client/client_model');
		}
			public function save_new_password()
		{

			$npassword=$this->input->post('password');
			$fid=$this->input->post('fid');
			$id=$this->input->post('sid');
			$password=password_hash($npassword,PASSWORD_BCRYPT);
			$data=array('password'=>$password);
			$fdata=array('status'=>1);
			$forgot_data=$this->client_model->update('course_forgot',$fdata,$fid);
			$result=$this->client_model->update('course_user_acc',$data,$id);
			if($result)
			{
				 $this->session->set_flashdata('login_error',"Password Changed Successfully");
		 redirect('login');
			}
			else
			{
				 $this->session->set_flashdata('login_error',"Password Changed Failed.Please try again");
		 redirect('login');
			}

		}
		
		public function forgot_process()
		{
			$to_email=$this->input->post('email_id');
			$this->load->helper('secure');
			$now=date('Y-m-d h:i:s');
				 $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
				$link_id = substr( str_shuffle( $chars ), 0, 20 );

			$user_id=$this->client_model->get_id_forgot($to_email);
			
			$data=array(

					'email'=>$to_email,
					'link_id'=>$link_id,
					'request_date'=>$now,
					'status'=>0,
					'createdon'=>$now

				);
			$forgot_data=$this->client_model->insert('course_forgot',$data);

			$suser_id=encrypt_url($user_id['id']);
			// $email=encrypt_url($to_email);
			$sdata=encrypt_url($forgot_data);

			// print "<a href='".base_url('change_password/'.$sdata.'/'.$suser_id)."'>Click Here</a>";
			
			

			$email=$this->input->post('email_id');
				    	   $config = array(        
		                 'mailtype' => 'html',
		                  'charset'  => 'utf-8',
		                  'priority' => '1'
		                

		        );
		    	   $this->load->library('email',$config); 
          $this->email->set_newline("\r\n");
          $this->email->set_mailtype("html");
        
          	 $msg="<p>Hi </p></p> <p>Recently you have request for your password details  ";
		    	  $msg .="</p><p>Reset your password:<p>";
		    	  $msg .="<a href='".base_url('change_password/'.$sdata.'/'.$suser_id)."'>Click Here</a>";
		    	

		    	 $msg.="<p>Thanking You,</p> <p>Admin</p><p> Training Videos  Team</p>";
   				$from_email="saranyas@simply-logic.com";
         $this->email->from($from_email, 'Admin'); 
         $this->email->to($to_email);
         $this->email->subject('Forgot Password :  Papaandbarkley Learning Management
'); 
         $this->email->message($msg); 
        
	          if($this->email->send()) 
	         {
		    	  $this->session->set_flashdata('forgot_msg',"Link sent to your mail.Please Check it");
		 redirect('forgot');
		    	}
		    	else
		    	{
		    		  $this->session->set_flashdata('forgot_msg',"Sorry,Error occur try again later");
		 redirect('forgot');
		    	}
		}


		public function check_user_email()
		{
			$email=$this->input->post('email');
			$result=$this->client_model->validate_user_email($email);
			if($result)
			{

				$msg="<p>Your Password</p>";
		    	
		    	 $msg .="You can change  your password after verify mail";
		    	 $msg_data=array('to'=>$email,'subject'=>'Forgot Password - education','msg'=>$msg);
		    	 $this->load->library('email_template');
		    	 $status=$this->email_template->send_mail_process($msg_data);
		    	 if($status)
		    	 {

		    	 	print "Link sent your mail id.";
		    	 }
		    	 else
		    	 {
                     print "Error occured";
		    	 }
		    	
			}
			else
			{
				echo "Invalid Email";
			}
		}
		public function check_email()
		{
			$comp_id=$this->session->userdata('user_id');
			$email=$this->input->post('email');

			$result=$this->client_model->check_invite_email($comp_id,$email);
			
			
		

			if(is_array($result))
			{
				if($result['status']==0)
				{
					$status= "Email Id  there. waiting for response";

				}
				else
				{
					$status= "Already Your Team. Please try another mail";
				}

			}
			else
			{
				$result=$this->client_model->check_all_user_mail($email);

				 if($result>0)
				{
					$status="Email id already use. Please choose another email";

				}
				
			     else
				{
										 $now=date("Y-m-d h:i:sa");
									 $data=array('company_mail'=>$email,'invite_date'=>$now,'invite_type'=>'invite');
				$insert_status=$this->client_model->insert('course_employee',$data);
				 
				 if(!empty($insert_status))
				{

					$emp_id=$insert_status;
					
					$this->load->helper('secure');
					$urlid=encrypt_url($emp_id);
					$to=encrypt_url($email);

		    	
		    
		    	 $register_mail=base_url('register')."/".$to."/".$urlid;

		    	
							    	   $config = array(        
		                 'mailtype' => 'html',
		                  'charset'  => 'utf-8',
		                  'priority' => '1'
		                

		        );
		    	   $this->load->library('email',$config); 
          $this->email->set_newline("\r\n");
          $this->email->set_mailtype("html");
        
          	 $msg="<p>Hi </p></p> <p>This is an invite from HYHR Ambassador Program. To register ";
		    	  $msg .="<a href='".$register_mail."'> click here</a> <br/><p>";
		    	

		    	 $msg.="<p>Thank You,</p> <p>HYHR Learning Management Platform
</p>";
   				$from_email="support@hyhrlms.gohyhr.com";
         $this->email->from($from_email, 'gohyhr'); 
         $this->email->to($email);
         $this->email->subject('Registration Invitation - HYHR Learning Management Platform'); 
         $this->email->message($msg); 
        
          if($this->email->send()) 
         {
		    	 $status="Invite sent successfully";
		    	}
		    	else
		    	{
		    		 $status="Mail not sent.Please try again";
		    	}
		    	}
		    	else
		    	{
		    		$status="Some error occured";
		    	}
	     		}
// 				 $now=date("Y-m-d h:i:sa");
// 				// $data=array('comp_id'=>$comp_id,'emp_mail'=>$email,'createdon'=>$now);
// 				// $insert_status=$this->client_model->insert('invite_employee',$data);
// 				//  if(!empty($insert_status))
// 				// {
// 				// 	$status="success";
// 				// 	$this->load->helper('secure');
// 				// 	$urlid=encrypt_url($comp_id);
// 				// 	$to=encrypt_url($email);

		    	
		    
// 		  //   	 $register_mail=base_url('register')."/".$to."/".$urlid;

// 		  //   	 $msg="<p>TYour team invite to join Please Register ";
// 		  //   	 $msg .="<a href='".$register_mail."'> click here</a> <br/><p>";
		    	
// 		  //   	 $msg_data=array('to'=>$to,'subject'=>'New Registeration - education','msg'=>$msg);
// 		  //   	 $this->load->library('email_template');
// 		  //   	 $this->email_template->send_mail_process($msg_data);
// 		  //   	 $status=$msg_data;




				
			}


			echo $status;

		}
		/* check already exist email */
		  public function forgot_password()
  {
  	$email=$this->input->post('email');

  $count= $this->client_model->validate_forgot_email($email);

	    	
	   if($count>0)
	   {

	 
			
			$this->load->helper('secure');
			$now=date('Y-m-d h:i:s');
				 $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
				$link_id = substr( str_shuffle( $chars ), 0, 20 );

			$user_id=$this->client_model->get_id_forgot($email);
			
			$data=array(

					'email'=>$email,

					'link_id'=>$link_id,
					'request_date'=>$now,
					'status'=>0,
					'createdon'=>$now

				);
			$forgot_data=$this->client_model->insert('course_forgot',$data);

			$suser_id=encrypt_url($user_id['id']);
			// $email=encrypt_url($to_email);
			$sdata=encrypt_url($forgot_data);

			// print "<a href='".base_url('change_password/'.$sdata.'/'.$suser_id)."'>Click Here</a>";
			
			

		
				    	   $config = array(        
		                 'mailtype' => 'html',
		                  'charset'  => 'utf-8',
		                  'priority' => '1'
		                

		        );
		    	   $this->load->library('email',$config); 
          $this->email->set_newline("\r\n");
          $this->email->set_mailtype("html");
        
          	 $msg="<p>Hi </p></p> <p>Recently you have request for your password details  ";
		    	  $msg .="</p><p>Reset your password:<p>";
		    	  $msg .="<a href='".base_url('change_password/'.$sdata.'/'.$suser_id)."'>Click Here</a>";
		    	

		    	 $msg.="<p>Thanking You,</p> <p>HYHR Learning Management Platform</p>";
   				$from_email="support@hyhrlms.gohyhr.com";
         $this->email->from($from_email, 'Admin'); 
         $this->email->to($email);
         $this->email->subject('Forgot Password :HYHR Learning Management Platform'); 
         $this->email->message($msg); 
        
	          if($this->email->send()) 
	         {  
				 print $msg;
		    	print true;
		    	}
		    	else
		    	{
					print $msg;
		    		print false;
		    		  
		    	}
		



	   }
	   else
	   {
	   	print false;
	   }

  }


		public function check_exist_email()
		{
			$email=$this->input->post('email');
			$result=$this->client_model->validate_user_email($email);
			 
			 
			if($result==0)
			{
				$status="true";
			}
			else
			{
				$status="false";
			}
			echo $status;

		}

		public function check_forgot_email()
		{
			$email=$this->input->post('email_id');
			$result=$this->client_model->validate_forgot_email($email);
			if($result==0)
			{
				$status="false";
			}
			else
			{
				$status="true";
			}
			echo $status;

		}


		/* check forgot link */


		public function check_change_details()
		{

			$sfid=$this->uri->segment(2);
			$suserid=$this->uri->segment(3);
			$this->load->helper('secure');
			$data['fid']=decrypt_url($sfid);
			$fid=decrypt_url($sfid);
			$data['userid']=decrypt_url($suserid);
			$userid=decrypt_url($suserid);
			

			$data['result']=$this->client_model->check_forgot_link($fid);

			
			 $this->template->load('master_view', 'contents' , 'home/change_password', $data);

		}
	

		
	}
	?>