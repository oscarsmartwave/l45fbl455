<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require APPPATH . '/libraries/REST_Controller.php';

class CarMakes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("carmakes_model","cm");
	}

	public function index()
	{
		$this->load->model("carmakes_model");
		$makes = $this->carmakes_model->getCarMake();

		// die('<pre>'.print_r($makes, true));
		$this->load->view("header", array("title" => "Car Makes"));
		$this->load->view("carmakes/carmakes", $makes);
		$this->load->view("carmakes/footer");
	}
}