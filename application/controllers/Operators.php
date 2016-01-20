<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require APPPATH . '/libraries/REST_Controller.php';

class Operators extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("operators_model", "om");
	}
	public function index()
	{
		$this->load->model('operators_model');
		$data = $this->operators_model->view();
		
		$title["title"] = "Operators";
		$this->load->view('header', $title);
		$this->load->view('operators/operators', $data);
		$this->load->view('operators/operators_footer');
	}
	public function add()
	{
		$title["title"] = "Add Operator";
		$this->load->view('header', $title);
		$this->load->view('operators/add');
		$this->load->view('operators/add-footer');
	}
	public function edit($id='')
	{
		$this->load->model('operators_model');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			// $response["response"] = $_POST;
			$response["response"] = $this->om->edit($_POST);
			$this->load->view("operators/response", $response);
			return;
		}
		$data = $this->operators_model->get_id($id); 
		//die('<pre>'.print_r($data));
		$title["title"] = "Edit Operator";
		$this->load->view("header", $title);
		$this->load->view('operators/edit', $data);
		$this->load->view("operators/edit-footer");
	}
	public function delete($id)
	{
		$this->load->model('operators_model');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{	
			$delete = $this->operators_model->delete($_POST);
			//die('<pre>'.print_r($delete, true));
			if($delete == true)
			{
				redirect(base_url()."operators/?delete=success&deleted=".$id);
			}
		}

		$data = $this->operators_model->get_id($id);
		//die('<pre>'.print_r($data, true));
		$this->load->view('operators/delete', $data);
	}
	public function suspended($id)
	{
		$this->load->model('operators_model');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{	
			$suspended = $this->operators_model->suspended($_POST);
			//die('<pre>'.print_r($delete, true));
			if($suspended == true)
			{
				redirect(base_url()."operators/?suspended=success&suspended=".$id);
			}
		}

		$data = $this->operators_model->get_id($id);
		$title["title"] = "Suspend Operator";
		$this->load->view("header", $title);
		$this->load->view("operators/suspended", $data);
		$this->load->view("footer");
	}
	public function reset($id)
	{
		$this->load->model('operators_model');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{	
			$reset = $this->operators_model->reset($_POST);
			//die('<pre>'.print_r($delete, true));
			if($reset == true)
			{
				redirect(base_url()."operators/?reset=success&reset=".$id);
			}
		}

		$data = $this->operators_model->get_id($id);
		$title["title"] = "Edit Operator";
		$this->load->view("header", $title);
		$this->load->view('operators/reset', $data);
		$this->load->view("footer");
	}
	public function ratings()
	{
		$this->load->model('operators_model');
		$array = array();
		// error_reporting(E_ERROR | E_WARNING | E_PARSE);
		$opts = $this->operators_model->view();

		foreach($opts as $row)
		{
			foreach($row as $val)
			{
				$rating = 0;
				$ctr=0;
				$val->ratings = $this->operators_model->rating($val->objectId);
				foreach($val->ratings as $rating_row)
				{
					foreach($rating_row as $rating_val)
					{
						$rating += $rating_val->rating;
						$ctr++;
					}
					if($ctr == 0)
					{
						$rate = 'No rating yet';
					}
					else
					{
						$rate = $rating/$ctr;
					}
				}
				$val->rating = $rate;
				$val->count = $ctr;
			}
		}
//		die('<pre>'.print_r($opts, true));
		$title["title"] = "Operator Ratings";
		$this->load->view("header",$title);
		$this->load->view('operators/ratings', $opts);
		$this->load->view("footer");
	}
	private function exchangeArray($data)
	{

	}
}

/* End of file Operators.php */
/* Location: ./application/controllers/Operators.php */