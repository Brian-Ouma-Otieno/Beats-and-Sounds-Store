<?php
    require_once '../DB/beats&sounds_db.php';
    require_once '../Functions/functions.php';
    include 'Includes/head.php';
    

    // $sql_gnr = "SELECT * FROM genre WHERE parent = 0";
    // $sql_gnr_query = mysqli_query($db_connect, $sql_gnr);
   

    if (isset($_POST['log'])) {


        $email = sanitize_input($_POST['email']);
        $password = sanitize_input($_POST['password']);

        $error = array();
        $success = true;

        if(empty($email) || empty($password)){
            $error[] = 'You must provide email and Password.';
            $success = false;
            // exit();
        } 

        // validate email
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error[] = 'You must enter a valid email.';
            $success = false;
        }
        
        if (!empty($password)) {
            if (!preg_match("/^[A-Za-z0-9\s]*$/",$password)) {
                
                $error[] = 'Please provide the correct password.';
                $success = false;
            }
            // exit();
        }

        // check if email exist in database
        $user_query = mysqli_query($db_connect,"SELECT * FROM admin_editor_users WHERE email = '$email'");
        $user_fetch = mysqli_fetch_assoc($user_query);
        $userCount = mysqli_num_rows($user_query);
        if($userCount < 1){
            $error[] = 'That email doesn\'t exist in our database';
            $success = false;
        }

        // if(!password_verify($password, @$user_fetch['password'])){
        //     $error[] = 'The password does not match our records.Please try again';
        //     $success = false;
        // }
        if($password !== @$user_fetch['password']){
            $error[] = 'The password does not match our records.Please try again';
            $success = false;
        }

        // check for errors
        if($success == false){
            echo display_errors($error[0]);
        }else{
            // log user in
            $admin_editor_id = $user_fetch['id'];
            login($admin_editor_id);
        }
        

    }


?>


<!-- Admin login form -->
<h1 class="h3">Login</h1>
<hr class="margin">
<div class="pos-middle">
    <div class="form-container">
        <form action="login.php" method="post"class="form1" >
            <div class="form-control">
                <input type="text" name="email" id="email" class="" placeholder="Email">
            </div>
            <div class="form-control">
                <input type="password" name="password" id="password" class="" placeholder="Password">
            </div>
            <button type="submit" id="log" name="log">Login</button>
            <p class="text-right"><a href="/Beats and sounds store/" alt="home" class="links">Visit Site</a></p>
        </form>
    </div>
</div>









<?php
    include 'Includes/footer.php';
?>