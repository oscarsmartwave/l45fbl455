<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public $currentUser;
	public function index()
	{
		if($this->session)
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
			
				$this->session->sess_destroy();
				die(":P");
				break; 

			case "POST" :

				$login = $this->login_model->login($_POST);
				if($login->getCurrentUser()->getSessionToken() != null)
				{
					session_start();
					$_SESSION["parse_token"] = $login->getCurrentUser()->getSessionToken();
					redirect(base_url().'leafblast', 'refresh');
				}
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