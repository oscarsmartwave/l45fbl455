<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once (APPPATH.'libraries/vendor/autoload.php');

class Notifications extends CI_controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("notifications_model", "n_model");
		// $this->load->driver("session");
		
		if(isset($this->session->token) == true)
		{
			redirect(base_url(), "refresh");
		}
		
	}

	public function all()
	{
		switch ($_SERVER["REQUEST_METHOD"])
		{
			case "GET" :
			break;
			case "POST" :
			$notif = $this->n_model->pushToAll($_POST);
			break;
		}
		$this->load->view("header", array("title"=>"Push to All"));
		$this->load->view("notifications/push");
		$this->load->view("notifications/footer");
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
		$this->load->view("header", array("title"=>"Push to User"));
		$this->load->view("notifications/user");
		$this->load->view("notifications/user_footer");
	}

	public function timezone()
	{

		switch ($_SERVER["REQUEST_METHOD"])
		{
			case "GET" :
			break;
			case "POST" :
			$notif = $this->n_model->pushToTimeZone($_POST);
			break;
		}
		// $result = $this->n_model->getTimeZone();
		// $this->load->model("notifications_model","n_model");
		$tz["america"] = $this->n_model->getTimeZones()["America"];
		$this->load->view("header", array("title"=>"Push to Timezone"));
		$this->load->view('notifications/timezone', $tz);
		$this->load->view("notifications/timezone_footer");
	}
}