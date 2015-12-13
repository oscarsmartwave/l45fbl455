<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require APPPATH . '/libraries/REST_Controller.php';

class Carmodels extends CI_Controller {

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
		error_reporting(E_WARNING|E_ERROR|E_PARSE);
		$this->load->model('carmodels_model');
		//$data['cartypes'] = $this->cartypes_model->view();
		//die(print_r($data, true));
		$this->load->view('carmodels/carmodels', $this->carmodels_model->view());

	}
	public function add()
	{
		$this->load->model('carmodels_model');
		
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$_POST['prettyName'] = strtolower($_POST['model']);
			$_POST['prettyName'] = str_replace(' ','-', $_POST['prettyName']);
			$this->carmodels_model->add($_POST);
		}

		$data = $this->carmodels_model->add_details();
		$this->load->view('carmodels/add', $data);
	}

	public function edit($id='')
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$_POST['prettyName'] = strtolower($_POST['model']);
			$_POST['prettyName'] = str_replace(' ','-', $_POST['prettyName']);
			$this->load->model('carmodels_model');
			$this->carmodels_model->edit($id, $_POST);
		}
		$this->load->model('carmodels_model');
		$data = $this->carmodels_model->add_details();
		$data['id'] = $id;
		$data['carModels'] = $this->carmodels_model->get_id($id);
		//die('<pre>'.print_r($data, true));
		
		$this->load->view('carmodels/edit', $data);
	}
	public function delete($id='')
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->load->model('carmodels_model');
			$this->carmodels_model->delete($id);
			
		}
		$data['id'] = $id;
		$this->load->model('carmodels_model');
//		$data['cartypes'] = $this->cartypes_model->get_id($id);
		$this->load->view('carmodels/delete', $this->carmodels_model->get_id($id));
	}
}

/* End ocibindbyname()f file welcome.php */
/* Location: ./application/controllers/welcome.php */