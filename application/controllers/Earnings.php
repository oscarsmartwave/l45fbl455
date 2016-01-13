<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Earnings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("earnings_model", "em");
	}

	public function year($year = "")
	{
		$this->load->model("earnings_model", "em");
		$result = $this->em->all($year);
		$this->load->view("header", array("title" => "Earnings per year"));
		$this->load->view("earnings/year", $result);
		$this->load->view("earnings/footer");
	}

	public function total($year='')
	{
		$this->load->model('earnings_model');
		$results = array();
		$this->load->view("header", array("title" => "Earnings per year"));
		$this->load->view('earnings/total', true);
		$this->load->view("earnings/footer");
	}


	public function operators($optrObjectId ='')
	{
		$bool = !($optrObjectId == '');

		switch($bool)
		{
			case true :
				$results = $this->em->operator($optrObjectId);
				// die('<pre>'.print_r($results, true));
				$this->load->view("header", array("title" => "Earnings | Operator"));
				$this->load->view("earnings/operator", $results);
				$this->load->view("earnings/per-operator-footer");
				break;
			case false :
				$operators = $this->em->operators();
				// die('<pre>'.print_r($operators, true));
				$this->load->view("header", array("title" => "Earnings | Operators"));
				$this->load->view("earnings/operators", $operators);
				$this->load->view("earnings/footer");
				break;
			default : break;
		}

		// $this->load->view('earnings/operator', true);
	}
	public function time()
	{
		// $this->load->model('earnings_model');
		// $results = array();
		// $results = $this->earnings_model->all($year);
		//die('<pre>'.print_r($results, true));
		$this->load->view("header", array("title" => "Earnings | Time"));
		$this->load->view("earnings/time-period", true);
		$this->load->view("earnings/time-period-footer");
	}
}