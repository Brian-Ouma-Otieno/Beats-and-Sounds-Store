<?php

    require_once '../DB/beats&sounds_db.php';

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $afro2 = $_GET['id'];
    } else {
        $sql_afroFirstdisplay = "SELECT * FROM beats WHERE genre = 'afrobeats' AND featured = 0";
        $afro_queryFirstdisplay = mysqli_query($db_connect,$sql_afroFirstdisplay);
        $afro_fetchFirstdisplay = mysqli_fetch_assoc($afro_queryFirstdisplay);
        $afro2 =  $afro_fetchFirstdisplay['id'];
    }
    
    
    if (isset($_POST['addToCart'])) {
        if (isset($_SESSION['reg_user'])) {
            $reg_userCartid = $_SESSION['reg_user'];
            // $insertToreg_userCartid = "UPDATE beats SET reg_userCartid = $reg_userCartid WHERE id = '$afro2'";
            // mysqli_query($db_connect,$insertToreg_userCartid); 
            $beat_id = $_POST['beat_id'];
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

            if(isset($_GET['featured'])){
                $Displayid = (int)$_GET['id'];
                $featured = (int)$_GET['featured'];
                $featuredSql = "UPDATE beats SET featured = '$featured' WHERE id = '$Displayid'";
                $beatRegSql = "UPDATE beats SET reg_userCartid = '$reg_userCartid' WHERE id = '$Displayid'";
                mysqli_query($db_connect,$featuredSql);
                mysqli_query($db_connect,$beatRegSql);
                // header('Location: products.php');
            }   
                                 
        } else {
            header("Location: /Beats and sounds store/users/login.php");
        }
    }


    include '../Includes/head.php';
    include '../Includes/navbar.php';

    // $sql_afro2 = "SELECT * FROM beats WHERE id = '$afro2' AND featured = 0";
    // $afro_query2 = mysqli_query($db_connect,$sql_afro2);
    // $afro_fetch2 = mysqli_fetch_assoc($afro_query2);

    // if (isset($_GET['featured']) && !isset($_GET['id'])) {
    //     $sql_afro2 = "SELECT * FROM beats WHERE id = '$afro2' AND featured = 0";
    //     $afro_query2 = mysqli_query($db_connect,$sql_afro2);
    //     $afro_fetch2 = mysqli_fetch_assoc($afro_query2);

    // } else {
    //     $sql_afro2 = "SELECT * FROM beats WHERE id = '$afro2'";
    //     $afro_query2 = mysqli_query($db_connect,$sql_afro2);
    //     $afro_fetch2 = mysqli_fetch_assoc($afro_query2);
    // }

    // if(isset($_GET['id'])){
        $sql_afro2 = "SELECT * FROM beats WHERE id = '$afro2' AND featured = 0";
        $afro_query2 = mysqli_query($db_connect,$sql_afro2);
        $afro_fetch2 = mysqli_fetch_assoc($afro_query2);
        // $Displayid = (int)$_GET['id'];
        // $featured = (int)$_GET['featured'];
        // $featuredSql = "UPDATE beats SET featured = '$featured' WHERE id = '$Displayid'";
        // mysqli_query($db_connect,$featuredSql);
        // header('Location: products.php');
    // }  
    
    $sql_afro = "SELECT * FROM beats WHERE genre = 'afrobeats' AND featured = 0";
    $afro_query = mysqli_query($db_connect,$sql_afro);
?>

<h3 class="margin h3">Afro beats</h3>

<div class="margin pos-middle genre-container">
    <div class="margin genre-pic">
        <div class="genre-pic-img" style="background-image: url('<?= $afro_fetch2['image']; ?>'); background-size: cover;">

        </div>        
    </div>

    <div class="margin genre-details">
        <h3 class="h3" id="beat_name"><?= $afro_fetch2['beat_name']; ?></h3>
        <div class="p-btn">
            <div class="genre-details-p">
                <p id="author">by: <?= $afro_fetch2['author']; ?></p>
                <p>Duration: 3:00</p>  
                <p id="price">Price: <?= $afro_fetch2['price']; ?></p>  
            </div>
            <form action="afrobeats.php?featured=<?= (($afro_fetch2['featured'] == 0)?'1':'0');?>&id=<?= $afro_fetch2['id']; ?>" method="post" ><input type="hidden" name="beat_id" value="<?= $afro_fetch2['id'];?>"> <button name="addToCart" title="add to cart" onclick="autoRefresh()">Add to Cart <i class="fas fa-shopping-cart"></i></button></form> 
        </div>  
        <!-- <div class="countdown-timer">
            <h4>Available at:  </h4><p class="countdown-time" id="timer"> </p>
        </div>       -->
    </div>
</div>

<?php  while($afro_fetch = mysqli_fetch_assoc($afro_query)):  ?>
<div class="margin pos-middle genre-container-s">
    <div class="margin genre-container-s-pic" style="background-image: url('<?= $afro_fetch['image']; ?>'); background-size: cover;">
        
    </div>
    <div class="margin genre-container-s-details">
        <p><?= $afro_fetch['beat_name']; ?> - by: <?= $afro_fetch['author']; ?></p>
        <div class="s-countbar">
        
        </div>
        <div class="s-controls">
            <button title="play"><i class="fas fa-play"></i></button>
            <button title="stop"><i class="fas fa-stop"></i></button>
            <button title="mute"><i class="fas fa-volume-up"></i></button>
        </div>
    </div>
    <p style="color: #fff;">Price: <?= $afro_fetch['price']; ?></p>
    <div class="margin genre-container-s-btn">
        <form action="afrobeats.php?featured=<?= (($afro_fetch['featured'] == 0)?'1':'0');?>&id=<?= $afro_fetch['id']; ?>" method="post" ><input type="hidden" name="beat_id" value="<?= $afro_fetch['id'];?>"> <button name="addToCart" title="add to cart" onclick="add_to_cart(<?= $afro_fetch['id']; ?>)">Add to Cart <i class="fas fa-shopping-cart"></i></button></form> 
    </div>

    <div class="countdown-timer">
        <h4>Available at:  </h4><p class="countdown-time" id="timer"></p>
    </div>   
</div>
<?php endwhile; ?>





<?php
    include '../Includes/footer.php';
?>
