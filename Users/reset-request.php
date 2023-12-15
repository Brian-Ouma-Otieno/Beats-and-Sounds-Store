<?php

require_once '../Functions/functions.php';

if (isset($_POST['reset-request-submit'])) {

    $userEmail = Sanitize_input($_POST["email"]);

    $error = array();
    $success = true;

    if(empty($userEmail)){
        $error[] = 'You must provide email !';
        $success = false;

    } 

    // validate email
    if(!filter_var($userEmail,FILTER_VALIDATE_EMAIL)){
        $error[] = 'You must enter a valid email.';
        $success = false;
    }

    if($success == false){
        echo $error[0];
    }else{



        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        $url = "/Beats and sounds store/users/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

        $expires = date("U") + 1800;

        require_once '../DB/beats&sounds_db.php';


        $sql = "DELETE FROM pwdreset WHERE pwdResetEmail = ?;";
        $stmt = mysqli_stmt_init($db_connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo 'There was an error, please try again.';
        } else {

            mysqli_stmt_bind_param($stmt, "s", $userEmail);
            mysqli_stmt_execute($stmt);                
        }


        $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($db_connect);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo 'There was an error, please try again.';
        } else {

            $harshedToken = password_hash($token,PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $harshedToken, $expires);
            mysqli_stmt_execute($stmt);                
        }

        mysqli_stmt_close($stmt);
        mysqli_close($db_connect);

        $to = $userEmail;

        $subject = 'Reset your password';

        $message = '<p>We received a password reset request. The link to reset your password is below.<br>';
        $message .= '<a href="' . $url . '">' . $url . '</a></p>'; 

        $hearders = "From: mmtuts <brianalkaline51@gmail.com>\r\n";
        $hearders .= "Reply-To: brianalkaline51@gmail.com\r\n";
        $hearders .= "Content-type: text/html\r\n";

        mail($to, $subject, $message, $hearders);

        header("Location: reset-password.php?reset=success");
    }

    

}else {
    header("Location: /Beats and sounds store");
}



















