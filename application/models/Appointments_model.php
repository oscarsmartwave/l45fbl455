<?php
class Appointments_model extends CI_Model
{
	private $objectId;

	public function __construct()
	{
		$this->load->config("parse_config");
		$this->edmunds = $this->config->item("edmunds");
	}
	public function view()
	{

	}
	public function get_id($id)
	{

	}
	public function operators($id='')
	{

	}
	public function assigned(array $dates)
	{

	}
	public function unassigned()
	{

	}
	public function assignment($id, array $data)
	{

	}
	public function operators_appointment_count($operatorId)
	{
		
	}
	public function view_month($year, $month, $days)
	{
		
	}
	public function view_year($year)
	{
		
	}
	public function view_day($year, $month, $day)
	{
		
	}
	public function parseGetUserName($objectId)
	{

	}

	public function parseGetCar($objectId)
	{

	}
}

?>