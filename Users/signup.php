<?php 
require_once '../DB/beats&sounds_db.php';
require_once '../Functions/functions.php';
include '../Includes/head.php';
include '../Includes/navbar.php';


if(isset($_POST['signup'])){

    $error = array();
    $success = true;

    // recieving user's inputs
    if(isset($_POST['username_1'])){
        $username = Sanitize_input($_POST['username_1']); 
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
    if(empty($username) || empty($email) || empty($password) || empty($password2)){
        $error[] = 'Fill in all the Fields.';
        $success = false;
    }

    // validate username
    if(!empty($username)) {
        if (!preg_match("/^[A-Za-z0-9\s]*$/",$username)) {
            $error[] = 'Please provide the correct username.';
            $success = false;
        }
    }

    // validate email
    if(isset($email)){
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error[] = 'You must enter a valid email.';
            $success = false;
        }
    }

    // validate password
    if (!empty($password)) {
        if (!preg_match("/^[A-Za-z0-9]*$/",$password)) {
            
            $error[] = 'Please provide the correct password.';
            $success = false;
        }
    }

    // check if the two passwords match
    if ($password != $password2) {

        $error[] = 'Your passwords do not match.';
        $success = false;        
    }

    // checking if email already exist in database
    // $reg_users_check = "SELECT * FROM regular_users WHERE email = '$email'";
    if(isset($email)){
        $reg_users_check = "SELECT * FROM regular_users WHERE email = '$email'";
        $reg_users_query = mysqli_query($db_connect,  $reg_users_check);
        $reg_users_num_row = mysqli_num_rows($reg_users_query);

        if ($reg_users_num_row > 0) {
            $error[] = 'Sorry, the email already exist in our records!';
            $success = false;
        }
    }
    

    if ($success == false) {
        echo display_errors($error[0]);
        

    }else{
        // echo 'You have signed in successfully';

        // insert data to database
        $reg_users_sql_insert = "INSERT INTO regular_users (username, email, password) VALUES(?, ?, ?);";
        $stmt = mysqli_stmt_init($db_connect);
        if (!mysqli_stmt_prepare($stmt, $reg_users_sql_insert)) {
            echo 'There was an error, please try again.';
        } else {
            // harshing password
            $reg_users_password_harsh = password_hash($password,PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $reg_users_password_harsh);
            mysqli_stmt_execute($stmt);                
            header('Location: ../index.php?welcome=ok');
            // echo 'Inserted';
        }
    }
    
    
}

?>

<script>
    var success = <?php echo $success; ?>;

    if(success == false){

        $("#uname, #mail, #pswd, #password2").addClass("form-control.error input");
        // $("#uname, #mail, #pswd, #password2").removeClass();

    }

</script>




<div class="pos-middle">
    <div class="form-container">
        <form action="signup.php" method="POST" class="form1" id="form1">
            <div class="form-control success">
                <input type="text" placeholder="Username" name="username_1" id="uname">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="form-control error">
                <input type="email" placeholder="Email" name="email_1" id="mail">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="form-control">
                <input type="password" placeholder="Password" name="password1" id="pswd">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <div class="form-control">
                <input type="password" placeholder="Confirm Password" name="password2" id="password2">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
            </div>
            <button id="signup-btn" name="signup" type="submit">SignUp</button>
            <small class="signup-error-message"></small>
        </form>
    </div>
</div>







<?php
    include '../Includes/footer.php';
?>
