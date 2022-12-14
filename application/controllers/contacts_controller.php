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
        $aux = $this->Contacts_Model->getByEmail($this->input->post('email'));

        if($aux == null){
            header("location: ../main_controller/index");
        }else{
            $idContact = $aux[0]['id'];
            $this->Contacts_Model->add($idUser,$idContact);
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