<?php
class Contacts_Model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function getContacts($idUser){        
        return $this->db->query("select contacts.id_user, contacts.id_contact, users.id, users.name, users.surname from contacts, users where contacts.id_user =".$idUser."  and contacts.id_contact = users.id group BY contacts.id_contact")->result_array();     
    }
    
    public function getByEmail($email){        
        return $this->db->query("select * from users where email = '".$email."'")->result_array();
    }
    
    public function add($idUser, $idNewContact){       
        $this->db->query("insert into contacts (id_user,id_contact) values ('".$idUser."','".$idNewContact."')");
        $this->db->query("insert into contacts (id_user,id_contact) values ('".$idNewContact."','".$idUser."')");
    }

}
?>