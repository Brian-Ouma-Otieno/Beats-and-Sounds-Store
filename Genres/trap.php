<?php
    require_once '../DB/beats&sounds_db.php';
    include '../Functions/functions.php';

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $trap2 = $_GET['id'];
    } else {
        $trapQueryFirstdisplay = mysqli_query($db_connect,"SELECT * FROM beats WHERE genre = 'afrobeats' AND featured = 0");
        $trapQueryFirstdisplaynumrow = mysqli_num_rows($trapQueryFirstdisplay);
        $trapfetchFirstdisplay = mysqli_fetch_assoc($trapQueryFirstdisplay);
        $trap2 =  $trapfetchFirstdisplay['id'];
        if ($trapQueryFirstdisplaynumrow <= 0 ) {
            $_SESSION['success_flash'] = 'No beats available at the moment!';
        }
    }


    include '../Includes/head.php';
    include '../Includes/navbar.php';


    $trapQuery2 = mysqli_query($db_connect,"SELECT * FROM beats WHERE id = '$trap2' AND featured = 0");
    $trapFetch2 = mysqli_fetch_assoc($trapQuery2);
    

    $trapQuery = mysqli_query($db_connect,"SELECT * FROM beats WHERE genre = 'trap' AND featured = 0");
?>



<h3 class="margin h3">Trap</h3>


<?php  while($trap_fetch = mysqli_fetch_assoc($trapQuery)):  ?>
    <div class="margin pos-middle genre-container-s">
        <div class="margin genre-container-s-pic pos-middle" style="background-image: url('<?= $trap_fetch['image']; ?>'); background-size: cover;">
             <div class="s-controls">
                <i id="trapPlay-<?= $trap_fetch['id']; ?>" title="play" class="fas fa-play <?= $trap_fetch['id']; ?>" onclick="changeIcon(this)"></i>
            </div>
        </div>
        <div class="margin genre-container-s-details">
            <p><?= $trap_fetch['beat_name']; ?> - by: <?= $trap_fetch['author']; ?></p>       
            <div id="waveform-<?= $trap_fetch['id']; ?>"></div>          
        </div>
        <p style="color: #fff;">Price: <?= $trap_fetch['price']; ?></p>
        <div class="margin genre-container-s-btn">
        <button name="addToCart" title="add to cart" onclick="addTocart(<?= $trap_fetch['id']; ?>,<?=((isset($_SESSION['reg_user']))? true:false);?>)">Add to Cart <i class="fas fa-shopping-cart"></i></button> 
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#waveform-<?= $trap_fetch['id']; ?>").empty();

            const wavesurfer = WaveSurfer.create({
            container: '#waveform-<?= $trap_fetch['id']; ?>',
            waveColor: '#4F4A85',
            progressColor: '#FF6347',
            height: 35,
            barWidth: 2,
            barGap: 2,
            responsive: true,
            mediaType: 'audio',
            url: '/Beats and sounds store/Audio/<?= $trap_fetch['audio']; ?>'

           }); 
           
           const trapPlay = document.getElementById('trapPlay-<?= $trap_fetch['id']; ?>');

            trapPlay.addEventListener('click', () => {
                wavesurfer.playPause();
                
            });  
        });
    </script>

<?php endwhile; ?>





<?php
    include '../Includes/footer.php';
?>
