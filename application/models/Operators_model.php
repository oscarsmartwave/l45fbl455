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

class Operators_model extends CI_Model
{

	public function __construct()
	{

	}

	public function add($data)
	{
		$filePath = $data["uploadPhoto"]["tmp_name"];
		$ext = pathinfo($data["uploadPhoto"]["name"], PATHINFO_EXTENSION);

		$file = ParseFile::createFromFile($filePath, $data["username"].".".$ext);
		$file->save();
		$url = $file->getUrl();
		$cp = new ParseObject("_User");
		$cp->set("username", $data["username"]);
		$cp->set("password", $data["password"]);
		$cp->set("firstName", $data["firstName"]);
		$cp->set("lastName", $data["lastName"]);
		$cp->set("email", $data["email"]);
		$cp->set("homeAddress", $data["homeAddress"]);
		$cp->set("phoneNumber", $data["phoneNumber"]);
		$cp->set("operatorPicture", $file);
		$cp->set("isOperator", true);
		$cp->set("isRemoved", false);

		try 
		{
			$cp->save();
			return $cp;
		} 
		catch (ParseException $ex) 
		{    
			die('<pre>'.print_r($ex->getMessage(), true));
		}
	}//END ADD

	public function view()
	{
		$array = array();
		$query = new ParseQuery('_User');
		$query->equalTo("isRemoved", false);
		$results["operators"] = $query->find();
		
		return $results;
	}//END VIEW ALL

	public function edit($data)
	{
		$cp = new ParseQuery("_User");
		$results = $cp->get($data["objectId"]);

		$results->set("username", $data["username"]);
		$results->set("password", $data["password"]);
		$results->set("firstName", $data["firstName"]);
		$results->set("lastName", $data["lastName"]);
		$results->set("email", $data["email"]);
		$results->set("homeAddress", $data["homeAddress"]);
		$results->set("phoneNumber", $data["phoneNumber"]);
		$results->set("isOperator", true);
	
		
		try
		{
			$results->save(true);
			return $this->get_id($data["objectId"]);
		}
		catch(ParseException $ex)
		{
			$ex_array = array("Message"=>$ex->getMessage(), "Code"=>$ex->getCode());
			return $ex_array;
		}

	}

	public function get_id($id)
	{
		$query = new ParseQuery('_User');
		try
		{
			$query->get($id);
			$results["operators"] = $query->find();

			return $results;
		}
		catch(ParseException $ex)
		{
			$ex_array = array("Message"=>$ex->getMessage(), "Code"=>$ex->getCode());
			return $ex_array;
		}
		
		return $results;
	}

	public function delete($data)
	{
		$cp = new ParseQuery("_User");
		$results = $cp->get($data["objectId"]);

		$results->set("isRemoved", true);

		try
		{
			$results->save(true);
			return true;
		}
		catch(ParseException $ex)
		{
			$ex_array = array("Message"=>$ex->getMessage(), "Code"=>$ex->getCode());
			return $ex_array;
		}		
	}



	/**********
	params
	$optId - ObjectId of Operator
	**********/
	public function rating($optId)
	{
//		$query = urlencode('where={"operatorId":{"__type":"Pointer","className":"_User","objectId":"'.$optId.'"}}');
		$query = array(
			'where' => '{"operatorId":{"__type":"Pointer","className":"_User","objectId":"'.$optId.'"}}',
			);
		$url = 'https://api.parse.com/1/classes/OperatorRatings?'.http_build_query($query);
	    $handle = curl_init(); 
	    
		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

	    $data = curl_exec($handle);
		curl_close($handle);
		$array = json_decode($data);
		return $array;	
	}
}

?>