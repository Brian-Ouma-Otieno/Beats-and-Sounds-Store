<?php
require_once '../DB/beats&sounds_db.php';
include '../Functions/functions.php';



// deleting single beat from the cart
if (isset($_POST['Delid'])) {
    $sql_cartRemoveid = $_POST['Delid'];   

    // updating feature and regUsercartid
    $sql_selectBeatid = "SELECT beat_id FROM cart WHERE id = $sql_cartRemoveid AND reg_userCartid = $_SESSION[reg_user]";
    $cart_queryBeatid = mysqli_query($db_connect,$sql_selectBeatid);
    $sql_BeatidFetch = mysqli_fetch_assoc($cart_queryBeatid);
    $BeatidFetch = $sql_BeatidFetch['beat_id'];
    $featureUsercartidUpdate = "UPDATE beats SET featured = 0, reg_userCartid = 0 WHERE id = $BeatidFetch AND reg_userCartid = $_SESSION[reg_user]";
    mysqli_query($db_connect,$featureUsercartidUpdate);

    // delete beat from cart 
    $sql_cartRemove = "DELETE FROM cart WHERE id = $sql_cartRemoveid";
    mysqli_query($db_connect,$sql_cartRemove);
    
}else{
    header('Location: /Beats and sounds store/');
}












?>