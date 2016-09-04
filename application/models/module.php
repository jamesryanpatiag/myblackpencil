<?php 
	class Module extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

        public function addClass($data){

			$class = array(
				"url" => $data["student_url"],
				"student_username" => $data["student_username"],
				"student_password" => $data["student_password"],
				"start_date" => date('Y-m-d', strtotime($data["start_dtpicker"])),
				"end_date" => date('Y-m-d', strtotime($data["end_dtpicker"])),
				"customer_id" => $_SESSION["user_id"],
				"educational_level_code" => $data["student_level"],
				"course" => $data["student_course"],
				"description" => $data["student_description"],
				"created_by" => $_SESSION["user_id"],
				"status" => 'PENDING'
			);		

			$this->db->insert("class", $class);
        }

        public function updateClass($data,$classId){

            $this->db->where('id', $classId);

            $this->db->update('class', $data); 

        }

        public function getClassByStatusAndCustomerId($status){
        
        	$query = $this->db->get_where('class',array('status'=>$status,'customer_id'=>$_SESSION['user_id']));
        	
        	return $query->result();
        }

        public function getClassByStatus($status){
        
            $query = $this->db->get_where('class',array('status'=>$status));
            
            return $query->result();
        }

        public function getClassByCustomerId(){
        
        	$query = $this->db->get_where('class',array('customer_id'=>$_SESSION['user_id']));
        	
        	return $query->result();
        }



    }
?>