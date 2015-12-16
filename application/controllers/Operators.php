<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require APPPATH . '/libraries/REST_Controller.php';

class Operators extends CI_Controller {

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
		$this->load->model('operators_model');
		$data = $this->operators_model->view();
		
		//die('<pre>'.print_r($data, true));
		$this->load->view('operators/operators', $data);
	}
	public function add()
	{
		$this->load->model('operators_model');

		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			// die('<pre>'.print_r($_FILES, true));
			$post = array_merge($_FILES, $_POST);
			// die('<pre>'.print_r($post, true));
			$add = $this->operators_model->add($post);
			
			if(isset($add->createdAt))
			{
				redirect(base_url()."index.php/operators/add/?add=failed");
			}
			else
			{
				redirect(base_url()."index.php/operators/?add=success&added=".$add->objectId);
			}
		}
		$this->load->view('operators/add');
	}
	public function edit($id='')
	{
		$this->load->model('operators_model');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$edit = $this->operators_model->edit($id, $_POST);
			
			if(isset($edit->updatedAt))
			{
				redirect(base_url()."index.php/operators/?update=success&updated=".$id);
			}
		}
		//die(base_url());
		$data = $this->operators_model->get_id($id); 
		//die('<pre>'.print_r($data));
		$this->load->view('operators/edit', $data);
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
		//die('<pre>'.print_r($data, true));
		$this->load->view('operators/suspended', $data);
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
		//die('<pre>'.print_r($data, true));
		$this->load->view('operators/reset', $data);
	}
	public function ratings()
	{
		$this->load->model('operators_model');
		$array = array();
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
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
		$this->load->view('operators/ratings', $opts);
	}
	private function exchangeArray($data)
	{

	}
}

/* End of file Operators.php */
/* Location: ./application/controllers/Operators.php */