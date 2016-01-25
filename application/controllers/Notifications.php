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
			$notif["response"] = $this->n_model->pushToAll($_POST);
			$this->load->view("notifications/response", $notif);
			return;
			break;
		}
		$this->load->view("header", array("title"=>"Push to All"));
		$this->load->view("notifications/push");
		$this->load->view("notifications/footer");
	} 

	public function users()
	{
		$users["response"] = $this->n_model->getUsers();
		$this->load->view("notifications/response", $users);
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
		$this->load->view("notifications/footer");
	}
	public function timezone()
	{

		switch ($_SERVER["REQUEST_METHOD"])
		{
			case "GET" :
			break;
			case "POST" :
			$notif["response"] = $this->n_model->pushToTimeZone($_POST);
			$this->load->view("notifications/response", $notif);
			return;
			break;
		}
		// $result = $this->n_model->getTimeZone();
		// $this->load->model("notifications_model","n_model");
		$tz["timeZone"] = $this->n_model->getTimeZone();
		$this->load->view("header", array("title"=>"Push to Timezone"));
		$this->load->view('notifications/timezone', $tz);
		$this->load->view("notifications/footer");
	}
}