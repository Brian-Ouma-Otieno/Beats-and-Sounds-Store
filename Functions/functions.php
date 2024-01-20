<?php 

    //function defined for escaping form values and sanitizing input
    function Sanitize_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);        
        return $data;
    }

    function pretty_date($date){
        
        return date("M d, Y h:i A",strtotime($date));
    }


    function display_errors($error){
        $display = '<ul class="bg-danger">';
            $display .= '<li class="tomato pos-middle" style="padding:20px;">'.$error.'</li>';
        $display .= '</ul>';
        return $display;
    }


    // user admin/editor login set session function
    function login($admin_editor_id){
        $_SESSION['AEuser'] = $admin_editor_id;
        global $db_connect;
        $date = date("Y-m-d H:i:s");
        mysqli_query($db_connect,"UPDATE admin_editor_users SET last_login = '$date' WHERE id = $admin_editor_id");
        $_SESSION['success_flash'] = 'You are now logged in!';
        header('Location: index.php');
    }

    // reg_user login set session function
    function reg_user_login($reg_user_id){
        $_SESSION['reg_user'] = $reg_user_id;
        global $db_connect;
        date_default_timezone_set("Africa/Nairobi");
        $date = date("Y-m-d H:i:s");
        mysqli_query($db_connect,"UPDATE regular_users SET last_login = '$date' WHERE id = $reg_user_id");
        mysqli_query($db_connect,"UPDATE regular_users SET reg_userStatus = 1 WHERE id = $reg_user_id");
        // $_SESSION['success_flash'] = 'You are now logged in!';
        // header('Location: /Beats and sounds store/');
    }

    // check if user is logged in
    function is_logged_in(){
        if(isset($_SESSION['AEuser']) && $_SESSION['AEuser'] > 0){
            return true;  
        }
        return false;

        if(isset($_SESSION['reg_user']) && $_SESSION['reg_user'] > 0){
            return true;  
        }
        return false;
    }

    // user login error function
    function login_error_redirect($url = 'login.php'){
        $_SESSION['error_flash'] = 'You must be logged in to access the page';
        header('Location: '.$url);
    }


    // processing login details
    function validateLogin($email,$password)  { 
        
        $error = array();
        $success = true;
        global $db_connect;

        if(empty($email) || empty($password)){
            $error[] = 'Please provide email and Password.';
            $success = false;

        } 

        // validate email
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error[] = 'Provide a valid email.';
            $success = false;
        }
        
        if (!empty($password)) {
            if (!preg_match("/^[A-Za-z0-9\s]*$/",$password)) {
                
                $error[] = 'Provide the correct password.';
                $success = false;
            }
        }

        // check if email exist in database
        $user_query = mysqli_query($db_connect,"SELECT * FROM regular_users WHERE email = '$email'");
        $user_fetch = mysqli_fetch_assoc($user_query);
        $userCount = mysqli_num_rows($user_query);
        if($userCount < 1){
            $error[] = 'Provide the correct email.';
            $success = false;
        }

        if(!password_verify($password, @$user_fetch['password'])){
            $error[] = 'The email and password does not match.';
            $success = false;
        }

        // check for errors
        if($success == false){
            echo display_errors($error[0]);

        }else{

            $reg_user_id = $user_fetch['id'];

            $checkIfuserActive = "SELECT * FROM regular_users WHERE id = '$reg_user_id' AND reg_userStatus = 1";
            $checkIfuserActiveQuery = mysqli_query($db_connect,$checkIfuserActive);
            $checkIfuserActiveNumRows = mysqli_num_rows($checkIfuserActiveQuery);

            // check if user is already active
            if ($checkIfuserActiveNumRows > 0) {
                $userExist = 'User Already Active';
                echo display_errors($userExist);
                // $error[] = 'User Already Active';
                // $success = false;
            } else {
                // log user in       
                reg_user_login($reg_user_id);
                // header("Location: /Beats and sounds store");
            }
                
        }
            
            // if($success == false){
            //     echo display_errors($error[0]);
            // }
    
        // return display_errors($error[0]);
    }
















    // form validation funtions
    // function emptyInputsignup($username,$email,$password,$password2){
    //     $result = '';
        
    //     if (empty($username) || empty($email) || empty($password) || empty($password2)) {
            
    //         $result = true;
    //     } else {
    //         $result = false;
    //     }
        
    //     return $result;
    // }

    // function username($username){
    //     $result = '' ;
        
    //     if (!preg_match("/^[A-Za-z0-9]*$/",$username)) {
            
    //         $result = true;
    //     } else {
    //         $result = false;
    //     }
        
    //     return $result;
    // }

    // function email($email){
    //     $result = '' ;
        
    //     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
    //         $result = true;
    //     } else {
    //         $result = false;
    //     }
        
    //     return $result;
    // }
 



?>