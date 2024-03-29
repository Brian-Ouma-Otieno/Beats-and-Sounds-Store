<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beats and Sounds Store</title>
    <link rel="stylesheet" href="/Beats and sounds store/css/main.css">
    <link rel="stylesheet" href="/Beats and sounds store/fontawesome-free-6.1.1-web\css\all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://unpkg.com/wavesurfer.js@7"></script>
    <script> window.history.forward(); </script>
   
</head>
<body>

<?php

require_once '../DB/beats&sounds_db.php';
require_once '../Functions/functions.php';

?>


<!-- login form -->
<h1 class="h3 margin">Login</h1>
<div class="pos-middle">
    <div class="form-container">
        <form action="login.php" method="POST" class="form1" id="log_form">
            <div class="form-control">
                <!-- <label for="">Email</label> -->
                <input type="email" placeholder="Email" name="log_mail" id="log_email" required>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <!-- <small>Error Message</small> -->
            </div>
            <div class="form-control">
                <!-- <label for="">Password</label> -->
                <input type="password" placeholder="Password" name="log_password" id="log_pswd" required>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <!-- <small>Error Message</small> -->
            </div>
            <button type="submit" id="log_btn" name="login">Login</button>
            <small class="login-error-message"></small> <br>
            <?php  
                if (isset($_POST['login'])) {
                    $email = sanitize_input($_POST['log_mail']);
                    $password = sanitize_input($_POST['log_password']);
                    validateLogin($email,$password);
                }
            ?>
            <!-- <p>Forgot password?</p><a href="/Beats and sounds store/users/reset-password.php" class="links">Click here</a> -->
        </form>
    </div>
</div>





<?php
    include '../Includes/footer.php';
?>