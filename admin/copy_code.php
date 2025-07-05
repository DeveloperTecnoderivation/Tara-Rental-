<?php
include("conn-web/cw.php");
//include("function.php");
if($_SESSION["tata_login_username"]){
  header('location: dashboard.php'); 
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <!-- For IE -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- For Resposive Device -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Tara Rental Admin</title>
      <script src="<?php echo $base_url ?>/assets/js/jQuery-2.1.4.min.js"></script>
          <link rel="icon" href="<?php echo $base_url ?>/assets/img/logo2.png" type="image/png" sizes="16x16">
          <!-- Bootstrap -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <link href="<?php echo $base_url ?>/assets/css/bootstrap.min.css" rel="stylesheet"  media="all">
          <link href="<?php echo $base_url ?>/assets/css/bootstrap-responsive.min.css" rel="stylesheet"  media="all">
          <link href="<?php echo $base_url ?>/assets/css/styles.css" rel="stylesheet"  media="all">
          <link href="<?php echo $base_url ?>/assets/css/custom.css" rel="stylesheet"  media="all">
          <script src="<?php echo $base_url ?>/assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="<?php echo $base_url ?>/assets/js/jquery-ui.min.js"></script>
        <link href="<?php echo $base_url ?>/assets/css/jquery-ui.min.css" rel="stylesheet"  media="all">
        <link rel="stylesheet" href="<?php echo $base_url ?>/assets/css/font-awesome.min.css">
  </head>

  <body id="login" style="background-image: url(<?php echo $base_url ?>/assets/img/bg-1.jpg);" class="admin-a">
    <div class="container">
      <form action=""  name="login-form" class="form-signin" accept-charset="utf-8">
          <div class="admin-logo"><img alt="" src="<?php echo $base_url ?>/assets/img/logo2.png" ></div>
          <div id="error_invalid" class="error_msg_invalid" style="display: none"></div>
            <h2 class="form-signin-heading">Please Login</h2>
            <input type="text" name="username"  class="input-block-level" id="username" placeholder="Username/Email"  />
            <div id="error_username" class="error_msg"></div>
            <input type="password" name="password"  class="input-block-level" id="password" placeholder="Password"/>
            <div id="error_password" class="error_msg"></div>
            <div class="row-fluid">
               <div class="span12 text-center"><input type="button" name="login" value="Login"  class="btn btn-large btn-primary" id="login_btn" />
              </div>
            </div>
            <!-- <div class="row-fluid">
                <div class="span12 text-center">
                  <a  href="">Forgot Password?</a>
                </div>
            </div>  -->   
        </form>
    </div> <!-- /container -->
    
  
 
  <script>
    $(document).ready(function() {
      // alert();
      $("#login_btn").click(function() {
        
        var error = 1;
        var username = $("#username").val();
        var password = $("#password").val();

        if((username == '') || (username == undefined)){
          $("#error_username").text("This field are required");
          error = 0;
        }else{
          $("#error_username").text("");
          
        }
        if((password == '') || (password == undefined)){
          $("#error_password").text("This field are required");
          error = 0;
        }else{
          $("#error_password").text("");
         
        }

        if(error == 1){

            $.ajax({
                url: 'ajax/login_page.php',
                type: 'post',
                data: {
                  username: username,
                  password: password
                },
                success: function(response) {
                  
                  if (response == 1) {
                   window.location.href = 'dashboard.php';
                  }else{
                    $('#error_invalid').css('display','block');
                    $("#error_invalid").text("Invalid Username or Password");
                  } 
                }
              });
        }
         

        
      });
    });
  </script>
  <script src="<?php echo $base_url ?>/assets/js/chosen.jquery.min.js"></script>
<link href="<?php echo $base_url ?>/assets/css/chosen.min.css" rel="stylesheet" media="screen">

<script src="<?php echo $base_url ?>/assets/js/bootstrap.min.js"></script>
<script src="<?php echo $base_url ?>/assets/js/scripts.js"></script> 
  </body>
</html>