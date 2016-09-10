<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function permissionChecker($roles = array(), $isInController = false){
	$isValid = true;
	if(!in_array($_SESSION['role_code'], $roles)){
		if($isInController){
			show_404();	
		}
		$isValid = false;
	}
	return $isValid;
}

function sessionChecker(){
	if(!isset($_SESSION) && $_SESSION['user_id']==null||$_SESSION['user_id']==''){
		redirect("auth/loginPage");
	}
}

function emailRegistrationBody(){

	return "<html>
				<body>
					Welcome User!<br/>
					Here is your temporary password: blackpencil
				</body>
			</html>";

}