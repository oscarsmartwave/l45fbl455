<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Leafblast extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->driver("session");

		if($this->session->has_userdata('token') == false)
		{
			redirect(base_url(), "refresh");
		}
	}

	public function index()
	{
		// die('<pre>'.print_r($this->session->token));
		
		$this->load->model('dashboard_model');
		
		
			$date = date('Y-m-d');
			$dashboard = array();
			
			$dashboard['operatorsCurrentTasks'] = $this->dashboard_model->operatorsCurrentTasks();
			$dashboard['operatorsAvailable'] = $this->dashboard_model->operatorsAvailable();
			$dashboard['bookingsForTheDay'] = $this->dashboard_model->bookingsForTheDay($date);
			//die('<pre>'.print_r($dashboard['operatorsCurrentTasks']));
			$dashboard['appointmentsTimeline'] = $this->dashboard_model->appointmentsTimeline();
			
			$this->load->view('index', $dashboard);	

		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */