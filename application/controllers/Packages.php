<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require APPPATH . '/libraries/REST_Controller.php';

class Packages extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('packages_model', 'pm');
		// $this->load->driver("session");
		// die('<pre>'.print_r($this->session->all_userdata()));
		// if(!$this->session->userdata('token'))
		// {
		// 	redirect(base_url(), "refresh");
		// }
	}
	
	public function index()
	{
		
		$this->load->model('packages_model');
		$results = $this->packages_model->view();
		$this->load->view("header", array("title" => "Packages"));
		$this->load->view("packages/packages", $results);
		$this->load->view("packages/add-footer");

	}
	public function add()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->load->model('packages_model');
			$response["response"] = $this->packages_model->add($_POST);
			$this->load->view("packages/response", $response);
			return;
			// if(null != $data->getObjectId())
			

		}
		$this->load->view("header", array("title" => "Add Package"));
		$this->load->view('packages/add');
		$this->load->view("packages/add-footer");

	}
	public function edit($id='')
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->load->model('packages_model');
			$response["response"] = $this->packages_model->edit($_POST);
			$this->load->view("packages/response", $response);
			return;
		}
		$this->load->model('packages_model');

		$results = $this->packages_model->get_id($id);
		// die('<pre>'.print_r($results, true));
		$this->load->view("header", array("title" => "Edit Package"));
		$this->load->view('packages/edit', $results);
		$this->load->view("packages/add-footer");
	}
	public function price($id='')
	{

		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			// die('<pre>'.print_r($this->input->post()));
			$response["response"] = $this->pm->price($this->input->post());
			$this->load->view("packages/response", $response);
			return;
		}

		$results = $this->pm->get_id($id);
		
		$this->load->view("header", array("title" => "Edit Price"));
		$this->load->view("packages/price", $results);
		$this->load->view("packages/add-footer"); 	
	}
	public function delete($id='')
	{	
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->load->model('packages_model');
			$response["response"] = $this->packages_model->delete($_POST);
			$this->load->view("packages/response", $response);
			return;
			
		}
		$this->load->model('packages_model');
		$this->load->view("header", array("title" => "Delete"));
		$this->load->view("packages/delete", $this->packages_model->get_id($id));
		$this->load->view("packages/add-footer");
	}
}

/* End ocibindbyname()f file welcome.php */
/* Location: ./application/controllers/welcome.php */