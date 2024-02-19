<?php
    require_once '../DB/beats&sounds_db.php';
    require_once '../Functions/functions.php';
    include '../Includes/head.php';
    include '../Includes/navbar.php';

   
?>
    <h1 class="h3 margin">Reset your password</h1> 
    <hr class="margin">
    <div class="pos-middle">
        <p>An e-mail will be sent to you with instructions on how to reset your password.</p> 
    </div>

    <div class="pos-middle">      
        <div class="form-container">
            <form action="reset-request.php" method="post" class="form1">
                <div class="form-control">
                    <input type="email" name="email" placeholder="Enter Your Email Address...">
                </div>
                <button type="submit" name="reset-request-submit">Receive new password by email</button>
            </form>
        </div>
        
    </div>
    

<?php

    if (isset($_GET['reset'])) {
        if ($_GET['reset'] == 'success') {
            echo display_errors('Check your email!'); 
        }
    }

?>










<?php
    include '../Includes/footer.php';
?>