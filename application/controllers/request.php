<?php

class Request extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('requestmodel');
		
	}

	public function sendRequest($id)
	{
		$from = $this->session->userdata('id');
		$this->requestmodel->addRequest($from, $id);
		redirect('profile/showprofile/'.$id);
	}

	public function acceptRequest($id)
	{
		$from = $this->session->userdata('id');
		$this->requestmodel->requestAccept($from, $id);
		redirect('friend/friendsdata/'.$from);
	}

}
