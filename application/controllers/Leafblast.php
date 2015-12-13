<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Leafblast extends CI_Controller {

	public function index()
	{
		$this->load->model('dashboard_model');
		
		if(isset($_SESSION["parse_token"]))
		{
			redirect(base_url().'login', 'refresh');
		}
		else
		{
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */