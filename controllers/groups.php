<?php
class Groups extends Controller{
	protected function index(){
		$viewModel = new GroupModel();
		$this->returnView($viewModel->index(), true);
	}

	protected function create(){
		$viewModel = new GroupModel();
		$this->returnView($viewModel->create(), true);
	}

	protected function edit(){
		$viewModel = new GroupModel();
		$this->returnView($viewModel->edit(), true);
	}

	public function getName($id){
		$gid = new GroupModel();
		return $gid->getName($id);
	}

	public function view(){
		$viewModel = new GroupModel();
		$this->returnView($viewModel->view(), true);
	}

	public function delete(){
		$viewModel = new GroupModel();
		$this->returnView($viewModel->delete(), true);
	}
}