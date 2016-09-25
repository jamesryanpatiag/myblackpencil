<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->loginPage();
	}

	function loginPage($data = null){

		$data["isRegisterLinkVisible"] = true;
		
		$data["isLoginLinkVisible"] = false;

		$data["title"] = "Login Page";
		
		$this->load->view('headers/loginheader',$data);
		
		$this->load->view('login');
	}

	function faqs($data = null){

		$data["isRegisterLinkVisible"] = true;
		
		$data["isLoginLinkVisible"] = true;

		$data["title"] = "FAQs";
		
		$this->load->view('headers/loginheader',$data);
		
		$this->load->view('faqs');
	}

	function registrationPage($data = null){

		$data["isRegisterLinkVisible"] = false;

		$data["isLoginLinkVisible"] = true;
		
		$data["title"] = "Registration Page";

		$this->load->view('headers/loginheader',$data);
		
		$this->load->view('register');
	}

	function login(){
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required');

        $this->form_validation->set_rules('password', 'password', 'trim|required');

        if ($this->form_validation->run() == FALSE){

			$data["message"] = "";
        	
        	$this->loginPage($data);

        }else{

    		$users = $this->user_model->getUserByUsername($this->input->post("username"));

        	if(empty($users)){

        		$data["message"] = "Username doesn't exist.";

    			$this->loginPage($data);

			}else if($users[0]->is_verified == 0){

				$data["message"] = "Your account is not yet activated. Please check your email for the instructions.";

    			$this->loginPage($data);				

    		}else{

				$user = $users[0];

				if($this->isPasswordValid($this->input->post("password"), $user->password)){
					
					$person = $this->user_model->getPersonByUserId($user->id)[0];

					$sessiondata = array(
							'user_id'	=> $user->id,
					        'username'  => $this->input->post("username"),
					        'fullname'	=> $person->firstname . " " . 
					        			   ($person->middlename==""?"":$person->middlename . " ") .
				        			   	   $person->surname,
        			   	    'role_code'	=> trim($user->role)
					);

					$userlogin = array(

							"last_login" => date('Y-m-d h:i:s')
						
						);

					$this->user_model->updateUser($userlogin,$user->id);

					$this->session->set_userdata($sessiondata);

					$data['is_password_changed'] = $user->is_password_changed;

					$data['isFromLogin'] = true;

					$data['module'] = "dashboard";					
					
					$this->load->view("dashboard/common/header");

					$this->load->view("dashboard/index",$data);

					$this->load->view("dashboard/common/footer");

				}else{

					$data["message"] = "Invalid password.";

    				$this->loginPage($data);
				}
    		}
        	// $this->user_model->isUserPasswordValid($this->input->post("username"));
        }


	}

	function register(){

		$data["isRegistrationSuccess"] = false;

        $this->form_validation->set_rules('first_name', 'First name', 'required');

        $this->form_validation->set_rules('last_name', 'Last name', 'required');
        
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|callback_isExistingUsername');

        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]|callback_checkPasswordFormat');

        $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'trim|required|matches[password]');

        $this->form_validation->set_rules('email', 'Email', 'required|callback_isExistingEmail');

        $this->form_validation->set_rules('t_and_c', 'Terms and Condition', 'required');

		
        if ($this->form_validation->run() == FALSE){

			$data["message"] = "";
        	
        	$this->registrationPage($data);
        	
        }else{

        	$id = $this->user_model->registerUser($this->input->post(), STUDENT);

			$users = $this->user_model->getUserById($id);        	

        	$this->session->set_flashdata('message', 'You are successfully registered. Please check your email to validate your account');
		
        	if($this->sendSuccessEmail($this->input->post("email"),$users[0]->username,$users[0]->id)==false){

				$this->load->view('errors/html/error_emai_settings');
        	
        	}else{
        	
        		redirect(current_url());
        	
        	}
			//$this->registrationPage($data);
        }
	}

	public function getEmailConfiguration(){

		$config['charset'] = 'utf-8';

		$config['wordwrap'] = TRUE;
		
		$config['mailtype'] = 'html';
		
		return $config;

	}

	public function sendTermsEmail($email, $username){

		$this->email->initialize($this->getEmailConfiguration());

		$this->email->from('noreply@myblackpencil.com', '');

		$this->email->to($email);
		
		$this->email->subject('Welcome to My Black Pencil');
		
		$this->email->message(emailActivationBody($username));
		
		if(!$this->email->send()){

			return false;
		
		}else{
		
			return true;
		
		}
	}

	public function sendSuccessEmail($email,$username,$userid){

		$this->email->initialize($this->getEmailConfiguration());	

		$this->email->from('noreply@myblackpencil.com', '');

		$this->email->to($email);
		
		$this->email->subject('Registration Successful!');
		
		$url = base_url();

		if(strpos($url, 'index') !== true ) $url = $url . "index.php/";

		$siteurl = $url . "auth/verifyUser/" . md5(date("Y-m-d")) . "/" . $userid;

		$this->email->message(emailRegistrationBody($username,$siteurl));
		
		if(!$this->email->send()){

			return false;
		
		}else{
		
			return true;

		}
	}

	public function isPasswordValid($password, $hash){

		$existingPass = str_replace($password, "", $hash);
		$existingPass = str_replace(",", "", $existingPass);
		$existingPass = str_replace(" ", "", $existingPass);

		if(password_verify($password, trim($existingPass))){

			return true;
		
		}else{

			$this->form_validation->set_message('isPasswordValid', "Invalid Password");

			return false;
		
		}	
	}

	public function logout(){

		$sessionData = $this->session->all_userdata();
		
		foreach($sessionData as $key =>$val){
        
         	$this->session->unset_userdata($key);
	  	
	  	}

	  	$this->loginPage();

	}

	public function isExistingUsername($str)
	{	
		$user = $this->user_model->getUserByUsername($str);

		if(!empty($user)){

			$this->form_validation->set_message('isExistingUsername', 'Username already exists');

			return FALSE;

		}else{

			return TRUE;

		}
	}

	public function checkPasswordFormat($password){

		$pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]/";

		if(!preg_match($pattern, $password)){

			$this->form_validation->set_message('checkPasswordFormat', 'Password should contains of the following: 
																			<br/>- Atleast 1 Uppercase Alphabet
																			<br/>- Atleast 1 Lowercase Alphabet 
																			<br/>- Arleast 1 Special Character
																			<br/>- Atleast 1 Numeric Character');

			return false;

		}else{

			return true;

		}

	}

	public function isExistingEmail($str)
	{	

		if(!empty($this->user_model->isEmailExist($str))){

			$this->form_validation->set_message('isExistingEmail', "Email Address already exists");

			return FALSE;

		}else{

			return TRUE;
			
		}
	}

	public function verifyUser($hash, $userid){

		$data = array(
				"is_verified" => 1,
				"is_password_changed" => 1
				);

		$this->user_model->updateUser($data, $userid);

		$users = $this->user_model->getUserById($userid);

		$this->sendTermsEmail($users[0]->email,$users[0]->username);

		$data["account_activated"] = true;

		$this->loginPage($data);

	}

	public function forceChangePassword(){

		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[8]|callback_checkPasswordFormat');

        $this->form_validation->set_rules('retype_password', 'Password Confirmation', 'trim|required|matches[new_password]');

	    if ($this->form_validation->run() == FALSE){

			echo json_encode(validation_errors());

		} else {

			$this->user_model->changeUserPassword($_SESSION['user_id'], $this->input->post("new_password"));

			echo "YES";
		}

	}

	public function changepassword(){

		$users = $this->user_model->getUserByHashedId($this->input->post('userid'));

		$user = $users[0];

		$data["isSuccess"] = false;

		$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|callback_isPasswordValid['.$this->input->post('old_password').', '.$user->password.']');

        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[8]|callback_checkPasswordFormat');

        $this->form_validation->set_rules('retype_password', 'Password Confirmation', 'trim|required|matches[new_password]');

        $id = $this->input->post('userid');

		if ($this->form_validation->run() == FALSE){

			$data["message"] = "";

        }else{

        	$data["isSuccess"] = true;

        	$data["message"] = "Password Successfully Changed";

        	$this->user_model->changeUserPassword($user->id, $this->input->post("new_password"));
			
        }

        $data["module"] = "changepassword";
		
		$data["page_title"] = "Change Password";

		$data["userid"] = $id;

		$this->load->view("dashboard/common/header");

		$this->load->view("dashboard/modules/changepassword",$data);

		$this->load->view("dashboard/common/footer");
	}


}
