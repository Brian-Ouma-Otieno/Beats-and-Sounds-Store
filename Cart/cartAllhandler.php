<?php
require_once '../DB/beats&sounds_db.php';
include '../Functions/functions.php';



// deleting multiple beats from the cart
if (isset($_POST['delAllid'])) {
    $sql_cartRemoveall = $_POST['delAllid'];
   
    // updating feature and regUsercartid
    $featureUsercartidUpdate2 = "UPDATE beats SET featured = 0, reg_userCartid = 0 WHERE reg_userCartid = $_SESSION[reg_user]";
    mysqli_query($db_connect,$featureUsercartidUpdate2);

    // delete all beats from cart
    $sql_cartRemoveallQuery = "DELETE FROM cart WHERE reg_userCartid = $sql_cartRemoveall";
    mysqli_query($db_connect,$sql_cartRemoveallQuery);
    
}else{
    header('Location: /Beats and sounds store/');
}












?>