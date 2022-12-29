<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <title>chat app</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<body>
    
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<?php
    if(isset($_GET['idReciever'])){
        $idReciever2 = $_GET['idReciever'];
    }else{
        $idReciever2 = 0;
    }
    $idUser = $user[0]['id'];
?>
<div class="container">
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card chat-app">
            <div id="plist" class="people-list">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <form action="../contacts_controller/search" method="post">
                        <input type="text" class="form-control" style="width:240px" name="email" placeholder="Search by Email">
                        </form>
                    </div>
                    </div>
                <hr>
                <div class="list-people-chat">

                <!--search-->
                <ul class="list-unstyled chat-list mt-2 mb-0 ">
                    <?php 
                    if(isset($search)){
                        foreach($search as $element){
                            $idSender = $element['id'];
                            if($idSender == $idUser){
                            }else{
                                $idReciever = $element['id'];
                    ?>
                    <button role="link" onclick="window.location.href='../main_controller/indexChat?idUser=<?php echo $idUser; ?>&idReciever=<?php echo $idReciever; ?>'"  aria-pressed="true" class="btn  widght=100 " >
                        <li class="clearfix">
                        <?php
                                if($element['photo'] != ""){
                                    echo "<img src='data:image/jpg;base64, ".(base64_encode($element['photo']))."'  class='img-radius' alt='User-Profile-Image'>";
                                }else{
                                    echo "<img src='https://img.icons8.com/ios-glyphs/30/null/user--v1.png'  class='img-radius' alt='User-Profile-Image'>";
                                }
                        ?>
                        <div class="about">
                            <div class="name"><?php echo $element['name']," ", $element['surname']  ?></div>
                            <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>                                            
                        </div> 
                        </li>
                    </button>
                    <hr>
                    <!--list of contacts-->
                    <?php   }
                        } 
                    }else{
                        foreach($contacts as $element){
                            $idSender = $element['id'];
                            if($idSender == $idUser){
                            }else{
                                $idReciever = $element['id'];
                    ?>
                    <button role="link" onclick="window.location.href='../main_controller/indexChat?idUser=<?php echo $idUser; ?>&idReciever=<?php echo $idReciever; ?>'"  aria-pressed="true" class="btn  widght=100 " >
                    <li class="clearfix">
                        <?php
                            if($element['photo'] != ""){
                                echo "<img src='data:image/jpg;base64, ".(base64_encode($element['photo']))."'  class='img-radius' alt='User-Profile-Image'>";
                            }else{
                                echo "<img src='https://img.icons8.com/ios-glyphs/30/null/user--v1.png'  class='img-radius' alt='User-Profile-Image'>";
                            }
                        ?>
                        <div class="about">
                            <div class="name"><?php echo $element['name']," ", $element['surname']  ?></div>
                            <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>                                            
                        </div>
                    </li>
                    </button>
                    <hr>
                    <?php }}} ?> 
                </ul>
                </div>
            </div>

            <!--chat header-->
            <div class="chat">
                <div class="chat-header clearfix">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php 
                            if(isset($reciever)){
                                if($reciever[0]['photo'] != ""){
                                    echo "<img src='data:image/jpg;base64, ".(base64_encode($reciever[0]['photo']))."'  class='img-radius' alt='User-Profile-Image'>";
                                }else{
                                    echo "<img src='https://img.icons8.com/ios-glyphs/30/null/user--v1.png'  class='img-radius' alt='User-Profile-Image'>";
                                }
                                ?>
                            <div class="chat-about">
                                <button role="link"  onclick="window.location.href='../main_controller/profileUser?idReciever=<?php echo $idReciever2; ?>'"  class="btn"><?php echo $reciever[0]['name']," ", $reciever[0]['surname']  ?></button>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="col-lg-6 hidden-sm text-right">
                            <button role="link"  onclick="window.location.href='../main_controller/addContact'" style="margin-right: 10px " class="btn btn-outline-dark">Add Contact</button>
                            <button role="link"  onclick="window.location.href='../main_controller/profile'" style="margin-right: 10px "  class="btn btn-outline-dark">Profile</button>
                         </div>
                    </div>
                </div>
                
                <!--chat messages-->
                <div class="chat-history">
                    <ul class="m-b-0">
                    <?php
                        if(isset($messages)){
          
                            foreach($messages as $elemnt){
                                $message = $elemnt['content'];
                                $date = strtotime($elemnt['date']);
                                $newDate = date(' H:i',$date);

                                if ($elemnt['id_second_user'] != $idUser){
                                    $idReciever2 = $elemnt['id_second_user'];
                                }
                                if($message != null){

                                    if($elemnt['id_first_user']==$idUser){
                                        //Sender Message
                                        echo "<li class='clearfix'>";
                                        echo "<div class='message-data text-right'>";
                                        echo "<span class='message-data-time'>$newDate</span>";
                                        echo "<img src='https://bootdey.com/img/Content/avatar/avatar7.png' alt='avatar'>";
                                        echo "</div>";
                                        echo "<div class='message other-message float-right'> $message</div>";
                                        echo "</li>";
                                    }else if($elemnt['id_second_user']==$idUser){
                                        //Reciever Message
                                        echo "<li class='clearfix'>";
                                        echo "<div class='message-data'>";
                                        echo "<img src='data:image/jpg;base64, ".(base64_encode($reciever[0]['photo']))."' alt='avatar'>";
                                        echo "<span class='message-data-time'>$newDate</span>";
                                        echo "</div>";
                                        echo "<div class='message my-message'>$message</div>";
                                        echo "</li>";
                                    }
                                }
                            }
                        }
                    ?>                              
                    </ul>
                </div>
                    
                <!--enter message-->
                <div class="chat-message clearfix">
                    <div class="input-group mb-0">
                    <?php echo form_open('message_controller/entermessage');?>
                    
                        <input type="text" size="90" class="form-control" name="content" placeholder="Enter text here...">                                    
                        <input type="hidden" value="<?php echo date("Y/m/d H:i"); ?>" name="date" size="10" />
                        <input type="hidden" value="<?php echo $idUser.""?>"  name="idUser">
                        <input type="hidden" value="<?php echo $idReciever2.""?>"  name="idReciever">
          
                    <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<style type="text/css">
body{
    background-color: lightblue;
    margin-top:20px;
    font-family: 'Montserrat', sans-serif;
}

.card {
    background: #fff;
    transition: .5s;
    border: 0;
    margin-bottom: 30px;
    border-radius: .55rem;
    position: relative;
    width: 100%;
    box-shadow: 0 1px 2px 0 rgb(0 0 0 / 10%);
}

.list-people-chat{
    height: 630px;
	width: 260px;
	border: 1px solid #ddd;
	background: white;
	overflow-y: scroll;
    border-color:white;
}

/* width */
::-webkit-scrollbar {
  width: 14px;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: lightblue ;
  border-radius: 20px;
}

.chat-app .people-list {
    width: 280px;
    position: absolute;
    left: 0;
    top: 0;
    padding: 20px;
    z-index: 7;
}

.chat-app .chat {
    margin-left: 280px;
    border-left: 1px solid #eaeaea
}

.btn:hover {    
    background-color:lightblue;
    outline-color:white;
}

.people-list .chat-list li {
    padding: 10px 15px;
    list-style: none;
    border-radius: 3px;
}

.people-list .chat-list li:hover {
    cursor: pointer
}

.people-list .chat-list li.active {
    background: #efefef
}

.people-list .chat-list li .name {
    font-size: 15px
}

.people-list .chat-list img {
    width: 45px;
    border-radius: 50%
}

.people-list img {
    float: left;
    border-radius: 50%
}

.people-list .about {
    float: left;
    padding-left: 8px
}

.people-list .status {
    color: #999;
    font-size: 13px
}

.img-radius {
    border-radius: 5px;
    width: 100px;
    height: 40px;
}

.chat .chat-header {
    padding: 15px 20px;
    border-bottom: 2px solid #f4f7f6
}

.chat .chat-header img {
    float: left;
    border-radius: 40px;
    width: 40px
}

.chat .chat-header .chat-about {
    float: left;
    padding-left: 10px
}

.chat .chat-history {
    padding: 20px;
    border-bottom: 2px solid #fff;
    background-color:lightgrey;
    width: 800px;
    height: 590px;
    overflow: auto;
}

.chat .chat-history ul {
    padding: 0
}

.chat .chat-history ul li {
    list-style: none;
    margin-bottom: 30px
}

.chat .chat-history ul li:last-child {
    margin-bottom: 0px
}

.chat .chat-history .message-data {
    margin-bottom: 15px
}

.chat .chat-history .message-data img {
    border-radius: 40px;
    width: 40px
}

.chat .chat-history .message-data-time {
    color: #434651;
    padding-left: 6px
}

.chat .chat-history .message {
    color: #444;
    padding: 18px 20px;
    line-height: 26px;
    font-size: 16px;
    border-radius: 7px;
    display: inline-block;
    position: relative
}

.chat .chat-history .message:after {
    bottom: 100%;
    left: 7%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #fff;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .my-message {
    background: white;
}

.chat .chat-history .my-message:after {
    bottom: 100%;
    left: 27%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: white;
    border-width: 10px;
    margin-left: -10px
}

.chat .chat-history .other-message {
    background: lightblue;
    text-align: right
}

.chat .chat-history .other-message:after {
    border-bottom-color: lightblue;
    left: 80%
}

.chat .chat-message {
    padding: 20px
}

.online,
.offline,
.me {
    margin-right: 2px;
    font-size: 8px;
    vertical-align: middle
}

.online {
    color: #86c541
}

.offline {
    color: #e47297
}

.me {
    color: #1d8ecd
}

.float-right {
    float: right
}

.clearfix:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0
}

@media only screen and (max-width: 767px) {
    .chat-app .people-list {
        height: 465px;
        width: 100%;
        overflow-x: auto;
        background: #fff;
        left: -400px;
        display: none
    }
    .chat-app .people-list.open {
        left: 0
    }
    .chat-app .chat {
        margin: 0
    }
    .chat-app .chat .chat-header {
        border-radius: 0.55rem 0.55rem 0 0
    }
    .chat-app .chat-history {
        height: 300px;
        overflow-x: auto
    }
}

@media only screen and (min-width: 768px) and (max-width: 992px) {
    .chat-app .chat-list {
        height: 650px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: 600px;
        overflow-x: auto
    }
}

@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
    .chat-app .chat-list {
        height: 480px;
        overflow-x: auto
    }
    .chat-app .chat-history {
        height: calc(100vh - 350px);
        overflow-x: auto
    }
}
</style>
</body>
</html>