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
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-5 fw-light fs-5">Search Contact</h5>
              <?php echo form_open('Contacts_controller/show');
                echo "<div class='form-floating mb-3'>";
                $email = array(
                'type' => 'text',
                'name' => 'email',
                'class' => 'form-control',
                'placeholder' =>'Enter email here'
                );
                echo form_input($email);
                echo "</div>"; 
              ?>
              <input type="hidden" value="<?php echo $this->session->userdata('id'); ?>" name="idUser" >
              <div class="d-grid">
                <button class="btn btn-outline-primary" type="submit">Search</button>
              </div>
              <hr> 
              <?php echo form_close();?>
                <div class="d-grid">
                  <button role="link" onclick="window.location.href='../main_controller/index'"  class="btn btn-outline-danger">Cancel</button>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<style>
body {
  background: #007bff;
  background: lightblue;
 
}

.container{
    margin: 80px auto;
}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
}

.btn-google {
  color: white !important;
  background-color: #ea4335;
}

.btn-facebook {
  color: white !important;
  background-color: #3b5998;
}

  </style>
</body>
</html>