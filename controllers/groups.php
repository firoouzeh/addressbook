<?php
class Groups extends Controller{
	protected function index(){
		$viewModel = new GroupModel();
		$this->returnView($viewModel->index(), true);
	}

	protected function create(){
		$viewModel = new GroupModel();
		$this->returnView($viewModel->create($this->postVar), true);
	}

	protected function edit(){
		$viewModel = new GroupModel();
		$this->returnView($viewModel->edit($this->getVar,$this->postVar), true);
	}

	public function getName($id){
		$gid = new GroupModel();
		return $gid->getName($id);
	}

	public function view(){
		$viewModel = new GroupModel();
		$this->returnView($viewModel->view($this->getVar), true);
	}

	public function delete(){
		$viewModel = new GroupModel();
		$this->returnView($viewModel->delete($this->postVar), true);
	}
}