<?php

class Post extends CI_Controller
{
	public function addPost()
	{
		$post = $this->input->post('post');
		$id = $this->session->userdata('id');

		$this->load->model('postmodel');
		$this->postmodel->addPostData($post, $id);

		redirect('profile/');
	}	

}