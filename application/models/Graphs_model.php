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

class Graphs_model extends CI_Model
{
	public function getCarSize()
	{
		$curl = new Curl();
		$curl->get(URL."graphs");

		return $curl->response;
	}
}
?>