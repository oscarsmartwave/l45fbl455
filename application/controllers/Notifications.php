<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once (APPPATH.'libraries/vendor/autoload.php');

class Notifications extends CI_controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("notifications_model", "n_model");
	}

	public function all()
	{
		$this->load->model("notifications_model", "n_model");

		switch ($_SERVER["REQUEST_METHOD"])
		{
			case "GET" :
				break;
			case "POST" :
				$notif = $this->n_model->pushToAll($_POST);
				break;
		}

		$this->load->view('notifications/push');
	} 

	public function user()
	{
		switch ($_SERVER["REQUEST_METHOD"])
		{
			case "GET" :
				break;
			case "POST" :
				$notif = $this->n_model->pushToUser($_POST);
				break;
		}
		$this->load->view('notifications/user');
	}

	public function timezone()
	{
		$this->load->model("notifications_model","n_model");
		$tz = $this->n_model->getTimeZones();
		die('<pre>'.print_r($tz, true));
		// $this->load->view('notifications/timezone');
	}
}





















