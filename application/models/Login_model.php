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

class Login_model extends CI_Model
{
	public function login($data)
	{
		try
		{
			$user = ParseUser::logIn($data["username"],$data["password"]);
			$currentUser = ParseUser::getCurrentUser();
			// die('<pre>'.print_r($currentUser, true));
			return $currentUser;
		}
		catch(ParseException $e)
		{
			die('<pre>'.print_r(array("Message"=>$e->getMessage(),"Code"=>$e->getCode())));
		}
	}
	public function getCurrentUser()
	{

	}
	public function logout()
	{
		ParseUser::logOut();
	}
}

?>