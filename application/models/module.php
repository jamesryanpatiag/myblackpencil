<?php 
	class Module extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

        public function addClass($data){

			$class = array(
                "type" => $data["type"],
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

        public function getClassById($id){

            $query = $this->db->get_where('class',array('id'=>$id));
            
            return $query->result();
        
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

        public function usersByRole($role){

             $this->db->select("*"); 

             $this->db->from("user u");  

             $this->db->join("roles r", "r.id = u.roleid", "inner");

             $this->db->join("person p", "p.userid = u.id", "inner");

             $this->db->where("r.code", $role);

             $this->db->order_by("u.id", "desc");

             $query = $this->db->get();

             return $query->result();
        }

        public function getUserById($userid){

            $query = $this->db->get_where('user',array('id'=>$userid));
            
            return $query->result();

        }

        public function addNotes($data){

            $this->db->insert('notes', $data);

            $insert_id = $this->db->insert_id();

            return  $insert_id;

        }

        public function getNotes($classid){

            $this->db->from("user u");

            $this->db->join("notes n", "n.userid = u.id", "inner");

            $this->db->where('n.classid',$classid);

            $this->db->order_by("n.id", "asc");
            
            $query = $this->db->get();

            return $query->result();

        }

        public function getNotesById($notesid){

            $this->db->from("user u");

            $this->db->join("notes n", "n.userid = u.id", "inner");

            $this->db->where('n.id',$notesid);

            $this->db->order_by("n.id", "asc");
            
            $query = $this->db->get();

            return $query->result();
        }
    }
?>