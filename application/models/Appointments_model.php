<?php
use \Curl\Curl;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseException;
use Parse\ParseAnalytics;
use Parse\ParseFile;
use Parse\ParseCloud;
use Parse\ParseClient;

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
		ini_set('max_execution_time', 300);
		$curl = new Curl();
		$curl->get("http://52.24.133.167/api.leafblast/api/v1/appointments");
		// $resp = $curl->response;
		// die("<pre>".print_r($resp, true));
		return $curl->response;
	}
	public function get_id($id)
	{

	}
	public function operators($id='')
	{

	}

	public function assigned()
	{
		// $_user = new ParseQuery("_User");
		$curl = new Curl();
		$curl->get("http://52.24.133.167/api.leafblast/api/v1/appointments/status/assigned");

		return $curl->response;
		// die("<pre>".print_r($curl->response, true));

	//Retrieve from parse
		$response = $curl->response;
		$count = count($response->Data);
		$view = array();
		ini_set('max_execution_time', 300);
		for($i = 0; $i < $count; $i++)
		{
			$view[$i]["location"] = $response->Data[$i]->locationString;
			$view[$i]["date"] = date("j F Y", strtotime($response->Data[$i]->apptDate));

	//raw data
			// $view[$i]["operator"] = $response->Data[$i]->optrObjectId;
			// $view[$i]["package"] = $response->Data[$i]->packageObjectId;
			// $view[$i]["car"] = $response->Data[$i]->carObjectId;
			// $view[$i]["user"] = $response->Data[$i]->userObjectId;

	//from Parse
			// $view[$i]["operator"] = $this->parseGetUserName($response->Data[$i]->optrObjectId);
			// $view[$i]["package"] = $this->parseGetPackageTitle($response->Data[$i]->packageObjectId);
			// $view[$i]["car"] = $this->parseGetCar($response->Data[$i]->carObjectId);
			// $view[$i]["user"] = $this->parseGetUserName($response->Data[$i]->userObjectId);
		}


		// return $view;
		// die("<pre>".print_r($view, true));

	}
	public function unassigned()
	{
		$curl = new Curl();
		$curl->get("http://52.24.133.167/api.leafblast/api/v1/appointments/status/unassigned");

		return $curl->response;
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
		$_user = new ParseQuery("_User");
		$_user->limit(1);
		$user = $_user->get($objectId);
		// $user = $_user->find();
		return $user->get("firstName")." ".$user->get("lastName");
	}

	public function parseGetCar($objectId)
	{
		$car = new ParseQuery("Car");
		$car->limit(1);
		$_car = $car->get($objectId);
		// $carInfo = $car->find();
		return $_car->get("make");
	}

	public function parseGetPackageTitle($objectId)
	{
		$carWashPackage = new ParseQuery("CarWashPackages");
		$carWashPackage->limit(1);
		$package = $carWashPackage->get($objectId);
		// $package = $carWashPackage->find();
		return $package->get('title');
	}

}

?>