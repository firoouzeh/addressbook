<?php
class Search extends Controller{
	protected function index(){
		$viewModel = new SearchModel();
		$this->returnView($viewModel->index($this->postVar), true);
	}
	protected function advance(){
		$viewModel = new SearchModel();
		$this->returnView($viewModel->advance($this->postVar), true);
	}
}