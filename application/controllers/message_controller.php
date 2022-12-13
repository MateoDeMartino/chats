<?php
class Message_controller extends CI_controller{

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Message_Model');
        $this->load->model('Chats_Model');
        $this->load->library('session');
    }

    public function enterMessage(){

        $data['idUser'] = $this->input->post('idUser');
        $data['idReciever'] = $this->input->post('idReciever');
        $data['message'] = $this->input->post('content');
        
        $date = strtotime($this->input->post('date'));
        $data['date'] = date('Y/m/d H:i',$date);
        
        //$date = strtotime($this->input->post('date'));
        //$data['hour'] = date('H:i',$date);

        $datos['chats'] = $this->Chats_Model->getAll();
        $datos['user'] = $data['idUser'];
        
        $this->Message_Model->enterMessage($data);
        $datos['messages'] = $this->Message_Model->getChatUser($this->input->post('idUser'),$this->input->post('idReciever'));

        $idUser = $data['idUser']; 
        $idReciever = $data['idReciever'];
        
        redirect("main_controller/indexChat?idUser=$idUser&idReciever=$idReciever");
        
    }

}
?>