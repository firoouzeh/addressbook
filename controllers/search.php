<?php
class Search extends Controller{
	protected function index(){
		$viewModel = new SearchModel();
		$this->returnView($viewModel->index(), true);
	}
}