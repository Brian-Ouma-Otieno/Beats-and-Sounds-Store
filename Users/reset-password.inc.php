<?php   
    require_once '../Functions/functions.php';


    if (isset($_POST['reset-password-submit'])) {

        $selector = Sanitize_input($_POST["selector"]);
        $validator = Sanitize_input($_POST["validator"]);
        $password = Sanitize_input($_POST["pwd"]);
        $passwordRepeat = Sanitize_input($_POST["pwd-repeat"]);

        $error = array();
        $success = true;

        if(empty($password) || empty($passwordRepeat)){

            $error[] = 'Fill the password fields!';
            $success = false;

        } 

        if($password != $passwordRepeat){

            $error[] = 'The passwords don\'t match!';
            $success = false;

        } 
               
        if($success == false){
            echo $error[0];
        }


        $currentDate = date("U");

        require_once '../DB/beats&sounds_db.php';

        $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector = ? AND pwdResetExpires >= ?;";
        $stmt = mysqli_stmt_init($db_connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo 'There was an error, please try again.';
        } else {

            mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
            mysqli_stmt_execute($stmt);   
            
            $result = mysqli_stmt_get_result($stmt);
            if (!$row = mysqli_fetch_assoc($result)) {
                echo "You need to re-submit your request";
            } else {
                
                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $row['pwdResetToken']);

                if ($tokenCheck === false) {
                    echo "You need to re-submit your request";
                } elseif ($tokenCheck === true) {
                    $tokenEmail = $row['pwdResetEmail'];

                    $sql = "SELECT * FROM regular_users WHERE email = ?;";
                    $stmt = mysqli_stmt_init($db_connect);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo 'There was an error, please try again.';
                    } else {
                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                        mysqli_stmt_execute($stmt);   
                        
                        $result = mysqli_stmt_get_result($stmt);
                        if (!$row = mysqli_fetch_assoc($result)) {
                            echo "There was an error";
                        } else {
                            $sql = "UPDATE regular_users SET password = ? WHERE email = ?;";
                            $stmt = mysqli_stmt_init($db_connect);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo 'There was an error, please try again.';
                            } else {
                                $newPwdHashed = password_hash($password, PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt, "ss", $newPwdHashed, $tokenEmail);
                                mysqli_stmt_execute($stmt);   

                                $sql = "DELETE FROM pwdReset WHERE pwdResetEmail = ?;";
                                $stmt = mysqli_stmt_init($db_connect);
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    echo 'There was an error, please try again.';
                                } else {                                    
                                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                    mysqli_stmt_execute($stmt);  
                                    header("Location: Users/login.php");
                                }

                            }

                        }
                    }
                }
                
            }
            
        }


    }else {
        header("Location: /Beats and sounds store");
    }













?>