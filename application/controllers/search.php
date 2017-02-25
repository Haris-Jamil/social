<?php 

class Search extends CI_Controller
{

	public function index()
	{
		$data = $this->input->post('keyword');

		$this->load->model('searchmodel');
		$result = $this->searchmodel->search($data);

		if(isset($result)){
			$dropdownHTML = "<ul>";

			foreach ($result as $row) {

			
				$imgUrl = base_url($row->dp);
			
				$id = base_url("profile/showprofile/".$row->id);
				
				$dropdownHTML .= "<li class='search-item'><img class='small-dp' src='".$imgUrl."' ><a href='".$id."'>". $row->firstName . " " . $row->lastName ."</a></li>";		
			}

			$dropdownHTML .= "</ul>";

			echo $dropdownHTML;
		}
		else{
			echo "";
		}

	}

}