<?php
defined('BASEPATH') OR exit('No direct script access allowed');  
class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home/Process');


	}
	
	public function index()
	{
		$data = array();
		
		$this->template->set('title', 'Home');

        $this->template->load('master_view', 'contents' , 'home/home', $data);
    	//$this->load->view('home/home');

         
	}

	


  	public function login()
	{

	           $data = array();
			   $this->template->set('title', 'Home');
			   // 	if($this->session->userdata('logged_in')==true)
			   //  {

			   //  	redirect('dashboard');
			   //  }
			   $data['msg']=$this->session->flashdata('error');
               $this->template->load('master_view', 'contents' , 'home/login', $data);

			   //$this->load->view('home/login');
	}
	/* login process */
	public function login_process()
	{
		
		$data=array(

				'email_id'=>$this->input->post('email_id'),
				'password'=>$this->input->post('password')
			 );

		$process=new Process();
		$tblname="course_user_acc";
		$result=$process->get_user($tblname,$data);

	
		

	
		if((!empty($result)) && $result['data'] ==true)
		{
				
			if($result['acc_type']==='organization')
			{
				$redirect='dashboard';
				$tblname='course_clients';
			}
			if($result['acc_type']==='employee')
			{
					$redirect='library';
			
					$tblname='course_employee';
			}
			$id=$result['id'];
			$user_res=$process->get_data($tblname,$id);
			//print_r($user_res."ada");
			if(!empty($user_res))
			{
					$data=array(

 				'logged_in'=>true,
 				'user_name'=>$user_res['first_name']." ".$user_res['last_name'],
 				'user_id'=>$user_res['id'],
 				'user_unique_id'=>$user_res['userid'],
 				'user_type'=>$result['acc_type']
 			);
 			$this->session->set_userdata($data);
 			$user_uid=$this->session->userdata('user_unique_id');

			redirect($redirect."/".$user_uid);
			}

			else
			{
				$this->session->set_flashdata('login_error',"Something wrong. Please Try again");
		 redirect('login');
			}

		

		}
		else
		{
		  $this->session->set_flashdata('login_error',"Login Failed");
		 redirect('login');
		}
	}
	public function signup()
	{

	  		$data = array();
	  		$data['no_of_lic']=$this->uri->segment(3);
	  		$secure_plan_id=$this->uri->segment(2);
	  		$this->load->helper('secure');
	  		$plan_id=decrypt_url($secure_plan_id);
	  		
	  		if($plan_id=="Free Trail")
	  		{
	  		   $data['plan_list']=array('plan_title'=>'Free Trail','plan_price'=>0);
	  		}
	  		else
	  		{
	  	
             $process= new Process();
	  		$data['plan_list']=$process->get_data_specfic('course_plan_list',$plan_id);
	  	}
	  	

	  	
	  		// $data['no_of_lic']=$this->input->post('no_of_lic');
	  		// $data['plan_id']=$this->input->post('plan_id');

	
			$this->template->set('title', 'Home');
            $this->template->load('master_view', 'contents' , 'home/signup', $data);
	  		
	}

	public function add_user()
	{	
		
			$acc_type='organization';
			$process=new Process();
			 $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
 			// $password = substr( str_shuffle( $chars ), 0, 8 );
			 	$uniquepassword = substr( str_shuffle( $chars ), 0, 8 );
			 	$password=password_hash($uniquepassword,PASSWORD_BCRYPT);
 			$urlid = substr( str_shuffle( $chars ), 0, 20 );
 			//	'password'=>password_hash("dfgd",PASSWORD_BCRYPT),
	  	    
			$this->load->helper('string');
				$random_id=random_string('numeric',5);
		$fname=$this->input->post('first_name');
		$userid=$fname."_".$random_id;
        $now=date('Y-m-d h:i:s');
        $acc_data=array(
              	
				'primary_email'=>$this->input->post('primary_email'),
				'password'=>$password,
				'acc_type'=>$acc_type,
				'status'=>TRUE

			);
              	$result=$process->insert('course_user_acc',$acc_data);
			
			

			$process=new Process();
		

	
			
		//$status=true;
		if(!empty($result))
		{
            $id=$result;
           
              $now=date("Y-m-d h:i:sa");
              /* create user id random */
    		  $data=array(
            'userid'=>$userid,
            'user_acc_id'=>$id,
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'email_id'=>$this->input->post('primary_email'),
			'mobile_no'=>$this->input->post('phone'),
			
			'company_name'=>$this->input->post('company_name'),
			'company_member'=>$this->input->post('no_of_emp'),
			'company_address'=>$this->input->post('comp_address'),
			'password'=>$password,
			
			'check_urlid'=>$urlid,
			'createdon'=>$now

			);
           
              
                      $tblname='course_clients';
			$result1=$process->insert($tblname,$data);
            
          
			
		    if(!empty($result1))
		    {
                
		    	$status=true;
		   
	    	}
	     	else
		   {
		    	$status=false;
	    	}
		}
        else
        {
            $status=false;
        }

		//echo $result;
		if($status)
		{


			 	 $this->load->helper('secure');

			  $to_email=$this->input->post('primary_email');
		     	 $to=encrypt_url($to_email);
		    
		     $verify_mail=base_url('verfiy_email')."/".$to."/".$urlid;
			
		  $from_email = "support@papaandbarkley.com"; 
      
         $config = array(        
		                 'mailtype' => 'html',
		                  'charset'  => 'utf-8',
		                  'priority' => '1'
		                

		        );
   
         //Load email library 
         $this->load->library('email',$config); 
          $this->email->set_newline("\r\n");
          $this->email->set_mailtype("html");
         $first_name=$this->input->post('first_name');
			$last_name=$this->input->post('last_name');
          	 $msg="<p>Hi ".ucwords($first_name)." ".ucwords($last_name).",</p> <p>You have been added to the Papaandbarkley Learning Management Platform ";
		    	 $msg .="<a href='".$verify_mail."'> click here</a> </p><p>Your Login Details are:</p><br/><p>Username :" .$to_email."</p><br/><p>Your password is  ".$uniquepassword."</p>";
		    	

		    	 $msg.="<p>Thank You,</p> <p>Papaandbarkley Learning Management</p>";
   
         $this->email->from($from_email, 'PapaandBarkley'); 
         $this->email->to($to_email);
         $this->email->subject('Retail Partner Registration - Papaandbarkley Learning Management'); 
         $this->email->message($msg); 
    
      
         //Send mail 
         if($this->email->send()) 
         {
          echo true; 
        }

          else {  
          	echo false; 
          } 
   }
		
		else
		{
			echo  false;
		}

	}

	public function forgot()
	{
		$this->template->set('title','Home');
		
		 $this->template->load('master_view', 'contents' , 'home/forgot');
	}
	/* Dashboard function */

	public function dashboard()
	{

		$this->template->set('title','Dashboard');
		$data['userdata']=$this->session->all_userdata();
		 $this->template->load('master_view', 'contents' , 'home/dashboard', $data);
	}

	public function about()
	{
		$this->template->set('title','About');
		$data=array();
		$this->template->load('master_view','contents','home/about',$data);
	}
	public function courses()
	{
		$this->template->set('title','Contact');
		$data=array();
		$this->template->load('master_view','contents','home/courses',$data);
	}
	public function contact()
	{

	    $data = array();
	    $this->template->set('title', 'Home');
        $this->template->load('master_view', 'contents' , 'home/contact', $data);
	}
	public function thankyou()
	{
		 $data = array();
	    $this->template->set('title', 'Home');
	    $data['email_status']=$this->session->flashdata('email_status');
        $this->template->load('master_view', 'contents' , 'home/thankyou', $data);
	}
	public function verfiy_email()
	{

		$hash_email=$this->uri->segment(2);
		$urlid=$this->uri->segment(3);

		//echo $email;echo "<br>id".$urlid;
		  $this->load->helper('secure');
		  $email=decrypt_url($hash_email);


	    $process=new Process();
		$result=$process->verfiy_email_process($email,$urlid);
		if(!empty($result))
		{
			if($result['email_valid'] ==0 && $result['status'] ==0)
			{
				$data=array('email_valid'=>1,'status'=>1);
				$id=$result['id'];

				$check_pro=$process->update('course_clients',$data,$id);
				if($check_pro)
				{
	                 $data['email_status']="Your email  verfied succesfully. Please  <a href='".base_url('login')."'>Login</a>  ";
		   	
				}
				else
				{
	               $data['email_status']="Sorry ,Error Occur Please try again ";
				}
				
			}
			else
			{
			$data['email_status']=" Already your email  verifed. Please  <a href='".base_url('login')."'> Login</a>  ";
			}
	   }
		else
		{
			$data['email_status']="Sorry ,Invlaid Code Please try again ";
		}
		$this->template->set('title', 'Home');
        $this->template->load('master_view', 'contents' , 'home/thankyou', $data);

	}

	/* pricing ctrl */

	public function pricing()
	{
		$process=new Process();
		$data['pricing']=$process->get_price_data();
			
		$this->template->set('title','Contact');
		
		$this->template->load('master_view','contents','home/pricing',$data);
		
		
	}
	/* test mail */

	public function test_mail()
	{

		    		
		    	 $to="subramanian.saranya@gmail.com";
		    
		    	 $verify_mail=base_url('verfiy_email')."/".$to."/sss";

		    	 $msg="<p>Thankyou register with us </p><br/>Please verfiy Your Email Is ";
		    	 $msg .="<a href='ff'> click here</a> <br/><p>Your Password:dgdf";
		    	 $msg .="You can change Your your password after verify mail";
		    	 $msg_data=array('to'=>$to,'subject'=>'New Registeration - education','msg'=>$msg);
		    	 $this->load->library('email_template');
		    	$mail_status= $this->email_template->send_mail_process($msg_data);
                if($mail_status)
                {
                	$mail_status=true;
                }
                else
                {
                	$mail_status=false;
                }
                echo $mail_status;
		 //  $from_email = "subramanian.saranya@gmail.com"; 
   //       $to_email = "subramanian.saranya@gmail.com"; 
   
   //       //Load email library 
   //        $config = Array(        
		 //                 'mailtype' => 'html',
		 //                  'charset'  => 'utf-8',
		 //                  'priority' => '1',
		 //                  'newline'=>"\r\n"

		 //        );
   //       $this->load->library('email'); 
   
   //       $this->email->from($from_email, 'saranya'); 
   //       $this->email->to($to_email);
   //       $this->email->subject('Email Test'); 
   //       $this->email->message('Testing the email class.'); 
   //    print "fdfs";
   //    $this->email->print_debugger();
   //       //Send mail 
   //       if($this->email->send()) 
   //       {
   //       echo $this->email->print_debugger(); echo "success"; }
   //        else { echo $this->email->print_debugger(); echo "failed"; } 
   // }

}


}
?>