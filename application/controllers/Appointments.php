<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Appointments extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("appointments_model", "am");
		$this->load->driver("session");

		if($this->session->has_userdata('token') == false)
		{
			redirect(base_url(), "refresh");
		}
	}

	public function index()
	{
		$this->load->view('appointments/appointments');
	}
	public function view()
	{
		$results = $this->am->view();
		$this->load->view('appointments/view', $results);
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
		$appointments = $this->am->assigned();
		$this->load->view("appointments/viewAssigned", $appointments);
	}
	public function unassigned()
	{
		$appointments = $this->am->unassigned();
		$this->load->view("appointments/viewUnassigned", $appointments);
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
//		die('<pre>'.print_r($users, true));
		$array = array();
		$data = array();
		$ticks = array();

		foreach($users as $row)
		{
			$ctr=0;
			foreach($row as $val)
			{
				$data[$ctr] =  array($ctr, $this->am->operators_appointment_count($val->objectId));
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
		$appointments = $this->am->view_day($year,$month,$day);
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
			case 12 :
			$numOfDays = 31;
			break;
		}

		if($month == '')
		{
			$this->load->view('appointments/viewmonths');
		}
		else
		{
			$this->load->view('appointments/appointmentmonths', $this->am->view_month($year, $month));
		}
	}
	public function year($year='')
	{
		if($year == '')
		{
			$this->load->view('appointments/appointmentyears', $year);
		}
		$data = $this->am->view_year($year);
		//die('<pre>'.print_r($data, true));
		$this->load->view('appointments/appointmentyears', $data);

	}

}

/* End file Appointments.php */
/* Location: ./application/controllers/Appointments.php */