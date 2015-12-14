<?php
use \Curl\Curl;

class Carmakes_model extends CI_Model
{
	private $edmunds;
	private $state;
	private $view;

	public function __construct()
	{
		$this->load->config("parse_config");
		$this->edmunds = $this->config->item("edmunds");
	}

	public function setState($x)
	{
		$this->state = $x;
	}

	public function setView($x)
	{
		$this->view = $x;
	}

	public function getState()
	{
		return $this->state;
	}

	public function getView()
	{
		return $htis->view();
	}

	public function getCarMake($state="used",$view="basic")
	{
		$curl = new Curl();
		$curl->get("https://api.edmunds.com/api/vehicle/v2/makes?state=used&view=basic&fmt=json&api_key=".$this->edmunds);

		return $curl->response;
	}

	public function add($data)
	{
//		die('<pre>'.print_r($data, true));
		//$query = urlencode($data);
		$query =
			'{"carMake":"'.$data['carMake'].'","prettyName":"'.$data['prettyName'].'", "isRemoved":false}';
		$url = 'https://api.parse.com/1/classes/CarMake';
		//die($query);

		$app_id = 'yPPe3Uv46pKNnrTc7I6xArFHi8EQ8cdz4Kw3JGkX';
		$rest_key = '7PJB1F4g8aFSv5f8e0gSMwi9Ghv2AeAkTW0O50pe';
		$master_key = 'y95bItd5BI6Btqos1De4m8HZUllSM3HMcOs04WWB';

		$headers = array(
		    "Content-Type: application/json",
		    "X-Parse-Application-Id: $app_id",
		    "X-Parse-REST-API-Key: $rest_key"
		);

	    $handle = curl_init();

		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($handle, CURLOPT_POST, true);
		curl_setopt($handle, CURLOPT_POSTFIELDS, $query);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

	    $data = curl_exec($handle);
		curl_close($handle);
		$array = json_decode($data);
		return $array;
	}//END ADD

	public function view()
	{
		$query = urlencode('where={"isRemoved":false}');
		$url = 'https://api.parse.com/1/classes/CarMake?'.$query;

		$app_id = 'yPPe3Uv46pKNnrTc7I6xArFHi8EQ8cdz4Kw3JGkX';
		$rest_key = '7PJB1F4g8aFSv5f8e0gSMwi9Ghv2AeAkTW0O50pe';
		$master_key = 'y95bItd5BI6Btqos1De4m8HZUllSM3HMcOs04WWB';

		$headers = array(
		    "Content-Type: application/json",
		    "X-Parse-Application-Id: $app_id",
		    "X-Parse-REST-API-Key: $rest_key"
		);

	    $handle = curl_init(); 
		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

	    $data = curl_exec($handle);
		curl_close($handle);
		$array = json_decode($data);
		return $array;

	}//END VIEW ALL
	public function edit($id, $data)
	{		
		$query =
			'{"carMake":"'.$data['carMake'].'","prettyName":"'.$data['prettyName'].'", "isRemoved":false}';
		$url = 'https://api.parse.com/1/classes/CarMake/'.$id;

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
		//die('<pre>'.print_r($array, true));
		return $array;
	}
	public function get_id($id)
	{
		$query = urlencode('where={"objectId":"'.$id.'"}');
		$url = 'https://api.parse.com/1/classes/CarMake?'.$query;

		$app_id = 'yPPe3Uv46pKNnrTc7I6xArFHi8EQ8cdz4Kw3JGkX';
		$rest_key = '7PJB1F4g8aFSv5f8e0gSMwi9Ghv2AeAkTW0O50pe';
		$master_key = 'y95bItd5BI6Btqos1De4m8HZUllSM3HMcOs04WWB';
		$headers = array(
		    "Content-Type: application/json",
		    "X-Parse-Application-Id: $app_id",
		    "X-Parse-REST-API-Key: $rest_key"
		);

	    $handle = curl_init(); 
	    curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
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
			'{"isRemoved":true}';

		$url = 'https://api.parse.com/1/classes/CarMake/'.$id;

		$app_id = 'yPPe3Uv46pKNnrTc7I6xArFHi8EQ8cdz4Kw3JGkX';
		$rest_key = '7PJB1F4g8aFSv5f8e0gSMwi9Ghv2AeAkTW0O50pe';
		$master_key = 'y95bItd5BI6Btqos1De4m8HZUllSM3HMcOs04WWB';
		$headers = array(
		    "Content-Type: application/json",
		    "X-Parse-Application-Id: $app_id",
		    "X-Parse-REST-API-Key: $rest_key"
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
//		die('<pre>'.print_r($array, true));
		return $array;
	}
}

?>