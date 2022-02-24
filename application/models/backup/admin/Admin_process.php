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
}
?>