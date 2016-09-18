<?php 
	class File extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

       	public function saveFile($data){		

			     $this->db->insert("storedfiles", $data);
			
       	}

        public function getFileByReferenceId($id, $fileCategory){

            $this->db->select('id, filename');

            $this->db->from("storedfiles");

            $this->db->where("file_category", $fileCategory);
                
            $this->db->where("referenceid", $id);

            $query = $this->db->get();

            return $query->result();

        }

        public function deleteFileById($id){   

            $this->db->where('id', $id);
            
            $this->db->delete('storedfiles');
            
        }

        public function getStoredFileById($id){

            $query = $this->db->get_where('storedfiles',array('id'=>$id));
            
            return $query->result();

        }

    }
?>