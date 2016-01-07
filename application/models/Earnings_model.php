<?php
use \Curl\Curl;
use Parse\ParseObject;
use Parse\ParseQuery;
// use Parse\ParseACL;
// use Parse\ParsePush;
use Parse\ParseUser;
// use Parse\ParseInstallation;
use Parse\ParseException;
// use Parse\ParseAnalytics;
use Parse\ParseFile;
// use Parse\ParseCloud;
// use Parse\ParseClient;
class Earnings_model extends CI_Model
{
	public function all($year)
	{
		$curl = new Curl();
		$curl->get(API."earnings/year/".$year);
		
		$response = $curl->response;

		return $response;
	}

	public function operators()
	{
		$query = new ParseQuery("_User");
		$query->equalTo("isOperator", true);
		$results["operators"] = $query->find();
		
		return $results;

	}

	public function operator($optrObjectId)
	{
		$curl = new Curl();
		$curl->get(API."earnings/operator/".$optrObjectId);
		$results["operator"] = $curl->response;

		return $results;
	}

	public function getYear()
	{
		$date = date("Y");
		
	}
}
?>