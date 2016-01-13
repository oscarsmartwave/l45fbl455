<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require APPPATH . '/libraries/REST_Controller.php';

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->driver("session");


	}

	public function index()
	{

		$this->load->model('users_model');
		$results = $this->users_model->view();
		$title["title"] = "Users";
		$this->load->view("header", $title);
		$this->load->view('users/users', $results);
		$this->load->view("users/users-footer");
	}
	public function profiles()
	{
		// $this->load->model('users_model');
		// $results = $this->users_model->view();
		// die('<pre>'.print_r($results, true));
		$this->load->view('users/profiles', true);
	}
	public function edit($id='')
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->load->model('users_model');
			$this->users_model->edit($id, $_POST);
		}
		$data['id'] = $id;
		$this->load->model('users_model');
		$data['users'] = $this->users_model->get_id($id); 
		$this->load->view('users/edit', $data);
	}
	public function settings()
	{
		$this->load->model('users_model');
		$results = $this->users_model->view();
		// die('<pre>'.print_r($results, true));
		$this->load->view('users/settings', $results);
	}
	public function delete($id)
	{		
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->load->model('users_model');
			$this->users_model->delete($id);
		}
		$data['id'] = $id;
		$this->load->model('users_model');
		$data['users'] = $this->users_model->get_id($id);
		$this->load->view('users/delete', $data);
	}

	public function deactivate($id='')
	{
		$this->load->model("users_model");
		switch ($_SERVER["REQUEST_METHOD"])
		{
			case "GET" :
			$user = $this->users_model->get_id($id);
				// die('<pre>'.print_r($user, true));
			$title["title"] = "Deactivate";
			$this->load->view("header", $title);
			$this->load->view("users/deactivate", $user);
			$this->load->view("users/users-footer");
			break; 

			case "POST" :
			$deac = $this->users_model->deactivate($id);
			redirect(base_url()."users?deactivated=".$deac["user"][0]->getObjectId(),"refresh");
			break;

			default:
			redirect(base_url(),"refresh");
			// $this->load->view("users/deactivate", $user);
			break;
		}
	}

	public function activate($id='')
	{
		$this->load->model("users_model");
		switch ($_SERVER["REQUEST_METHOD"])
		{
			case "GET" :
			$user = $this->users_model->get_id($id);
				// die('<pre>'.print_r($user, true));
			$this->load->view("header", array("title" => "Activate"));
			$this->load->view("users/activate", $user);
			$this->load->view("users/users-footer");
			break; 

			case "POST" :
			$ac = $this->users_model->activate($id);
			redirect(base_url()."users?activated=".$ac["user"][0]->getObjectId(),"refresh");
			break;

			default:
			redirect(base_url(),"refresh");
			// $this->load->view("users/deactivate", $user);
			break;
		}
	}

	public function deactivated()
	{
		$this->load->model('users_model');
		$results = $this->users_model->deactivated();
		// die('<pre>'.print_r($results, true));
		$title["title"] = "deactivated";
		$this->load->view("header", $title);
		$this->load->view('users/deactivate_view', $results);
		$this->load->view("users/users-footer");
	}

	public function activated()
	{
		$this->load->model('users_model');
		$results = $this->users_model->activated();
		// die('<pre>'.print_r($results, true));
		$title["title"] = "Activated";
		$this->load->view("header", $title);
		$this->load->view('users/activate_view', $results);
		$this->load->view("users/users-footer");
	}

	public function viewCars($userID)
	{
		$this->load->model("users_model");
		$cars["carsOwned"] = $this->users_model->getCars($userID);

		$this->load->view("users/carsOwned_view", $cars);
	}

}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

?>