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
		$curl = new Curl();
		$curl->get(API."appointments");
		$resp = $curl->response;
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
		$curl = new Curl();
		$curl->get(API."appointments/status/assigned");

		return $curl->response;
	}
	public function unassigned()
	{
		$curl = new Curl();
		$curl->get(API."appointments/status/unassigned");

		return $curl->response;
	}
	public function assignment($id, array $data)
	{

	}
	public function operators_appointment_count($operatorId)
	{
		
	}
	public function view_month($year, $month)
	{
		$curl = new Curl();
		$curl->get(API."history/month/".$year."/".$month);
		return $curl->response;

		// die("<pre>".print_r($curl->response, true));
	}
	public function view_year($year)
	{
		$curl = new Curl();
		$curl->get(API."history/year/".$year);

		return $curl->response;
		// $resp = $curl->response;
		// die("<pre>".print_r($resp, true));
	}
	public function view_day($year, $month, $day)
	{
		
	}
	// public function parseGetUserName($objectId)
	// {
	// 	$_user = new ParseQuery("_User");
	// 	$_user->limit(1);
	// 	$user = $_user->get($objectId);
	// 	return $user->get("firstName")." ".$user->get("lastName");
	// }

	// public function parseGetCar($objectId)
	// {
	// 	$car = new ParseQuery("Car");
	// 	$car->limit(1);
	// 	$_car = $car->get($objectId);
	// 	return $_car->get("make");
	// }

	// public function parseGetPackageTitle($objectId)
	// {
	// 	$carWashPackage = new ParseQuery("CarWashPackages");
	// 	$carWashPackage->limit(1);
	// 	$package = $carWashPackage->get($objectId);
	// 	return $package->get('title');
	// }

}

?>