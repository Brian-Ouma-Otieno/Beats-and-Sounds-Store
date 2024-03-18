<?php
    require_once '../DB/beats&sounds_db.php';                               
    include '../Includes/head.php';
    include '../Includes/navbar.php';
    include '../Includes/disp_img.php';
    include '../Functions/functions.php';
    
?>

                        
</div>

<h3 class="margin h3">My Cart</h3>

<?php
    // check if user has logged in and if user has logged in proceed with execution
    if (!isset($_SESSION['reg_user'])) {
        $_SESSION['success_flash'] = 'Login to view beats or samples added to your Cart!';
        echo display_errors($_SESSION['success_flash']) ;

    } elseif(isset($_SESSION['reg_user'])) {
    
    $sql_cart = "SELECT * FROM cart WHERE reg_userCartid = $_SESSION[reg_user]";
    $cart_query = mysqli_query($db_connect,$sql_cart);
    $cart_query_num_rows = mysqli_num_rows($cart_query);
    $cartSum = "SELECT SUM(price) AS Totalprice FROM cart WHERE reg_userCartid = $_SESSION[reg_user]";
    $cartSumQuery = mysqli_query($db_connect,$cartSum);
    $cartSumFetch = mysqli_fetch_assoc($cartSumQuery);

    if ($cart_query_num_rows <= 0 ) {
        $_SESSION['success_flash'] = 'Your Cart is Empty!';
        echo display_errors($_SESSION['success_flash']) ;
    } else {

        // deleting single beat from the cart
        // if (isset($_POST['remove'])) {
        //     $sql_cartRemoveid = $_POST['beatremove'];   

        //     // updating feature and regUsercartid
        //     $sql_selectBeatid = "SELECT beat_id FROM cart WHERE id = $sql_cartRemoveid AND reg_userCartid = $_SESSION[reg_user]";
        //     $cart_queryBeatid = mysqli_query($db_connect,$sql_selectBeatid);
        //     $sql_BeatidFetch = mysqli_fetch_assoc($cart_queryBeatid);
        //     $BeatidFetch = $sql_BeatidFetch['beat_id'];
        //     $featureUsercartidUpdate = "UPDATE beats SET featured = 0, reg_userCartid = 0 WHERE id = $BeatidFetch AND reg_userCartid = $_SESSION[reg_user]";
        //     mysqli_query($db_connect,$featureUsercartidUpdate);

        //     // delete beat from cart 
        //     $sql_cartRemove = "DELETE FROM cart WHERE id = $sql_cartRemoveid";
        //     mysqli_query($db_connect,$sql_cartRemove);
        // }

        // // deleting multiple beats from the cart
        // if (isset($_POST['removeAll'])) {
        //     $sql_cartRemoveall = $_POST['beatremoveAll'];
           
        //     // updating feature and regUsercartid
        //     $featureUsercartidUpdate2 = "UPDATE beats SET featured = 0, reg_userCartid = 0 WHERE reg_userCartid = $_SESSION[reg_user]";
        //     mysqli_query($db_connect,$featureUsercartidUpdate2);

        //     // delete all beats from cart
        //     $sql_cartRemoveallQuery = "DELETE FROM cart WHERE reg_userCartid = $sql_cartRemoveall";
        //     mysqli_query($db_connect,$sql_cartRemoveallQuery);
        // }

        
        //  Auto delete items from cart 
        $sql_selectCart = "SELECT * FROM cart WHERE reg_userCartid = $_SESSION[reg_user]";
        $sql_selectCartQuery = mysqli_query($db_connect,$sql_selectCart);
                
        while ($sql_selectCartFetch = mysqli_fetch_assoc($sql_selectCartQuery)) { 
    
            $selectCartDate = $sql_selectCartFetch['expire_date'];
            $selectCartBeatid = $sql_selectCartFetch['beat_id'];
    
            $date=date_create($selectCartDate);
            date_add($date,date_interval_create_from_date_string("1 day"));
            $selectCartDateFormart = date_format($date,"Y-m-d H:i:s");
            
            date_default_timezone_set("Africa/Nairobi");
            $nowDate = date("Y-m-d H:i:s");
            if ($selectCartDateFormart <= $nowDate) { 
                $sql_cartRemove = "DELETE FROM cart WHERE reg_userCartid = $_SESSION[reg_user] AND expire_date = '$selectCartDate'"; 
                mysqli_query($db_connect,$sql_cartRemove);
                $featuredSql = "UPDATE beats SET featured = 0, reg_userCartid = 0 WHERE id = $selectCartBeatid AND reg_userCartid = $_SESSION[reg_user]";
                mysqli_query($db_connect,$featuredSql);        
            } 
        }

?> 

        <?php  while($cart_fetch = mysqli_fetch_assoc($cart_query)):  ?>
            
                <div id="reload" class="margin pos-middle cart-container">
                    <div class="pos-middle item-img genre-container-s-pic" style="background-image: url('<?= $cart_fetch['image']; ?>'); background-size: cover;">
                        <button title="play"><i class="fas fa-play"></i></button>
                    </div>
                    <div class="margin genre-container-s-details">
                        <p><?= $cart_fetch['beat_name']; ?> - <?= $cart_fetch['author']; ?></p>
                        <div class="s-countbar">
                        
                        </div>
                    </div>
                    <p>Price: <?= $cart_fetch['price']; ?></p>
                    <div class="margin genre-container-s-btn pos-middle">
                        <!-- <form action="processingOrders.php" method="post"> -->
                            <input type="hidden" name="checkout" value="<?= $cart_fetch['id'];?>">
                            <button title="check out" id="checkOut" name="checkoutBtn">Check Out</i></button>   
                        <!-- </form> -->
                        <div class="col-1">
                            <input type="hidden" name="beatremove" value="<?= $cart_fetch['id'];?>"> <button type="submit" name="remove" title="remove" onclick="del(<?= $cart_fetch['id'];?>)">Remove</button>
                        </div>                      
                    </div>
                </div>
            
        <?php endwhile; ?>

<?php  
        $sqlPcheckOut = "SELECT * FROM regular_users WHERE id = $_SESSION[reg_user]";
        $PcheckOutQuery = mysqli_query($db_connect,$sqlPcheckOut);
        $PcheckOutFetch = mysqli_fetch_assoc($PcheckOutQuery);
        date_default_timezone_set("Africa/Nairobi");
        $pinCode = 'BSS_'.date("Ymdhis");

        }
       
    }
?>


<!-- check out all and delete all btn -->
<div class="pos-middle">
    <div class="form-group-child col-2 <?=((isset($_SESSION['reg_user']) && $cart_query_num_rows <= 0 || !isset($_SESSION['reg_user']))?'disabled':'');?>">             
        <button type="submit"  name="checkOutAll" value="">Check Out All</button>       
    </div>
    <div class="form-group-child col-2 <?=((isset($_SESSION['reg_user']) && $cart_query_num_rows <= 0 || !isset($_SESSION['reg_user']))?'disabled':'');?>">               
         <button type="submit" name="removeAll" title="remove all" onclick="delAll(<?= ((isset($_SESSION['reg_user']))?$_SESSION['reg_user']:'') ;?>)">Remove All</button>               
    </div>
</div>


<!-- Table -->
<div class="pos-middle">
    <div class="samples margin col-6">
        <table id="t01" class="col-12">
            <tr>
                <th></th>
                <th>No. of Beats </th>
                <th>No. of Packs</th>
            </tr>
            <tr>
                <td colspan=''></td>
                <td><?=((isset($_SESSION['reg_user']) && $cart_query_num_rows > 0 )? $cart_query_num_rows:'0');?></td>
                <td>0</td>
            </tr>
            <tr>
                <td colspan=''>Total</td>
                <td><?=((isset($_SESSION['reg_user']) && $cart_query_num_rows > 0 )? $cartSumFetch['Totalprice']:'0');?></td>
                <td>0</td>
            </tr>
            <tr>
                <td>Grand Total</td>
                <td colspan='2'><?=((isset($_SESSION['reg_user']) && $cart_query_num_rows > 0 )? $cartSumFetch['Totalprice']:'0');?></td>
                <!-- <td colspan='2'>0</td> -->
            </tr>
        </table>
    </div>
</div>



<div class="pos-middle cartModalPos" id="cartModal">   
    <div class="cartPop-up pos-middle">
        <span class="close" id="modalClose">&times;</span>
        <div class="cartOrderprocess">     
            <form action="processOrder.php" method="post" class="form1" id="processOrder">
                <div class="form-control">
                    <label for="">Username</label>
                    <input type="text" id="checkOutusername" value="<?= ((isset($PcheckOutFetch['username']))? $PcheckOutFetch['username']:'') ;?>" readonly>
                </div>
                <div class="form-control">
                    <label for="">Email</label>
                    <input type="email" id="checkOutmail" value="<?= ((isset($PcheckOutFetch['email']))? $PcheckOutFetch['email']:'');?>" readonly>
                </div>
                <div class="form-control">
                    <label for="">Phone Number</label>
                    <input type="text" id="checkOutnum" name="num" placeholder="Enter Phone Number eg. 07xxxxxxxx">
                </div>  
                <div class="form-control">
                    <label for="">Pin Code</label>
                    <input type="text" id="checkOutpin" value="<?= ((isset($pinCode))? $pinCode:'');?>" readonly>
                </div>
                
                <div class="form-group-child">               
                    <button type="submit" id="checkOutbtn"  name="ProChkOut" value="">Confirm Purchase</button>
                </div>
                <div class="chkMessage"></div>
            </form>
        </div>
    </div>
</div>





<!-- Auto delete items from cart -->
<?php

    // $sql_selectCart = "SELECT * FROM cart WHERE reg_userCartid = $_SESSION[reg_user]";
    // $sql_selectCartQuery = mysqli_query($db_connect,$sql_selectCart);
            
    // while ($sql_selectCartFetch = mysqli_fetch_assoc($sql_selectCartQuery)) { 

    //     $selectCartDate = $sql_selectCartFetch['expire_date'];
    //     $selectCartBeatid = $sql_selectCartFetch['beat_id'];

    //     $date=date_create($selectCartDate);
    //     date_add($date,date_interval_create_from_date_string("1 day"));
    //     $selectCartDateFormart = date_format($date,"Y-m-d H:i:s");
        
    //     date_default_timezone_set("Africa/Nairobi");
    //     $nowDate = date("Y-m-d H:i:s");
    //     if ($selectCartDateFormart <= $nowDate) {
    //         $sql_cartRemove = "DELETE FROM cart WHERE reg_userCartid = $_SESSION[reg_user] AND expire_date = '$selectCartDate'"; 
    //         mysqli_query($db_connect,$sql_cartRemove);
    //         $featuredSql = "UPDATE beats SET featured = 0, reg_userCartid = 0 WHERE id = $selectCartBeatid AND reg_userCartid = $_SESSION[reg_user]";
    //         mysqli_query($db_connect,$featuredSql);        
    //     } 
    // }

    include '../Includes/footer.php';
?>
