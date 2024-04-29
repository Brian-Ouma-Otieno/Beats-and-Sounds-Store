<?php
    require_once 'DB/beats&sounds_db.php';
    include 'Includes/head.php';
    include 'Includes/navbar.php';

    if(isset($_SESSION['reg_user'])){

?>

    <h2 class="margin">Download File </h2> <hr class='margin'>

<?php

    $downloadFetch = mysqli_fetch_assoc(mysqli_query($db_connect,"SELECT beat_id FROM transactions WHERE reg_userCartid = $_SESSION[reg_user]")); 
    $downloadBeatid = $downloadFetch['beat_id'];

    $downloadQuery = mysqli_query($db_connect,"SELECT * FROM beats WHERE id = '$downloadBeatid' AND featured = 0");

    if (isset($_POST['downloadBtn'])) {
        $filename = basename($_POST['download']);
        $filepath = 'Audio/' . $filename;

        if (!empty($filename) && file_exists($filepath)) {

            // define headers
            header("Cache-control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: binary");

            readfile($filepath);
            exit;   
        } else {
            echo 'Sorry! The File does not exist';
        }       
    } 
   
?>


    <?php  while($downloadBeatFetch = mysqli_fetch_assoc($downloadQuery)):  ?>
        
        <div id="reload" class="margin pos-middle cart-container">
            <div class="pos-middle item-img genre-container-s-pic" style="background-image: url('<?= $downloadBeatFetch['image']; ?>'); background-size: cover;">
                <i title="play" id="DownloadPlay-<?= $downloadBeatFetch['id']; ?>" class="fas fa-play <?= $downloadBeatFetch['id']; ?>" onclick="changeIcon(this)"></i>
            </div>

            <div class="margin genre-container-s-details">
                <p><?= $downloadBeatFetch['beat_name']; ?> - <?= $downloadBeatFetch['author']; ?></p>
                <div id="waveform-<?= $downloadBeatFetch['id']; ?>"></div>
            </div>
    
            <div class="margin genre-container-s-btn pos-middle">
                <form action="download.php" method="post">
                    <input type="hidden" name="download" value="<?= $downloadBeatFetch['audio'];?>">
                    <button title="download" id="" name="downloadBtn">Download</button>   
                </form>                     
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $("#waveform-<?= $downloadBeatFetch['id']; ?>").empty();

                const wavesurfer = WaveSurfer.create({
                container: '#waveform-<?= $downloadBeatFetch['id']; ?>',
                waveColor: '#4F4A85',
                progressColor: '#FF6347',
                height: 35,
                barWidth: 2,
                barGap: 2,
                responsive: true,
                mediaType: 'audio',
                url: '/Beats and sounds store/Audio/<?= $downloadBeatFetch['audio']; ?>'
            }); 
            
            const downloadPlay = document.getElementById('downloadPlay-<?= $downloadBeatFetch['id']; ?>');

                downloadPlay.addEventListener('click', () => {
                    wavesurfer.playPause();                    
                });  
            });
        </script>    
        
    <?php endwhile; ?>

<?php
    include 'Includes/footer.php';

    }else {
        header('Location: /Beats and sounds store/');
    }   
?>  



