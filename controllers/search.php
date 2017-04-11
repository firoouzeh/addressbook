<?php
class Search extends Controller{
	protected function index(){
		$viewModel = new SearchModel();
		$this->returnView($viewModel->index($this->postVar['search-term']), true);
	}
	protected function advance(){
		$viewModel = new SearchModel();
		if($this->postVar['submit'] == 'email'){
			$this->returnView($viewModel->searchByEmail($this->postVar['email']), true);
		}elseif($this->postVar['submit'] == 'name'){
			$this->returnView($viewModel->searchByName($this->postVar['firstName'], $this->postVar['lastName']), true);
		}else{
			$this->returnView($viewModel->advance(), true);
		}
	}
}