<?php 
class ResObj {
	public $message;
	public $response;
	
	public function __construct($message, $response) {
		$this->message = $message;
		$this->response = $response;
	}
}
?>