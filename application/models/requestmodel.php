<?php 

class Requestmodel extends CI_Model
{

	public function addRequest($from, $to)
	{
		$data = array(
			'from_id'=> $from,
			'to_id'=> $to,
			'status'=>'pending'
		);
		$this->db->insert('requests',$data);
	}

	public function requestAccept($from, $id)
	{
		
		$this->db->where(['from_id'=>$id, 'to_id'=>$from]);
		$this->db->update('requests', ['status'=> 'friends']);
	}

	public function giveStatus($from, $to)
	{
		$this->db->select('status');
		$query = $this->db->get_where('requests',['from_id'=>$from, 'to_id'=>$to]);

		return $query->result_array();
	}

	public function giveSentRequests($id)
	{
		$this->db->select('users.id as uid, users.firstName , users.lastName, users.dp
						   ,requests.id as rid, requests.from_id, requests.to_id, requests.status');
		$this->db->from('users');
		$this->db->join('requests','users.id = requests.to_id');
		$this->db->where(['from_id'=>$id, 'status'=>'pending']);
		
		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}

	}

	public function giveIncomingRequests($id)
	{
		$this->db->select('users.id as uid, users.firstName , users.lastName, users.dp
						   ,requests.id as rid, requests.from_id, requests.to_id, requests.status');
		$this->db->from('users');
		$this->db->join('requests','users.id = requests.from_id');
		$this->db->where(['to_id'=>$id, 'status'=>'pending']);

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}

	public function showFriends($id)
	{
		// $this->db->select('users.id as uid, users.firstName , users.lastName, users.dp
		// 				   ,requests.id as rid, requests.status');
		// $this->db->from('users');
		// $this->db->join('requests','users.id = requests.to_id OR users.id = requests.from_id' );
		// $this->db->where(['status'=>'friends']);
		// $query= $this->db->get();

		$query = $this->db->query("SELECT users.id as uid, users.firstName, users.lastName, users.dp, 						 requests.id as rid, requests.status
									FROM users JOIN requests 
									ON ( 
										(users.id = requests.from_id AND requests.to_id = '$id') 
										OR  
										(users.id = requests.to_id AND requests.from_id = '$id' ) 
										)
									WHERE requests.status = 'friends' ");

		if($query->num_rows() > 0)
		{
			return $query->result_array();
		}

	}



}