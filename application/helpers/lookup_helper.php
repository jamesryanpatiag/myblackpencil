<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function test_method($var = '')
{
	return $var;
}   

function getEducationalLevelByCode($level){
	switch($level){
		case "HIGH_SCHOOL":
			return "High School";
		break;
		case "UNDERGRADUATE":
			return "Undergraduate";
		break;
		case "GRADUATE":	
			return "Graduate";
		break;
	}
}

function getStatusByCode($code){
	switch($code){
		case "PENDING":
			return "Pending";
		break;
		case "INITIAL-REVIEW":
			return "Initial Review";
		break;
		case "BATCH-OUT":
			return "Batch-out";
		break;
		case "IN-PROGRESS":
			return "In-Progress";
		break;
		case "COMPLETED":
			return "Completed";
		break;
		case "REFUNDED":
			return "Refunded";
		break;
		case "ESCALATED":
			return "Escalated";
		break;
	}
}

function getStatus(){
	return array(
			'PENDING'	 		=> 'Pending',
			'INITIAL-REVIEW' 	=> 'Initial Review',
			'BATCH-OUT'			=> 'Batch-out',
			'IN-PROGRESS' 		=> 'In-Progress',
			'COMPLETED' 		=> 'Completed',
			'REFUNDED'			=> 'Refunded',
			'ESCALATION'		=> 'Escalation' 
		);
}

