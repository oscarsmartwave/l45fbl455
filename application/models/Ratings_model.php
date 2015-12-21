<?php
use Parse\ParseObject;
use Parse\ParseQuery;
// use Parse\ParseACL;
// use Parse\ParsePush;
use Parse\ParseUser;
// use Parse\ParseInstallation;
use Parse\ParseException;
// use Parse\ParseAnalytics;
// use Parse\ParseFile;
// use Parse\ParseCloud;
// use Parse\ParseClient;

class Ratings_model extends CI_Model
{
	public function getAllRatings()
	{
		try
		{
			$_rate = new ParseQuery("OperatorRatings");
			$rate = 
			$_rate->includeKey("user")
				->includeKey("operator")
				->find();
			
			return $rate;

		}
		catch(ParseException $px)
		{
			$array_px = array("Message"=>$px->getMessage(), "Code"=>$px->getCode());
			die('<pre>'.print_r($array_px, true));
			// return $array_px;
		}
		
	}

	public function getRating()
	{

	}
}

?>