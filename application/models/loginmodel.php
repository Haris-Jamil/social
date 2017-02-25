<?php 

class Loginmodel extends CI_Controller
{

	public function signup($fname, $lname, $uname, $pword, $gender)
	{

		$userNameAvailable = $this->db->get_where('users', array('userName'=>$uname));

		if($userNameAvailable->num_rows() > 0){
			return false;
		}
		else{
			$this->db->set(['firstName'=>$fname, 'lastName'=>$lname, 'userName'=>$uname, 'password'=>$pword, 'gender'=> $gender])
			->insert('users');
			return true;	
		}
	}

	public function signin($username, $password)
	{
		$checkUser = $this->db->get_where('users', array('userName'=>$username, 'password'=>$password));

		if($checkUser->num_rows() == 1)
		{
			return $checkUser->row()->id;
		}
		else
		{
			return false;
		}
	}

}