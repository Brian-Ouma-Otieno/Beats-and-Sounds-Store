<?php

    require_once '../DB/beats&sounds_db.php'; 
    include '../Functions/functions.php';


    if (isset($_SESSION['reg_user'])) {
        if (isset($_POST['Bid'])) {

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
            // $cart_id = $db_connect->insert_id;
            // setcookie($cookie_name, $cart_id, time() + (5), "/");             
            }

            // if(isset($_GET['featured'])){
            //     $Displayid = (int)$_GET['id'];
            //     $featured = (int)$_GET['featured'];
                $featuredSql = "UPDATE beats SET featured = '$featured' WHERE id = '$beat_id'";
                $beatRegSql = "UPDATE beats SET reg_userCartid = '$reg_userCartid' WHERE id = '$beat_id'";
                // $featuredSql = "UPDATE beats SET featured = '$featured', reg_userCartid = '$reg_userCartid' WHERE id = $beat_id AND reg_userCartid = $_SESSION[reg_user]";
                mysqli_query($db_connect,$featuredSql);
                mysqli_query($db_connect,$beatRegSql);
                // header('Location: products.php');
            // }   
                                
        } 
    }else {
        header("Location: /Beats and sounds store/users/login.php");
    }










?>