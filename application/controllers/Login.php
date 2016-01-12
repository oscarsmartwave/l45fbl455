<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->driver("session");

		if($this->session->has_userdata('token') == true)
		{
			redirect(base_url()."leafblast", "refresh");
		}
	}

	public function index()
	{
		if(!$this->session->userdata("token"))
		{
			$this->load->view('login');
		}
		else
		{
			redirect(base_url().'leafblast', 'refresh');
		}
	}

	public function submit()
	{
		$this->load->model("login_model");
		switch ($_SERVER["REQUEST_METHOD"])
		{
			case "GET" :

				redirect(base_url(), "refresh");
				break; 

			case "POST" :

				$this->load->driver("session");
				$login = $this->login_model->login($_POST);
				
				if($login->Status != 200)
				{
					redirect(base_url()."?login_attempt=1", "refresh");
				}

				$this->session->set_userdata("Ip", $login->Data->Ip);
				$this->session->set_userdata("token", $login->token);
				$this->session->set_userdata("username", $login->Data->username);
				// $this->session->session_id = $login->token;
				redirect(base_url()."leafblast", "refresh");
				break;

			default:
				break;
		}
	}
	public function logout()
	{
		redirect(base_url().'login', 'refresh');
	}
}
?>