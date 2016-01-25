<?php
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

class Notifications_model extends CI_Model
{
	private $message;
	private $user;
	public function __construct()
	{

	}

	public function setMessage($x)
	{ $this->message = $x; }
	public function getMessage()
	{ return $this->message; }

	public function setUser($x)
	{ $this->user = $x; }
	public function getUser($x)
	{ return $this->user; }

	public function pushToAll($data)
	{
		$query = ParseInstallation::query();
		$query->equalTo("channels", "global");
		$data = 
		array(
			"alert" => $data["message"]
			);

		try
		{
			$send = ParsePush::send(array(
				"where" => $query,
				"data" => $data
				));
			$return = array("Status"=>"SUCCESS", "Data"=>$data);
			return $return;
		}
		catch(ParseException $ex)
		{
			return $return = array("Status"=>"FAILED", "Message"=>$ex->getMessage(), "Code" => $ex->getCode());
		}
		

		return $send;
	}

	public function getUsers()
	{
		$_User = new ParseQuery("_User");
		$_User->equalTo("isRemoved", false);

		$users = $_User->find();
		$user_array = array();

		foreach($users as $user)
		{
			$user_array[] = array(
				"objectId" => $user->getObjectId(),
				"firstName" => $user->get("firstName"),
				"lastName" => $user->get("lastName")
			);
		}
		return $user_array;
	}

	public function pushToUser($data)
	{
		// IvjhY3I1Ia
		$query = ParseInstallation::query();
		$query->equalTo("installationUser", $data["user"]);
		$data = 
		array(
			"alert" => $data["message"]
			);

		try
		{
			$send = ParsePush::send(array(
				"where" => $query,
				"data" => $data
				));
		}
		catch(ParseException $ex)
		{
			die('<pre>'.print_r(array("Message"=>$ex->getMessage(), "Code"=>$ex->getCode())));
		}
		

		return $send;

	}

	public function getTimeZones()
	{
		$zones = timezone_identifiers_list();

		foreach ($zones as $zone) 
		{
		    $zone = explode('/', $zone); // 0 => Continent, 1 => City
		    
		    // Only use "friendly" continent names
		    if ($zone[0] == 'Africa' || $zone[0] == 'America' || $zone[0] == 'Antarctica' || $zone[0] == 'Arctic' || $zone[0] == 'Asia' || $zone[0] == 'Atlantic' || $zone[0] == 'Australia' || $zone[0] == 'Europe' || $zone[0] == 'Indian' || $zone[0] == 'Pacific')
		    {        
		    	if (isset($zone[1]) != '')
		    	{
		            $locations[$zone[0]][$zone[0]. '/' . $zone[1]] = str_replace('_', ' ', $zone[1]); // Creates array(DateTimeZone => 'Friendly name')
		        } 
		    }
		}
		// die("<pre>".print_r($locations, true));
		return $locations;
	}

	public function pushToTimeZone($data)
	{	
		$query = ParseInstallation::query();
		$query->equalTo("timeZone", $data["timezone"]);
		$data = 
		array(
			"alert" => $data["message"]
			);

		try
		{
			$send = ParsePush::send(array(
				"where" => $query,
				"data" => $data
				));
			$return = array("Status"=>"SUCCESS", "Data"=>$data);
			return $return;
		}
		catch(ParseException $ex)
		{
			return $return = array("Status"=>"FAILED", "Message"=>$ex->getMessage(), "Code" => $ex->getCode());
		}
		

		return $send;
	}
	public function getTimeZone()
	{
		// ParseInstallation.getCurrentInstallation().getString("_Installation");

		$query = new ParseQuery('_Installation', true);

		try
		{
			$query->select("timeZone");
			$results = $query->find(true);
			$array = array();
			foreach($results as $result)
			{
				$array[] = $result->get("timeZone");
			}
			// die('<pre>'.print_r(array_unique($array)));
			return array_unique($array);
		}
		catch(ParseException $ex)
		{
			$ex_array = array("Status"=>"FAILED", "Message"=>$ex->getMessage(), "Code"=>$ex->getCode());
			return $ex_array;
		}
		
		return $results;

	}
}

?>