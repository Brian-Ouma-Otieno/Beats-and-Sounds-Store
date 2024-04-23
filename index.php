<?php
    require_once 'DB/beats&sounds_db.php';
    include 'Includes/head.php';
    include 'Includes/navbar.php';
    include 'Includes/disp_img.php';
    include 'Includes/recent_releases.php';

    // afro beat query
    $afro_query = mysqli_query($db_connect,"SELECT * FROM beats WHERE genre = 'afrobeats' AND featured = 0 LIMIT 12");

    // amapiano query
    $amapiano_query = mysqli_query($db_connect,"SELECT * FROM beats WHERE genre = 'amapiano' AND featured = 0 LIMIT 12");

    // trap query
    $trap_query = mysqli_query($db_connect,"SELECT * FROM beats WHERE genre = 'trap' AND featured = 0 LIMIT 8");
    
?>


    <!-- afro beats -->
    <div class="afro-beat margin">
        <h3 class="h3">AFRO BEATS</h3>
        <div class="afro-section">     
            <?php  while($afro_fetch = mysqli_fetch_assoc($afro_query)):  ?>      
            <div class="item-container">
                <div class="item-child">
                    <div class="item-img pos-middle" style="background-image: url('<?= $afro_fetch['image']; ?>'); background-size: cover;">
                        <i id="afro-<?= $afro_fetch['id']; ?>" title="play" class="fas fa-play <?= $afro_fetch['id']; ?>" onclick="changeIcon(this)"></i>
                    </div>
                    <div id="waveform-<?= $afro_fetch['id']; ?>"></div>
                    <div class="carousel-details">
                        <p><a href="/Beats and sounds store/genres/afrobeats.php?id=<?= $afro_fetch['id']; ?>"><?= $afro_fetch['beat_name']; ?></a></p>                         
                        <p>by:<?= $afro_fetch['author']; ?></p>                        
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function () {
                    $("#waveform-<?= $afro_fetch['id']; ?>").empty();

                    const wavesurfer = WaveSurfer.create({
                    container: '#waveform-<?= $afro_fetch['id']; ?>',
                    waveColor: '#4F4A85',
                    progressColor: '#FF6347',
                    height: 8,
                    barWidth: 1,
                    barGap: 1,
                    responsive: true,
                    mediaType: 'audio',
                    url: '/Beats and sounds store/Audio/<?= $afro_fetch['audio']; ?>'

                }); 
                
                const afroPlay = document.getElementById('afro-<?= $afro_fetch['id']; ?>');

                    afroPlay.addEventListener('click', () => {
                        wavesurfer.playPause();                       
                    });  
                });
            </script>    

            <?php endwhile;?>           
        </div>
    </div>



    <!-- amapiano -->
    <div class="amapiano margin">
        <h3 class="h3">AMAPIANO</h3>
        <div class="afro-section">
            <?php  while($amapiano_fetch = mysqli_fetch_assoc($amapiano_query)):  ?>
            <div class="item-container">
                <div class="item-child">
                    <div class="item-img pos-middle" style="background-image: url('<?= $amapiano_fetch['image']; ?>'); background-size: cover;">
                        <i id="amapiano-<?= $amapiano_fetch['id']; ?>" title="play" class="fas fa-play <?= $amapiano_fetch['id']; ?>" onclick="changeIcon(this)"></i>
                    </div>
                    <div id="waveform-<?= $amapiano_fetch['id']; ?>"></div>
                    <div class="carousel-details">
                        <p><a href="/Beats and sounds store/genres/amapiano.php?id=<?= $amapiano_fetch['id']; ?>"><?= $amapiano_fetch['beat_name']; ?></a></p>
                        <p>by:<?= $amapiano_fetch['author']; ?></p>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function () {
                    $("#waveform-<?= $amapiano_fetch['id']; ?>").empty();

                    const wavesurfer = WaveSurfer.create({
                    container: '#waveform-<?= $amapiano_fetch['id']; ?>',
                    waveColor: '#4F4A85',
                    progressColor: '#FF6347',
                    height: 8,
                    barWidth: 1,
                    barGap: 1,
                    responsive: true,
                    mediaType: 'audio',
                    url: '/Beats and sounds store/Audio/<?= $amapiano_fetch['audio']; ?>'

                }); 
                
                const amapianoPlay = document.getElementById('amapiano-<?= $amapiano_fetch['id']; ?>');

                    amapianoPlay.addEventListener('click', () => {
                        wavesurfer.playPause();                       
                    });  
                });
            </script>    

            <?php endwhile; ?>     
        </div>
    </div>



    <!-- trap -->
    <div class="trap margin">       
        
        <h4 class="h4">TRAP</h4>
        <div class="trap-item"> 
            <?php  while($trap_fetch = mysqli_fetch_assoc($trap_query)):  ?>
                <div class="trap-child">
                    <div class="trap-img pos-middle item-img" style="background-image: url('<?= $trap_fetch['image']; ?>'); background-size: cover;">
                        <i id="trap-<?= $trap_fetch['id']; ?>" title="play" class="fas fa-play <?= $trap_fetch['id']; ?>" onclick="changeIcon(this)"></i>
                    </div>
                    <div id="waveform-<?= $trap_fetch['id']; ?>"></div>
                    <div class="trap-details carousel-details">
                        <p><a href="/Beats and sounds store/genres/trap.php?id=<?= $trap_fetch['id']; ?>"><?= $trap_fetch['beat_name']; ?></a></p>
                        <p>by:<?= $trap_fetch['author']; ?></p>
                    </div>
                </div> 

                <script>
                    $(document).ready(function () {
                        $("#waveform-<?= $trap_fetch['id']; ?>").empty();

                        const wavesurfer = WaveSurfer.create({
                        container: '#waveform-<?= $trap_fetch['id']; ?>',
                        waveColor: '#4F4A85',
                        progressColor: '#FF6347',
                        height: 8,
                        barWidth: 1,
                        barGap: 1,
                        responsive: true,
                        mediaType: 'audio',
                        url: '/Beats and sounds store/Audio/<?= $trap_fetch['audio']; ?>'

                    }); 
                    
                    const trapPlay = document.getElementById('trap-<?= $trap_fetch['id']; ?>');

                        trapPlay.addEventListener('click', () => {
                            wavesurfer.playPause();                       
                        });  
                    });
                </script>    

            <?php endwhile; ?>         
        </div>

    </div>


<?php
    // include 'Includes/samples.php';
    include 'Includes/footer.php';
?>

