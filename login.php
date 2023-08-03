<?php
session_start();
if(!empty($_SESSION['user_id'])){
    header("Location: index.php", true, 301);
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>jQuery, Ajax, PHP, MySQL</title>

        <!-- jQuery -->    
        <script src="lib/jquery.min.js"></script>

         <!-- bootstrap -->
         <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <!-- Custom -->
        <script src="js/script.js"></script>

        <link href="css/style.css" rel="stylesheet" type="text/css">

        <!-- Sweet Alert -->
        <!-- https://sweetalert2.github.io/#examples -->
        <script src="lib/sweet-alert/sweetalert2.min.js"></script>
        <link href="lib/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css">
        
        <style>
            body {
                    width: 100vw;
            height: 100vh;
            background-image: url('assets/images/bg.jpg');
            background-position: bottom;
            background-size: cover;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            }
        </style>

        



    </head>
    <body>
        <div class="login-box">
    <img src="assets/images/FU_logo.png" class="avatar">
    <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Login
            </div>
            <div class="title signup">
               Signup
            </div>
         </div>
         <div class="form-container">
            <div id="login-message" class=""></div>
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div>
        <div class="form-inner">
          <form id="login-form" class="login" method="post">
            <div class="field">
              <div id="login-message" class=""></div>
               <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="field">
               <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <div class="pass-link">
               <a href="#">Forgot password?</a>
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
               <input type="submit" name="login" value="Login">
            </div>

            <div class="signup-link">
               Not a member? <a href="">Signup now</a>
            </div>
         </form>
         <form id= "signup-form" class ="signup" method="post">
                    <div class="field">
                        <div id="login-message" class=""></div>
                        <input type="text" name="firstname" placeholder="First name" required>
                        
                    </div>
                    <div class="field">
                        <input type="text" name="lastname" placeholder="Last name" required>
                      
                    </div>
                    <div class="field">
                        <input type="text" name="email" placeholder="Email" required>
                        
                    </div>
                    <div class="field">
                        <input type="text" name="username" placeholder="Username" required>
                        
                    </div>
                    <div class="field">
                        <input type="password" name="password" placeholder="Password" required>
                        
                    </div>
                    <div class="field">
                        <input type="password" name="confirm-password" placeholder="Confirm password" required>
                        
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" name="register" value="Create Account">
                    </div>
                </form>
        </div>
        <script src="js/transition.js"></script>
    </body>

</html>