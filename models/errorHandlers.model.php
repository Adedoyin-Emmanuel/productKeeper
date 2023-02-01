<?php



class ErrorHandler{
	public $error = '';


	public function set_error($error){
		$this->error  = $error;
	}


	public function get_error(){
		return $this->error;
	}


	public function send_error_to_view($error){
		
		return;
	}
}


?>