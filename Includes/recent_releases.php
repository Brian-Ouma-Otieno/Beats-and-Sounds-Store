<?php
    $sql_recentReleases = "SELECT * FROM beats WHERE featured = 0 ORDER BY id DESC LIMIT 12";
    $recentReleases_query = mysqli_query($db_connect,$sql_recentReleases);
 
?>




<!-- recent releases -->
<div class="recent-releases margin">
    <h3 class="h3">RECENT RELEASES</h3>
    <div class="carousel-container">
        <div class="carousel-row-track pos-middle">
            <div class="carousel-track">
                <?php  while($recentReleases_fetch = mysqli_fetch_assoc($recentReleases_query)):  ?>
                    <div class="carousel-item">
                        <div class="carousel-item-child">
                            <div class="carousel-img pos-middle" style="background-image: url('<?= $recentReleases_fetch['image']; ?>'); background-size: cover;">
                                <i id="recentPlay-<?= $recentReleases_fetch['id']; ?>" title="play" class="fas fa-play <?= $recentReleases_fetch['id']; ?>" onclick="changeIcon(this)"></i>
                            </div>
                            <div id="waveform-<?= $recentReleases_fetch['id']; ?>"></div>
                            <div class="carousel-details">
                                <p><a href="/Beats and sounds store/genres/<?= $recentReleases_fetch['genre']; ?>.php?id=<?= $recentReleases_fetch['id']; ?>"><?= $recentReleases_fetch['beat_name']; ?></a></p>
                                <p>by:<?= $recentReleases_fetch['author']; ?></p>
                            </div>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function () {
                            $("#waveform-<?= $recentReleases_fetch['id']; ?>").empty();

                            const wavesurfer = WaveSurfer.create({
                            container: '#waveform-<?= $recentReleases_fetch['id']; ?>',
                            waveColor: '#4F4A85',
                            progressColor: '#FF6347',
                            height: 8,
                            barWidth: 1,
                            barGap: 1,
                            responsive: true,
                            mediaType: 'audio',
                            url: '/Beats and sounds store/Audio/<?= $recentReleases_fetch['audio']; ?>'
                        }); 
                        
                        const recentPlay = document.getElementById('recentPlay-<?= $recentReleases_fetch['id']; ?>');

                            recentPlay.addEventListener('click', () => {
                                wavesurfer.playPause();                       
                            });  
                        });
                    </script>    

                <?php endwhile; ?>                
            </div>
        </div>
        
        <div class="carousel-btn">
            <button id="prev" class="prev" title="previous"><i class="fas fa-angle-left"></i></button>
            <button id="next" class="next" title="next"><i class="fas fa-angle-right"></i></button>                         
        </div>
    </div>

</div>