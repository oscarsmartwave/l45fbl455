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
		$curl->get("https://api.edmunds.com/api/v1/appointments/status/assigned?state=used&view=basic&fmt=json&api_key=".$this->edmunds);

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
		$_user = new ParseQuery("_User");
		$curl = new Curl();
		$curl->get("http://52.24.133.167/api.leafblast/api/v1/appointments/status/assigned");

		// return $curl->response;
		$response = $curl->response;
		$count = count($response->Data);
		$view = array();
		ini_set('max_execution_time', 300);
		for($i = 0; $i < $count; $i++)
		{
			$view[$i]["user"] = $this->parseGetUserName($response->Data[$i]->userObjectId);
		} 
		die("<pre>".print_r($view, true));
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
		$car->get($objectId);
		$carInfo = $car->find();

		return $carInfo->get("make");
	}

	public function parseGetPackageTitle($objectId)
	{
		$carWashPackage = new ParseQuery("CarWashPackage");
		$carWashPackage->limit(1);
		$carWashPackage->get($objectId);
		$package = $carWashPackage->find();

		return $package->get('title');
	}

	public function getCurlResponse($appointments)
	{

		$arrAppt = (array) $appointments->Data;

		 // die("<pre>".print_r($arrAppt, true));

		foreach ($arrAppt as $val) 
		{
			$location = $val->locationString;
			$operatorId = $val->optrObjectId;
			$packageId = $val->packageObjectId;
			$carId = $val->carObjectId;
			$userId = $val->userObjectId;
			$apptDate = $val->apptDate;

			// $_operatorId = $this->parseGetUserName($operatorId);
			// $_userId = $this->parseGetUserName($userId);
			// $_packageId = $this->parseGetPackageTitle($packageId);
			// $_carId = $this->parseGetCar($carId);
			$arrRes = array(
				$location, $operatorId, $packageId, $carId, $userId, $apptDate
				);

			return $arrRes;
		}
		

		// die("<pre>".print_r($arrRes, true));

	}
}

?>