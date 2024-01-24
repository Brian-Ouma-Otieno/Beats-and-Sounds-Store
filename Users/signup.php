<?php 
require_once '../DB/beats&sounds_db.php';
require_once '../Functions/functions.php';
include '../Includes/head.php';
include '../Includes/navbar.php';


if(isset($_POST['signup'])){

    $error = array();
    $success = true;

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

    // checking if all the inputs are filled
    if(empty($firstname) || empty($email) || empty($password) || empty($password2)){
        $error[] = 'Fill in all the Fields.';
        $success = false;
    }

    // validate username
    if(!empty($firstname)) {
        if (!preg_match("/^[A-Za-z0-9\s]*$/",$firstname)) {
            $error[] = 'Please provide the correct name.';
            $success = false;
        }
    }

    // validate email
    if(isset($email)){
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error[] = 'Provide a valid email.';
            $success = false;
        }
    }

    // validate password
    if (!empty($password)) {
        // check password length
        $passwordLength = strlen($password);
        if ($passwordLength < 8) {
            
            $error[] = 'Your password is to short.';
            $success = false;
        }

        // check regular expression
        if (!preg_match("/^[A-Za-z0-9]*$/",$password)) {
            
            $error[] = 'Provide the correct password.';
            $success = false;
        }
    }

    // check if the two passwords match
    if ($password !== $password2) {

        $error[] = 'Your passwords do not match.';
        $success = false;        
    }

    // checking if email already exist in database
    if(isset($email)){
        $reg_users_check = "SELECT * FROM regular_users WHERE email = '$email'";
        $reg_users_query = mysqli_query($db_connect,  $reg_users_check);
        $reg_users_num_row = mysqli_num_rows($reg_users_query);

        if ($reg_users_num_row > 0) {
            $error[] = 'Sorry, the email already exist !';
            $success = false;
        }
    }
    

    if ($success == false) {
        echo display_errors($error[0]);
        

    }else{

        // insert data to database
        $reg_users_sql_insert = "INSERT INTO regular_users (username, email, password) VALUES(?, ?, ?);";
        $stmt = mysqli_stmt_init($db_connect);
        if (!mysqli_stmt_prepare($stmt, $reg_users_sql_insert)) {
            echo 'There was an error, please try again.';
        } else {
            // harshing password
            $reg_users_password_harsh = password_hash($password,PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "sss", $firstname, $email, $reg_users_password_harsh);
            mysqli_stmt_execute($stmt);                
            header('Location: ../index.php?welcome=ok');
            // echo 'Inserted';
        }
    }
    
    
}

?>


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
        </form>
        
    </div>
        
</div>







<?php
    include '../Includes/footer.php';
?>
