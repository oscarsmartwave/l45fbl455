<?php
require_once (APPPATH.'libraries/vendor/autoload.php');
require_once (APPPATH.'libraries/Curl/Curl.php');

use \Curl\Curl;
class Earnings_model extends CI_Model
{
	public function all($year)
	{
		
	}

	// public function view()
	// {
	// 	$query = new ParseQuery('_User');
	// 	$query->equalTo("isOperator", false);
	// 	$results["users"] = $query->find();

	// 	return $results;


	// }//END VIEW ALL
	
}

?>