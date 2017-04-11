<?php
abstract class Controller{
	protected $request;
	protected $action;
	protected $postVar;
	protected $getVar;

	public function __construct($action, $request){
		$this->action = $action;
		$this->request = $request;
		// Sanitize POST & GET array
		$this->postVar = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		$this->getVar = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
	}

	public function executeAction(){
		return $this->{$this->action}();
	}
	//return our view
	protected function returnView($viewModel, $fullView){
		$view = 'views/'.get_class($this).'/'.$this->action.'.php';
		if($fullView){
			require('views/main.php');
		} else {
			require($view);
		}
	}
}