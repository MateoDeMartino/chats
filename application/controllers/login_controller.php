<?php
class Login_controller extends CI_controller{

    public function __construct(){
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
        $pass = $result[0]['password'];
        if($pass == $this->input->post('password')){
            $this->session->set_userdata('id',$result[0]['id']);       
            header("Location: ../main_controller/index");
        }else{
            ?>
            <script>
				alert('Error; Email o Contraseña incorrecta');
                window.location.href="../main_controller/login";
			</script>
            <?php
        }
    }

    public function update(){
        if($this->input->post('password')==$this->input->post('passwordRepeat')){
            if($_FILES['photo']['tmp_name'] != null ){
                $this->Login_Model->update($this->session->userdata('id'),$this->input->post('name'),$this->input->post('surname'),$this->input->post('email'),$this->input->post('password'),addslashes(file_get_contents($_FILES['photo']['tmp_name'])));
            ?>  
             <script>
				alert('Actualizado con exito!');
                window.location.href="../main_controller/profile";
			</script>
            <?php
            }else{
                //$this->Login_Model->update($this->session->userdata('id'),$this->input->post('name'),$this->input->post('surname'),$this->input->post('email'),$this->input->post('password'), addslashes(base64_decode(stripslashes($user[0]['photo']))));

                $user = $this->Contacts_Model->getByEmail($this->input->post('email'));

                $this->Login_Model->update($this->session->userdata('id'),$this->input->post('name'),$this->input->post('surname'),$this->input->post('email'),$this->input->post('password'), addslashes(base64_decode($user[0]['photo'])));
                
                var_dump($user[0]['photo']);
                echo "<br>";

                var_dump(addslashes(base64_decode(stripslashes($user[0]['photo']))));
                //addslashes(base64_encode(stripslashes($user[0]['photo'])));
                ?>  
                <script>
				    //alert('Actualizado con exito!');
                    //window.location.href="../main_controller/profile";
			    </script>
                <?php
            }
        }else{
            ?>  
             <script>
				alert('Error; Contraseñas diferentes');
                window.location.href="../main_controller/index";
			</script>
            <?php
        }
    }


}
?>