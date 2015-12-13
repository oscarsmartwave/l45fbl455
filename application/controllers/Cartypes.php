<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require APPPATH . '/libraries/REST_Controller.php';

class CarTypes extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
		
		$this->load->model('cartypes_model');
		//$data['cartypes'] = $this->cartypes_model->view();
		//die(print_r($data, true));
		$this->load->view('cartypes/cartypes', $this->cartypes_model->view());

	}
	public function add()
	{
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$_POST['prettyName'] = strtolower($_POST['carType']);
			$_POST['prettyName'] = str_replace(' ','-', $_POST['prettyName']);
			$this->load->model('cartypes_model');
			$data = $this->cartypes_model->add($_POST);
		}

		$this->load->view('cartypes/add');

	}
	public function edit($id='')
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$_POST['prettyName'] = strtolower($_POST['carType']);
			$_POST['prettyName'] = str_replace(' ','-', $_POST['prettyName']);
			$this->load->model('cartypes_model');
			$this->cartypes_model->edit($id, $_POST);
		}
		$data['id'] = $id;
		$this->load->model('cartypes_model');
		$data['cartypes'] = $this->cartypes_model->get_id($id); 
		$this->load->view('cartypes/edit', $data);
	}
	public function delete($id)
	{
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
		
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->load->model('cartypes_model');
			$this->cartypes_model->delete($id);
		}
		$data['id'] = $id;
		$this->load->model('cartypes_model');
//		$data['cartypes'] = $this->cartypes_model->get_id($id);
		$this->load->view('cartypes/delete', $this->cartypes_model->get_id($id));
	}
}

/* End ocibindbyname()f file welcome.php */
/* Location: ./application/controllers/welcome.php */