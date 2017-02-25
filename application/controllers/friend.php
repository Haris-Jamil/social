<?php 

class Friend extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('requestmodel');
		$this->load->model('profilemodel');
	}

	public function friendsData($id)
	{
		$data['userData'] = $this->profilemodel->getProfileData($id);
		$data['incomingRequest'] = $this->requestmodel->giveIncomingRequests($id);
		$data['sentRequest'] = $this->requestmodel->giveSentRequests($id);
		$data['friends'] = $this->requestmodel->showFriends($id);

		$this->load->view('friends_list',$data);
	}



}