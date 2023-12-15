<?php
    require_once '../DB/beats&sounds_db.php';
    require_once '../Functions/functions.php';
    include '../Includes/head.php';
    // include '../Includes/navbar.php';

    if (isset($_POST['search-btn'])) {
    // if ($kk != "") {
        
        // $search = mysqli_real_escape_string($db_connect,Sanitize_input($_POST['search-genre-samples'])) ;
       $search = mysqli_real_escape_string($db_connect,$_POST['search-genre-samples']);
    //    $search = mysqli_real_escape_string($db_connect,$_POST['input']);

       if (empty($search)) {

            header('Location: /Beats and Sounds Store');

       } else {       
            $searchSql ="SELECT * FROM samples WHERE genre LIKE '%$search%'";
            $searchSqlquery = mysqli_query($db_connect,$searchSql);
            $searchResultsRow = mysqli_num_rows($searchSqlquery);

            if ($searchResultsRow > 0) {

                echo "<h3 class='h3'>SAMPLES</h3>";
?>
                    <div class='afro-beat margin'>
                        
                        <div class='afro-section'>     
                            <?php  while($searchFetch = mysqli_fetch_assoc($searchSqlquery)):  ?>     
                            <div class='item-container'>
                                <div class='item-child'>
                                    <div class='item-img pos-middle' style="background-image: url('<?= $searchFetch['image']; ?>'); background-size: cover;">
                                        <button title='play'><i class='fas fa-play'></i></button>
                                    </div>
                                    <div class='carousel-details'>
                                        <p><a href="/Beats and sounds store/genres/afrobeats.php?id=<?=$searchFetch['id']; ?>"> <?=$searchFetch['sample_name']; ?> </a></p>                         
                                        <p>by:<?=$searchFetch['author']; ?></p>                        
                                    </div>
                                </div>
                            </div>                           
                            <?php endwhile;?> 
                        </div>
            
                        </div>;                    
<?php
            } else {
                echo "No Results Found!";
            }
        }
       
    }else {
        header("Location: /Beats and sounds store/");
    }

    
    



?>
