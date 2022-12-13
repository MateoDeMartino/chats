<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="container py-5 px-4">
  <!-- For demo purpose-->
  <header class="text-center">
    <h1 class="display-4 text-white">Chatting</h1>
  </header>

    <?php

      if(isset($_GET['idReciever'])){
        $idReciever2 = $_GET['idReciever'];
      }else{
        $idReciever2 = 0;
      }
      foreach($user as $elemt){ 
        $idUser = $elemt['id'];
      }
    ?>

  <div class="row rounded-lg overflow-hidden shadow">
    <!-- Users box-->
    <div class="col-5 px-0">
      <div class="bg-white">

        <div class="bg-gray px-4 py-2 bg-light">
          <button role="link"  onclick="window.location.href='../main_controller/addContact'"  class="btn btn-outline-dark">Add Contact</button>
          <button role="link"  onclick="window.location.href='../main_controller/logout'"  class="btn btn-danger">logout</button>
        </div>
        <div class="messages-box">
          <div class="list-group rounded-0">
            <?php 
            foreach($contacts as $element){
              
              $idSender = $element['id'];
              if($idSender == $idUser){
              }else{
                
              
              $idReciever = $element['id'];
              ?>
              
            <button role="link" onclick="window.location.href='../main_controller/indexChat?idUser=<?php echo $idUser; ?>&idReciever=<?php echo $idReciever; ?>'" aria-pressed="true" class="btn btn-outline-dark">         
              <div class="media"><img src="https://bootdey.com/img/Content/avatar/avatar1.png"  alt="user" width="50" class="rounded-circle">
                <div class="media-body ml-4">
                  
                  <div class="d-flex align-items-center justify-content-between mb-1">
                    <p ><?php echo $element['name']," ", $element['surname']  ?> </p><small class="small font-weight-bold">25 Dec</small>
                  </div>
                  <p class="font-italic mb-0 text-small">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                </div>
              </div>             
            
            </button>
            <P></P>
            <?php }} ?>    
            
          </div>
        </div>
      </div>
    </div>
    <!-- Chat Box-->
    <div class="col-7 px-0">
    <div class="px-4 bg-white ">   
      </div>
      <div class="px-4 py-5 chat-box bg-white">
      
        <?php
          if(isset($messages)){
          
            foreach($messages as $elemnt){
              $message = $elemnt['content'];
                
              if ($elemnt['id_second_user'] != $idUser){
                $idReciever2 = $elemnt['id_second_user'];
                //$nameContact = $elemnt['name'];
                //$surnameContact = $elemnt['surname']; 
                  
              }
                
              if($message != null){
               
                if($elemnt['id_first_user']==$idUser){
                  //Sender Message
                  echo "<div class='media w-50 ml-auto mb-3'>";
                  echo "<div class='media-body'>";
                  echo "<div class='bg-dark rounded py-2 px-3 mb-2'>";
                  echo "<p class='text-small mb-0 text-white'>$message </p>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                }else if($elemnt['id_second_user']==$idUser){
                  //Reciever Message
                  echo "<div class='media w-50 mb-3'><img src='https://bootstrapious.com/i/snippets/sn-chat/avatar.svg' alt='user' width='50' class='rounded-circle'>";
                  echo "<div class='media-body ml-3'>";
                  echo "<div class='bg-light rounded py-2 px-3 mb-2'>";
                  echo "<p class='text-small mb-0 text-muted'>$message</p>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                }
              }
            }
          }
        ?>
       
      </div>

      <!-- Typing area -->
      <?php echo form_open('message_controller/entermessage');?>
       
        <div class="input-group">
          <div class="input-group-append">
            <button  type="submit" class="btn btn-link"><i class="fa fa-send"></i></button>
          </div>
          <?php 
            $content = array(
              'type' => 'text',
              'name' => 'content',
              'class' => 'form-control rounded-0 border-0 py-4 bg-light',
              'placeholder' =>'Enter text here'
            );
            echo form_input($content);
          
          ?>
          <input type="hidden" value="<?php echo date("Y/m/d H:i"); ?>" name="date" size="10" />
          <input type="hidden" value="<?php echo $idUser.""?>"  name="idUser">
          <input type="hidden" value="<?php echo $idReciever2.""?>"  name="idReciever">
            
        </div>
        <?php echo form_close();?>
    </div>
  </div>
</div>

<style type="text/css">

/*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/
body {
  background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
  min-height: 100vh;
}

::-webkit-scrollbar {
  width: 5px;
}

::-webkit-scrollbar-track {
  width: 5px;
  background: #f5f5f5;
}

::-webkit-scrollbar-thumb {
  width: 1em;
  background-color: #ddd;
  outline: 1px solid slategrey;
  border-radius: 1rem;  
}

.text-small {
  font-size: 0.9rem;
}

.messages-box,
.chat-box {
  height: 510px;
  overflow-y: scroll;
}

.rounded-lg {
  border-radius: 0.5rem;
}

input::placeholder {
  font-size: 0.9rem;
  color: #999;
}


</style>
</body>
</html>