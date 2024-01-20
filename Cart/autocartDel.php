<?php
require_once '../DB/beats&sounds_db.php';
include '../Functions/functions.php';



// Auto delete beats from the cart
if (isset($_POST['cartAutoDelluserId']) && isset($_POST['selectCartDate']) && isset($_POST['selectCartBeatid'])) {
   
    $cartAutoDelluserId = $_POST['cartAutoDelluserId'];
    $selectCartDate = $_POST['selectCartDate'];
    $selectCartBeatid = $_POST['selectCartBeatid'];

    // auto updating feature and regUsercartid
    $featuredSql = "UPDATE beats SET featured = 0, reg_userCartid = 0 WHERE id = $selectCartBeatid AND reg_userCartid = $cartAutoDelluserId";
    mysqli_query($db_connect,$featuredSql);  

    // auto delete beats from cart
    $sql_cartRemove = "DELETE FROM cart WHERE reg_userCartid = $cartAutoDelluserId AND expire_date = '$selectCartDate'"; 
    mysqli_query($db_connect,$sql_cartRemove);
   
}else{
    header('Location: /Beats and sounds store/');
}