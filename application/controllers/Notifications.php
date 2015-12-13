<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once (APPPATH.'libraries/REST_Controller.php');
require_once (APPPATH.'libraries/vendor/autoload.php');
require_once (APPPATH.'libraries/Curl/Curl.php');

//ob_start("ob_gzhandler");

class Notifications extends CI_controller {

	public function index()
	{
		echo 'indeex';
	}

	public function view()
	{

	} 

	public function push()
	{
		$this->load->view('notifications/push');
	}
}





















