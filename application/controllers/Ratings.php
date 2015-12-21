<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require APPPATH . '/libraries/REST_Controller.php';

class Ratings extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("ratings_model", "rm");
	}

	public function index() // get all ratings of operators
	{
		$rate["ratings"] = $this->rm->getAllRatings();

		$this->load->view("ratings/ratings", $rate);
		// die('<pre>'.print_r($rate, true));
	}

}
