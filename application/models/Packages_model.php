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

class Packages_model extends CI_Model
{

	public function add($data)
	{
		$cp = new ParseObject("CarWashPackages");
		$cp->set("detail", $data["details"]);
		$cp->set("title", $data["title"]);
		$cp->set("priceNum", (float) $data["priceNum"]);
		$cp->set("price", "$".$data["priceNum"]);
		$cp->set("estTime", (int) $data["estTime"]);
		$cp->set("isRemoved", false);

		try 
		{
			$cp->save();
			$response = array(
				"Status" => "SUCCESS",
				"objectId" => $cp->getObjectId(),
				"title" => $cp->get("title"),
				"detail" => $cp->get("detail"),
				"priceNum" => $cp->get("priceNum"),
				"estTime" => $cp->get("estTime"),
				"createdAt" => $cp->getCreatedAt()
			);
			return $response;
		} 
		catch (ParseException $ex) 
		{    
			$ex_array = array("Status" => "FAILED", "Message"=>$ex->getMessage(), "Code"=>$ex->getCode());
			return $ex_array;
		}
	}//END ADD

	public function view()
	{
		$query = new ParseQuery('CarWashPackages');
		$query->equalTo("isRemoved", false);
		$results["packages"] = $query->find();
		
		return $results;
	}//END VIEW ALL
	public function edit($data)
	{
		$cp = new ParseQuery("CarWashPackages");
		$results = $cp->get($data["objectId"]);


		$results->set("detail", $data["detail"]);
		$results->set("title", $data["title"]);
		$results->set("estTime", (int) $data["estTime"]);
		
		try
		{
			$response = array(
				"Status" => "SUCCESS",
				"objectId" => $results->getObjectId(),
				"title" => $results->get("title"),
				"detail" => $results->get("detail"),
				"priceNum" => $results->get("priceNum"),
				"estTime" => $results->get("estTime"),
				"createdAt" => $results->getCreatedAt()
			);
			return $response;
		}
		catch(ParseException $ex)
		{
			$ex_array = array("Status"=>"FAILED", "Message"=>$ex->getMessage(), "Code"=>$ex->getCode());
			return $ex_array;
		}

	}

	public function price($data)
	{
		$cp = new ParseQuery("CarWashPackages");
		$results = $cp->get($data["objectId"]);

		$results->set("isRemoved", true);
		
		$newPackage = new ParseObject("CarWashPackages");
		$newPackage->set("detail", $data["detail"]);
		$newPackage->set("isRemoved", false);
		$newPackage->set("title", $data["title"]);
		$newPackage->set("priceNum", (float) $data["priceNum"]);
		$newPackage->set("price", "$".$data["priceNum"]);
		$newPackage->set("estTime", (int) $data["estTime"]);
		
		try
		{
			$results->save();
			$newPackage->save();
			return $newPackage;
		}
		catch(ParseException $ex)
		{
			$ex_array = array("Message"=>$ex->getMessage(), "Code"=>$ex->getCode());
			return $ex_array;
		}

	}

	public function get_id($id)
	{
		$query = new ParseQuery('CarWashPackages');
		try
		{
			$query->get($id);
			$results["packages"] = $query->find();
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
		$cp = new ParseQuery("CarWashPackages");
		$results = $cp->get($data["objectId"]);

		$results->set("isRemoved", true);

		try
		{
			$results->save();
			$response = array(
				"Status" => "SUCCESS",
				"objectId" => $results->getObjectId()
			);

			return $response;

		}
		catch(ParseException $ex)
		{
			$ex_array = array("Status"=>"FAILED","Message"=>$ex->getMessage(), "Code"=>$ex->getCode());
			return $ex_array;
		}		
	}
}

?>