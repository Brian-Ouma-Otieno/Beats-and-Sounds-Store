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
        <div class="margin genre-container-s-pic" style="background-image: url('<?= $amapiano_fetch['image']; ?>'); background-size: cover;">
            
        </div>
        <div class="margin genre-container-s-details">
            <p><?= $amapiano_fetch['beat_name']; ?> - by: <?= $amapiano_fetch['author']; ?></p>
            <!-- <div class="s-countbar">
            
            </div> -->
            <div id="waveform-<?= $amapiano_fetch['id']; ?>"></div>
            <div class="s-controls">
                <button id="amapianoPlay<?= $amapiano_fetch['id']; ?>" title="play"><i class="fas fa-play <?= $amapiano_fetch['id']; ?>"></i></button>
                <button id="amapianoStop" title="stop"><i class="fas fa-stop"></i></button>
                <button id="amapianoMute" title="mute"><i class="fas fa-volume-up"></i></button>
            </div>
        </div>
        <p style="color: #fff;">Price: <?= $amapiano_fetch['price']; ?></p>
        <div class="margin genre-container-s-btn">
            <button name="addToCart" title="add to cart" onclick="addTocart(<?= $amapiano_fetch['id']; ?>)">Add to Cart <i class="fas fa-shopping-cart"></i></button> 
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#waveform-<?= $amapiano_fetch['id']; ?>").empty();

            const wavesurfer-<?= $amapiano_fetch['id']; ?> = WaveSurfer.create({
            container: '#waveform-<?= $amapiano_fetch['id']; ?>',
            waveColor: '#4F4A85',
            progressColor: '#383351',
            // height: 50,
            // barWidth: 2,
            // barGap: 2,
            // barRadius: 0,
            // cursorWidth: 1,
            // hideScrollbar: true,
            // pixelRatio: 2,
            // partialRender: true,
            // responsive: true,
            // splitChannels: false,
            // normalize: true,
            // barMinHeight: 1,
            // fillParent: true,
            // autoCenter: true,
            // backend: 'MediaElement',
            // mediaType: 'audio',
            url: '/Beats and sounds store/Audio/<?= $amapiano_fetch['audio']; ?>'

           }); 
           
           const amapianoPlay-<?= $amapiano_fetch['id']; ?> = document.getElementById('amapianoPlay-<?= $amapiano_fetch['id']; ?>');

            amapianoPlay-<?= $amapiano_fetch['id']; ?>.addEventListener('click', () => {
                wavesurfer-<?= $amapiano_fetch['id']; ?>.playPause();
                
            });  
        });
    </script>

<?php endwhile; ?>





<?php
include '../Includes/footer.php';
?>
