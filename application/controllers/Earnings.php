<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Earnings extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function year($year)
	{
		$this->load->model('earnings_model');
		$results = array();
		$results = $this->earnings_model->all($year);
		//die('<pre>'.print_r($results, true));
		$this->load->view('earnings/total', $results);
	}

	public function total()
	{
		// $this->load->model('earnings_model');
		// $results = array();
		// $results = $this->earnings_model->all($year);
		//die('<pre>'.print_r($results, true));
		$this->load->view('earnings/total', true);
	}


	public function peroperator()
	{
		// $this->load->model('earnings_model');
		// $results = array();
		// $results = $this->earnings_model->all($year);
		//die('<pre>'.print_r($results, true));
		$this->load->view('earnings/per-operator', true);
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