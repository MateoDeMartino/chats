<?php
class Chats_Model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function getAll(){
        return $this->db->get('users')->result_array();
    }
    
    public function getUser($email){
        return $this->db->query("select * from users where email = '".$email."'")->result_array();
    }

}
?>