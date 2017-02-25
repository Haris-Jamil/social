<?php 

class Login extends CI_Controller
{

	public function index()
	{
		if($this->session->userdata('id') != null)
		{
			redirect('profile/');
		}

		$this->load->view('public/login_view.php');
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}	
}