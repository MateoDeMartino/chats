<?php
class Contacts_controller extends CI_controller{

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Chats_Model');
        $this->load->model('Login_Model');          
        $this->load->model('Message_Model');
        $this->load->model('Contacts_Model');
        $this->load->library('session');
    }

    public function add(){
        $idUser = $this->session->userdata('id');
        $email = $this->input->post('email');
        $contact = $this->Contacts_Model->getByEmail($this->input->post('email'));
        $aux = $this->Contacts_Model->searchContact($this->session->userdata('id'),$this->input->post('email'));
        
        if($aux == null){
            $this->Contacts_Model->add($idUser,$contact[0]['id']);
            header("location: ../main_controller/index");
        }else{
            header("Location: ../main_controller/index");
        }
    }

    public function search(){
        if (filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
            $contact = $this->Contacts_Model->searchContact($this->session->userdata('id'),$this->input->post('email'));
            if(isset($contact[0]['id'])){
                $this->session->set_flashdata('contacts',$contact);
                header("Location: ../main_controller/search");
            }
        }else{
            header("Location: ../main_controller/index");
        }
    }
    
}

?>