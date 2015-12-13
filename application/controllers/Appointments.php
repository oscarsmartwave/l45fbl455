<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require APPPATH . '/libraries/REST_Controller.php';
date_default_timezone_set('Asia/Manila');
class Appointments extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('appointments/appointments');
	}
	public function view()
	{
		$this->load->model('appointments_model');
		//$this->appointments_model->view();
		$this->load->view('appointments/view', $this->appointments_model->view());
	}
	public function operators($id='')
	{
		if($id=='')
		{
			$this->load->model('operators_model');
			$this->load->view('appointments/viewOperators', $this->operators_model->view());
		}
		else
		{
			$this->load->model('appointments_model');
			$this->load->view('appointments/operatorsAppointments', $this->appointments_model->operators($id));
		}
	}
	public function assigned()
	{
		$today = date("c");
		$yesterday = date("c", strtotime("-1 days"));

		$dates = array("today" => $today, "yesterday" => $yesterday);
		$this->load->model('appointments_model');
//		$appt = $this->appointments_model->assigned($dates);

		$this->load->view('appointments/viewAssigned', $this->appointments_model->assigned($dates));
		
	}
	public function unassigned()
	{
		$this->load->model('appointments_model');
//		$appt = $this->appointments_model->unassigned();
		
		$this->load->view('appointments/viewUnassigned', $this->appointments_model->unassigned());
	}
	public function assignment($apptId='')
	{
		$this->load->model('appointments_model');
		$this->load->model('operators_model');
		if($apptId == '')
		{ }

		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->appointments_model->assignment($apptId, $_POST);
		}
		
		$data['appointments'] = $this->appointments_model->get_id($apptId);
		$data['operators'] = $this->operators_model->view();
		$this->load->view('appointments/assignment', $data);
	}
	public function graph()
	{
		$this->load->model('operators_model');
		$users = $this->operators_model->view();
		$this->load->model('appointments_model');
//		die('<pre>'.print_r($users, true));
		$array = array();
		$data = array();
		$ticks = array();

		foreach($users as $row)
		{
			$ctr=0;
			foreach($row as $val)
			{
				$data[$ctr] =  array($ctr, $this->appointments_model->operators_appointment_count($val->objectId));
				$ticks[$ctr] = array($ctr, $val->username);
				$ctr++;
			}
		}
//		die('<pre>'.print_r($data, true));
		$array = array('ticks'=>$ticks, 'data' => $data);

		$json = json_encode($array);
		echo $json;
		//[[1,'Bob'],[2,'Chris'],[3,'Joe']]
	}

	public function day($year='' ,$month='', $day='')
	{
		//die($year. $month. $day);
		$this->load->model('appointments_model');
		$appointments = $this->appointments_model->view_day($year,$month,$day);
		$this->load->view('appointments/appointmentdays', $appointments);
	}
	public function months($year='' ,$month='')
	{
		switch($month){
		case '01' :
			$numOfDays = 31;
			break;
		case '02' :
			if($year % 4 == 0)
				{ $numOfDays = 28; }
			else 
				{ $numOfDays = 29; }
			break;
		case '03' :
			$numOfDays = 31;
			break;
		case '04' :
			$numOfDays = 30;
			break;
		case '05' :
			$numOfDays = 31;
			break;
		case '06' :
			$numOfDays = 30;
			break;
		case '07' :
			$numOfDays = 31;
			break;
		case '08' :
			$numOfDays = 31;
			break;
		case '09' :
			$numOfDays = 30;
			break;
		case '10' :
			$numOfDays = 31;
			break;
		case '11' :
			$numOfDays = 30;
			break;
		case '12' :
			$numOfDays = 31;
			break;
		}

		$this->load->model('appointments_model');
		if($month == '')
		{
			$this->load->view('appointments/viewmonths');
		}
		else
		{
			$this->load->view('appointments/appointmentmonths', $this->appointments_model->view_month($year, $month, $numOfDays));
		}
	}
	public function year($year='')
	{
		$this->load->model('appointments_model');
		if($year == '')
		{
			$this->load->view('appointments/appointmentyears', $year);
		}
		$data = $this->appointments_model->view_year($year);
		//die('<pre>'.print_r($data, true));
		$this->load->view('appointments/appointmentyears', $data);

	}
}

/* End file Appointments.php */
/* Location: ./application/controllers/Appointments.php */