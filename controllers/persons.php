<?php
class Persons extends Controller{
	protected function index(){
		$viewModel = new PersonModel();
		$this->returnView($viewModel->index(), true);
	}

	protected function add(){
		$viewModel = new PersonModel();
		$this->returnView($viewModel->add($this->postVar['firstName'], $this->postVar['lastName'], $this->postVar['emails'], $this->postVar['numbers'], $this->postVar['addresses'], $this->postVar['groups'], $this->postVar['submit']), true);
	}

	protected function view(){
		$viewModel = new PersonModel();
		$this->returnView($viewModel->view($this->getVar['id']), true);
	}

	protected function edit(){
		$viewModel = new PersonModel();
		$this->returnView($viewModel->edit(), true);
	}

	protected function delete(){
		$viewModel = new PersonModel();
		$this->returnView($viewModel->delete($this->postVar['submit'], $this->getVar['id']), true);
	}

}