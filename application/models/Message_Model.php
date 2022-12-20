<?php
class Message_Model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function enterMessage($data){
        $this->db->insert('message', array('id_first_user'=>$data['idUser'],'content'=>$data['message'],'id_second_user'=>$data['idReciever'],'date'=>$data['date']));
    }

    public function getChatUser($idUser,$idReciever){
        return $this->db->query("select * from message where id_first_user = '".$idUser."' and id_second_user = '".$idReciever."' OR id_first_user = '".$idReciever."' and id_second_user = '".$idUser."'  ")->result_array();
    }
    
    public function getChatReciever($idUser,$idReciever){
        return $this->db->query("select * from message where id_first_user = '".$idReciever."' and id_second_user = '".$idUser."'")->result_array();
    }
    
}
?>