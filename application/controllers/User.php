<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	private $isEdit = "false";
	private $isSuccess = "false";

	public function addUser(){

		$this->validateUser();

		if ($this->form_validation->run() == FALSE){

			$this->userpage($this->input->post('module'));

        }else{

        	$data = $this->input->post();

        	$data["password"] = "blackpencil";

        	$this->user_model->registerUser($data, $this->input->post('role'));

        	$this->session->set_flashdata('message', 'Registration success!');

        	$data["user"] = null;

        	$this->isSuccess = "true";
        	
        	$this->userpage($this->input->post('role'), $this->input->post('userid'));
        	
        }

	}

	public function editUser(){

		$this->validateUser();

		$this->isEdit = "true";

		if ($this->form_validation->run() == FALSE){

			$this->userpage($this->input->post('module'), $this->input->post('userid'));

        }else{

        	$person = array(
        			"firstname" 	=> $this->input->post('first_name'),
        			"middlename" 	=> $this->input->post('middlename'),
    				"surname" 		=> $this->input->post('last_name'),
    				"dob"			=> $this->input->post('dob'),
					"gender"		=> $this->input->post('gender'),
        		);

        	$user = array(
        			"username"		=> $this->input->post('username'),
        			"role"			=> $this->input->post('role'),
        		);

        	$this->user_model->updateUser($user, $this->input->post('userid'));

        	$this->user_model->updatePerson($person, $this->input->post('userid'));

        	$this->session->set_flashdata('message', 'Save Success!');
			
        	$data["user"] = $this->user_model->getUserById($this->input->post('userid'))[0];

        	$this->isSuccess = "true";

        	$this->userpage($this->input->post('role'), $this->input->post('userid'));

        }

	}

	public function isDOBValid($str){

		if(strtotime($str)>strtotime(date('Y-m-d'))){

			$this->form_validation->set_message('isDOBValid', 'Date of Birth must not greater than the current date.');

			return FALSE;

		}else {

			return TRUE;

		}

	}

	public function isExistingUsername($str)
	{	
		$user = $this->user_model->getUserByUsername($str);

		if(!empty($user) && $this->isEdit == "false"){

			$this->form_validation->set_message('isExistingUsername', 'Username already in use. Please try another one.');

			return FALSE;

		}else{

			return TRUE;

		}
	}

	public function isExistingEmail($str)
	{		

		if(!empty($this->user_model->isEmailExist($str)) && $this->isEdit == "false"){

			$this->form_validation->set_message('isExistingEmail', "Email address already in use. Please try another one.");

			return FALSE;

		}else{

			return TRUE;
			
		}
	}

	public function userpage($module,$id = null){

		sessionChecker();

		permissionChecker(array(STUDENT, TUTOR, ADMINISTRATOR, MANAGER), true);

		$data["module"] = $module;

		$data["page_title"] = "User Page";
		
		$data["sub_title"] = $module;

		$data["isSuccess"] = $this->isSuccess;

		$this->isSuccess = "false";

		$data["isCurrentUser"] = true; 

		if($id == null || $id != $_SESSION["user_id"]){

			$data["isCurrentUser"] = false;

		}

		if($_SESSION['role_code'] != ADMINISTRATOR && $_SESSION['role_code'] != MANAGER){

			if($id!=null){

				if($id != $_SESSION['user_id']){

					show_404();

				}

			}

		}

		if($id!=null){

			$data["user"] = $this->user_model->getUserById($id)[0];

		}

		$this->load->view("dashboard/common/header");

		$this->load->view("dashboard/modules/user",$data);

		$this->load->view("dashboard/common/footer");

	}

	public function validateUser(){

		$this->form_validation->set_rules('first_name', 'First name', 'required');

        $this->form_validation->set_rules('last_name', 'Last name', 'required');
        
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|callback_isExistingUsername');

        $this->form_validation->set_rules('dob', 'Date of Birth', 'callback_isDOBValid');

        $this->form_validation->set_rules('email', 'Email', 'required|callback_isExistingEmail');

        $this->form_validation->set_rules('role', 'Role', 'required');
	} 

	public function sendSuccessEmail($email){

		$this->email->from('noreply@myblackpencil.net', '');

		$this->email->to($email);
		
		$this->email->subject('Email Test');
		
		$this->email->message(emailRegistrationBody());
		
		if(!$this->email->send()){

			return false;
		}

		else{
		
			return true;
		
		}
	}



}