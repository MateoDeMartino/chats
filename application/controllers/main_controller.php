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
        
        $datos['contacts'] = $this->Contacts_Model->getContacts($this->session->userdata('id'));
        $datos['user'] = $this->Login_Model->getUserId($this->session->userdata('id'));

        $this->load->view('index', $datos);
    }

    public function indexChat(){

        $datos['contacts'] = $this->Contacts_Model->getContacts($_GET['idUser']);
        $datos['user'] = $this->Login_Model->getUserId($_GET['idUser']);
        $datos['messages'] = $this->Message_Model->getChatUser($_GET['idUser'],$_GET['idReciever']);
         
        $this->load->view('index',$datos);
    }

    public function addContact(){
        $this->load->view('addContact'); 
    }

    public function logout(){
        session_destroy();
        $this->load->view('login');
    }
    

}
?>