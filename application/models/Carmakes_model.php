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

	}//END ADD

	public function view()
	{

	}//END VIEW ALL
	
	public function edit($id, $data)
	{		

	}

	public function delete($id)
	{
		
	}
}

?>