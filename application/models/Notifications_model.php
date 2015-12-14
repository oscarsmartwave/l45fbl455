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
		}
		catch(ParseException $ex)
		{
			die('<pre>'.print_r(array("Message"=>$ex->getMessage(), "Code"=>$ex->getCode())));
		}
		

		return $send;
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
		return $locations;
	}
}

?>