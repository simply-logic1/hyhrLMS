<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('admin/process');
	}
	public function index()
	{
		$this->admin_template->set('title','Home');
		$this->load->view('admin/login');
	}
	public function admin_dash()
	{
		$data['test']="test";
		$data['no_of_client']=$this->process->get_list_data('course_employee');
		$data['no_of_video']=$this->process->get_list_data('course_video_courses');
		$data['no_of_quiz']=$this->process->get_list_data('course_test');
		$this->admin_template->load('master_template', 'contents' , 'admin/dashboard', $data);
	}
	public function check_user()
	{
		$username=$this->input->post('user_name');
		$password=$this->input->post('password');
        $result=$this->process->check_user_data($username,$password);
       
      
       if((!empty($result)) && $result['data'] ==true)
        {  
        	
        	$data=array(

 				'logged_in'=>true,
 				'admin_uname'=>$username,
 				'name'=>$result['name'],
 				'admin_id'=>$result['id'],
 				'acc_type'=>$result['acc_type']
 			);
 				
 			
 			$this->session->set_userdata($data);
 			//$user_uid=$this->session->userdata('user_unique_id');

			redirect('admin/dashboard');
			

        }
        else
        {
        	
        	$this->session->set_flashdata('login_error','Login Failed');
        	redirect('admin');
        }
			
	}
	public function client()
	{
		$this->admin_template->set('title','Client');
		
		$data['clients']=$this->process->get_data_all_client('course_employee');
		$data['test']="test";
		$this->admin_template->load('master_template', 'contents' , 'admin/client', $data);
	}
	public function analytics()
	{
		$this->admin_template->set('title','Analytics');
		$data['test']="test";
		$this->admin_template->load('master_template', 'contents' , 'admin/analytics', $data);
	}
	public function employee()
	{
		$this->admin_template->set('title','Employee');
		$data['test']="test";
	
			

		$this->admin_template->load('master_template', 'contents' , 'admin/employee', $data);
	}
	public function upload_video()
	{
		$this->admin_template->set('title','Add Video');
		$data['test']="test";
		$this->admin_template->load('master_template', 'contents' , 'admin/upload_video', $data);
	}
	public function courses()
	{
		$this->admin_template->set('title','Courses');
		$data['test']="test";
		$data['courses']=$this->process->get_data_all('course_video_courses');
		$this->admin_template->load('master_template', 'contents' , 'admin/courses', $data);
	}
     
    public function logout(){

    	$this->session->sess_destroy();
		redirect('admin');
	}


	
	
}
?>