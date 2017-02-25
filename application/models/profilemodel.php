<?php

class Profilemodel extends CI_Model
{

	public function getProfileData($id)
	{
		$q = $this->db->get_where('users',array('id'=>$id));

		return $q->result_array();
	}

}