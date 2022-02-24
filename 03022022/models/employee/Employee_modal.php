<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_modal extends CI_Model
{

	public function insert($tblname,$data=array())
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

   public function get_data($tblname)
   {

   		$select=$this->db->get($tblname);

   		return $select->query_result;

   }
       public function get_client_id($uid)
	{
		$result=$this->db->select('company_id')->where('id',$uid)->get('course_employee');
		return $result->row_array();
	}

    /* get user data */
  // public function get_user($tblname,$data)
  // {

  //   $user_email=$data['email_id'];
  //   $pass=$data['password'];
  //  print_r($data);
  //   $query=$this->db->query("select * from $tblname  where email_id='$user_email'");
  //   $result=$query->row_array();
  //   print_r($result);
  //   print"<br/>Password";
  //   print $result['password'];
  //   if(!empty($result))
  //   {
      
  //     echo "user email id there".$user_email."password".$data['password'];
  //     if(password_verify($pass,$result['password']))
  //     {

  //       echo "password success";
     
  //       $user_ip=$this->input->ip_address();
  //       echo "user_ip".$user_ip;

  //       $tblname="userlogs";
  //       $now=date("Y-m-d h:i:sa");

  //       $userdata=array(
           
  //          'user_name'=>$result['first_name'],
  //          'user_id'=>$result['id'],
  //          'logged_in'=>TRUE

  //       );
  //     //  $this->session->set_userdata($userdata);
     
  //       $data=array(

  //            'client_id'=>$result['id'],
  //            'client_ip'=>$user_ip,
  //            'action_time'=>$now

  //           );
  //       $insert=$this->insert($tblname,$data);

  //        $stmt= $userdata;

  //     }
  //     else
  //     {

  //         $stmt= FALSE;
  //     }
  //   }
  //   else
  //   {
  //     $stmt=FALSE;
  //   }
  //   return $stmt;
  // }
   public function update($tblname,$data, $id) {
        if(!empty($data) && !empty($id)){
            $update = $this->db->update($tblname, $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
    }

    /* update invite_employee table */

    public function update_invite_status($tblname,$data,$email)
    {
        if(!empty($data) && !empty($email)){
            $update = $this->db->update($tblname, $data, array('emp_mail'=>$email));
            return $update?true:false;
        }else{
            return false;
        }
    }
    
    /*
     * Delete post
     */
    public function delete($tblname,$id){
        $delete = $this->db->delete($tblname,array('id'=>$id));
        return $delete?true:false;
    }
    
     public function get_list($emp_id,$compid)
   {
       
    	$query=$this->db->select("COUNT(emp.id) as no_video")
        
           
            ->from('course_video_courses as emp')
        
			 ->get();
   		

	

		return $query->row_array();


   }
        public function get_quiz_list($emp_id)
   {
       
        $query=$this->db->select("COUNT(emp.user_id) as no_quiz")
        
           
            ->from('course_test_emp_result as emp')
        
			->where('emp.user_id',$emp_id)->get();
   		

	

		return $query->row_array();


   }


}