<?php
    require_once '../DB/beats&sounds_db.php';
    include '../Functions/functions.php';


    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $amapiano2 = $_GET['id'];
    } else {
        $amapianoQueryFirstdisplay = mysqli_query($db_connect,"SELECT * FROM beats WHERE genre = 'afrobeats' AND featured = 0");
        $amapianoQueryFirstdisplaynumrow = mysqli_num_rows($amapianoQueryFirstdisplay);
        $amapianofetchFirstdisplay = mysqli_fetch_assoc($amapianoQueryFirstdisplay);
        $amapiano2 =  $amapianofetchFirstdisplay['id'];
        if ($amapianoQueryFirstdisplaynumrow <= 0 ) {
            $_SESSION['success_flash'] = 'No beats available at the moment!';
        }
    }


    include '../Includes/head.php';
    include '../Includes/navbar.php';


    $amapianoQuery2 = mysqli_query($db_connect,"SELECT * FROM beats WHERE id = '$amapiano2' AND featured = 0");
    $amapianoFetch2 = mysqli_fetch_assoc($amapianoQuery2);
    

    $amapianoQuery = mysqli_query($db_connect,"SELECT * FROM beats WHERE genre = 'amapiano' AND featured = 0");

?>

<h3 class="margin h3">Amapiano</h3>


<?php  while($amapiano_fetch = mysqli_fetch_assoc($amapianoQuery)):  ?>
    <div class="margin pos-middle genre-container-s">
        <div class="margin genre-container-s-pic pos-middle" style="background-image: url('<?= $amapiano_fetch['image']; ?>'); background-size: cover;">
            <div class="s-controls">
                <i id="amapianoPlay-<?= $amapiano_fetch['id']; ?>" title="play" class="fas fa-play <?= $amapiano_fetch['id']; ?>" onclick="changeIcon(this)"></i>               
            </div>
        </div>
        <div class="margin genre-container-s-details">
            <p><?= $amapiano_fetch['beat_name']; ?> - by: <?= $amapiano_fetch['author']; ?></p>    
            <div id="waveform-<?= $amapiano_fetch['id']; ?>"></div>           
        </div>
        <p style="color: #fff;">Price: <?= $amapiano_fetch['price']; ?></p>
        <div class="margin genre-container-s-btn">
            <button name="addToCart" title="add to cart" onclick="addTocart(<?= $amapiano_fetch['id']; ?>,<?=((isset($_SESSION['reg_user']))? true:false);?>)">Add to Cart <i class="fas fa-shopping-cart"></i></button> 
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#waveform-<?= $amapiano_fetch['id']; ?>").empty();

            const wavesurfer = WaveSurfer.create({
            container: '#waveform-<?= $amapiano_fetch['id']; ?>',
            waveColor: '#4F4A85',
            progressColor: '#FF6347',
            height: 35,
            barWidth: 2,
            barGap: 2,
            responsive: true,
            mediaType: 'audio',
            url: '/Beats and sounds store/Audio/<?= $amapiano_fetch['audio']; ?>'

           }); 
           
           const amapianoPlay = document.getElementById('amapianoPlay-<?= $amapiano_fetch['id']; ?>');

            amapianoPlay.addEventListener('click', () => {
                wavesurfer.playPause();
                
            });  
        });
    </script>

<?php endwhile; ?>





<?php
include '../Includes/footer.php';
?>
