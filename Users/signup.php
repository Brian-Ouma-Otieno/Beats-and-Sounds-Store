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
   
</head>
<body>


<?php 
require_once '../DB/beats&sounds_db.php';
require_once '../Functions/functions.php';

?>

<h1 class="h3 margin">SignUp</h1>

<div class="pos-middle">
    <div class="form-container">
        <form action="signup.php" method="POST" class="form1" id="form1">
            <div class="form-control succes">
                <input type="text" placeholder="Firstname" name="firstname" id="uname" required>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="form-control erro">
                <input type="email" placeholder="Email" name="email_1" id="mail" required>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="form-control succes">
                <input type="password" placeholder="Password" name="password1" id="pswd" required>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="form-control">
                <input type="password" placeholder="Confirm Password" name="password2" id="password2" required>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <button id="signup-btn" name="signup" type="submit">SignUp</button>
            <small class="signup-error-message"></small>
            <div id="pswdRequirement">
                <h3>Password must contain the following:</h3>
                <!-- <p id="specialCharacter" class="invalid">A <b>special character (e.g @,#,%,&)</b></p> -->
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>
            <?php  
                if (isset($_POST['signup'])) {
                    
                    // recieving user's inputs
                    if(isset($_POST['firstname'])){
                        $firstname = Sanitize_input($_POST['firstname']); 
                    }  
                    if(isset($_POST['email_1'])){
                        $email = Sanitize_input($_POST['email_1']); 
                    }  
                    if(isset($_POST['password1'])){
                        $password = Sanitize_input($_POST['password1']); 
                    }  
                    if(isset($_POST['password2'])){
                        $password2 = Sanitize_input($_POST['password2']); 
                    } 
                    validateSignup($firstname, $email, $password,$password2);                    
                }
            ?>
        </form>
        
    </div>
        
</div>







<?php
    include '../Includes/footer.php';
?>
