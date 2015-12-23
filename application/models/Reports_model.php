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

class Reports_model extends CI_Model
{
	public function __construct()
	{
		$this->load->config("parse_config");
		$this->edmunds = $this->config->item("edmunds");
	}

	public function getReports()
	{
		$query = new ParseQuery("ReportOperator");
		$query->includeKey("user");
		$query->includeKey("operator");

		$results["reports"] = $query->find();

		// for ($i = 0; $i < count($results); $i++) {
		// 	$usernames = $results[$i]->get("username");
		// }

		// die("<pre>".print_r($results, true));

		return $results;

	}

}


?>