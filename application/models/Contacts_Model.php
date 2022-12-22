<?php
class Contacts_Model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function getContacts($idUser){        
        return $this->db->query("select contacts.id_user, contacts.id_contact, users.id, users.name, users.surname, users.photo as photo from contacts, users where contacts.id_user =".$idUser."  and contacts.id_contact = users.id group BY contacts.id_contact")->result_array();     
    }
    
    public function getByEmail($email){        
        return $this->db->query("select * from users where email = '".$email."'")->result_array();
    }

    public function searchContact($idUser,$email){
        return $this->db->query("select contacts.id_contact as id, users.name as name, users.surname as surname, users.email as email, users.photo as photo from users, contacts where users.email = '".$email."' and users.id = contacts.id_contact and contacts.id_user =".$idUser)->result_array();
    }

    public function getById($idReciever){        
        return $this->db->query("select * from users where id = ".$idReciever."")->result_array();
    }
    
    public function add($idUser, $idNewContact){       
        $this->db->query("insert into contacts (id_user,id_contact) values (".$idUser.",".$idNewContact.")");
        $this->db->query("insert into contacts (id_user,id_contact) values (".$idNewContact.",".$idUser.")");
    }

}
?>