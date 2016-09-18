<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modules extends CI_Controller {

	public function index()
	{
		$this->myClasses();
	}

	public function getClassById(){

		$classes = $this->module->getClassById($this->input->post("id"));

		if(!empty($classes)){

			$class = $classes[0];

			$files = array();

			$uploadedFiles = ($this->file->getFileByReferenceId($class->id, "CLASS")); 

			foreach($uploadedFiles as $u)
			{
				$file = array(
						"id" => $u->id,
						"filename" => $u->filename
					);

				array_push($files, $file);
			}
		}	

		$x = array(
				"class" => $class,
				"files"	=> $files
			);
		echo json_encode($x);	
	
	}

	public function myDashboard(){

		sessionChecker();

		$data["module"] = "dashboard";

		$this->load->view("dashboard/common/header");

		$this->load->view("dashboard/index",$data);

		$this->load->view("dashboard/common/footer");

	}

	public function myClasses(){

		sessionChecker();

		$data["module"] = "my_classes";

		$data["page_title"] = "My Classes";

		permissionChecker(array(STUDENT), true);

		$data["list"] = $this->module->getClassByCustomerId();

		$this->load->view("dashboard/common/header");

		$this->load->view("dashboard/modules/myclasses",$data);

		$this->load->view("dashboard/common/footer");

	}

	public function pendingClasses(){

		sessionChecker();

		permissionChecker(array(TUTOR, ADMINISTRATOR, MANAGER), true);

		$data["module"] = "pending";

		$data["page_title"] = "Pending Classes";

		$data["list"] = $this->module->getClassByStatus('PENDING');

		$data["tutors"] = $this->user_model->getUsersByRole('TUTOR');

		$this->load->view("dashboard/common/header");

		$this->load->view("dashboard/modules/pending",$data);

		$this->load->view("dashboard/common/footer");

	}

	public function batchoutClasses(){
	
		sessionChecker();

		permissionChecker(array(TUTOR, ADMINISTRATOR, MANAGER), true);
	
		$data["module"] = "batchout";

		$data["page_title"] = "Batch-Out Classes";

		$data["list"] = $this->module->getClassByStatus('BATCH-OUT', true);

		$data["tutors"] = $this->user_model->getUsersByRole('TUTOR');
		
		$this->load->view("dashboard/common/header");

		$this->load->view("dashboard/modules/batchout",$data);

		$this->load->view("dashboard/common/footer");	

	}

	public function initialReviewClasses(){
	
		sessionChecker();

		permissionChecker(array(ADMINISTRATOR, MANAGER), true);
	
		$data["module"] = "initial_review";

		$data["page_title"] = "Initial Review Classes";

		$data["list"] = $this->module->getClassByStatus('INITIAL-REVIEW');

		$data["tutors"] = $this->user_model->getUsersByRole('TUTOR');
		
		$this->load->view("dashboard/common/header");

		$this->load->view("dashboard/modules/initialreview",$data);

		$this->load->view("dashboard/common/footer");	

	}

	public function inprogressClasses(){

		sessionChecker();

		permissionChecker(array(TUTOR, ADMINISTRATOR, MANAGER), true);

		$data["module"] = "inprogress";
		
		$data["page_title"] = "In-Progress Classes";

		$data["list"] = $this->module->getClassByStatus('IN-PROGRESS');

		$data["tutors"] = $this->user_model->getUsersByRole('TUTOR');

		$this->load->view("dashboard/common/header");

		$this->load->view("dashboard/modules/inprogress",$data);

		$this->load->view("dashboard/common/footer");

	}

	public function completedClasses(){

		sessionChecker();

		permissionChecker(array(TUTOR, ADMINISTRATOR, MANAGER), true);

		$data["module"] = "completed";
		
		$data["page_title"] = "Completed Classes";

		$data["list"] = $this->module->getClassByStatus('COMPLETED');

		$data["tutors"] = $this->user_model->getUsersByRole('TUTOR');

		$this->load->view("dashboard/common/header");

		$this->load->view("dashboard/modules/completed",$data);

		$this->load->view("dashboard/common/footer");

	}

	public function refundedClasses($userid = ""){

		sessionChecker();

		permissionChecker(array(ADMINISTRATOR, MANAGER), true);

		$data["module"] = "refunded";
		
		$data["page_title"] = "Refunded Classes";

		$data["list"] = $this->module->getRefundedClasses($userid);

		$this->load->view("dashboard/common/header");

		$this->load->view("dashboard/modules/refunded",$data);

		$this->load->view("dashboard/common/footer");

	}


	public function escalatedClasses(){

		sessionChecker();

		permissionChecker(array(ADMINISTRATOR, MANAGER), true);

		$data["module"] = "escalated";
		
		$data["page_title"] = "Escalated Classes";

		$data["list"] = $this->module->getClassByStatus('ESCALATION');

		$this->load->view("dashboard/common/header");

		$this->load->view("dashboard/modules/escalations",$data);

		$this->load->view("dashboard/common/footer");

	}

	public function consultants(){

		sessionChecker();

		permissionChecker(array(ADMINISTRATOR, MANAGER), true);

		$data["module"] = "consultants";
		
		$data["page_title"] = "Consultants";

		$data["list"] = $this->user_model->getUsersByRole('TUTOR');

		$this->load->view("dashboard/common/header");

		$this->load->view("dashboard/modules/consultants",$data);

		$this->load->view("dashboard/common/footer");

	}

	public function students(){

		sessionChecker();

		permissionChecker(array(ADMINISTRATOR, MANAGER), true);

		$data["module"] = "students";
		
		$data["page_title"] = "Students";

		$data["list"] = $this->user_model->getUsersByRole('STUDENT');

		$this->load->view("dashboard/common/header");

		$this->load->view("dashboard/modules/students",$data);

		$this->load->view("dashboard/common/footer");

	}

	public function tutorClassesPage(){

		$data["list"] = $this->module->getClassByStatus($this->input->post('status'), true);	
		
		$this->load->view("dashboard/tables/tutorClassesTables",$data);

	}

	public function refundedClassPage(){

		$data["list"] = $this->module->getRefundedClasses();	
		
		$this->load->view("dashboard/tables/refundedTable",$data);

	}

	public function completedClassPage(){

		$data["list"] = $this->module->getClassByStatus($this->input->post('status'));	
		
		$this->load->view("dashboard/tables/completedClassesTable",$data);

	}

	public function getStudentInfo($classid){

		echo json_encode($this->module->getClassById($classid));

	}


	public function addClass(){

		$this->classFormValidation();

        if ($this->form_validation->run() == FALSE){

        	echo validation_errors();

        }else{

    		$classid = $this->module->addClass($this->input->post());

    		echo "YES";

        }

	}

	public function editClass(){

		$this->classFormValidation();

        if ($this->form_validation->run() == FALSE){

        	echo validation_errors();

        }else{

        	$data = array(

				"url" => $this->input->post('student_url'),								
				
				"type" => $this->input->post('type'),
				
				"student_username" => $this->input->post('student_username'),
				
				"student_password" => $this->input->post('student_password'),
				
				"course" => $this->input->post('student_course'),
				
				"description" => $this->input->post('student_description'),
				
				"start_date" => date('Y-m-d', strtotime($this->input->post("start_dtpicker"))),
				
				"end_date" => date('Y-m-d', strtotime($this->input->post("end_dtpicker"))),
				
				"educational_level_code" => $this->input->post('student_level')
        	);

        	$this->module->updateClass($data,$this->input->post("id"));

        	echo "YES";

        }
	}

	public function changeStatus(){

		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE){

        	echo validation_errors();

        }else{
        	$completion_date = '';
        	if($this->input->post("status")=='COMPLETED'){

        		$completion_date = date('Y-m-d');
        	
        	}

        	$data = array(
        			"status" => $this->input->post("status"),
        			"completion_date" => $completion_date
        		);

        	$this->module->updateClass($data, $this->input->post("classId"));

        	echo "YES";

        }

	}

	private function classFormValidation(){

		$this->form_validation->set_rules('type', 'Type', 'required');

		$this->form_validation->set_rules('student_url', 'Student Url', 'required');

        $this->form_validation->set_rules('student_username', 'Student Username', 'required');
        
        $this->form_validation->set_rules('student_password', 'Student Password', 'required');

        $this->form_validation->set_rules('student_course', 'Course', 'required');

        $this->form_validation->set_rules('student_description', 'Description', 'required');

        $this->form_validation->set_rules('start_dtpicker', 'Start Date', 'required');

        $this->form_validation->set_rules('end_dtpicker', 'End Date', 'required');
		
		$this->form_validation->set_rules('student_level', 'Level', 'required');

	}

	public function assignTutor(){
	
		$this->form_validation->set_rules('tutorid', 'Tutor', 'required');

		if ($this->form_validation->run() == FALSE){

        	echo validation_errors();

        }else{

        	$data = array(

        			"tutor_id" => $this->input->post("tutorid")
        		
        		);

        	$this->module->updateClass($data, $this->input->post("classid"));

        	echo "YES";

        }

	}

	public function getNotes($classid){

		echo json_encode($this->module->getNotes($classid));
	
	}

	public function addNotes(){

		$this->form_validation->set_rules('message', 'Message', 'required|trim');

		if ($this->form_validation->run() == FALSE){

        	echo validation_errors();

        }else{

        	$data = array(
        			"userid" 	=> $_SESSION['user_id'],
        			"classid" 	=> $this->input->post('classId'),
        			"message"	=> $this->input->post('message'),
        			"hasAttachment"	=> 0
        		);

        	$notesid = $this->module->addNotes($data);

        	echo json_encode($this->module->getNotesById($notesid));

        }
	}


	public function refundClass(){

		$this->form_validation->set_rules('refundMessage', 'Reason', 'required|trim');

		if ($this->form_validation->run() == FALSE){

        	echo validation_errors();

        }else{

        	$data = array(
        			'status' => 'REFUNDED'
        		);

        	$this->module->updateClass($data,$this->input->post('classId'));

        	$this->module->addRefundedClass($this->input->post('refundMessage'), $this->input->post('classId'));

        	echo "YES";

        }
	}

	public function getRefundDataByClassId($classid){

		echo json_encode($this->module->getRefundDataByClassId($classid));

	}

	public function uploadfile(){

		$hasError = false;
    	$fileName = "";
    	$content = "";
    	$content_type = "";

    	$response = $this->input->post();

    	if(!empty($_FILES['userfile']['name'])){

			$uploadpath = '/upload/';

	    	chmod($uploadpath, 0777);

	    	$config['upload_path'] = $uploadpath;
			
			$config['allowed_types'] = '*';
			
			$config['max_size'] = 2048;

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('userfile')) 
	        {
                $response = $this->upload->display_errors();

                $hasError = true;
	        }
	        else
	        {
	        	$fileName = $_FILES['userfile']['name'];

				$tmpName  = $_FILES['userfile']['tmp_name'];

				$content_type = $_FILES['userfile']['type'];

				$fp      = fopen($tmpName, 'r');
				
				$content = fread($fp, filesize($tmpName));

				fclose($fp);

				$response = $_FILES;

				unlink($uploadpath . $fileName);
	        }

    	}

    	if(!$hasError){

    		$classid = $this->input->post("classId");

    		if($fileName != "" && $content != ""){


				$fileData = array(
						"referenceid" 	=> $classid,
						"file_category" => "CLASS",
						"stored_file" 	=> $content,
						"filename" 		=> $fileName,
						"uploaded_by" 	=> $_SESSION["user_id"],
						"content_type" 	=> $content_type
					);

				$this->file->saveFile($fileData);
    		}

		}

		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function deleteUploadedFile($id){

		$this->file->deleteFileById($id);

		echo "YES";

	}

	public function downloadFileById($id){

		$files = $this->file->getStoredFileById($id);

		if(!empty($files)){
			
			$file = $files[0];

			$content = $file->stored_file;

			$type = $file->content_type;

			$filename = $file->filename;

			$size = strlen($content);

			switch(strtolower(substr(strrchr($filename, '.'), 1))) {
				case 'jpeg':
				case 'jpg': $mime = 'image/jpg'; break;
				case 'doc': $mime = 'application/msword'; break;
				case 'docx': $mime = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'; break;
				case 'pdf': $mime = 'application/pdf'; break;
				case 'xls': $mime = 'application/msexcel'; break;
				case 'xlsx': $mime = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'; break;
				case 'ppt': $mime = 'application/powerpoint'; break;
				case 'png': $mime = 'image/png'; break;
				default: $mime = 'application/force-download';
			}

			header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($filename)).' GMT');
			header('Cache-Control: private',false);
			header('Content-Type: '.$mime);
			header('Content-Disposition: attachment; filename="'.$filename.'"');
			header('Content-Length: '.$size);	// provide file size
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			ob_clean();
			flush();
			print $content;
			exit();

		}


		
	}

}
