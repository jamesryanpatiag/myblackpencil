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

function emailRegistrationBody($username, $siteurl){

	return "<html>
				<body>
					<h3>Please click the link below to activate your account:</h3>
					<p><a href='".$siteurl."'>" . $siteurl . "</a></p>
					<h3>Hi " . $username . ",</h3>
					<p>You can now log in to your My Black Pencil to update your profile and add your classes. To log in, just enter your username and the password you have chosen.</p>  
					<p>We would like to remind you of the following:</p>				
					<p>1. Please confirm that the log in details you provided are updated and correct.</p>
					<p>2. In any case that you changed your password (either due to expiration or personal preference), DO NOT forget to send your new password to your tutor so there would be no delays in submitting your class activities due to inaccessibility of your school account.</p>
					<p>3. If your class requires the use of textbooks and other course materials, make sure that you have provided these to your tutor prior to the start of your class. You may send this through our CSR. </p>
					<p>4. If you will be out of town and will not be able to respond to your tutor’s concerns and queries through your MBP account, kindly leave your contact information (e-mail and mobile phone number) to our CSR for us to be able to reach you in case of emergencies.</p>
					<p>5. Inform us if you have backtrack, missed, or late activities in your class so your tutor can make necessary arrangements on which activities should be prioritized and submitted immediately. Please take note that it is still up to your instructor’s decision on whether s/he will give credit to the activities you missed prior to signing up with MBP. </p>
					<p>6. For self-paced classes, kindly inform your tutor about your target class completion date. This is to ensure that all your course requirements will be submitted on or before your target deadline.</p>
					<p>7. Regularly check the Notes in your class so you can also keep track of your course progress. Keep in mind that the Notes feature is your only means of direct communication with your tutor so it is recommended to check it from time to time for you to know if there are additional requirements needed in your course.</p>
					<p>8. For class activities requiring personal inputs and external resource materials, please make it a point to provide these immediately so that your tutor will be able to meet the deadline. Your tutor will not be liable if you received failing grades due to your failure to provide the necessary requirements. In this case, your class cannot be subject for refund.</p>
					<p>Should you have other queries or additional instructions, don’t hesitate to tell us.</p>
					<p>Thank you!</p>
				</body>
			</html>";

}