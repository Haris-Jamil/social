<?php

class Postmodel extends CI_Model
{
	public function addPostData($post, $id)
	{
		$this->db->insert('posts',['userid'=>$id, 'post'=>$post]);
	}

	public function myPosts($id)
	{				
		$q = $this->db->order_by('time','desc')->get_where('posts', ['userid'=>$id]);
			 		  
		if($q->num_rows() > 0)
		{
			return $q->result_array();
		}
		else
		{
			return false;
		}
	}
}