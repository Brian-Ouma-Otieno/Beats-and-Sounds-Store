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
        <div class="margin genre-container-s-pic pos-middle" style="background-image: url('<?= $afro_fetch['image']; ?>'); background-size: cover;">
            <div class="s-controls">               
                <i id="afroPlay-<?= $afro_fetch['id']; ?>" title="play" class="fas fa-play <?= $afro_fetch['id']; ?>" onclick="changeIcon(this)"></i>
            </div>
        </div>
        <div class="margin genre-container-s-details">
            <p><?= $afro_fetch['beat_name']; ?> - by: <?= $afro_fetch['author']; ?></p>          
            <div id="waveform-<?= $afro_fetch['id']; ?>"></div>            
        </div>
        <p style="color: #fff;">Price: <?= $afro_fetch['price']; ?></p>
        <div class="margin genre-container-s-btn">
            <button name="addToCart" id="cartBtn" title="add to cart" onclick="addTocart(<?= $afro_fetch['id']; ?>,<?=((isset($_SESSION['reg_user']))? true:false);?>)">Add to Cart <i class="fas fa-shopping-cart"></i></button> 
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#waveform-<?= $afro_fetch['id']; ?>").empty();

            const wavesurfer = WaveSurfer.create({
            container: '#waveform-<?= $afro_fetch['id']; ?>',
            waveColor: '#4F4A85',
            progressColor: '#FF6347',
            height: 35,
            barWidth: 2,
            barGap: 2,
            responsive: true,
            mediaType: 'audio',
            url: '/Beats and sounds store/Audio/<?= $afro_fetch['audio']; ?>'

           }); 
           
           const afroPlay = document.getElementById('afroPlay-<?= $afro_fetch['id']; ?>');

            afroPlay.addEventListener('click', () => {
                wavesurfer.playPause();
                
            });  
        });
    </script>    
<?php endwhile; ?>




<?php
    include '../Includes/footer.php';
?>