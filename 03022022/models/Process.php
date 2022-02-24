<?php

defined('BASEPATH') or die("No script allowed");

class Process extends CI_Model
{

	public function __construct()
 	{
 		parent::__construct();
 	}


 	public function get_user($tblname,$data)
 	{

		 $email=$data['email_id'];
		 
 		$password=$data['password'];
 		$this->db->where('company_mail',$email);
 		$this->db->or_where('primary_mail',$email);
 		$query=$this->db->get($tblname);
 		$result=$query->row_array();

 		if(!empty($result) && password_verify($password,$result['password']))
 		{
 			
 			$data=array(
 					 
 					'id'=>$result['id'],
 					'status'=>true,
         

 				);
 			return $data;

 		}
 		else
 		{
 			$data=array('data' =>false );
 			return $data;
 			
 		}


 		// $query="select * from  $tblname where company_email='".$email."' or primary_email='".$email."'";
 		// $count=$this->db->query($query);
 		// if($count>0)
 		// {
 		// 	if(password_verify())
 		// }
 		// echo $email."pass ".$data['password']."row".$count->num_rows();

 	}
 	/*get data */

 	public function get_data($tblname,$id)
 	{
 		$this->db->where('id',$id);
 		$query=$this->db->get($tblname);
 		$userdata=$query->row_array();
		return $userdata;
 	}

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

   public function update($tblname,$data,$id)
   {
   	if(!empty($data) && !empty($id)){
            $update = $this->db->update($tblname, $data, array('id'=>$id));
            return $update?true:false;
        }else{
            return false;
        }
   }

   /* verfiy email process */

   public function verfiy_email_process($email,$urlid)
   {
   		$check=array('email_id'=>$email,'check_urlid'=>$urlid);
   	   $query=$this->db->select('email_valid,status,id')->from('course_clients')->where($check)->get();


   	   return $query->row_array();
   }

   /* get Pricing table */

   public function get_price_data()
   {
      $result=$this->db->get_where('course_plan_list', array('plan_title !=' => 'Free Trail'));
     $all_plan=$result->result_array();

     return $all_plan;

   }
   /* get free trail data */
      public function get_price_free()
   {
      $result=$this->db->get_where('course_plan_list', array('plan_title =' => 'Free Trail'));
     $free_plan=$result->result_array();

     return $free_plan;
    }
   

   /* get specfic price data */

   public function get_data_specfic($tblname,$id)
   {
        $this->db->where('id',$id);
        $query=$this->db->get($tblname);
        $userdata=$query->row_array();
        return $userdata;
   }

   

}
?>