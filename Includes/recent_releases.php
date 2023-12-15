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
                                <button title="play"><i class="fas fa-play"></i></button>
                            </div>
                            <div class="carousel-details">
                                <p><a href="/Beats and sounds store/genres/<?= $recentReleases_fetch['genre']; ?>.php?id=<?= $recentReleases_fetch['id']; ?>"><?= $recentReleases_fetch['beat_name']; ?></a></p>
                                <p>by:<?= $recentReleases_fetch['author']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <!-- <div class="carousel-item">
                    <div class="carousel-item-child">
                        <div class="carousel-img pos-middle" style="background-image: url('Images/images 2/pexels-vishnu-r-nair-1105666.jpg'); background-size: cover;">
                            <button title="play"><i class="fas fa-play"></i></button>
                        </div>
                        <div class="carousel-details">
                            <p><a href="/Beats and sounds store/genres/amapiano.php?id=">Sansamora</a></p>
                            <p>by:Fik Made It</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-item-child">
                        <div class="carousel-img pos-middle" style="background-image: url('Images/images 2/pexels-vishnu-r-nair-1105666.jpg'); background-size: cover;">
                            <button title="play"><i class="fas fa-play"></i></button>
                        </div>
                        <div class="carousel-details">
                            <p>Sansamora</p>
                            <p>by:Fik Made It</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-item-child">
                        <div class="carousel-img pos-middle" style="background-image: url('Images/images 2/pexels-vishnu-r-nair-1105666.jpg'); background-size: cover;">
                            <button title="play"><i class="fas fa-play"></i></button>
                        </div>
                        <div class="carousel-details">
                            <p>Sansamora</p>
                            <p>by:Fik Made It</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-item-child">
                        <div class="carousel-img pos-middle" style="background-image: url('Images/images 2/pexels-vishnu-r-nair-1105666.jpg'); background-size: cover;">
                            <button title="play"><i class="fas fa-play"></i></button>
                        </div>
                        <div class="carousel-details">
                            <p>Sansamora</p>
                            <p>by:Fik Made It</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-item-child">
                        <div class="carousel-img pos-middle" style="background-image: url('Images/images 2/pexels-vishnu-r-nair-1105666.jpg'); background-size: cover;">
                            <button title="play"><i class="fas fa-play"></i></button>
                        </div>
                        <div class="carousel-details">
                            <p>Sansamora</p>
                            <p>by:Fik Made It</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-item-child">
                        <div class="carousel-img pos-middle" style="background-image: url('Images/images 2/pexels-vishnu-r-nair-1105666.jpg'); background-size: cover;">
                            <button title="play"><i class="fas fa-play"></i></button>
                        </div>
                        <div class="carousel-details">
                            <p>Sansamora</p>
                            <p>by:Fik Made It</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-item-child">
                        <div class="carousel-img pos-middle" style="background-image: url('Images/images 2/pexels-vishnu-r-nair-1105666.jpg'); background-size: cover;">
                            <button title="play"><i class="fas fa-play"></i></button>
                        </div>
                        <div class="carousel-details">
                            <p>Sansamora</p>
                            <p>by:Fik Made It</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-item-child">
                        <div class="carousel-img pos-middle" style="background-image: url('Images/images 2/pexels-vishnu-r-nair-1105666.jpg'); background-size: cover;">
                            <button title="play"><i class="fas fa-play"></i></button>
                        </div>
                        <div class="carousel-details">
                            <p>Sansamora</p>
                            <p>by:Fik Made It</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-item-child">
                        <div class="carousel-img pos-middle" style="background-image: url('Images/images 2/pexels-vishnu-r-nair-1105666.jpg'); background-size: cover;">
                            <button title="play"><i class="fas fa-play"></i></button>
                        </div>
                        <div class="carousel-details">
                            <p>Sansamora</p>
                            <p>by:Fik Made It</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-item-child">
                        <div class="carousel-img pos-middle" style="background-image: url('Images/images 2/pexels-vishnu-r-nair-1105666.jpg'); background-size: cover;">
                            <button title="play"><i class="fas fa-play"></i></button>
                        </div>
                        <div class="carousel-details">
                            <p>Sansamora</p>
                            <p>by:Fik Made It</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-item-child">
                        <div class="carousel-img pos-middle" style="background-image: url('Images/images 2/pexels-vishnu-r-nair-1105666.jpg'); background-size: cover;">
                            <button title="play"><i class="fas fa-play"></i></button>
                        </div>
                        <div class="carousel-details">
                            <p>Sansamora</p>
                            <p>by:Fik Made It</p>
                        </div>
                    </div>
                </div> -->
                
                
            </div>
        </div>
        
        <div class="carousel-btn">
            <button id="prev" class="prev" title="previous"><i class="fas fa-angle-left"></i></button>
            <button id="next" class="next" title="next"><i class="fas fa-angle-right"></i></button>                         
        </div>
    </div>

</div>