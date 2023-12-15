<?php
    require_once '../DB/beats&sounds_db.php';
    require_once '../Functions/functions.php';
    include '../Includes/head.php';
    include '../Includes/navbar.php';   
?>



<?php

    $selector = $_GET["selector"];
    $validator = $_GET["validator"];

    if (empty($selector) || empty($validator)) {

        echo "Could not validate your request!"; 

    }else {
        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
?>        
      
        <form action="reset-password.inc.php" method="post">
            <input type="hidden" name="selector" value="<?php echo $selector; ?>">
            <input type="hidden" name="validator" value="<?php echo $validator; ?>">
            <input type="password" name="pwd" placeholder="Enter a new password...">
            <input type="password" name="pwd-repeat" placeholder="Repeat new password">
            <button type="submit" name="reset-password-submit">Reset password</button>
        </form>


<?php   

        }
    }

?>










<?php
    include '../Includes/footer.php';
?>