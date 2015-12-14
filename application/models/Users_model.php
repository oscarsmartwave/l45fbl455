<?php
use Parse\ParseClient;
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

class Users_model extends CI_Model
{

	public function add($data)
	{

	}//END ADD

	public function view()
	{
		$query = new ParseQuery('_User');
		$results["users"] = $query->find();

		return $results;


	}//END VIEW ALL

	public function get_id($objectId)
	{
		$query = new ParseQuery('_User');
		try
		{
			$query->get($objectId);
			$results["user"] = $query->find();
		}
		catch(ParseException $ex)
		{
			$ex_array = array("Message"=>$ex->getMessage(), "Code"=>$ex->getCode());
			return $ex_array;
		}
		
		return $results;
	}

	public function deactivate($objectId)
	{
		$cp = new ParseQuery("_User");
		$results = $cp->get($objectId);

		$results->set("isDeactivated", true);
		
		try
		{
			$results->save(true);
			return $this->get_id($objectId);
		}
		catch(ParseException $ex)
		{
			$ex_array = array("Message"=>$ex->getMessage(), "Code"=>$ex->getCode());
			return $ex_array;
		}
	}

	public function edit($id, $data)
	{	
		$query =
		'{"username":"'.$data['username'].'", "password":"'.$data['password'].'", 
		"firstName":"'.$data['firstName'].'","lastName":"'.$data['lastName'].'", 
		"email":"'.$data['email'].'", "homeAddress":"'.$data['homeAddress'].'",
		"phoneNumber":"'.$data['phoneNumber'].'","isOperator":false}';

		$url = 'https://api.parse.com/1/classes/_User/'.$id;

		$app_id = 'yPPe3Uv46pKNnrTc7I6xArFHi8EQ8cdz4Kw3JGkX';
		$rest_key = '7PJB1F4g8aFSv5f8e0gSMwi9Ghv2AeAkTW0O50pe';
		$master_key = 'y95bItd5BI6Btqos1De4m8HZUllSM3HMcOs04WWB';
		$headers = array(
			"Content-Type: application/json",
			"X-Parse-Application-Id: $app_id",
			"X-Parse-Master-Key: $master_key"
			);

		$handle = curl_init(); 

		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($handle, CURLOPT_POSTFIELDS, $query);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

		$data = curl_exec($handle);
		curl_close($handle);
		$array = json_decode($data);
		return $array;
	}

	public function delete($id)
	{
		$query =
		'{"isOperator":false}';

		$url = 'https://api.parse.com/1/classes/_User/'.$id;

		$app_id = 'yPPe3Uv46pKNnrTc7I6xArFHi8EQ8cdz4Kw3JGkX';
		$rest_key = '7PJB1F4g8aFSv5f8e0gSMwi9Ghv2AeAkTW0O50pe';
		$master_key = 'y95bItd5BI6Btqos1De4m8HZUllSM3HMcOs04WWB';

		$headers = array(
			"Content-Type: application/json",
			"X-Parse-Application-Id: $app_id",
			"X-Parse-Master-Key: $master_key"
			);

		$handle = curl_init(); 

		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($handle, CURLOPT_POSTFIELDS, $query);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

		$data = curl_exec($handle);
		curl_close($handle);
		$array = json_decode($data);
		return $array;
	}

	public function getCars($userID)
	{
		$query = new ParseQuery("Car");
		try
		{
			$results = $query->get("owner", $userID);
			return $results;	
		}
		catch(ParseException $ex)
		{
			// die(print_r(array("message"=>$ex->getMessage(), "code"=>$ex->getCode())));
			return "Error";	
		}
		
	}

}
?>