<?php

	defined('BASEPATH') or die("No direct acript allowed");

	class Email_template
	{
		private $CI;
		public function __construct() 
        {
             $this->CI =& get_instance();
        }

		public function email_header()
		{

			 $header='<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>PapaandBarkley Mail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>';


		}

		public function email_subject($content)
		{

			$msg= "	<div >".$content. "</div>";
			return $msg;

			


		}

		public function email_footer()
		{

			$footer='<p>Kind Regards, <br/>Admin,Papa Barkley</p></body>
  </html>';
  return $footer;


		}
		public function send_mail_process($data)
		{
			$from="support@papaandbarkley.com";
			$from_name="Admin";
			$to=$data['to'];
			$subject=$data['subject'];
			$msg=$data['msg'];
		 $config = Array(        
		                 'mailtype' => 'html',
		                  'charset'  => 'utf-8',
		                  'priority' => '1'
		        );
        $this->CI->load->library('email',$config); 
		
			
			
			// $this->CI->email->from($from,'Admin');
			// $this->CI->email->to($to);
		 //    $this->CI->email->subject($subject);
			// $header=$this->email_header();
			// $sub=$this->email_subject($msg);
			// $foo=$this->email_footer();

			// $this->CI->email->message($header."".$sub."".$foo);

			// $status=$this->CI->email->send();
			 $message = '<html><body>';
         $message .= '<p>Hello admin,</p>';
       
         $from_email = "support@papaandbarkley.com"; 
         $to_email = "support@papaandbarkley.com"; 
         $this->CI->email->from($from_email, 'Abra'); 
         $this->CI->email->to($to_email);
         $this->CI->email->subject('Subject'); 
        $status= $this->CI->email->message($message); 
       
			if($status)
			{
				return  true;
			}
			else
			{
				return false;
			}

			//return $status;
		}

			/* send adminmail */
		public function send_mail_admin($data)
		{
			$from="support@papaandbarkley.com";
			$from_name="Admin";
			$to="support@papaandbarkley.com";
			$subject="New Registration";
			$msg="New Registrtion Detsils";

			$this->CI->load->library('email');
			$this->CI->email->from($from);
			$this->CI->email->to($to);
		    $this->CI->email->subject($subject);
			$header=$this->email_header();
			$sub=$this->email_subject($msg);
			$foo=$this->email_footer();

			$this->CI->email->message($header."".$sub."".$foo);

			$status=$this->CI->email->send();

			if($status)
			{
				echo true;
			}
			else
			{
				$this->CI->email->print_debugger();
			}
		}


	}
?>