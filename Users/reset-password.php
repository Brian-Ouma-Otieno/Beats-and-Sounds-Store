<?php
    require_once '../DB/beats&sounds_db.php';
    require_once '../Functions/functions.php';
    include '../Includes/head.php';
    include '../Includes/navbar.php';

   
?>

<h1>Reset your password</h1>
<p>An e-mail will be sent to you with instructions on how to reset your password.</p>
<form action="reset-request.php" method="post">
    <input type="email" name="email" placeholder="Enter Your Email Address...">
    <button type="submit" name="reset-request-submit">Receive new password by email</button>
</form>
<?php

    if (isset($_GET['reset'])) {
        if ($_GET['reset'] == 'success') {
            echo 'Check your email!';
        }
    }

?>










<?php
    include '../Includes/footer.php';
?>