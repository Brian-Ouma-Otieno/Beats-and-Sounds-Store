<?php
    require_once '../DB/beats&sounds_db.php';
    include '../Includes/head.php';
    include '../Includes/navbar.php';

    $trap = $_GET['id'];
    $sql_trap2 = "SELECT * FROM trap WHERE id = '$trap'";
    $trap_query2 = mysqli_query($db_connect,$sql_trap2);
    $trap_fetch2 = mysqli_fetch_assoc($trap_query2);

    $sql_trap = "SELECT * FROM trap";
    $trap_query = mysqli_query($db_connect,$sql_trap);
?>



<h3 class="margin h3">Trap</h3>

<div class="margin pos-middle genre-container">
    <div class="margin genre-pic">
        <div class="genre-pic-img" style="background-image: url('<?= $trap_fetch2['image']; ?>'); background-size: cover;">

        </div>        
    </div>

    <div class="margin genre-details">
        <h3 class="h3"><?= $trap_fetch2['beat_name']; ?></h3>
        <div class="p-btn">
            <div class="genre-details-p">
                <p>by: <?= $trap_fetch2['author']; ?></p>
                <p>Duration: 3:00</p>  
                <p>Price: <?= $trap_fetch2['price']; ?></p>
            </div>
            <button title="add to cart">Add to Cart <i class="fas fa-shopping-cart"></i></button> 
        </div>       
    </div>
</div>



<?php  while($trap_fetch = mysqli_fetch_assoc($trap_query)):  ?>
<div class="margin pos-middle genre-container-s">
    <div class="margin genre-container-s-pic" style="background-image: url('<?= $trap_fetch['image']; ?>'); background-size: cover;">
        
    </div>
    <div class="margin genre-container-s-details">
        <p><?= $trap_fetch['beat_name']; ?> - by: <?= $trap_fetch['author']; ?></p>
        <div class="s-countbar">
        
        </div>
        <div class="s-controls">
            <button title="play"><i class="fas fa-play"></i></button>
            <button title="stop"><i class="fas fa-stop"></i></button>
            <button title="mute"><i class="fas fa-volume-up"></i></button>
        </div>
    </div>
    <p style="color: #fff;">Price: <?= $trap_fetch['price']; ?></p>
    <div class="margin genre-container-s-btn">
        <button title="add to cart">Add to Cart <i class="fas fa-shopping-cart"></i></button>
    </div>

</div>
<?php endwhile; ?>





<?php
include '../Includes/footer.php';
?>
