<?php
class Login_Model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function getUser($email){
        return $this->db->query("select * from users where email = '".$email."'")->result_array();
    }

    public function getUserId($idUser){
        return $this->db->query("select * from users where id = ".$idUser."")->result_array();
    }

    public function insertUser($email,$pass,$name,$surname){
        $this->db->query("insert into users (name,surname,email,password) values ('".$name."','".$surname."','".$email."','".$pass."')");
    }

    public function update($idUser,$name,$surname,$email,$password){
       $this->db->query("update users set name= '".$name."', surname = '".$surname."', email = '".$email."', password = '".$password."' where id =".$idUser);
    }
    
}
?>