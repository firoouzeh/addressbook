<?php
class Messages{
	public static function setMsg($text, $type){
		if($type == 'error'){
			$_SESSION['errorMsg'] = $text;
		} else {
			$_SESSION['successMsg'] = $text;
			$_SESSION['msgType'] = $type;
		}
	}

	public static function display(){
		$errorMsg = $_SESSION['errorMsg'];
		$successMsg = $_SESSION['successMsg'];
		$msgType = $_SESSION['msgType'];

		if(isset($errorMsg)){
			echo '<div class="alert alert-danger">'.$errorMsg.'</div>';
			unset($_SESSION['errorMsg']);
			unset($_SESSION['msgType']);
		}

		if(isset($successMsg)){
			echo '<div class="alert alert-'.$msgType.'">'.$successMsg.'</div>';
			unset($_SESSION['successMsg']);
			unset($_SESSION['msgType']);
		}
	}
}