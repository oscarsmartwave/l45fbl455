<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model("Reports_model", "rm");

		$results = $this->rm->getReports();
		$title["title"] = "Reports";
		$this->load->view("header", $title);
		$this->load->view("reports/reports",$results);
		$this->load->view("users/users-footer");
	}
}