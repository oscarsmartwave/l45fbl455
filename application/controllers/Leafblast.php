<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Leafblast extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->driver("session");
		// die('<pre>'.print_r($this->session));
	}

	public function index()
	{
		$this->load->view('index');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */