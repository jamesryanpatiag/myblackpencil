<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modules extends CI_Controller {

	public function index()
	{
		$this->myClasses();
	}

	public function myDashboard(){

		$data["module"] = "dashboard";

		$this->load->view("dashboard/common/header");

		$this->load->view("dashboard/index",$data);

		$this->load->view("dashboard/common/footer");

	}

	public function myClasses(){

		$data["module"] = "my_classes";

		$data["page_title"] = "My Classes";

		$data["list"] = $this->module->getClassByCustomerId();

		$this->load->view("dashboard/common/header");

		$this->load->view("dashboard/modules/myclasses",$data);

		$this->load->view("dashboard/common/footer");

	}

	public function pendingClasses(){

		$data["module"] = "pending";

		$data["page_title"] = "Pending Classes";

		$data["list"] = $this->module->getClassByStatus('PENDING');

		$this->load->view("dashboard/common/header");

		$this->load->view("dashboard/modules/pending",$data);

		$this->load->view("dashboard/common/footer");

	}

	public function batchoutClasses(){

		$data["module"] = "batchout";

		$data["page_title"] = "Batch-Out Classes";

		$data["list"] = $this->module->getClassByStatus('BATCH-OUT');
		
		$this->load->view("dashboard/common/header");

		$this->load->view("dashboard/modules/batchout",$data);

		$this->load->view("dashboard/common/footer");

	}

	public function inprogressClasses(){

		$data["module"] = "inprogress";
		
		$data["page_title"] = "In-Progress Classes";

		$data["list"] = $this->module->getClassByStatus('IN-PROGRESS');
		
		$this->load->view("dashboard/common/header");

		$this->load->view("dashboard/modules/inprogress",$data);

		$this->load->view("dashboard/common/footer");

	}

	public function completedClasses(){

		$data["module"] = "completed";
		
		$data["page_title"] = "Completed Classes";

		$data["list"] = $this->module->getClassByStatus('COMPLETED');
		
		$this->load->view("dashboard/common/header");

		$this->load->view("dashboard/modules/inprogress",$data);

		$this->load->view("dashboard/common/footer");

	}

	public function addClass(){

		$this->form_validation->set_rules('student_url', 'Student Url', 'required');

        $this->form_validation->set_rules('student_username', 'Student Username', 'required');
        
        $this->form_validation->set_rules('student_password', 'Student Password', 'required');

        $this->form_validation->set_rules('student_course', 'Course', 'required');

        $this->form_validation->set_rules('student_description', 'Description', 'required');

        $this->form_validation->set_rules('start_dtpicker', 'Start Date', 'required');

        $this->form_validation->set_rules('end_dtpicker', 'End Date', 'required');
		
		$this->form_validation->set_rules('student_level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE){

        	echo validation_errors();

        }else{

        	$this->module->addClass($this->input->post());

        	echo "YES";

        }
	}

	public function changeStatus(){

		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE){

        	echo validation_errors();

        }else{

        	$data = array(
        			"status" => $this->input->post("status")
        		);

        	$this->module->updateClass($data, $this->input->post("classId"));

        	echo "YES";

        }

	}
}
