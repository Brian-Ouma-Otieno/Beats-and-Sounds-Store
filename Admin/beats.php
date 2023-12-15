<?php
    require_once '../DB/beats&sounds_db.php';
    require_once '../Functions/functions.php';
    
    // check if user has logged in
    if(!is_logged_in()){
        login_error_redirect();
    }

    include 'Includes/head.php';
    include 'Includes/navbar.php';
    

    $sql_gnr = "SELECT * FROM genre WHERE parent = 0";
    $sql_gnr_query = mysqli_query($db_connect, $sql_gnr);
?>


<?php
    if (isset($_POST['data_sub'])) {
        $genre = sanitize_input($_POST['gnr']);
        // $bname = sanitize_input($_POST['beat_title']);
        $author = sanitize_input($_POST['beat_author']);
        $img = sanitize_input($_FILES['beat_img']['name']);
        $price = sanitize_input($_POST['beat_price']);
        $audio = sanitize_input($_FILES['audio_beat']['name']);

        // image
        $target_dir = "../Uploads/";
        $file_explode = basename($_FILES["beat_img"]["name"]);
        $name_ext = explode(".", $file_explode);
        $name = $name_ext[0];
        $ext = @$name_ext[1];    
        // $target = md5($name) . "." . $ext;
        $target = md5(uniqid($name)) . "." . $ext;
        $target_file = $target_dir . basename($target);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // audio
        $audio_dir = "../Audio/";
        $audio_file = basename($_FILES["audio_beat"]["name"]); 
        $audio_ext = explode(".", $audio_file);
        $audioName = $audio_ext[0];      
        $audio_target_file = $audio_dir . basename($audio_file);
        $audioFileType = strtolower(pathinfo($audio_target_file,PATHINFO_EXTENSION));


        $error = array();
        $success = true;

        if(empty($genre) || empty($author) || empty($img) || empty($price) || empty($audio)){
            $error[] = 'Fill in all Fields.';
            $success = false;
            // exit();|| empty($bname)
        } 
        
        // if (!empty($bname)) {
        //     if (!preg_match("/^[A-Za-z0-9]*$/",$bname)) {
                
        //         $error[] = 'Please provide a correct Beat Title.';
        //         $success = false;
        //     }
        //     // exit();
        // }

        if (!empty($author)) {
            if (!preg_match("/^[A-Za-z0-9]*$/",$author)) {

                $error[] = 'Please provide a correct Author name.';
                $success = false;
            }
            // exit();
        }

        if (!empty($img)) {

            // check if it's a real image 
            $check = getimagesize($_FILES["beat_img"]["tmp_name"]);
            if($check !== false) {
                // echo "File is an image - " . $check["mime"] . ".";
                $success = true;
            } else {
                $error[] = "File is not an image.";
                $success = false;
                // exit();
            }

            // Check if file already exists
            // if (file_exists($target_file)) {
            //     $error[] = "Sorry, the image file already exists.";
            //     $success = false;
            // }
            // Check file size
            if ($_FILES["beat_img"]["size"] > 1000000) {

                $error[] = "Sorry, your file is too large.";
                $success = false;
                // exit();
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                
                $error[] = "Sorry, only JPG, JPEG, PNG files are allowed.";
                $success = false;
                // exit();
            }
        }

        if (!empty($price)) {
            if (!preg_match("/^[0-9]*$/",$price)) {

                $error[] = 'Please provide a correct price.';
                $success = false;
            }
            // exit();
        }

        if (!empty($audio)) {

            // check if it's a real audio
            $audio_check = $_FILES['audio_beat']['type'];
            // print_r($audio_check);
            if (!preg_match("/audio/i",$audio_check)) {
                $error[] = "Sorry the file is not an audio.";
                $success = false;
            } 
            
            // Check if file already exists
            // if (file_exists($audio_target_file)) {
            //     $error[] = "Sorry, the audio file already exists.";
            //     $success = false;
            // }

            // Allow certain file formats
            if($audioFileType != "wav" && $audioFileType != "mp3") {
                
                $error[] = "Sorry, only WAV and MP3 files are allowed.";
                $success = false;
                // exit();
            }

        }

        // check if data exist
        $sql_insert_check = "SELECT * FROM afro_beat WHERE beat_name = '$audioName' AND audio = '$audio'";
        $sql_query_insert_check = mysqli_query($db_connect,$sql_insert_check);
        // print_r($sql_query_insert_check);
        $sql_insert_row_check = mysqli_num_rows($sql_query_insert_check);
        if ($sql_insert_row_check > 0) {
        
            $error[] = 'The details already exist';
            $success = false;
        }

        if ($success == false) {

            echo display_errors($error[0]);
        }else{
            // echo 'Success';
            // upload image to upload directory
            if (move_uploaded_file($_FILES["beat_img"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["audio_beat"]["tmp_name"], $audio_target_file)) {
                // echo "The file ". htmlspecialchars( basename( $_FILES["beat_img"]["name"])). " has been uploaded.";
                // echo "The file ". htmlspecialchars( basename( $_FILES["audio_beat"]["name"])). " has been uploaded.";
            }

            // insert data to database
            // $sql_insert = "INSERT INTO afro_beat (beat_name, author, image, price, audio) VALUES(?, ?, ?, ?, ?);";
            $sql_insert = "INSERT INTO beats (genre, beat_name, author, image, price, audio) VALUES(?, ?, ?, ?, ?, ?);";
            $stmt = mysqli_stmt_init($db_connect);
            if (!mysqli_stmt_prepare($stmt, $sql_insert)) {
                echo 'There was an error, please try again.';
            } else {
                $audio_file_insert_to_db = '/Beats and sounds store/Uploads/' . $target;
                mysqli_stmt_bind_param($stmt, "ssssis", $genre, $audioName, $author, $audio_file_insert_to_db, $price, $audio);
                mysqli_stmt_execute($stmt);                
                // header('Location: beats.php');
                // echo 'Inserted';
            }
            
            
        }
        
    }
?>

<hr class="margin">
<h3 class="h3 margin">Add Beats</h3>
<div class="margin form-group-container" >
    <form class="" action="beats.php" method="post" enctype="multipart/form-data">

    <div class="form-group pos-middle" >

        <div class="margin form-group-child col-3">
            <label for="gnr">Genre:</label>
            <select name="gnr" id="">
                <option value="0"></option>
                <?php while($sql_gnr_fetch = mysqli_fetch_assoc($sql_gnr_query)) :  ?>
                    <option value="<?= $sql_gnr_fetch['genre']; ?>"><?= $sql_gnr_fetch['genre']; ?></option>
                <?php endwhile;  ?>
            </select>
        </div>

        <!-- <div class="margin form-group-child col-3">
            <label for="beat_title">Beat Title:</label>
            <input type="text" name="beat_title">
        </div> -->

        <div class="margin form-group-child col-3">
            <label for="beat_author">Author:</label>
            <input type="text" name="beat_author">
        </div>

        <div class="margin form-group-child col-3">
            <label for="beat_img">Beat Photo:</label>
            <input type="file" name="beat_img" accept=".jpg, .jpeg, .png">
        </div>
        
        <div class="margin form-group-child col-3">
            <label for="beat_price">Price:</label>
            <input type="text" name="beat_price">
        </div>
        
        <div class="margin form-group-child col-3">
            <label for="audio_beat">Audio Beat:</label>
            <input type="file" name="audio_beat" accept=".wav, .mp3">
        </div>
        
        <div class="margin form-group-child col-3">
            <button type="submit" name="data_sub">Add Beat</button>
        </div>
    </div>

    </form>
</div>























<?php
    include 'Includes/footer.php';
?>