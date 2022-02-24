<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_model extends CI_Model
{

	public function add_course($data=array())
	{
		$insert=$this->db->insert('course_video_courses',$data);
		if($insert)
		{
			return $this->db->insert_id();
		}
		else
		{
			return false;
		}

	}
	  public function delete($tblname,$id){
        $delete = $this->db->delete($tblname,array('id'=>$id));
        return $delete?true:false;
    }
    
}
?>