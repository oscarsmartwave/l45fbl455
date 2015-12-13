<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require APPPATH . '/libraries/REST_Controller.php';

class Cars extends CI_Controller {

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
		$this->load->model('cars_model');
		$data['users'] = $this->cars_model->getOwnerDetails($this->uri->segment(2));
		$data['cars']= $this->cars_model->view($this->uri->segment(2));
		//die('<pre>'.print_r($data, true));
		$this->load->view('cars/cars', $data);
		//$this->load->view('cars/cars', $this->cars_model->view($this->uri->segment(2)));
	}
	public function add()
	{
		echo 'add';	
	}
	public function edit($id='')
	{
		echo 'edit '.$id;
	}
	public function delete($id='')
	{	
		echo 'delete '.$id;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>