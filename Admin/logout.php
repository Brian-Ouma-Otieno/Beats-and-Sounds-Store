<?php 
    require_once '../DB/beats&sounds_db.php';
    require_once '../Functions/functions.php';
    unset($_SESSION['AEuser']);
    header('Location: login.php');
?>