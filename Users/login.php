<?php

require_once '../DB/beats&sounds_db.php';
require_once '../Functions/functions.php';
// include '../Includes/head.php';
// include '../Includes/navbar.php';

// if (isset($_POST['login'])) {

//     $email = sanitize_input($_POST['log_mail']);
//     $password = sanitize_input($_POST['log_password']);

//     $error = array();
//     $success = true;

//     if(empty($email) || empty($password)){
//         $error[] = 'You must provide email and Password.';
//         $success = false;

//     } 

//     // validate email
//     if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
//         $error[] = 'You must enter a valid email.';
//         $success = false;
//     }
    
//     if (!empty($password)) {
//         if (!preg_match("/^[A-Za-z0-9\s]*$/",$password)) {
            
//             $error[] = 'Please provide the correct password.';
//             $success = false;
//         }
//     }

//     // check if email exist in database
//     $user_query = mysqli_query($db_connect,"SELECT * FROM regular_users WHERE email = '$email'");
//     $user_fetch = mysqli_fetch_assoc($user_query);
//     $userCount = mysqli_num_rows($user_query);
//     if($userCount < 1){
//         $error[] = 'That email doesn\'t exist in our database';
//         $success = false;
//     }

//     if(!password_verify($password, @$user_fetch['password'])){
//         $error[] = 'The password does not match our records.Please try again';
//         $success = false;
//     }

//     // check for errors
//     if($success == false){
//         echo display_errors($error[0]);

//     }else{

//         $reg_user_id = $user_fetch['id'];

//         $checkIfuserActive = "SELECT * FROM regular_users WHERE id = '$reg_user_id' AND reg_userStatus = 1";
//         $checkIfuserActiveQuery = mysqli_query($db_connect,$checkIfuserActive);
//         $checkIfuserActiveNumRows = mysqli_num_rows($checkIfuserActiveQuery);

//         // check if user is already active
//         if ($checkIfuserActiveNumRows > 0) {
//             $userExist = 'User Already Active';
//             echo display_errors($userExist);
//         } else {
//             // log user in       
//             reg_user_login($reg_user_id);
//             header("Location: /Beats and sounds store");
//         }
               
//     }
    

// }else {
//     // header("Location: /Beats and sounds store");
// }

include '../Includes/head.php';
include '../Includes/navbar.php';

?>


<?php
    if (isset($_SESSION['reg_user'])) {
        echo '<a class="pos-middle tomato" title="home" href="/Beats and sounds store/">Go To Home Page</i></a>';
    } else { 
?>

<!-- login form -->
<h1 class="h3 margin">Login</h1>
<div class="pos-middle">
    <div class="form-container">
        <form action="login.php" method="POST" class="form1" id="log_form">
            <div class="form-control">
                <!-- <label for="">Email</label> -->
                <input type="email" placeholder="Email" name="log_mail" id="log_email">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <!-- <small>Error Message</small> -->
            </div>
            <div class="form-control">
                <!-- <label for="">Password</label> -->
                <input type="password" placeholder="Password" name="log_password" id="log_pswd">
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
            <p>Forgot password?</p><a href="/Beats and sounds store/users/reset-password.php" class="links">Click here</a>
        </form>
    </div>
</div>

<?php
    }   
?>






<?php
    include '../Includes/footer.php';
?>