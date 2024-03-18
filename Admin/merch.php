<?php
    require_once '../DB/beats&sounds_db.php';
    require_once '../Functions/functions.php';

    // check if user has logged in
    if(!is_logged_in()){
        login_error_redirect();
    }
    include 'includes/head.php';
    include 'Includes/navbar.php';
   

    // $sql_gnr = "SELECT * FROM genre WHERE parent = 0";
    // $sql_gnr_query = mysqli_query($db_connect, $sql_gnr);
?>

























<?php
    include 'Includes/footer.php';
?>