<?php

defined('BASEPATH') or die("No script allowed");

class Course_emp extends CI_Model
{
	
	public function __construct()
	{
	parent::__construct();
	}

	public function get_course_list()
	{
	  $result=$this->db->query("select * from course_video_courses");
 	  return $result->result_array();
	}
	public function get_user_comp_id($id)
	{
		$result=$this->db->query("select company_id from course_employee where id='".$id."'");

		$count=$result->num_rows();
		if($count>0)
		{
			$comp_id= $result->row_array();

			return $comp_id['company_id'];

		}
		else
		{
			return false;
		}
	}
	public function check_comp_payment($id)
	{
		$result=$this->db->query("select * from course_plan where client_id='$id' and  payment_status=1");

		$count=$result->num_rows();
		if($count>0)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	public function get_courses_free()
 	{

 		$result=$this->db->query("select * from course_video_courses where course_type='free_video' ");
 		return $result->result_array();
 	}

 	public function get_courses_paid_all($id)
 	{
 		$result=$this->db->query("select course_id from  course_assign_video_emp where emp_id='".$id."' ");
 		return $result->result_array();
	  }
	  
	  /*
  	public function get_course_assign($id)
  	{
  		$result=$this->db->query("select  video.*,status.status as video_status  from  course_video_courses as video  left join course_emp_video_status as status on status.emp_id='".$id."' and status.course_id=video.id");
 		return $result->result_array();
	  }
	  */
	   
	   
  	 public function get_course_assign($id)
  	 {
  		$result=$this->db->query("select emp.course_id,emp.emp_id,video.*,status.status as video_status  from  course_assign_video_emp as emp  left join course_content as video   on emp.course_id=video.id  left join course_emp_video_status as status on status.emp_id='".$id."' and status.course_id=emp.course_id where video.course_type='video' and emp.emp_id='".$id."' or emp.emp_id=0 group by emp.course_id ");
 		return $result->result_array();
	   }
	    
	   public function get_content_assign($id)
  	 {
  		$result=$this->db->query("select emp.course_id,emp.emp_id,video.*,status.status as video_status  from  course_assign_video_emp as emp  left join course_content as video   on emp.course_id=video.id  left join course_emp_video_status as status on status.emp_id='".$id."' and status.course_id=emp.course_id where video.course_type='post' and emp.emp_id='".$id."' or emp.emp_id=0 group by emp.course_id ");
 		return $result->result_array();
  	 }
  	/* check aready exist in table user */

  	public function check_emp_course($tblname,$empid,$courseid)
  	{

  		$result=$this->db->query("select id,status from $tblname where emp_id='".$empid."' and course_id='".$courseid."' ");
  		$count=$result->num_rows();

  		if($count>0)
  		{
  			return $result->row_array();
  		}
  		else
  		{
  			return FALSE;
  		}
  	}
  	public function insert_emp_video_status($tblname,$data)
  	{
  		$insert=$this->db->insert($tblname,$data);
		if($insert)
		{
			return $this->db->insert_id();
		}
		else
		{
			return false;
		}
  	}

  	public function update_emp_video_status($tblname,$data,$id)
  	{
  		if(!empty($data) && !empty($id)){
            $update = $this->db->update($tblname, $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
  	}

  	public function get_emp_video_status($id,$course_id)
	{	
		$data=$this->db->select('view_ratio,status')->get_where('course_emp_video_status',array('emp_id'=>$id,'course_id'=>$course_id));
		$result=$this->db->count_all_results();
		if($result>0)
		{
			return $data->row_array();
		}
		else
		{
			return false;
		}

	}
	public function get_data_all($tblname)
	{
		$query=$this->db->get($tblname);
 		$userdata=$query->result_array();
		return $userdata;
	} 
	public function get_data_field($fld,$val,$tblname){
		$query=$this->db->select('*')
	 
		->where( $fld,$val)->get($tblname);
		return $query->result_array();
	}

}

?>