<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <title>Document</title>
</head>
<body>
<div class=" container ">
    <div class="main-card">
        <div class="card user-card-full">
            <div class="row m-l-0 m-r-0">
            <?php if(isset($edit)){ ?> 
                <div class="col-sm-4 bg-c-lite-green user-profile">
                    <div class="card-block text-center text-white">
                        <form action="../login_controller/update" method="post" enctype="multipart/form-data">
                            <div class="m-b-25">
                                <?php
                                if($user[0]['photo'] != ""){
                                    echo "<img src='data:image/jpg;base64, ".(base64_encode(stripslashes($user[0]['photo'])))."'  class='img-radius' >";
                                }else{
                                    echo "<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAACZElEQVR4nO2ZPWtUQRSGHxNdiaZQxEpIndhpq6CNJloIJkgKg4VoERQtoiR+INFGC8mfkGisxcq/EPwKiPErWgQLCwUXRaO54cB7YVgkubOz7owyDwwsd89575mvO2dmIJP5Z6gBw8A94CVQV7Hfd/Wf2STNMeAdUKxR3gJDJEgnMOUE+hg4C/QBm1X69OyJY3dbvskwpcC+AyeBdavYdgCnZFtWJpnhVADfgD0efnudygwSmZozJ6wnfDkt3zexPwDDzpywIeOL+TyVhvVsNGYUxJkAjXPSmCYi8wqiN0BjpzRsnYnGVwXRHaDRLQ3Tika5HqSi0zS5Ig3kHmkVeWilNrS+KIAtARpbpfGZiDxXELsCNHZLw9L7aEwriAsBGhelcYeIHFIQ8wFJ4ytpDBCRTqXgFsh4E/4T8n2dwk5xP7AM/PBsVbP9CfwG9pEIN9SyS8BoBftR2ZrPdRJj3GM9KO1ukSiFZ0WSpcgVSYzif+iR7c4h3VqU51nbSIwBYEHBPahg/9BZCPuJTA0YAWadoWJnVDsq+PYALxy/WWnVaCM2HC4Bi04gH4ExYKOHzibgKvDJ0VmU9l8dctZa5509SJks2rOuAF2r/AlgztG1o6HJQN0/crDh3uORnq126u6LafVLu3zPB+Bwq15wRYldoVZrx+Q8ADzTO5fVO0FMSuwXcK3NqXYHcNlJLm82K3RErbGkU/dYDCrdt1iONjOxFwI2TK1mTLG89/1EH5ejTfANxGe9LlALrTeVuS8n2zCltnmb8XEqax89fWhIg8prusrUK9yVxyp1n4oUiZdMJoMfK+YhJaCnoLnkAAAAAElFTkSuQmCC'  class='img-radius' alt='User-Profile-Image'>";
                                }
                                ?>
                            </div>
                            <input type="file" name="photo" value="<?php echo (base64_encode(stripslashes($user[0]['photo']))) ;?>">
                        <h6 class="f-w-600">Email</h6>
                        <br>
                        <input type="text" name="email" value="<?php echo $user[0]['email'] ?>" placeholder="<?php echo $user[0]['email']; ?>">
                        <br>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="card-block">
                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Name</p>
                                    <input type="text" name="name" value="<?php echo $user[0]['name']; ?>" placeholder="<?php echo $user[0]['name']; ?>" >
                                </div>
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Surname</p>
                                    <input type="text" name="surname" value="<?php echo $user[0]['surname']; ?>" placeholder="<?php echo $user[0]['surname']; ?>" >
                                    
                                </div>
                            </div>
                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Password</h6>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Password</p>
                                    <input type="password" name="password" value="<?php echo $user[0]['password']; ?>">
                                </div>
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Repeat Password</p>
                                    <input type="password" name="passwordRepeat" value="<?php echo $user[0]['password']; ?>">
                                </div>
                            </div>
                            <ul class="social-link list-unstyled m-t-40 m-b-10">
                                <?php if(!isset($_GET['idReciever'])){ ?>
                                <button type="submit"   class="btn btn-outline-success" >Update</button>
                                <?php } ?>
                                </form>
                                <button role="link" onclick="window.location.href='../main_controller/profile'" style='margin-left: 260px'  class="btn btn-outline-danger">Cancel</button>
                            </ul>
                            </div>
                        </div>
                    
                    </div>
                </div>
            <?php }else{ ?>
                <div class="col-sm-4 bg-c-lite-green user-profile">
                    <div class="card-block text-center text-white">
                        <div class="m-b-25">
                        <?php
                                if($user[0]['photo'] != ""){
                                    
                                    echo "<img src='data:image/jpg;base64, ".(base64_encode(stripslashes($user[0]['photo'])))."'  class='img-radius' alt='User-Profile-Image'>";
                                }else{
                                    echo "<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFZUlEQVR4nO2dXYhWRRjHf+2qa2VY5GYEfZDdRCRZ9qEUFBWF0EVkEFmBRSxlddOHkZTRpykFFYagGUofNxlYXSh2VRRBXfQlQlhaVKSxWmm1a+rEE7Px9uycd3Xfc87Mnnl+MLDs7jvzP//nPefMmXlmDhiGYRiGYRhGNzAbWASsAzYDu4B9vsjPX/m/PQTMgn8/Y5TMqcAy4EfAHWaRzywFTrGodM5UYJX/9rsOi9SxEjjBAjM6bgF2lxAIXeSydpMF5dCZAKwewdA1wHxgJjAFGO9Lr/+d/G2t/9+ielb6zxhtOBrYWGDgF8CNQM9hOCj/Ow/4sqDODb5No+DM2Bgw7TegD+jqwDXpad3h6woFxc6UAKsDZn0GTCvx63uGP9NCly9D3cCdKh8Akytw6Vjgw0B7cmkzfNd2V+DMmFyhO9IR2Kba7PedguxZFbhnTKvBlenAHtX2ityjcTIwqEzpq7H9BYGHRxkVyJZlga5tV43td/uxr1YNS8iU7sDY1LwIOm5WGn6o+UuRDLMDT+A9EXRMBH5VWi4kQxYpE9ZE1PKq0vIgGfKWMmF+RC23KS1vkiGblQkzI2q5QGmRsa/s6FcmTImopVdp+YUM0c8fEyJq6VFaBsgQPZYUm9T0kLsBLjE95G6AS0wPuRvgEtND7ga4xPSQuwEuMT3kboBLTA+5G+AS00PuBrjE9JC7AS4xPeRugEtMD7kb4BLTUzsDyoCJEbUcqbT8SYbsUCacGFHLSUrLT2SIToC+KKH5fcl+yY43lAl3RtRyt9Iic+zZsVCZsC6h+f37yZBzlAl/RFqrMcnfxFu1SJppluiE57sSuFx9Q8Y8rMzYVnOynLS1XWmQfLFs6Q1cLh6psf1HA88fMbNfkmCJMmUAOLeGds8LPJw+XUO7yTMpkHT9nV/IUxVS9/eBJGvRYgBXAweUQVv8E3QVwdAPpdL2VRaJ//NkYIBPejwzSjRKLoXfBtp5woIxnC6/2F+b9Zdf6dQpC3xdLpB1n+V6kENhHPB6wLQyhsNDdb7m2zTacATweA0Becy3ZYzSwE7JfgIqNQNd7jOCneIsIGnhLCBp4SwgaeEsIGnhLCBp4SwgaeEsIOlwZWDbjU7RO5xeXEKdjafLDwLqiaN3S6h7g6pzj989woZP2pwVnwYuVQdK+jZfXjDA+DFwRQn1NwLJ5721YGNK58sDFc+5DJXPvZYYOxJFZ6pPMND5va6lyJZJcyto+/ZAYkVr+RlYnMuW5NP9drD6HqEvUWv99n9VcSbwThsNQxNjLwNn0zDkpjkH2DSCAYM+EHVmDV4CrA/M57eWg177nCZ0AORm+ckIgZBdSJ+v+IwYidO9hr0jaJV73fVjMTDyLX9/hIOTBIZ7Eku9Oc4ngesUIV0+8nldySPmPgv83eZgZFfp6xJ/88144AbfJS46jv3Acr9TdrLZ7F+3OYD1kRfljJZZXvvBguPanuJx9RWk2Eh5ryG7fJ7f5lUasgHzvSS68KZ1nZ5sst80rgksoxgqy2Pf8JcWCHsFOIbmchTwUsGxr4iVeHdfQMzehp4VRcwteEmMjELUfqPbFxjqkNWsuTED2Bkzeft4n7rfKmB35H13Y3NWICg7Kl5S8R/62indwWvraDhxLvPPJrW+Sum0wEPfi1U3OobQnZz9Vb+c5jnV4O+2Jm/Y0IueKn6BihgXmL94pqrGxjBPKY92VrXk4dJA906GS4zhA6vaJ/GudBarRrZW0UhD2FrHUu+3VSOyeYwRRq8Ck8HJ0tlSYfJB01iovJJ3pZROFa/SzqX0VxGQMl4yn2sZrCIgsQ/KjfFiAaHhATEMwzAMwzAMw6AE/gE10plSBoXPogAAAABJRU5ErkJggg=='  class='img-radius' alt='User-Profile-Image'>";
                                }
                                ?>   
                        </div>
                        <h6 class="f-w-600">Email</h6>
                        <br>
                        <h6 class="f-w-600"><?php echo $user[0]['email']; ?></h6>
                        <br>
                        <?php
                        if(!isset($_GET['idReciever'])){?>
                        <button title="edit" class='btn2' role='link' onclick="window.location.href='../main_controller/profileEdit'" ><i class=' mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16'></i></button>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="card-block">
                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Name</p>
                                    <h6 class="text-muted f-w-400"><?php echo $user[0]['name']; ?></h6>
                                </div>
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Surname</p>
                                    <h6 class="text-muted f-w-400"><?php echo $user[0]['surname']; ?></h6>
                                </div>
                            </div>
                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Recent</p>
                                    <h6 class="text-muted f-w-400">Sam Disuja</h6>
                                </div>
                                <div class="col-sm-6">
                                    <p class="m-b-10 f-w-600">Most Viewed</p>
                                    <h6 class="text-muted f-w-400">Dinoter husainm</h6>
                                </div>
                            </div>
                            <ul class="social-link list-unstyled m-t-40 m-b-10">
                                <button role="link" onclick="window.location.href='../main_controller/index'"  class="btn btn-outline-dark">Back</button>
                                <?php if(!isset($_GET['idReciever'])){ ?>
                                <button role="link" onclick="window.location.href='../main_controller/logout'"  style='margin-left: 262px'  class="btn btn-outline-danger">Logout</button>
                                <?php } ?>
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
                
                
            </div>
        </div>
    </div>
</div>
<style>
    body {
    background-color: #f9f9fa
}

.btn2{
    border-style:solid;
    border-color:lightblue;
    background:lightblue;
    color:white;
    border-radius: 5px;
}

.btn2:hover{
    border-style:solid;
    border-color:white;
    border-radius: 5px;
    background:white;
    color:lightblue;
}

.btn2:active{
    border-color:white;
}

.padding {
    padding: 3rem !important
}

.user-card-full {
    overflow: hidden;
}
.main-card{
    display:grid;
    justify-content:center;
    align-items:center;
    padding-top:150px;
   
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    border: none;
    margin-bottom: 30px;
}

.m-r-0 {
    margin-right: 0px;
}

.m-l-0 {
    margin-left: 0px;
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px;
}

.bg-c-lite-green {
    background:lightblue;
}

.user-profile {
    padding: 20px   ;
}

.card-block {
    padding: 1.25rem;
}

.m-b-25 {
    margin-bottom: 25px;
}

.img-radius {
    border-radius: 5px;
    width: 100px;
    height: 100px;
}
 
h6 {
    font-size: 15px;
}

.card .card-block p {
    width: 220px;
    height: 40px;
    line-height: 25px;
}

@media only screen and (min-width: 1400px){
p {
    font-size: 14px;
}
}

.card-block {
    padding: 1.25rem;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.m-b-20 {
    margin-bottom: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.card .card-block p {
    line-height: 25px;
}

.m-b-10 {
    margin-bottom: 10px;
}

.text-muted {
    color: #919aa3 !important;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.f-w-600 {
    font-weight: bold;
	margin: 0;
    font-size:20px;
}

.m-b-20 {
    margin-bottom: 20px;
}

.m-t-40 {
    margin-top: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.m-b-10 {
    margin-bottom: 10px;
}

.m-t-40 {
    margin-top: 20px;
}

.user-card-full .social-link li {
    display: inline-block;
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

</style>
</body>
</html>