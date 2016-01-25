<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cars extends CI_Controller {

	public function index($objectId)
	{
		// $this->load->model("cars_model", "cm");
		// $result = $this->cm->getCarsOfUsers($objectId);

		// die('<pre>'.print_r($result, true));
	}

	public function view()
	{

	}

	public function getUserCar($objectId)
	{
		$this->load->model("users_model", "um");
		$result = $this->um->getUserCar($objectId);

		// die(print_r($result));
		$title["title"] = "Cars";
		$this->load->view("header", $title);
		$this->load->view("users/carsOwned_view", $result);
		$this->load->view("footer");
		// die("<pre>".print_r($result, true));
	}
}
?>