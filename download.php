<?php
    require_once 'DB/beats&sounds_db.php';
    include 'Includes/head.php';
    include 'Includes/navbar.php';

    if(isset($_SESSION['reg_user'])){

?>


    <h2 class="margin">Download File </h2> <hr class='margin'>
    <a href="download.php?file=VDJ JONES-SOUL 2-2018.mp3" class="margin downloadBtn">Download</a>


<?php
    if (!empty($_GET['file'])) {
        $filename = basename($_GET['file']);
        $filepath = 'Uploads/' . $filename;

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
   
    include 'Includes/footer.php';

    }else {
        header('Location: /Beats and sounds store/');
    }
    
?>  



