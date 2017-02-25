<?php

class Searchmodel extends CI_Model
{

	public function search($data)
	{
		// $search = $this->db->get('users');
		// 		  $this->db->like('firstName',$data);
		// 		  $this->db->or_like('lastName',$data);
		// 		  $this->db->or_like('userName',$data);
		if($data != ""){
			$search = $this->db->query("SELECT * FROM users WHERE concat_ws(' ',firstName,lastName) LIKE '%$data%' OR  userName LIKE '%$data%' ");

			return $search->result();
		}
		
	}

}