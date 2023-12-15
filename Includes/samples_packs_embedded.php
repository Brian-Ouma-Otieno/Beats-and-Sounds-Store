<?php
    require_once '../DB/beats&sounds_db.php';

    // samples query
    $sql_sample = "SELECT * FROM samples WHERE sample_code = 0";
    $sample_query = mysqli_query($db_connect,$sql_sample);   
?>
<head>
    <link rel="stylesheet" href="/Beats and sounds store/css/main.css">
    <link rel="stylesheet" href="/Beats and sounds store/fontawesome-free-6.1.1-web\css\all.css"> 
</head>


<?php  while($sample_fetch = mysqli_fetch_assoc($sample_query)):  ?>
<div class="k margi">
    <div class="l pos-middle sample-img" style="background-image: url('<?= $sample_fetch['image']; ?>'); background-size: cover;">
        <button title="play"><i class="fas fa-play"></i></button>
    </div>

    <div class="m pos-middle">
        <div class="">
          <p><?= $sample_fetch['sample_name']; ?></p>  
        </div>
        
    </div>

    <div class="n pos-middle">
        <div class="">
          <p>Wavelenth</p>  
        </div>
    </div>

    <div class="o pos-middle">
        <div class="">
            <p><?= $sample_fetch['sample_key']; ?></p>
        </div>
        
    </div>

    <div class="p pos-middle">
        <div class="">
            <p><?= $sample_fetch['BPM']; ?>BPM</p>
        </div>
        
    </div>
</div>
<?php endwhile; ?>


