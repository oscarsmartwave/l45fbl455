<?php
class Appointments_model extends CI_Model
{
	private $app_id;
	private $rest_key;
	private $master_key;
	private $url;

	private $headers;

	public function __construct()
	{
		$this->app_id = 'yPPe3Uv46pKNnrTc7I6xArFHi8EQ8cdz4Kw3JGkX';
		$this->rest_key = '7PJB1F4g8aFSv5f8e0gSMwi9Ghv2AeAkTW0O50pe';
		$this->master_key = 'y95bItd5BI6Btqos1De4m8HZUllSM3HMcOs04WWB';
		$this->url = 'https://api.parse.com/1/classes/Appointments';

		$this->headers = array(
			"Content-Type: application/json",
			"X-Parse-Application-Id: $this->app_id",
			"X-Parse-REST-API-Key: $this->rest_key"
		);
	}
	public function view()
	{
		$query = urlencode('include=operatorId,carId.ownerId');
		$url=$this->url.'?'.$query;

		$handle = curl_init();
		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

	    $data = curl_exec($handle);
		curl_close($handle);
		$array = json_decode($data);
//		die('<pre>'.print_r($array, true));
		return $array;
	}//END VIEW ALL
	public function get_id($id)
	{
		$query = urlencode('where={"objectId":"'.$id.'"}');
		$query = array('where' => '{"objectId":"'.$id.'"}', 'include' => 'carId.ownerId');
		$url=$this->url.'?'.http_build_query($query);

		$handle = curl_init();
		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

	    $data = curl_exec($handle);
		curl_close($handle);
		$array = json_decode($data);
//		die('<pre>'.print_r($array, true));
		return $array;
	}
	public function operators($id='')
	{
		
		$query = array( 'include' => 'carId.ownerId,operatorId', 'where' => '{"operatorId":{"__type":"Pointer","className":"_User","objectId":"'.$id.'"}}');
		
		$url=$this->url.'?'.http_build_query($query);

		$handle = curl_init();
		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

	    $data = curl_exec($handle);
		curl_close($handle);
		$array = json_decode($data);
//		die('<pre>'.print_r($array, true));		
		return $array;
	}
	public function assigned(array $dates)
	{
//		$query = urlencode('where={"isAssigned":true}');
		$query = array(
			'where' => '{"isAssigned":true,"apptDate":{"$lt":{"__type":"Date", "iso":"'.$dates['today'].'"},"$gt":{"__type":"Date", "iso":"2015-08-24T01:18:52Z"}}}',
			'include' => 'carId.ownerId,operatorId', 
			'count' => 1);
		$url=$this->url.'?'.http_build_query($query);

		$handle = curl_init();
		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

	    $data = curl_exec($handle);
		curl_close($handle);
		$array = json_decode($data);
//		die('<pre>'.print_r($array, true));
		return $array;
	}
	public function unassigned()
	{
		$query = array('where' => '{"isAssigned":false}', 'include' => 'carId.ownerId', 'count' => 1);
		$url=$this->url.'?'.http_build_query($query);

		$handle = curl_init();
		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

	    $data = curl_exec($handle);
		curl_close($handle);
		$array = json_decode($data);
//		die('<pre>'.print_r($array, true));
		return $array;
	}
	public function assignment($id, array $data)
	{
		$url = $this->url.'/'.$id;
		$query =
			'{"isAssigned":true, 
			"operatorId":{"__type":"Pointer", "className":"_User", "objectId":"'.$data['operator'].'"}}';
	    $handle = curl_init(); 
	    
		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($handle, CURLOPT_POSTFIELDS, $query);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

	    $data = curl_exec($handle);
		curl_close($handle);
//		die('<pre>'.print_r($data));
		$array = json_decode($data);
		return $array;
	}
	public function operators_appointment_count($operatorId)
	{
		$query = urlencode('where={"operatorId":{"__type":"Pointer","className":"_User","objectId":"'.$operatorId.'"}}');

		$url=$this->url.'?'.$query;

		$handle = curl_init();
		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

	    $data = curl_exec($handle);
		curl_close($handle);
		$array = json_decode($data);
//		die('<pre>'.print_r($data, true));		
		$ctr = 0;
		foreach($array as $row)
		{
			foreach($row as $val)
			{
				$ctr++;
			}
		}
		return $ctr;
	}

	public function view_month($year, $month, $days)
	{
		$query = array(
			'where' => '{"isDone":true,"timeEnd":{"$gt":{"__type":"Date","iso":"'.$year.'-'.$month.'-01T00:00:00.000Z"},"$lt":{"__type":"Date","iso":"'.$year.'-'.$month.'-'.$days.'T00:00:00.000Z"}}}',
			'include' => 'carId.ownerId'
			);
		$url = $this->url.'?'.http_build_query($query);

	    $handle = curl_init();
	    
		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

	    $data = curl_exec($handle);
		curl_close($handle);
//		die('<pre>'.print_r($data));
		$array = json_decode($data);
		return $array;
	}
	public function view_year($year)
	{
		$query = array(
			'where' => '{"isDone":true,"timeEnd":{"$gt":{"__type":"Date","iso":"'.$year.'-01-01T00:00:00.000Z"},"$lt":{"__type":"Date","iso":"'.$year.'-12-30T23:59:00.000Z"}}}',
			'include' => 'carId.ownerId'
		);
		$url = $this->url.'?'.http_build_query($query);

	    $handle = curl_init();
	    
		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

	    $data = curl_exec($handle);
		curl_close($handle);
//		die('<pre>'.print_r($data));
		$array = json_decode($data);
		return $array;
	}
	public function view_day($year, $month, $day)
	{
		$query = array(
			'where' => '{"isDone":true,"timeEnd":{"$gt":{"__type":"Date","iso":"'.$year.'-'.$month.'-'.$day.'T00:00:00.000Z"},"$lt":{"__type":"Date","iso":"'.$year.'-'.$month.'-'.$day.'T23:59:59.000Z"}}}',
			'include' => 'carId.ownerId'
			);
		$url = $this->url.'?'.http_build_query($query);

	    $handle = curl_init();
	    
		curl_setopt($handle, CURLOPT_URL, $url);
		curl_setopt($handle, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

	    $data = curl_exec($handle);
		curl_close($handle);
//		die('<pre>'.print_r($data));
		$array = json_decode($data);
		return $array;
	}
}

?>