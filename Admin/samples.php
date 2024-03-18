<?php
    require_once '../DB/beats&sounds_db.php';
    require_once '../Functions/functions.php';

    // check if user has logged in
    if(!is_logged_in()){
        login_error_redirect();
    }
    include 'includes/head.php';
    include 'Includes/navbar.php';

    $sql_gnr = "SELECT * FROM genre WHERE parent = 0";
    $sql_gnr_query = mysqli_query($db_connect, $sql_gnr);
?>


<hr class="margin">
<h3 class="h3 margin">Add Samples</h3>
<div class="margin form-group-container" >
    <form class="" action="samples.php" method="post" enctype="multipart/form-data">

    <div class="form-group pos-middle" >

        <div class="margin form-group-child col-3">
            <label for="gnr">Genre:</label>
            <select name="gnr" id="">
                <option value="0"></option>
                <?php while($sql_gnr_fetch = mysqli_fetch_assoc($sql_gnr_query)) :  ?>
                    <option value="<?= $sql_gnr_fetch['id']; ?>"><?= $sql_gnr_fetch['genre']; ?></option>
                <?php endwhile;  ?>
            </select>
        </div>

        <div class="margin form-group-child col-3">
            <label for="beat_title">Samples Title:</label>
            <input type="text" name="smp_title">
        </div>

        <div class="margin form-group-child col-3">
            <label for="beat_author">Author:</label>
            <input type="text" name="smp_author">
        </div>

        <div class="margin form-group-child col-3">
            <label for="beat_img">Samples Photo:</label>
            <input type="file" name="smp_img" accept=".jpg, .jpeg, .png">
        </div>
        
        <div class="margin form-group-child col-3">
            <label for="beat_price">Price:</label>
            <input type="text" name="smp_price">
        </div>
        
        <div class="margin form-group-child col-3">
            <label for="audio_beat">Samples Audio:</label>
            <input type="file" name="smp_audio" accept=".wav, .mp3">
        </div>

        <div class="margin form-group-child col-3">
            <label for="audio_beat">Instrument:</label>
            <input type="text" name="smp_instrument">
        </div>

        <div class="margin form-group-child col-3">
            <label for="audio_beat">Samples BPM:</label>
            <input type="text" name="smp_bpm">
        </div>

        <div class="margin form-group-child col-3">
            <label for="audio_beat">Samples Key:</label>
            <input type="text" name="smp_key">
        </div>
        
        <div class="margin form-group-child col-3">
            <button type="submit" name="smp_sub">Add Samples</button>
        </div>
    </div>

    </form>
    <?php
    if (isset($_POST['smp_sub'])) {
        $genre = sanitize_input($_POST['gnr']);
        $sname = sanitize_input($_POST['smp_title']);
        $author = sanitize_input($_POST['smp_author']);
        $img = sanitize_input($_FILES['smp_img']['name']);
        $price = sanitize_input($_POST['smp_price']);
        $audio = sanitize_input($_FILES['smp_audio']['name']);
        $instrument = sanitize_input($_POST['smp_instrument']);
        $bpm = sanitize_input($_POST['smp_bpm']);
        $key = sanitize_input($_POST['smp_key']);

        // image
        $target_dir = "../Samples Uploads/";
        $file_explode = basename($_FILES["smp_img"]["name"]);
        $name_ext = explode(".", $file_explode);
        $name = $name_ext[0];
        $ext = @$name_ext[1];    
        // $target = md5($name) . "." . $ext;
        $target = md5(uniqid($name)) . "." . $ext;
        $target_file = $target_dir . basename($target);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // audio
        $audio_dir = "../Audio/";
        $audio_file = basename($_FILES["smp_audio"]["name"]);       
        $audio_target_file = $audio_dir . basename($audio_file);
        $audioFileType = strtolower(pathinfo($audio_target_file,PATHINFO_EXTENSION));


        $error = array();
        $success = true;

        if(empty($genre) || empty($sname) || empty($author) || empty($img) || empty($price) || empty($audio) || empty($instrument) || empty($bpm) || empty($key)){
            $error[] = 'Fill in all Fields.';
            $success = false;
            // exit();
        } 
        
        if (!empty($bname)) {
            if (!preg_match("/^[A-Za-z0-9]*$/",$bsname)) {
                
                $error[] = 'Please provide a correct Sample Title.';
                $success = false;
            }
            // exit();
        }

        if (!empty($author)) {
            if (!preg_match("/^[A-Za-z0-9]*$/",$author)) {

                $error[] = 'Please provide a correct Author name.';
                $success = false;
            }
            // exit();
        }

        if (!empty($img)) {

            // check if it's a real image 
            $check = getimagesize($_FILES["smp_img"]["tmp_name"]);
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
            if ($_FILES["smp_img"]["size"] > 1000000) {

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
            $audio_check = $_FILES['smp_audio']['type'];
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

        if (!empty($instrument)) {
            if (!preg_match("/^[A-Za-z0-9]*$/",$instrument)) {

                $error[] = 'Please provide the correct instrument.';
                $success = false;
            }
            // exit();
        }

        if (!empty($bpm)) {
            if (!preg_match("/^[0-9]*$/",$bpm)) {

                $error[] = 'Please provide the correct BPM. <i>(eg.100)</i>';
                $success = false;
            }
            // exit();
        }

        if (!empty($key)) {
            if (!preg_match("/^[A-Za-z#]*$/",$key)) {

                $error[] = 'Please provide a correct Sample Key.';
                $success = false;
            }
            // exit();
        }

        // check if data exist
        $sql_insert_check = "SELECT * FROM samples WHERE sample_name = '$sname' AND sample_audio = '$audio'";
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
            echo 'Success';
            // upload image to upload directory
            if (move_uploaded_file($_FILES["smp_img"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["smp_audio"]["tmp_name"], $audio_target_file)) {
                // echo "The file ". htmlspecialchars( basename( $_FILES["beat_img"]["name"])). " has been uploaded.";
                // echo "The file ". htmlspecialchars( basename( $_FILES["audio_beat"]["name"])). " has been uploaded.";
            }

            // insert data to database
            $sql_insert = "INSERT INTO samples (sample_name, author, image, price, sample_audio, instrument, genre, BPM, sample_key, sample_code) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
            $stmt = mysqli_stmt_init($db_connect);
            if (!mysqli_stmt_prepare($stmt, $sql_insert)) {
                echo 'There was an error, please try again.';
            } else {
                $audio_file_insert_to_db = '/Beats and sounds store/Samples Uploads/' . $target;
                $smp_code = "SELECT * FROM samples";
                $smp_query = mysqli_query($db_connect,$smp_code);
                $smp_rows = mysqli_num_rows($smp_query);
                $sample_code = 'BSS_'.$smp_rows;
                $genre = 'None';
                mysqli_stmt_bind_param($stmt, "sssisssiss", $sname, $author, $audio_file_insert_to_db, $price, $audio, $instrument, $genre, $bpm, $key, $sample_code);
                mysqli_stmt_execute($stmt);                
                // header('Location: beats.php');
                // echo 'Inserted';
            }
            
            
        }
        
    }
?>
</div>





















<?php
    include 'Includes/footer.php';
?>