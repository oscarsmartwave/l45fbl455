<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Earnings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("earnings_model", "em");
		$this->load->driver("session");
		if($this->session->has_userdata('token') == false)
		{
			redirect(base_url(), "refresh");
		}
	}

	public function year($year = "")
	{
		$this->load->model("earnings_model", "em");
		$result = $this->em->all($year);
		
		$this->load->view('earnings/year', $result);
	}

	public function total($year='')
	{
		$this->load->model('earnings_model');
		$results = array();
		$results = $this->earnings_model->all($year);
		$this->load->view('earnings/total', true);
	}


	public function operators($optrObjectId ='')
	{
		$bool = !($optrObjectId == '');

		switch($bool)
		{
			case true :
				$results = $this->em->operator($optrObjectId);
				// die('<pre>'.print_r($results, true));
				$this->load->view("earnings/operator", $results);
				break;
			case false :
				$operators = $this->em->operators();
				// die('<pre>'.print_r($operators, true));
				$this->load->view("earnings/operators", $operators);
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
		$this->load->view('earnings/time-period', true);
	}
}