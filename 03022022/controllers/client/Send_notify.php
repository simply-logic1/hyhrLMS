<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed'); 


	class   Send_notify extends CI_Controller
	{

		 public function __construct()
		 {

		 	 parent::__construct();

		 	 $this->load->library('email_template');
		 	 
		 }
		 public function send_invite()
		 {

		 	// $header=$this->email_template->email_header();
		 	// $footer=$this->email_template->email_footer();
		 	// $subject=$this->email_template->email_subject("subject iline");
		 	// $this->load->library('email_template');
		 	// $result=$this->email_template->send_mail_process($data);
		 	// echo $result;
		 	 
		 	  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
 			$urlid = substr( str_shuffle( $chars ), 0, 20 );
		 	 $to="ddd";
		    	 $verify_mail=base_url().$to."/".$urlid;

		    	 $msg="<p>Thankyou register with us </p><br/>Please verfiy Your Email Is ";
		    	 $msg .="<a href='".$verify_mail."'> click here</a>";
		    	 $mail_data=array('to'=>$to,'subject'=>'Thankyou Register - Papa Barkley','msg'=>$msg);
		    	 $this->email_template->send_mail_process($mail_data);

		    

		 	
		 	
		 }
		 public function send_email($data)
		 {

		 	$this->load->library('email_template');
		 	$result=$this->email_template->send_email();
		 	echo "sss".$result;
		 }
	}

?>