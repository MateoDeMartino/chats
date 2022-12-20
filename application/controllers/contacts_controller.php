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

    public function show(){
        $contact = $this->Contacts_Model->getByEmail($this->input->post('email'));
        if(isset($contact[0]['id'])){
            $this->session->set_flashdata('contacts',$contact);
            header("Location: ../main_controller/show");
        }else{
            ?>
            <script>
                alert("No se encuentra ese contacto")
                window.location.href="../main_controller/index";
            </script>
            <?php
        }
    }

    public function add(){
        $contact = $this->Contacts_Model->getByEmail($_GET['email']);
        $aux = $this->Contacts_Model->searchContact($this->session->userdata('id'),$_GET['email']);
        if(isset($contact[0]['id'])){
            if($aux == null){
                $this->Contacts_Model->add($this->session->userdata('id'),$contact[0]['id']);
                header("location: ../main_controller/index");
            }else{
                ?>
                <script>
                    alert("Ya esta guardado");
                    window.location.href="../main_controller/index";
                </script>
                <?php
            }
        }else{
            ?>
            <script>
                alert("No se encuentra ese contacto")
                window.location.href="../main_controller/index";
            </script>
            <?php
        }
    }

    public function search(){
        if (filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
            $contact = $this->Contacts_Model->searchContact($this->session->userdata('id'),$this->input->post('email'));
            if(isset($contact[0]['id'])){
                $this->session->set_flashdata('contacts',$contact);
                header("Location: ../main_controller/search");
            }else{
                ?>
                <script>
                    alert("No se encuentra ese contacto")
                    window.location.href="../main_controller/index";
                </script>
                <?php
            }
        }else{
            ?>
            <script>
                alert("No es un Mail")
                window.location.href="../main_controller/index";
            </script>
            <?php
        }
    }
    
}

?>