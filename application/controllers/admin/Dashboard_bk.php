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
		$data['category']=$this->process->get_data_all('course_category');
		$this->admin_template->load('master_template', 'contents' , 'admin/upload_video', $data);
	}
	public function courses()
	{
		$this->admin_template->set('title','Courses');
		$data['test']="test";
		$data['courses']=$this->process->get_data_all('course_video_courses');
		$data['category']=$this->process->get_data_all('course_category');
		$data['employees']=$this->process->get_data_all('course_employee');
		$this->admin_template->load('master_template', 'contents' , 'admin/courses', $data);
	}
	public function content()
	{
		$this->admin_template->set('title','Content');
		$data['test']="test";
		$encrpt_id=$this->uri->segment(3);
		$data['courses']=$this->process->get_data_all('course_video_courses');
		$data['category']=$this->process->get_data_all('course_category');

		$this->admin_template->load('master_template', 'contents' , 'admin/content', $data);
	}
	public function content_list()
	{
		$this->admin_template->set('title','Content');
		$data['test']="test";
		$data['courses']=$this->process->get_data_all('course_content');
		$data['category']=$this->process->get_data_all('course_category');
		$data['employees']=$this->process->get_data_all('course_employee');
		$this->admin_template->load('master_template', 'contents' , 'admin/content_list', $data);
	}
	public function category()
	{
		$this->admin_template->set('title','Content');
		$data['test']="test";
		$data['courses']=$this->process->get_data_all('course_category');
		$data['count_courses']=$this->process->get_data_all('course_cat_links');
		$data['category']=$this->process->course_get_content_cat();
		$this->admin_template->load('master_template', 'contents' , 'admin/category', $data);
	}
	public function view_category()
	{
		$this->admin_template->set('title','Content');
		$data['test']="test";
	 
		$encrpt_id=$this->uri->segment(3);
		$this->load->helper('secure');
		$content_id=decrypt_url($encrpt_id);
		$data['content_id']=$encrpt_id;
		$data['employees']=$this->process->get_data_all('course_employee');
		$data['course_name']=$this->process->get_data_specfic($content_id,'course_category');
	$data['posts']=$this->process->get_data_category($content_id,'course_category');
	$data['category']=$this->process->get_data_all('course_category');
   
		$data['courses']=$this->process->get_data_video_cat($content_id,'course_video_courses');
		 
		$this->admin_template->load('master_template', 'contents' , 'admin/category_post', $data);
	}
	public function content_data()
	{
		$this->admin_template->set('title','Content');
		$data['test']="test";
		$encrpt_id=$this->uri->segment(3);
		$this->load->helper('secure');
		$content_id=decrypt_url($encrpt_id);
		$data['content_id']=$encrpt_id;
		$data['content']=$this->process->get_data_specfic($content_id,'course_content');
		$data['category']=$this->process->get_data_all('course_category');

		
		$this->admin_template->load('master_template', 'contents' , 'admin/content_list_data', $data);
	}
	public function video_data()
	{
		$this->admin_template->set('title','Content');
		$data['test']="test";
		$encrpt_id=$this->uri->segment(3);
		$this->load->helper('secure');
		$content_id=decrypt_url($encrpt_id);
		$data['content_id']=$encrpt_id;
		$data['content']=$this->process->get_data_specfic($content_id,'course_video_courses');
		$data['category']=$this->process->get_data_all('course_category');

		
		$this->admin_template->load('master_template', 'contents' , 'admin/video_data', $data);
	}
	 /*edit content */

	 public function edit_content()
	 {
		 
	  $encrpt_id=$this->uri->segment(3);
	  $this->load->helper('secure');
	  $content_id=decrypt_url($encrpt_id);
	  $data['content_id']=$encrpt_id;
	 
		$data['content']=$this->process->get_data_specfic($content_id,'course_content');
		$data['category']=$this->process->get_data_all('course_category');
		 
		$this->admin_template->load('master_template', 'contents' , 'admin/edit_content', $data);
		 
	  
  
	 }
	
	public function media()
	{
		$this->admin_template->set('title','Content');
		$data['test']="test";
		$encrpt_id=$this->uri->segment(3);
		$this->load->helper('secure');
	 
		 
		$data['media']=$this->process->get_data_all('course_media');
		 
		$this->admin_template->load('master_template', 'contents' , 'admin/media_list', $data);
	}
	public function media_data()
	{
		$this->admin_template->set('title','Content');
	 
		$encrpt_id=$this->uri->segment(3);
		$this->load->helper('secure');
		$content_id=decrypt_url($encrpt_id);
		 
		$data['media']=$this->process->get_data_specfic($content_id,'course_media');
		 
		$this->admin_template->load('master_template', 'contents' , 'admin/media_list_data', $data);
	}

    public function logout(){

    	$this->session->sess_destroy();
		redirect('admin');
	}


	
	
}
?>