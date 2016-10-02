<?php 
	class User_model extends CI_Model {

		private $firstname;
		private $surname;
		private $username;
		private $password;

        public function __construct()
        {
                parent::__construct();
        }

        public function registerUser($data, $role){

			$user_data = array(
				"username" => $data["username"],
				"password" => $this->generateHashPassword($data["password"]),
                "role"    => $role,
				"is_logged_in" => 0,
				"last_login" => null,
				"is_verified" => $role == STUDENT ? 0 : 1,
				"is_active" => 1,
				"created_by" => 1   
			);		
			
			$this->db->insert("user", $user_data);
			
            $id = $this->db->insert_id();
			
            $this->addPerson($data, $id);

            return $id;
        }

        public function changeUserPassword($userid, $password){

            $user_data = array(
                "password" => $this->generateHashPassword($password),
                "is_password_changed" => 1
            );

            $this->db->where('id', $userid);

            $this->db->update('user', $user_data); 

        }

        public function addPerson($data, $userId){
        	
        	$person_data = array(
    			"userid" => $userId,
    			"email" => $data["email"],
    			"firstname" => $data["first_name"],
                "middlename" => isset($data["middlename"]) ? $data["middlename"] : "",
                "dob" => isset($data["dob"]) ? $data["dob"] : null,
                "gender" => isset($data["gender"]) ? $data["gender"] : "",
    			"surname" => $data["last_name"],
				"created_by" => 1
			);
			
			$this->db->insert("person", $person_data);
        }

        public function updateUser($data, $userid){

            $this->db->where('id', $userid);

            $this->db->update('user', $data); 
            
        }

        public function updatePerson($data, $userid){

            $this->db->where('userid', $userid);

            $this->db->update('person', $data); 

        }

        public function getUsersByRole($role){


            $this->db->select('*');

            $this->db->from("user u");

            $this->db->join("person p", "u.id = p.userid", "INNER");

            $this->db->where("u.role", $role);

            $query = $this->db->get();

            return $query->result();

        }

        public function getUserByUsername($username){

        	$query = $this->db->get_where('user',array('username'=>$username));
        	
        	return $query->result();
        }

        public function isEmailExist($email){
        	
        	$query = $this->db->get_where('person',array('email'=>$email));
        	
        	return $query->result();
        }

        public function getUserPassword($username){
        	
        	$query = $this->db->get_where('user',array('username'=>$username));

        	return $query->result();
        }

        public function getPersonByUserId($userid){

            $query = $this->db->get_where('person',array('userid'=>$userid));

            return $query->result();
        }

    	private function generateHashPassword($password){
		
    		$options = [
    		    'cost' => 11,
    		    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
    		];
    		
    		return password_hash($password, PASSWORD_BCRYPT, $options);

        }

        public function getUserById($userid){

            $this->db->select('*');

            $this->db->from("user u");

            $this->db->join("person p", "u.id = p.userid", "inner");

            $this->db->where("u.id", $userid);

            $query = $this->db->get();

            return $query->result();

        }

        public function getUserByHashedId($userid){

            $this->db->select('*');

            $this->db->from("user u");

            $this->db->where("sha1(u.id)", $userid);

            $query = $this->db->get();

            return $query->result();

        }

        public function getAllExpertise(){

            $this->db->select('*');

            $this->db->from("expertiselookup");

            $query = $this->db->get();

            return $query->result();

        }

         public function getAllExpertiseByUser($userid){

            $this->db->select('*');

            $this->db->from("userexpertise u");

            $this->db->join("expertiselookup el", "u.expertiselookupid = el.id", "inner");

            $this->db->where("u.userid", $userid);

            $query = $this->db->get();

            return $query->result();

        }

        public function deleteAllUserExpertiseByUser($userid){

            $this->db->where("userid", $userid);

            $this->db->delete("userexpertise");

        }

        public function deleteUserExpertiseById($id){

            $this->db->where("id", $id);

            $this->db->delete("userexpertise");

        }

        public function deleteUserExpertiseByUserAndExpertise($userid, $expertiseid){

            $this->db->where(array("userid" => $userid, "expertiselookupid" => $expertiseid));

            $this->db->delete("userexpertise");

        }

        public function getExpertiseByName($name){

            $this->db->select('*');

            $this->db->from("expertiselookup");

            $this->db->where("lower(name)", strtolower($name));

            $query = $this->db->get();

            return $query->result();

        }

        public function insertExpertise($name){

            $expertise_data = array(
                "name" => $name
            );      
            
            $this->db->insert("expertiselookup", $expertise_data);
            
            $id = $this->db->insert_id();
            
            return $id;

        }

        public function insertUserExpertise($expertiseId, $userid){

            $userexpertise_data = array(
                "userid" => $userid,
                "expertiselookupid" => $expertiseId
            );      
            
            $this->db->insert("userexpertise", $userexpertise_data);
            
            $id = $this->db->insert_id();
            
            return $id;

        }

}
?>