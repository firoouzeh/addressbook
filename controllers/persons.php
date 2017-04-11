<?php
class Persons extends Controller{
	protected function index(){
		$viewModel = new PersonModel();
		$this->returnView($viewModel->index(), true);
	}

	protected function add(){
		$viewModel = new PersonModel();
		$this->returnView($viewModel->add($this->postVar), true);
	}

	protected function view(){
		$viewModel = new PersonModel();
		$this->returnView($viewModel->view($this->getVar), true);
	}

	protected function edit(){
		$viewModel = new PersonModel();
		$this->returnView($viewModel->edit(), true);
	}

	protected function delete(){
		$viewModel = new PersonModel();
		$this->returnView($viewModel->delete($this->postVar), true);
	}

}