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

        public function registerUser($data){

			$user_data = array(
				"username" => $data["username"],
				"password" => $this->generateHashPassword($data["password"]),
				"is_logged_in" => 0,
				"last_login" => null,
				"is_verified" => 0,
				"is_active" => 1,
				"created_by" => 1   
			);		
			
			$this->db->insert("user", $user_data);
			
			$this->addPerson($data, $this->db->insert_id());
        }

        public function addPerson($data, $userId){
        	
        	$person_data = array(
    			"userid" => $userId,
    			"email" => $data["email"],
    			"firstname" => $data["first_name"],
    			"surname" => $data["last_name"],
				"created_by" => 1
			);
			
			$this->db->insert("person", $person_data);
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

}
?>