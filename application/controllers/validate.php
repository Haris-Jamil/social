<?php 


class Validate extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('loginmodel');
	}

	public function signIn()
	{

		$username = $this->input->post('username');
		$password = $this->input->post('password'); 

		$id = $this->loginmodel->signin($username, $password);

		if($id)
		{
			$this->session->set_userdata('id', $id);

			redirect('profile/');
		}
		else
		{	
			$data['wrongUser'] = "Wrong username or password";
			$this->load->view('public/login_view',$data);
		}

	}

	public function signUp()
	{


		$this->form_validation->set_rules('fname', 'First Name', 'required|alpha|max_length[25]|trim');
		$this->form_validation->set_rules('lname','Last Name', 'required|alpha|max_length[25]|trim');

		$this->form_validation->set_rules('username2','Username','required|alpha_numeric|max_length[25]|trim');

		$this->form_validation->set_rules('password2', 'Password','required|alpha_numeric|max_length[25]|trim');

		$this->form_validation->set_rules('gender', 'Gender', 'required');

		$this->form_validation->set_message('rule', 'Error Message');


		if($this->form_validation->run())
		{

			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$username2 = $this->input->post('username2');
			$password2 = $this->input->post('password2');
			$gender = $this->input->post('gender');

			$isAvailable = $this->loginmodel->signup($fname, $lname, $username2, $password2, $gender);

			if($isAvailable){

				$id = $this->loginmodel->signin($username2, $password2);

				if($id)
				{
					$this->session->set_userdata('id', $id);
					redirect('profile/');
				}
			}
			else{
				$data['uesrnameNotAvailable'] = "username not available";
				$this->load->view('public/login_view',$data);
			}
			
		}
		else
		{
			$this->load->view('public/login_view');	
		}
	}

}