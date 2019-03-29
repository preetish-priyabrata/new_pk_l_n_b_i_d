<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V8</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="<?=base_url()?>file_css_admin/444.jpg"/>
<!--===============================================================================================-->
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
   <!--  <link rel="stylesheet" type="text/css" href="<?=base_url()?>vendors_login/vendor/bootstrap/css/bootstrap.min.css"> -->
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>vendors_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>vendors_login/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>vendors_login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>vendors_login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>vendors_login/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>vendors_login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>vendors_login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>vendors_login/css/main.css">
<!--===============================================================================================-->
</head>
<body class="logo">
   <!--  <div class="logo"> -->
  <!--   <img src="<?=base_url()?>vendors_login/trianglify.svg"  alt="Kiwi standing on oval"> -->
<!-- <object type="image/svg+xml"  class="logo"> </object> -->
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form p-l-55 p-r-55 p-t-110" action="<?=base_url()?>vendor/login-process"  method="POST">
                    <span class="login100-form-title">
                        Vendor Login Panel
                    </span>
               
                    <?php
                        if(!empty($this->session->flashdata('error_msg'))) {
                    ?>
                    <div class="text-center p-t-10">
                     <div class="alert alert-danger">
                        <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
                        <strong>Error !</strong>  <?=$this->session->flashdata('error_msg')?>
                        </div>
                    </div>
                    <?php

                  }else if(!empty($this->session->flashdata('success_message'))){
                     ?>
                     <div class="text-center p-t-10 p-b-20">
                        <div class="alert alert-success">                          
                          <strong>Success</strong> <?=$this->session->flashdata('success_message')?>
                        </div>
                    </div>
                    <?php

                  }else{

                  }
                  ?>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                        <input class="input100" type="text"  id="user_login" name='user_login' autocomplete="off" placeholder="Email or Username">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Please enter password">
                        <input class="input100" type="password" id="user_pass" name="user_pass" autocomplete="off" placeholder="Password">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="text-right p-t-10 p-b-20">
                    </div>
                   

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Sign in
                        </button>
                    </div>
                    <div class="flex-col-c p-t-58 p-b-40">
                    </div>

                </form>
            </div>
        </div>
    </div>
    
    
<!--===============================================================================================-->
    <script src="<?=base_url()?>vendors_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="<?=base_url()?>vendors_login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="<?=base_url()?>vendors_login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?=base_url()?>vendors_login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="<?=base_url()?>vendors_login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="<?=base_url()?>vendors_login/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?=base_url()?>vendors_login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="<?=base_url()?>vendors_login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="<?=base_url()?>vendors_login/js/main.js"></script>
 <!-- </div> -->
</body>
</html>