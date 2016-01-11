<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require APPPATH . '/libraries/REST_Controller.php';

class CarMakes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("carmakes_model","cm");
	}

	public function index()
	{
		$this->load->model("carmakes_model");
		$makes = $this->carmakes_model->getCarMake();

		// die('<pre>'.print_r($makes, true));
		$this->load->view("carmakes/carmakes", $makes);
	}
	public function add()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$_POST['prettyName'] = strtolower($_POST['carMake']);
			$_POST['prettyName'] = str_replace(' ','-', $_POST['prettyName']);
			$this->load->model('carmakes_model');
			$data = $this->carmakes_model->add($_POST);
		}

		$this->load->view('carmakes/add');

	}
	public function edit($id='')
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$_POST['prettyName'] = strtolower($_POST['carMake']);
			$_POST['prettyName'] = str_replace(' ','-', $_POST['prettyName']);
			$this->load->model('carmakes_model');
			$this->carmakes_model->edit($id, $_POST);
		}
		$data['id'] = $id;
		$this->load->model('carmakes_model');
		$data['carMakes'] = $this->carmakes_model->get_id($id);
		$this->load->view('carmakes/edit', $data);
	}
	public function delete($id)
	{
		
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->load->model('carmakes_model');
			$this->carmakes_model->delete($id);
		}
		$data['id'] = $id;
		$this->load->model('carmakes_model');
		$data['carMakes'] = $this->carmakes_model->get_id($id);
		$this->load->view('carmakes/delete', $this->carmakes_model->get_id($id));
	}
}

/* End ocibindbyname()f file welcome.php */
/* Location: ./application/controllers/welcome.php */