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


    </head>
    <body>

        <div class="login-wrapper">
            <form id="login-form" method="POST">
                <h5 class="title">User Login</h5>
                <div class="form-group">
                    <div id="login-message" class=""></div>
                    <div class="form-section"><input type="text" value="" name="username" class="form-control" placeholder="Username"></div>
                    <div class="form-section"><input type="password" value="" name="password" class="form-control" placeholder="Password"></div>
                    <div class="form-section"><input type="submit" value="Login" class="btn btn-primary"></div>
                </div>
            </form>
        <div>
    </body>

</html>