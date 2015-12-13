<?php

class Cartypes_model extends CI_Model
{

public function add($data)
	{
		//$query = urlencode($data);
		$query =
			'{"carType":"'.$data['carType'].'", "priceMultiplier":'.$data['priceMultiplier'].', 
			"prettyName":"'.$data['prettyName'].'","isRemoved":false}';
		$url = 'https://api.parse.com/1/classes/CarType';
		//die('<pre>'.print_r($data, true));
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
		$url = 'https://api.parse.com/1/classes/CarType?'.$query;

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
//		die($id);
//		die('<pre>'.print_r($data, true));
		$query =
			'{"carType":"'.$data['carType'].'", "priceMultiplier":'.$data['priceMultiplier'].', 
			"prettyName":"'.$data['prettyName'].'","isRemoved":false}';
		$url = 'https://api.parse.com/1/classes/CarType/'.$id;

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
//		die('<pre>'.print_r($array, true));
		return $array;
	}
	public function get_id($id)
	{
		$query = urlencode('where={"objectId":"'.$id.'"}');
		$url = 'https://api.parse.com/1/classes/CarType?'.$query;

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

		$url = 'https://api.parse.com/1/classes/CarType/'.$id;

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