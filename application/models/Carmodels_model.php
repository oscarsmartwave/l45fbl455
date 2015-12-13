<?php
class Carmodels_model extends CI_Model
{

	private $url;
	private $appid;
	private $rest_key;
	private $master_key;
	private $headers;
	public function __construct()
	{
		$this->url = 'https://api.parse.com/1/classes/CarModel';
		$this->app_id = 'yPPe3Uv46pKNnrTc7I6xArFHi8EQ8cdz4Kw3JGkX';
		$this->rest_key = '7PJB1F4g8aFSv5f8e0gSMwi9Ghv2AeAkTW0O50pe';
		$this->master_key = 'y95bItd5BI6Btqos1De4m8HZUllSM3HMcOs04WWB';
		$this->headers = array(
		    "Content-Type: application/json",
		    "X-Parse-Application-Id: $this->app_id",
		    "X-Parse-REST-API-Key: $this->rest_key"
		);
	}
	public function view()
	{
		$query = urlencode('where={"isRemoved":false}');
		$url = $this->url.'?'.$query;
		
		$handle = curl_init(); 
		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

	    $data = curl_exec($handle);
		curl_close($handle);
		$array = json_decode($data);
		//die('<pre>'.print_r($array, true));
		return $array;

	}//END VIEW ALL
	public function getCarMakes()
	{
		$query = urlencode('where={"isRemoved":false}');
		$url = 'https://api.parse.com/1/classes/CarMake?'.$query;

	    $handle = curl_init(); 
		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

	    $data = curl_exec($handle);
		curl_close($handle);
		$array = json_decode($data);
		return $array;

	}
	public function getCarTypes()
	{
		$query = urlencode('where={"isRemoved":false}');
		$url = 'https://api.parse.com/1/classes/CarType?'.$query;

	    $handle = curl_init(); 
		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

	    $data = curl_exec($handle);
		curl_close($handle);
		$array = json_decode($data);
		return $array;

	}
	public function add_details()
	{
		$array['carMakes'] = $this->getCarMakes();
		$array['carTypes'] = $this->getCarTypes();
		return $array;
	}
	public function add($data)
	{
		$query =
			'{
				"model":"'.$data['model'].'",
				"prettyName":"'.$data['prettyName'].'",
				"carType":"'.$data['carType'].'",
				"carMake":"'.$data['carMake'].'", 
				"isRemoved":false
			}';

	    $handle = curl_init();

		curl_setopt($handle, CURLOPT_URL, $this->url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($handle, CURLOPT_POST, true);
		curl_setopt($handle, CURLOPT_POSTFIELDS, $query);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

	    $data = curl_exec($handle);
		curl_close($handle);
		$array = json_decode($data);
		return $array;
	}//END ADD


	public function edit($id, $data)
	{	
		$query =
			'{
				"model":"'.$data['model'].'",
				"prettyName":"'.$data['prettyName'].'",
				"carType":"'.$data['carType'].'",
				"carMake":"'.$data['carMake'].'", 
				"isRemoved":false
			}';
		$url = $this->url.'/'.$id;

	    $handle = curl_init(); 
	    
		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $this->headers);
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
		$url = $this->url.'?'.$query;
		
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
	public function delete($id)
	{
		$query =
			'{"isRemoved":true}';

//		$url = 'https://api.parse.com/1/classes/CarMake/'.$id;
		$url = $this->url.'/'.$id;
		
	    $handle = curl_init(); 
	    
		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $this->headers);
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