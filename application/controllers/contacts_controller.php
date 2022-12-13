<?php
class Contacts_controller extends CI_controller{

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Message_Model');
        $this->load->model('Login_Model');  
        $this->load->model('Chats_Model');
        $this->load->model('Contacts_Model');
        $this->load->library('session');
    }

    public function add(){
        
        $idUser = $this->input->post('idUser');
        $email = $this->input->post('email');

        $aux = $this->Contacts_Model->getByEmail($this->input->post('email'));

        if($aux == null){
            ?>
            <script> 
                alert('Error, el contacto no existe');
            </script>
            <?php
            header("location: ../main_controller/index");
        }else{
            $idContact = $aux[0]['id'];
            
            $this->Contacts_Model->add($idUser,$idContact);
    
            //$datos['contacts'] = $this->Contacts_Model->getContacts($idUser);
            //$datos['user'] = $this->Login_Model->getUser($this->input->post('email'));
            ?>
            <script>
                alert('Exito, contacto guardado');
            </script>
            <?php

            header("Location: ../main_controller/index");
            
        }
        
    }
    
}

?>