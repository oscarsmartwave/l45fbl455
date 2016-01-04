<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
class Logout extends CI_Controller 
{
	public function index()
	{
		session_destroy();
		redirect(base_url(), "refresh");
	}
}
?>