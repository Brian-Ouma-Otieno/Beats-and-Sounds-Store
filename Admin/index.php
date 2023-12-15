<?php
    require_once '../DB/beats&sounds_db.php';
    require_once '../Functions/functions.php';

    // check if user has logged in
    if(!is_logged_in()){
        header('Location: login.php');
    }

    include 'Includes/head.php';
    include 'Includes/navbar.php';
    $h = '100000000';
    $selector = md5(uniqid());
    $selector2 = 'BSS_'.uniqid();
    // $selector3 = 'BSS_'.rand();
    $c = strlen($selector);
    $cc = bin2hex($selector);
    $token = random_bytes(32);
    echo $selector. '<br>';
    echo $selector2. '<br>';
    echo $cc. '<br>';
    echo $c. '<br>';
    // echo $token;
   
    $a = "SELECT * FROM aaa";
    $a_query = mysqli_query($db_connect,$a);
    $aa = mysqli_fetch_assoc($a_query);
    $aaa = mysqli_num_rows($a_query);
    $x = 'BSS_'.$aaa;
    $selector3 = 'BSS'.mt_rand(1000,9999).$aaa;
    echo $selector3. '<br>';
    echo $x. '<br>';
    echo $aaa. '<br>';

    $checkRegisteredUsers ="SELECT * FROM regular_users";
    $checkRegisteredUsersQuery = mysqli_query($db_connect,$checkRegisteredUsers);
    $checkRegisteredUsersNumRows = mysqli_num_rows($checkRegisteredUsersQuery);
    echo 'REGISTERED USER: ' . $checkRegisteredUsersNumRows. '<br>';

    $checkUsersOnline ="SELECT reg_userStatus FROM regular_users WHERE reg_userStatus = 1";
    $checkUsersOnlineQuery = mysqli_query($db_connect,$checkUsersOnline);
    $checkUsersOnlineNumRows = mysqli_num_rows($checkUsersOnlineQuery);
    echo 'ONLINE USER: ' . $checkUsersOnlineNumRows. '<br>';


    





















?>


























<?php
    include 'Includes/footer.php';
?>