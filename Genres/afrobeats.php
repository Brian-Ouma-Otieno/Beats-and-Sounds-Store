<?php

    require_once '../DB/beats&sounds_db.php';
    include '../Functions/functions.php';

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $afro2 = $_GET['id'];
    } else {
        $sql_afroFirstdisplay = "SELECT * FROM beats WHERE genre = 'afrobeats' AND featured = 0";
        $afro_queryFirstdisplay = mysqli_query($db_connect,$sql_afroFirstdisplay);
        $afro_queryFirstdisplaynumrow = mysqli_num_rows($afro_queryFirstdisplay);
        $afro_fetchFirstdisplay = mysqli_fetch_assoc($afro_queryFirstdisplay);
        $afro2 =  $afro_fetchFirstdisplay['id'];
        if ($afro_queryFirstdisplaynumrow <= 0 ) {
            $_SESSION['success_flash'] = 'No beats available at the moment!';
        }
    }


    include '../Includes/head.php';
    include '../Includes/navbar.php';

  
    $sql_afro2 = "SELECT * FROM beats WHERE id = '$afro2' AND featured = 0";
    $afro_query2 = mysqli_query($db_connect,$sql_afro2);
    $afro_fetch2 = mysqli_fetch_assoc($afro_query2);
    
    $sql_afro = "SELECT * FROM beats WHERE genre = 'afrobeats' AND featured = 0";
    $afro_query = mysqli_query($db_connect,$sql_afro);


?>

<h3 class="margin h3">Afro beats</h3>



<?php  while($afro_fetch = mysqli_fetch_assoc($afro_query)):  ?>
    <div class="margin pos-middle genre-container-s">
        <div class="margin genre-container-s-pic" style="background-image: url('<?= $afro_fetch['image']; ?>'); background-size: cover;">
            
        </div>
        <div class="margin genre-container-s-details">
            <p><?= $afro_fetch['beat_name']; ?> - by: <?= $afro_fetch['author']; ?></p>
            <div class="s-countbar" id="#waveform">
            
            </div>
            <div id="waveform"></div>
            <div class="s-controls">
                <button id="afroPlay" title="play"><i class="fas fa-play"></i></button>
                <button id="afroStop" title="stop"><i class="fas fa-stop"></i></button>
                <button id="afroMute" title="mute"><i class="fas fa-volume-up"></i></button>
            </div>
        </div>
        <p style="color: #fff;">Price: <?= $afro_fetch['price']; ?></p>
        <div class="margin genre-container-s-btn">
            <button name="addToCart" title="add to cart" onclick="addTocart(<?= $afro_fetch['id']; ?>)">Add to Cart <i class="fas fa-shopping-cart"></i></button> 
        </div>
    </div>
    <script>

        $(document).ready(function () {
            $("#waveform").empty();
            const wavesurfer = WaveSurfer.create({
            container: '#waveform',
            waveColor: '#4F4A85',
            progressColor: '#383351',
            url: '/Beats and sounds store/Audio/<?= $afro_fetch['audio']; ?>'
           });        
        });

    </script>
<?php endwhile; ?>





<?php
    include '../Includes/footer.php';
?>