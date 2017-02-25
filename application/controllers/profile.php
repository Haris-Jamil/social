
<?php

class Profile extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		$this->load->model('profilemodel');
		$this->load->model('postmodel');
		$this->load->model('requestmodel');
	}
	
	public function index()
	{
		$id = $this->session->userdata('id');

		$data['me'] = true;
		$data['userData'] = $this->profilemodel->getProfileData($id);
		$this->load->view('profile_header',$data);

		$data['userPosts'] = $this->postmodel->myPosts($id);

		$this->load->view('profile_body',$data );			
		
	}

	public function showprofile($id)
	{	
		$currentUser = $this->session->userdata('id');
		if($id == $currentUser){
			redirect('profile/');
		}

		$data['me'] = false;	
		$data['id'] = $id;

		$data['userData'] = $this->profilemodel->getProfileData($id);
		$data['status'] = $this->requestmodel->giveStatus($currentUser,$id);
		$this->load->view('profile_header',$data);

		$data['userPosts'] = $this->postmodel->myPosts($id);

		$this->load->view('profile_body',$data );
	}

}