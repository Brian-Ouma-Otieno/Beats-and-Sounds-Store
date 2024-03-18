<?php

    require_once '../DB/beats&sounds_db.php'; 
    include '../Functions/functions.php';

  
    if (isset($_POST['Bid'])) {
        if (isset($_SESSION['reg_user'])) {
            $reg_userCartid = $_SESSION['reg_user'];
            $beat_id = $_POST['Bid'];
            $featured = 1;
        

            $beatSelectQ = mysqli_query($db_connect,"SELECT * FROM beats WHERE id = '$beat_id'");
            $beatSelectF = mysqli_fetch_assoc($beatSelectQ);  
            $Code = 'BSS'.mt_rand(1000,9999).$beat_id;


            date_default_timezone_set("Africa/Nairobi");
            $cart_expireDate = date("Y-m-d H:i:s");
            $BS_sql_insert = "INSERT INTO cart (beat_id, genre ,beat_name, author, image, price, audio, expire_date, reg_userCartid, code) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
            $stmt = mysqli_stmt_init($db_connect);
            if (!mysqli_stmt_prepare($stmt, $BS_sql_insert)) {
                echo 'There was an error, please try again.';
            } else {

            mysqli_stmt_bind_param($stmt, "isssssssis", $beat_id, $beatSelectF['genre'], $beatSelectF['beat_name'], $beatSelectF['author'], $beatSelectF['image'], $beatSelectF['price'], $beatSelectF['audio'],
            $cart_expireDate, $reg_userCartid, $Code);
            mysqli_stmt_execute($stmt);   

            }
            $featuredSql = "UPDATE beats SET featured = '$featured' WHERE id = '$beat_id'";
            $beatRegSql = "UPDATE beats SET reg_userCartid = '$reg_userCartid' WHERE id = '$beat_id'";
            mysqli_query($db_connect,$featuredSql);
            mysqli_query($db_connect,$beatRegSql);        
        } 
    }else {
        header("Location: /Beats and sounds store");
    }










?>