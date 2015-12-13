<?php
require_once (APPPATH.'libraries/vendor/autoload.php');
require_once (APPPATH.'libraries/Curl/Curl.php');

use \Curl\Curl;
class Earnings_model extends CI_Model
{
	public function all($year)
	{
		$curl = new Curl();
		$curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
		$curl->setOpt(CURLOPT_RETURNTRANSFER, true);
		$curl->get('http://localhost/stripe/index.php/api/v1/earnings/index/'.$year);
		return $curl->response;
	}
	
}

?>