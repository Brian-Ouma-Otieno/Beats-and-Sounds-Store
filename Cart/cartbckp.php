<?php
    require_once '../DB/beats&sounds_db.php';                               
    include '../Includes/head.php';
    include '../Includes/navbar.php';
    include '../Functions/functions.php';
    
    // $reg_userCartid = $_SESSION['reg_user'];
    // // $l = mysqli_query($db_connect,"SELECT beats_and_samples FROM cart WHERE reg_userCartid = '$reg_userCartid'");
    // $l = mysqli_query($db_connect,"SELECT beats_and_samples FROM cart WHERE reg_userCartid = '$reg_userCartid'");
    // $ll = mysqli_fetch_assoc($l);
    // $k = mysqli_num_rows($l);
    // $p = json_decode($ll['beats_and_samples']);
    // $item = '{"Bid":"1"}';
    // $k = json_decode($item,true);
    
?>

<!-- display and search section -->
<div class="disp-img margin pos-middle" style="height:500px; background-image: url('/Beats and sounds store/Images/images/pexels-hendrik-b-744318.jpg'); background-size: cover;">           
                        
</div>

<h3 class="margin h3">My Cart</h3>



<?php
    if (!isset($_SESSION['reg_user'])) {
        $_SESSION['success_flash'] = 'Signup to view beats or samples added to your Cart!';
        echo display_errors($_SESSION['success_flash']) ;

    } elseif(isset($_SESSION['reg_user'])) {
   
    $sql_cart = "SELECT * FROM cart WHERE reg_userCartid = $_SESSION[reg_user]";
    $cart_query = mysqli_query($db_connect,$sql_cart);
    if (mysqli_num_rows($cart_query) <= 0 ) {
        $_SESSION['success_flash'] = 'Your Cart is Empty!';
        echo display_errors($_SESSION['success_flash']) ;
    } else {
        $cart_fetch = mysqli_fetch_assoc($cart_query);
        $cart_dataResults = json_decode($cart_fetch['beats_and_samples'],true);
    


    // foreach($cart_dataResults as $cart_data) {
    //     $cart_dataX = $cart_data['Bid'];
    //     $cart_dataQ = mysqli_query($db_connect,"SELECT * FROM afro_beat WHERE id = '{$cart_dataX}'");
    //     $cart_dataF = mysqli_fetch_assoc($cart_dataQ);        

?>      <form action="processingOrders.php" method="post">
            <!-- <div class="margin pos-middle cart-container">
                <div class="pos-middle item-img genre-container-s-pic" style="background-image: url('<?= $cart_dataF['image']; ?>'); background-size: cover;">
                    <button title="play"><i class="fas fa-play"></i></button>
                </div>
                <div class="margin genre-container-s-details">
                    <p><?= $cart_dataF['beat_name']; ?> - <?= $cart_dataF['author']; ?></p>
                    <div class="s-countbar">
                    
                    </div>
                </div>
                <p>Price: <?= $cart_dataF['price']; ?></p>
                <div class="margin genre-container-s-btn">

                    <button title="buy" id="<?= $cart_dataF['id']; ?>" name="buy">Order</i></button>
                    
                    
                </div>
            </div> -->
        </form> 
<?php

            }
        }
    // }

    $cartt_dataQ = mysqli_query($db_connect,"SELECT * FROM cart WHERE reg_userCartid = '$reg_userCartid'");
    //$cartt_dataF = mysqli_fetch_assoc($cartt_dataQ);        
?>

<?php  while($cartt_dataF = mysqli_fetch_assoc($cartt_dataQ)):  ?>
    <div class="margin pos-middle cart-container">
        <div class="pos-middle item-img genre-container-s-pic" style="background-image: url('<?= $cartt_dataF['image']; ?>'); background-size: cover;">
            <button title="play"><i class="fas fa-play"></i></button>
        </div>
        <div class="margin genre-container-s-details">
            <p><?= $cartt_dataF['beat_name']; ?> - <?= $cartt_dataF['author']; ?></p>
            <div class="s-countbar">
            
            </div>
        </div>
        <p>Price: <?= $cartt_dataF['price']; ?></p>
        <div class="margin genre-container-s-btn">
            <button title="buy" id="<?= $cartt_dataF['id']; ?>" name="buy">Check Out</i></button>   
            <button class="form-group-child" title="remove" id="<?= $cartt_dataF['id']; ?>" name="remove">Remove</i></button>                    
        </div>
    </div>
<?php endwhile; ?>

<div class="pos-middle">
    <div class="form-group-child">             
        <button type="submit"  name="checkOutAll" value="">Check Out All</button>       
    </div>
    <div class="form-group-child col-2 ">             
        <button type="submit"  name="remove" value="">Remove All</button>       
    </div>
</div>


<div class="pos-middle">
    <div class="samples margin col-6" style="border:1px solid purpl; background-color: #C0C0C0; width:100; height:500">
        <table id="t01" class="col-12">
            <tr>
                <th></th>
                <th>No. of Beats </th>
                <th>No. of Packs</th>
            </tr>
            <tr>
                <td colspan=''></td>
                <td>2</td>
                <td>3</td>
            </tr>
            <tr>
                <td colspan=''>Total</td>
                <td>1,000</td>
                <td>3,000</td>
            </tr>
            <tr>
                <td>Grand Total</td>
                <td colspan='2'>4,000</td>
            </tr>
        </table>
    </div>
</div>

<?php
    include '../Includes/footer.php';
?>
