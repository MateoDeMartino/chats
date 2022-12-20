<?php
class Main_controller extends CI_controller{

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

    public function login(){
        $this->load->view('login');
    }

    public function create(){
        $this->load->view('create'); 
    }

    public function index(){
        $data['contacts'] = $this->Contacts_Model->getContacts($this->session->userdata('id'));
        $data['user'] = $this->Login_Model->getUserId($this->session->userdata('id'));
        $this->load->view('index', $data);
    }

    public function indexChat(){
        $data['contacts'] = $this->Contacts_Model->getContacts($_GET['idUser']);
        $data['user'] = $this->Login_Model->getUserId($_GET['idUser']);
        $data['messages'] = $this->Message_Model->getChatUser($_GET['idUser'],$_GET['idReciever']);
        $data['reciever'] = $this->Contacts_Model->getById($_GET['idReciever']); 
        $this->load->view('index',$data);
    }

    public function addContact(){
        $this->load->view('addContact'); 
    }

    public function profile(){
        $data['user'] = $this->Login_Model->getUserId($this->session->userdata('id'));
        $this->load->view('profile',$data);
    }

    public function profileUser(){
        $data['user'] = $this->Login_Model->getUserId($_GET['idReciever']);
        $this->load->view('profile',$data);
    }

    public function profileEdit(){
        $data['user'] = $this->Login_Model->getUserId($this->session->userdata('id'));
        $data['edit'] = true; 
        $this->load->view('profile',$data);      
    }    

    public function show(){
        $data['user'] = $this->session->flashdata('contacts');
        $this->load->view('profileUser',$data);
    }

    public function search(){
        $data['search'] = $this->session->flashdata('contacts');
        $data['user'] = $this->Login_Model->getUserId($this->session->userdata('id'));
        $this->load->view('index', $data);
    }

    public function logout(){
        session_destroy();
        $this->load->view('login');
    }
    
}
?>