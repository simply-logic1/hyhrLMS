<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __constructor()
		{
			parent::__constructor();
				
				
			
		}
	public function index()
	{
		$this->load->model('client/client_model');
		$this->template->set('title','Dashboard');
		$data['userdata']=$this->session->all_userdata();
		$id=$this->session->userdata('user_id');
        $data['id']=$this->session->userdata('user_unique_id');

		$data['client_data']=$this->client_model->get_client_details($id);
        $data['list']=$this->client_model->get_list($id);
        
		
		$this->template->load('user_template', 'contents' , 'client/dashboard', $data);
		
		
		

	}

  	public function account()
	{
			
		$this->template->set('title','Dashboard');
		$data['userdata']=$this->session->all_userdata();
		$this->template->load('user_template', 'contents' , 'client/account', $data);
		
		//$this->load->view('client/dashboard');

	}
	public function employee()
	{
			
		$this->template->set('title','Dashboard');
		$data['userdata']=$this->session->all_userdata();
	
		$this->load->model('client/client_model');
		$company_id=$this->session->userdata('user_id');
	
		
		$data['employees']=$this->client_model->get_all_employee($company_id);
		$data['invite_emp_pending']=$this->client_model->get_invite_pending_emp($company_id);
		$data['invite_pending']=$this->client_model->check_invite($company_id);
		$data['check_lic']=$this->client_model->check_lic_emp($company_id);
		
		$this->template->load('user_template', 'contents' , 'client/employee', $data);
		
		//$this->load->view('client/dashboard');

	}
	
	public function user_logs()
	{
			
		$this->template->set('title','Dashboard');
		$data['userdata']=$this->session->all_userdata();
		$this->template->load('user_template', 'contents' , 'client/user_logs', $data);
		
		//$this->load->view('client/dashboard');

	}
		public function analytics()
	{
			
		$this->template->set('title','Dashboard');
		$data['userdata']=$this->session->all_userdata();
		$this->load->model('client/analytics_model');
		
		$id=$this->session->userdata('user_id');
		$data['all_details']=$this->analytics_model->get_all_details($id);
		$data['emp_datas']=$this->analytics_model->get_emp_video_status($id);
		$data['course_details']=$this->analytics_model->get_course_details($id);
		$this->template->load('user_template', 'contents' , 'client/analytics', $data);
		
		//$this->load->view('client/dashboard');

	}
	  /* chennal list */

	public function chennals()
	{

		$this->template->set('title','Chennals');
		//$data['userdata']=$this->session->all_userdata();
		$this->load->model('client/course_model');
		$id=$this->session->userdata('user_id');
		$result=$this->course_model->check_user_payment($id);
   
	        $data['courses']=$this->course_model->get_courses_free();

	        //print_r($courses);
	    
	    $this->load->model('client/client_model');
	    	$company_id=$this->session->userdata('user_id');
	  	$data['employees']=$this->client_model->get_all_employee($company_id);
		$this->template->load('user_template', 'contents' , 'client/chennals', $data);
	}
	public function logout()
	{
			
		$this->template->set('title','Dashboard');
		$this->session->sess_destroy();
		redirect('home');
		//$this->load->view('client/dashboard');

	}
	public function add_team()
	{
		$team=$this->input->post('team');
			$this->load->model('client/client_model');
		$client_id=$this->session->userdata('user_id');
		$data=array(

			'team'=>$team,
			 'client_id'=>$client_id
		);
		$result=$this->client_model->insert('team',$data);
		echo $result;
	}

	/* get Employee Details */

	public function get_emp_detail()
	{

		$id=$this->uri->segment(3);
		
		$this->load->helper('secure');
		$emp_id=decrypt_url($id);
		$this->load->model('client/client_model');
		$data['emp_data']=$this->client_model->get_emp_data($emp_id);
		$data['assign_videos']=$this->client_model->get_assign_videos($emp_id);
		$data['test_report']=$this->client_model->get_test_report($emp_id);


		
			$this->template->load('user_template', 'contents' , 'client/employee_detail', $data);

	}
    /*video anal */
    
    public function video_analytics()
    {
            $this->template->set('title','Dashboard');
		$data['userdata']=$this->session->all_userdata();
		$this->load->model('client/analytics_model');
		
		$id=$this->session->userdata('user_id');
	    	$data['all_details']=$this->analytics_model->get_all_details($id);
		$data['emp_datas']=$this->analytics_model->get_emp_video_status($id);
		$data['course_details']=$this->analytics_model->get_course_details($id);
		$this->template->load('user_template', 'contents' , 'client/video_analytics', $data);
    }

    /* leaderboard */
    public function leaderboard()
    {
    	$this->template->set('title','Dashboard');
		$data['userdata']=$this->session->all_userdata();
		$this->load->model('client/analytics_model');
		
		$id=$this->session->userdata('user_id');
	   
		$data['course_details']=$this->analytics_model->get_user_perform($id);
		$data['quiz_details']=$this->analytics_model->get_quiz_perform($id);

	
		//print_r($data['quiz_details']);
		$this->template->load('user_template', 'contents' , 'client/leaderboard', $data);

    }
	/* delete employee datas */
	public function del_emps()
	{
		$secure_ids=$this->input->post('ids');
		print_r($secure_ids);
		
		 $this->load->helper('secure');
		  $ids=array();
		
		
		 
		   foreach ($secure_ids as $id) {
		         $ids[]=decrypt_url($id);
		 }
		 print_r($ids);

		$this->load->model('client/client_model');
		$result=$this->client_model->delete_emp_data($ids);
		echo $result;


	}

}
