<?php
use Curl\Curl;
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
		$curl = new Curl();
		$curl->post(API."login", 
			$data
			);
		// die('<pre>'.print_r($curl->responseHeaders, true));
		$response = $curl->response;
		$response->token = $curl->responseHeaders["LB_Token"];

		return $response;
	}
	public function getCurrentUser()
	{

	}
	public function logout()
	{
		
	}
}

?>