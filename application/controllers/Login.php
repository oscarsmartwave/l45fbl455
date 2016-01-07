<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public $currentUser;
	
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
		if($this->session->has_userdata('token') == false)
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

				$login = $this->login_model->login($_POST);
				
				if($login->Status != 200)
				{
					redirect(base_url()."?login_attempt=1", "refresh");
				}

				$this->session->set_userdata((array)$login->Data);
				$this->session->set_userdata(array("token" => $login->token));
				// $this->session->session_id = $login->token;
				// die('<pre>'.print_r($this->session->userdata(), true));
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