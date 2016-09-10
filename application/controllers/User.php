<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function addUser(){

		$this->validateUser();

		if ($this->form_validation->run() == FALSE){

			$this->userpage($this->input->post('module'));

        }else{

        	$data = $this->input->post();

        	$data["password"] = "blackpencil";

        	$this->user_model->registerUser($data, $this->input->post('role'));

        	$this->session->set_flashdata('message', 'Registration success!');

        	$this->user_page($this->input->post('module'));
			
    //     	if($this->sendSuccessEmail($this->input->post("email"))==false){

				// $this->load->view('errors/html/error_emai_settings');
        	
    //     	}else{
        	
        		redirect(current_url());
        	
        	// }
        }

	}

	public function editUser(){

		$this->validateUser();

		if ($this->form_validation->run() == FALSE){

			$this->userpage($this->input->post('module'));

        }else{

        	$data = $this->input->post();

        	$this->user_model->updateUser($data, $this->input->post('role'));

        	$this->session->set_flashdata('message', 'Registration success!');
			
    //     	if($this->sendSuccessEmail($this->input->post("email"))==false){

				// $this->load->view('errors/html/error_emai_settings');
        	
    //     	}else{
        	
        		redirect(current_url());
        	
        	// }
        }

	}

	public function isExistingUsername($str)
	{	
		$user = $this->user_model->getUserByUsername($str);

		if(!empty($user)){

			$this->form_validation->set_message('isExistingUsername', 'Username already in use. Please try another one.');

			return FALSE;

		}else{

			return TRUE;

		}
	}

	public function isExistingEmail($str)
	{	

		if(!empty($this->user_model->isEmailExist($str))){

			$this->form_validation->set_message('isExistingEmail', "Email address already in use. Please try another one.");

			return FALSE;

		}else{

			return TRUE;
			
		}
	}

	public function userpage($module,$id = null){

		sessionChecker();

		permissionChecker(array(ADMINISTRATOR, MANAGER), true);

		$data["module"] = $module;

		$data["page_title"] = "User Page";
		
		$data["sub_title"] = $module;

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