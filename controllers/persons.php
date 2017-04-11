<?php
class Persons extends Controller{
	protected function index(){
		$viewModel = new PersonModel();
		$this->returnView($viewModel->index(), true);
	}

	protected function add(){
		$viewModel = new PersonModel();
		$this->returnView($viewModel->add(), true);
	}

	protected function view(){
		$viewModel = new PersonModel();
		$this->returnView($viewModel->view(), true);
	}

	protected function edit(){
		$viewModel = new PersonModel();
		$this->returnView($viewModel->edit(), true);
	}

	protected function delete(){
		$viewModel = new PersonModel();
		$this->returnView($viewModel->delete(), true);
	}

}