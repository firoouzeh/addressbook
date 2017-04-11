<?php
class Bootstrap{
	private $controller;
	private $action;
	private $request;

	public function __construct($request){
		$this->request = $request;
		if($this->request['controller'] == ""){	//if no controller in URL i.e. Home Page
			$this->controller = 'home';
		} else {	//load the reqested controller...
			$this->controller = $this->request['controller'];
		}
		if($this->request['action'] == ""){	//if its the index action
			$this->action = 'index';
		} else {	//load the action requested in URL
			$this->action = $this->request['action'];
		}
	}

	public function createController(){
		//check Class
		if(class_exists($this->controller)){
			$parents = class_parents($this->controller);
			//check if extended
			if(in_array("Controller", $parents)){
				if(method_exists($this->controller, $this->action)){
					return new $this->controller($this->action, $this->request);
				} else {
					//method doesn't exist.
					echo "Method doesn't exist";
					Messages::setMsg("Method doesn't exist", 'error');
					return;
				}
			} else {
				//base controller deosn't exist
				echo "Base controller not found";
				Messages::setMsg("Base controller not found", 'error');
				return;
			}
		} else {
			//base controller deosn't exist
			echo "Controller class doesn't exist";
			Messages::setMsg("Controller class doesn't exist", 'error');
			return;
		}
	}
}

function prettyPrint($arg){
	echo '<pre>';
	print_r($arg);
	echo '</pre>';
}