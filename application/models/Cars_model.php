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

class Cars_model extends CI_Model
{
	public function getCarsOfUsers($userObjectId)
	{
		$_user = new ParseQuery("_User");
		$_user->get($userObjectId);
		$user = $_user->find();

		$_car = new ParseQuery("Car");
		$_car->equalTo("owner", $user[0]);
		$cars = $_car->find();
		
		return $cars;
	}
}

?>