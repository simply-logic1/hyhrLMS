<?php

    defined('BASEPATH') OR exit('No direct script access allowed'); 

	class Analytics_emp extends CI_Controller
	{

		public function __construct()
		{

			parent ::__construct();
		}

		public function  get_view_time()
		{
			echo "employee View /time";
		}

		public function get_view_courses()
		{

			echo "view Courses";
		}

		public function get_test_result()
		{
		
			$sres_id=$this->uri->segment(3);
			$this->load->helper('secure');
			$res_id=decrypt_url($sres_id);
			$semp_id=$this->uri->segment(4);
			$emp_id=decrypt_url($semp_id);
		
			$this->load->model('client/analytics_model');
			$data['ques']=$this->analytics_model->get_test_details($res_id,$emp_id);
			 
			$this->template->load('user_template', 'contents' , 'client/emp_result', $data);

		}
	}