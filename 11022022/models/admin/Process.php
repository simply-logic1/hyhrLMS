<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process extends CI_Model
{

	public function add_courses($data=array())
	{
		$insert=$this->db->insert(' video_courses',$data);
		if($insert)
		{
			return $this->db->insert_id();
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
   public function get_data_category($id,$tblname)
   {
	$this->db->select('post.*');
		$this->db->join('course_cat_links as cat','cat.post_id=post.id','left');
		$this->db->where('cat.cat_id',$id);
		$query=$this->db->get('course_content as post');
 		$userdata=$query->result_array();
		return $userdata;
   }
   public function get_data_video_cat($id,$tblname)
   {
	$this->db->select('post.*');
		$this->db->join('course_cat_links as cat','cat.post_id=post.id','left');
		$this->db->where('cat.cat_id',$id);
		$query=$this->db->get('course_video_courses as post');
 		$userdata=$query->result_array();
		return $userdata;
   }
   public function course_get_content_cat()
   {
	$this->db->select('category');
	//	$this->db->join('course_user_acc as acc','acc.id=user.user_acc_id','left');
		$query=$this->db->get('course_content');
 		$userdata=$query->result_array();
		return $userdata;

   }

        public function insert($tblname,$data)
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
	public function get_blog_title()
    {
    
      $result=$this->db->select('test.id as pid,test.course_title as content_title ')
          
         
        ->get('course_content as test');
        

        return $result->result_array();
    }
	public function get_video_title()
    {
    
      $result=$this->db->select('test.id as pid ,test.course_title as content_title')
          
         
        ->get('course_video_courses as test');
        

        return $result->result_array();
    }
     public function get_test_video_title()
    {
    
      $result=$this->db->select('test.*,test.id as test_id,video.*')
         ->join('course_content as video','video.id=test.video_id','left')
         ->group_by('video.id')  
        ->get('course_test as test');
        

        return $result->result_array();
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
	public function get_data_content($tblname)
	{
		$query=$this->db->select('content.*')
	 
		->where('content.course_type','video')->get('course_content as content');
		return $query->result_array();

	}
	public function get_data_post($tblname)
	{
		$query=$this->db->select('content.*')
	 
		->where('content.course_type','post')->get('course_content as content');
		return $query->result_array();

	}
		public function get_data_all_client($tblname)
	{
		$this->db->select('user.*,user.id as uid ');
	//	$this->db->join('course_user_acc as acc','acc.id=user.user_acc_id','left');
		$query=$this->db->get($tblname .' as user');
 		$userdata=$query->result_array();
		return $userdata;
	}
        
	public function get_data_specfic($id,$tblname)
	{
		 $this->db->where('id',$id);
 	
 		$query=$this->db->get($tblname);
 		// $result=$query->row_array();
 	//	$query=$this->db->select("client.*,client.plan_id as client_planid,plan.*,plan_list.*")->from('course_clients as client')->join('course_plan as plan','client.plan_id=plan.id','left')->join('course_plan_list as plan_list','plan.plan_id=plan_list.id','left')->where('client.id',$id)->get();

			return $query->row_array();
		
	}
	public function get_content_data($id,$tblname)
	{
		$query=$this->db->select('content.*,category.category_name')
		->join('course_category as category','category.id=content.category','left')
		 
		->where('content.id',$id)->get('course_content as content');
		return $query->row_array();
	}
	public function get_emp_data($id,$tblname)
	{
		$this->db->where('company_id',$id);
		$query=$this->db->get('course_employee');

		return $query->result_array();
	}
		public function get_emp_data_specfic($id,$tblname)
	{
		$this->db->where('id',$id);
		$query=$this->db->get('course_employee');

		return $query->row_array();
	}
	/*get employee video status */
	public function get_test_report($emp_id)
	{
		
		$query=$this->db->select("res.id as rid,emp.id as empid,video.*,video_list.*,video_status.*,
		IF((res.id IS NULL),'Pending','Completed') as test_result,IF((video_status.id IS NULL),'Pending','Completed') as view_result
		")->from('course_assign_video_emp as video')
	->join('course_content as video_list','video.course_id=video_list.id','left')
	->join('course_employee as emp','video.emp_id=emp.id or video.emp_id=0','left')
	
	->join('course_emp_video_status as video_status','emp.id=video_status.emp_id and video_status.course_id=video.course_id','left')
	->join('course_test as test','test.video_id=video.course_id','left')
 

		->join('course_test_emp_result as res','res.test_id=test.id and res.user_id=emp.id','left')
	

	->where('video.emp_id', $emp_id)
	->or_where('video.emp_id', 0)->group_by('video.course_id')->get();

	return $query->result_array();
		/*
		$query=$this->db->select("res.*,res.id as res_id,video.*,video_status.*,
		IF((res1.id IS NULL),'Pending','Completed') as test_result")
	 
		->join('course_content as video','video.id=res.course_id','left')
		->join('course_employee as emp','video.emp_id=emp.id or video.emp_id=0','left')
		->join('course_emp_video_status as video_status','emp.id=video_status.emp_id and video_status.course_id=video.course_id','left')
		->join('course_test_emp_result as res1','res1.test_id=test.id and res1.user_id=emp.id','left')
		
		->join('course_test as test','test.video_id=video.course_id','left')

		->where('res.emp_id',$emp_id)->get('course_assign_video_emp as res');
		return $query->result_array();
		/*
		$count=$query->num_rows();
		if($count>0)
		{
			return $query->result_array();
		}
		else
		{
			
			$query=$this->db->distinct('user_ans.question_id')->select('question.*,user_ans.*,test.*,video.*')
		->join('course_test as test','test.id=user_ans.test_id','left')
		->join('course_video_courses as video','video.id=test.video_id','left')
		->join('course_test_question as question','question.test_id=test.id','left')

		->where('user_ans.user_id',$emp_id)->get('course_test_emp_ans as user_ans');
		$count=$query->num_rows();
		return $query->result_array();
		}
		*/
	}

	public function get_video_status($emp_id)
	{
		// $query=$this->db->select("emp.id as empid,video.*,video_list.*,video_status.*")->from('course_employee as emp')
		// ->join('course_assign_video_emp as video','video.emp_id=emp.id','left')
		// ->join('course_video_courses as video_list','video.course_id=video_list.id','left')
		// ->join('course_emp_video_status as video_status','emp.id=video_status.emp_id and video_status.course_id=video.course_id','left')
		// ->where('emp.id',$emp_id)->group_by('video.course_id')->get();

		// return $query->result_array();
		$query=$this->db->select("res.id as rid,emp.id as empid,video.*,video_list.*,video_status.*,
			IF((res.id IS NULL),'Pending','Completed') as test_result
			")->from('course_assign_video_emp as video')
		->join('course_content as video_list','video.course_id=video_list.id','left')
		->join('course_employee as emp','video.emp_id=emp.id or video.emp_id=0','left')
		
		->join('course_emp_video_status as video_status','emp.id=video_status.emp_id and video_status.course_id=video.course_id','left')
		->join('course_test as test','test.video_id=video.course_id','left')
	 

			->join('course_test_emp_result as res','res.test_id=test.id and res.user_id=emp.id','left')
		

			->where('video.emp_id', $emp_id)
	->or_where('video.emp_id', 0)->group_by('video.course_id')->get();

		return $query->result_array();
	}
	/* login check */

	public function check_user_data($name,$password)
	{
		$check=array('username'=>$name);
		 $this->db->where($check);
		 $this->db->or_where('email',$name);
		
		
 		
 		$query=$this->db->get('course_admin');

 			
 		$result=$query->row_array();


 		if(!empty($result) && password_verify($password,$result['password']))
 		{
 			
 				$data=array(
 					'acc_type'=>$result['role'],
 					'id'=>$result['id'],
 					'name'=>$result['name'],
 					'status'=>true,
         			 'data'=>true

 				);
 			return $data;

 		

 		}
 		else
 		{
 			$data=array('data' =>false );
 			return $data;
 			
 		}


	}
	/* et dahboard list */

	public function get_list_data($tblname)
	{
		$result=$this->db->select('COUNT(id) as no_of_list')->from($tblname)->get();
		return $result->row_array();
	}
	public function get_acc_id($tblname,$id)
	{
		$result=$this->db->select('user_acc_id')->where('id',$id)->from($tblname)->get();
		return $result->row_array();
	}

	/*delete client data */

 public function delete_client_data($tblname,$ids)
{

		$query=$this->db->where_in('id',$ids)->delete($tblname);

		return $query;
	}
	 public function get_quiz_perform($id)
    {

      $this->db->query("SET @Rank:=0");

        $res=$this->db->select('res.*,ques.id as qid,SUM(res.exam_score) as score,emp.*,SUM(ques.id) as tot_ques ,

            if((res.exam_score>0),(@Rank:=@Rank+1),"0") as Rank




            ')
           


             ->join('course_test_emp_result as res','res.user_id=emp.id','left')
             ->join('course_test as test','test.id=emp.company_id','left')

             ->join('course_test_question as ques','ques.test_id=test.id','left')
          ->group_by('res.user_id')
       
        ->order_by('score','DESC')

            ->from('course_employee as emp')
            ->where('emp.company_id',$id)->get();

            $data= $res->result_array();


            $res1=$this->db->select(' ques.*,count(*) as all_question ')
                 

             ->join('course_test_question as ques','ques.test_id=test.id','left')
     
       
     

            ->from('course_test as test')
            ->get();
               $data1= $res1->row_array();
               $data[0]['all_question']=$data1['all_question'];
            return $data;
             //  return $data1;
    }
}
?>