<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Leafblast extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->driver("session");
		// die('<pre>'.print_r($this->session, true));
	}

	public function index()
	{
		$data["title"] = "Dashboard";
		$this->load->view('header', $data);
		$this->load->view('index');
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */