<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cars extends CI_Controller {

	public function index($objectId)
	{
		$this->load->model("cars_model", "cm");
		$result = $this->cm->getCarsOfUsers($objectId);

		die('<pre>'.print_r($result, true));
	}

	public function view()
	{

	}
}
?>