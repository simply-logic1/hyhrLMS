<?php

	defined('BASEPATH') or exit("No direct page allowed");

	class Course_emp  extends CI_Controller

	{
		public function __construct()
		{

			parent::__construct();
			$this->load->model('employee/course_emp');
		}
		public function store_emp_video_status()
		{
			print "store me video status";
			
		    print $this->input->post('comp_id');

			//$this->course_emp->insert_emp_video_status('emp_video_status',$data);

		}
	}