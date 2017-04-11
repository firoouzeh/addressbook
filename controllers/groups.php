<?php
class Groups extends Controller{
	protected function index(){
		$viewModel = new GroupModel();
		$this->returnView($viewModel->index(), true);
	}

	protected function create(){
		$viewModel = new GroupModel();
		$this->returnView($viewModel->create($this->postVar['submit'], $this->postVar['name']), true);
	}

	protected function edit(){
		$viewModel = new GroupModel();
		$this->returnView($viewModel->edit($this->getVar['id'],$this->postVar['name'], $this->postVar['submit']), true);
	}

	public function getName($id){
		$gid = new GroupModel();
		return $gid->getName($id);
	}

	public function view(){
		$viewModel = new GroupModel();
		$this->returnView($viewModel->view($this->getVar['id']), true);
	}

	public function delete(){
		$viewModel = new GroupModel();
		prettyPrint($this);
		$this->returnView($viewModel->delete($this->postVar['submit'], $this->getVar['id']), true);
	}
}