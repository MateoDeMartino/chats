<?php
class Login_controller extends CI_controller{

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

    public function createUser(){
        $this->Login_Model->insertUser($this->input->post('email'),$this->input->post('password'),$this->input->post('name'),$this->input->post('surname'));
        header("Location: ../main_controller/login");
    }
    
    public function login(){
        $result = $this->Login_Model->getUser($this->input->post('email'));
        $this->session->set_userdata($result[0]);       
        $pass = $result[0]['password'];
        if($pass == $this->input->post('password')){ 
            header("Location: ../main_controller/index");
        }else{
            ?>
            <script>
				alert('Error; Email o Contraseña incorrecta');
			</script>
            <?php
            header("Location: ../main_controller/login");
        }
 
    }


}
?>