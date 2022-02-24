<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_model extends CI_Model
{
	
	/*Insert */
	public function insert($tblname,$data=array())
	{

		$insert=$this->db->insert($tblname,$data);

     
		if($insert)
		{
			$id= $this->db->insert_id();
     return $id;
     

		}
		else
		{
			return false;
		}

   }
   public function get_list($id)
  {
    $result=$this->db->select('COUNT(id) as list')->where('company_id',$id)->from('course_employee')->get();
   //$result=$this->db->select('COUNT(id) as list')->from('course_video_courses')->get();
    return $result->row_array();
  }
  public function get_list_vid($id)
  {
   // $result=$this->db->select('COUNT(id) as list')->where('company_id',$id)->from('course_employee')->get();
   $result=$this->db->select('COUNT(id) as list')->from('course_video_courses')->get();
    return $result->row_array();
  }

	public function get_all_employee($company_id)
	{
		
		//echo $company_id;
	   $result=$this->db->query("select * from course_employee where company_id='".$company_id."' and status=1");
		

	   $all_emp=$result->result_array();

	   return $all_emp;
	}
	/* Get Pending employee */
	public function get_invite_pending_emp($company_id)
	{
		
		//echo $company_id;
	   $result=$this->db->query("select * from course_employee where company_id='".$company_id."' and status=0");
	   $all_emp=$result->result_array();

	   return $all_emp;
	}




	/* chekcmeial invite table */

	public function check_invite($company_id)
	{

		$result=$this->db->query("select * from course_invite_employee where comp_id='".$company_id."' and status=0 ");
		 $invite=$result->result_array();

	   return $invite;
	}
	public function check_field($tblname,$key,$val)
	{
			$result=$this->db->query("select * from $tblname where $key=$val ");
		 $invite=$result->result_array();

	   return $invite;

	}
	/* get courses details */

	public function get_courses_det_id($id)
	{
		$result=$this->db->query("select * from course_content where id='".$id."'");
		return $result->result_array();
	}
	public function get_video_status($id,$course_id)
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

	/* Get Particuklar employee details */

	public function get_emp_data($emp_id)
	{

		$query=$this->db->select("emp.*,video.*,emp.id as emp_id")->from('course_employee as emp')->join('course_emp_video_status as video','video.emp_id=emp.id','left')->where('emp.id',$emp_id)->get();

		return $query->result_array();

	}
	/* get assign videos employee */
	public function get_assign_videos($emp_id)
	{
		// 	$query=$this->db->select("emp.id as empid,video.*,video_list.*,video_status.*")->from('course_employee as emp')->join('course_assign_video_emp as video','video.emp_id=emp.id or video.emp_id=0','left')->join('course_video_courses as video_list','video.course_id=video_list.id','left')->join('course_emp_video_status as video_status','emp.id=video_status.emp_id and video_status.course_id=video.course_id','left')->where('emp.id',$emp_id)->group_by('video.course_id')->get();

		// return $query->result_array();
			$query=$this->db->select("res.id as rid,emp.id as empid,video.*,video_list.*,video_status.*,
			IF((res.id IS NULL),'Pending','Completed') as test_result
			")->from('course_assign_video_emp as video')
		->join('course_video_courses as video_list','video.course_id=video_list.id','left')
		->join('course_employee as emp','video.emp_id=emp.id or video.emp_id=0','left')
		
		->join('course_emp_video_status as video_status','emp.id=video_status.emp_id and video_status.course_id=video.course_id','left')
		->join('course_test as test','test.video_id=video.course_id','left')

			->join('course_test_emp_result as res','res.test_id=test.id and res.user_id=emp.id','left')
		

		->where('emp.id',$emp_id)->group_by('video.course_id')->get();

		return $query->result_array();
	}
	/* check email id fro invite employee */

   public function check_invite_email($compid,$mail)
   {
	    $check=array('id'=>$compid,'primary_mail'=>$mail);
	    $query=$this->db->select('invite_status,status,invite_type')->from('course_employee')->where($check);
	    $get= $query->get();
	    $count=$get->num_rows();

	 	
	    if($count==0)
	    {
	    	return true; 
	    }
	    else
	    {
	    	return $get->row_array();
	    }
   }
   /* check email to all user */

   public function check_all_user_mail($email)
   {

   
   	    $query=$this->db->select('*')->from('course_employee')->where('primary_mail',$email)->or_where('company_mail',$email)->get();
   	    $count=$query->num_rows();
   	    return $count;
   	   
   	    // if($count==0)
   	    // {
   	    // 	return true;
   	    // }
   	    // else
   	    // {
   	    // 	return false;
   	    // }
   }

   /* vlaidate user email */
   public function validate_user_email($email)
   {

	    //$query=$this->db->select('status')->from('course_clients')->where('email_id',$email);
   	$query=$this->db->select('status')->from('course_employee')->where('primary_mail',$email)->or_where('company_mail',$email);
	    $get= $query->get();
		$count=$get->num_rows();
		$query1=$this->db->select('*')->from('course_admin')->where('email',$email);
	    $get1= $query1->get();
	    $count1=$get1->num_rows();
   if($count==1 || $count1==1)
   {
	return 1;
   }
   else
   {
	return  0;

   }
	   

	    // if($count==1)
	    // {
	    // 	return true; 
	    // }
	    // else
	    // {
	    // 	return $get->row_array();
	    // }
   }
  public function validate_forgot_email($email)
  {
  	$query=$this->db->select('*')->from('course_user_acc')->where('primary_email',$email)->or_where('company_email',$email);
	    $get= $query->get();
	    $count=$get->num_rows();

	    return $count;

  }

  public function get_id_forgot($email)
  {
  	$query=$this->db->select('id')->from('course_user_acc')->where('primary_email',$email)->or_where('company_email',$email)->get();
	  
	    return $query->row_array();

	    
  }
   /* get client details */

   public function get_client_details($client_id)
   {

		$query=$this->db->select("client.id,client.plan_id,client.company_member,plan.*,COUNT(emp.company_id) as no_emp")->from('course_clients as client')->join('course_plan as plan','client.plan_id=plan.id','left')
			->join('course_employee as emp','client.id=emp.company_id','left')
			->where('client.id',$client_id)->get();
   		

	

		return $query->row_array();


   }
    public function update($tblname,$data,$id)
   {
   	if(!empty($data) && !empty($id)){
            $update = $this->db->update($tblname, $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
   }

   	/*check invite employee -lic */
	public function check_lic_emp($client_id)
	{
		$query=$this->db->select("client.id,client.plan_id,plan.no_of_lic,COUNT(emp.company_id) as no_emp,SUM(CASE WHEN emp.invite_status=0 then 1 else 0 end)as invite_pending")->from('course_clients as client')->join('course_plan as plan','client.plan_id=plan.id','left')
			->join('course_employee as emp','client.id=emp.company_id','left')

			->where('client.id',$client_id)->get();

		return $query->row_array();
	}

	/* Delete employee data */
	public function delete_emp_data($ids)
	{

		$query=$this->db->where_in('id',$ids)->delete('course_employee');

		return $query;
	}

	public function get_forgot_pass($email)
	{

		$query=$this->db->select('password')->where('primary_email',$email)->or_where('company_email',$email)->get('course_user_acc');
		return $query->row_array();

	}

	public function check_forgot_link($id)
	{
		$check=array('id'=>$id);
		$query=$this->db->select('email,status')->where($check)->get('course_forgot');
		$count=$query->num_rows();

		if($count>0)
		{
			$query_data=$query->row_array();

			
			return $query_data;


		}
		else
		{
			return false;
		}
	}

	/* get test report */

	public function get_test_report($emp_id)
	{
		$query=$this->db->select('res.*,res.id as res_id,test.*,video.*')
		->join('course_test as test','test.id=res.test_id')
		->join('course_content as video','video.id=test.video_id')

		->where('res.user_id',$emp_id)->get('course_test_emp_result as res');
		$count=$query->num_rows();
		if($count>0)
		{
			return $query->result_array();
		}
		else
		{
			
			$query=$this->db->distinct('user_ans.question_id')->select('question.*,user_ans.*,test.*,video.*')
		->join('course_test as test','test.id=user_ans.test_id')
		->join('course_content as video','video.id=test.video_id')
		->join('course_test_question as question','question.test_id=test.id')

		->where('user_ans.user_id',$emp_id)->get('course_test_emp_ans as user_ans');
		$count=$query->num_rows();
		return $query->result_array();
		}
	}
}

?>