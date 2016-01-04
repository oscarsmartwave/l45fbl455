<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
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
				redirect(base_url(), "refresh");	
				break; 

			case "POST" :
				// $this->session->sess_destroy();
				
				$this->session->sess_create();
				$login = $this->login_model->login($_POST);
				
				if($login->Status != 200)
				{
					redirect(base_url()."?login_attempt=1", "refresh");
				}

				$_SESSION["current_user"] = $login->Data;
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