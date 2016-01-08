<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->driver("session");

		if($this->session->has_userdata('token') == false)
		{
			redirect(base_url(), "refresh");
		}
	}

	public function index()
	{
		$this->load->model("Reports_model", "rm");

		$results = $this->rm->getReports();
		$this->load->view("reports/reports",$results);
	}
}