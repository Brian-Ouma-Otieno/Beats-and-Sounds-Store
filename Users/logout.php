<?php 
    require_once '../DB/beats&sounds_db.php';
    require_once '../Functions/functions.php';

    // if(is_logged_in()){
        $reg_user_id = $_SESSION['reg_user'];
        mysqli_query($db_connect,"UPDATE regular_users SET reg_userStatus = 0 WHERE id = $reg_user_id");
        unset($_SESSION['reg_user']);
        header('Location: /Beats and sounds store/');
    // }
      

    
?>