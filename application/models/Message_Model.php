<?php
class Message_Model extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function enterMessage($data){
        var_dump($data['date']);
        //$date = $data['date'];
        //var_dump ($date('H:i'));
        //var_dump($data['hour']);
        $this->db->insert('message', array('id_first_user'=>$data['idUser'],'content'=>$data['message'],'id_second_user'=>$data['idReciever'],'date'=>$data['date']));
    }

    public function getChat($email){
        $qyResult = $this->db->query("select * from users where email ='".$email."'");
        $user = $qyResult->result_array();
        foreach($user as $element){
            $idUser = $element['id'];
        }
        return $this->db->query("select * from message where id_first_user = '".$idUser."'")->result_array();
    }

    public function getChatUser($idUser,$idReciever){
        return $this->db->query("select * from message where id_first_user = '".$idUser."' and id_second_user = '".$idReciever."' OR id_first_user = '".$idReciever."' and id_second_user = '".$idUser."'  ")->result_array();
    }
    
    public function getChatReciever($idUser,$idReciever){
        return $this->db->query("select * from message where id_first_user = '".$idReciever."' and id_second_user = '".$idUser."'")->result_array();
        
    }
}
?>