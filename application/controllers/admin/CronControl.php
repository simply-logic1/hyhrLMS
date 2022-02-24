<?php

class CronControl extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('admin/process');
    }

    public function reminder_mail()
    {
        $result=$this->process->reminder_cron();
  


       print_r($result);
       foreach($result as $res)
       {
       $from_email = "support@hyhrlms.gohyhr.com"; 
			 
  
		   $config = array(        
						   'mailtype' => 'html',
							'charset'  => 'utf-8',
							'priority' => '1'
						  
  
				  );
	 
					$this->load->library('email',$config); 
			$this->email->set_newline("\r\n");
			$this->email->set_mailtype("html");
		   $first_name=$res['first_name']." ".$res['last_name'];
		  
				 $msg="<p>Hi ".ucwords($first_name).",</p> <p>This is reminder form your team.check new videos. </p> ";
				   
				  
  
				   $msg.="<p>Thank You,</p> <p>Team</p>";
	 
		   $this->email->from($from_email, 'Team'); 
		   $this->email->to($to_email);
		   $this->email->subject(' Reminder'); 
		   $this->email->message($msg); 
		 
	         if($this->email->send()) 
	         {
	             
	        }

	        else
	        {  
	             
            } 
        }
    }
    
}	