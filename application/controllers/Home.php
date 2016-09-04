<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data["isRegisterLinkVisible"] = true;

		$data["isLoginLinkVisible"] = true;
		
		$data["title"] = "Homepage";
		
		$this->load->view('headers/loginheader',$data);
		
		$this->load->view('index');
	}
}
