<?php
    require_once '../DB/beats&sounds_db.php';
    require_once '../Functions/functions.php';
    
    // check if user has logged in
    if(!is_logged_in()){
        login_error_redirect();
    }

    include 'includes/head.php';
    include 'Includes/navbar.php';
    // require_once '../Functions/functions.php';

    $sql_gnr = "SELECT * FROM genre WHERE parent = 0";
    $sql_gnr_query = mysqli_query($db_connect, $sql_gnr);
?>


<?php

    //Edit Brand
    if(isset($_GET['ed']) && !empty($_GET['ed'])){
        $edit_id = (int)$_GET['ed'];
        $edit_id = Sanitize_input($edit_id);
        $edit_sql = "SELECT * FROM genre WHERE id = '$edit_id'";
        $edit_result = mysqli_query($db_connect,$edit_sql);
        $edit_fetch = mysqli_fetch_assoc($edit_result); 
       
    }   

    //Delete Brand
    if(isset($_GET['del']) && !empty($_GET['del'])){
        $delete_id = (int)$_GET['del'];
        $delete_id = Sanitize_input($delete_id);
        $sql_delete = "DELETE FROM genre WHERE id = '$delete_id'";
        mysqli_query($db_connect,$sql_delete);
        header('Location:genre.php');
    }  
    
 
?>


<hr class="margin">
<h3 class="h3 margin">Add Genre</h3>
<form class="margin pos-middle" action="genre.php <?= ((isset($_GET['ed']))?'?edit='.$edit_id:''); ?>" method="post">
    <?php 
        if(isset($_GET['ed'])){
            $genre_value = $edit_fetch['genre'];
        }else{
            if(isset($_POST['add_genre'])){
                $genre_value = Sanitize_input($_POST['add_genre']);
            }
        }
    ?>
    
    <div class="form-group-child col-3">
        <input type="text" name="<?=((isset($_GET['ed']))?'edit_genre':'add_genre');?>" placeholder="Add Genre" value="<?=((isset($_GET['ed']))?$genre_value:'');?>">        
    </div> 

  
    <div class="form-group-child col-2">

        <?php if(isset($_GET['ed'])):?>
            <!-- <a href="genre.php" class="btn btn-default">Cancel</a> -->
            <a href="genre.php" class="">Cancel</a>
        <?php endif;?>
        
        <button type="submit"  name="<?=((isset($_GET['ed']))?'ed':'genre_sub');?>" value=""><?=((isset($_GET['ed']))?'Edit':'Add');?> Genre</button>
        
    </div>
    
</form>

<?php

    // adding genre
    if (isset($_POST['genre_sub'])) {
        $add_genre = strtolower(sanitize_input($_POST['add_genre']));

        $error = array();
        $success = true;

        if(empty($add_genre)){
            $error[] = 'Fill in the Field.';
            $success = false;
        } 
        
        if (!empty($add_genre)) {
            if (!preg_match("/^[A-Za-z0-9\s]*$/",$add_genre)) {
                
                $error[] = 'Please provide the correct Genre.';
                $success = false;
            }
        }

        if ($success == false) {
            echo display_errors($error[0]);
        }else{
            $sql_check = "SELECT * FROM genre WHERE genre = '$add_genre'";
            $sql_query_check = mysqli_query($db_connect,$sql_check);
            $sql_row_check = mysqli_num_rows($sql_query_check);
            if ($sql_row_check > 0) {
                $error[] = 'The genre already exist';
                echo display_errors($error[0]);
            } else {

                // insert data to database
                $sql_insert = "INSERT INTO genre (genre) VALUES(?);";
                $stmt = mysqli_stmt_init($db_connect);
                if (!mysqli_stmt_prepare($stmt, $sql_insert)) {
                    echo 'There was an error';
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $add_genre);
                    mysqli_stmt_execute($stmt);
                    $error[] = 'Added Successfuly';
                    echo display_errors($error[0]);
                }
            }
        }
        
    } 

    // edit data
    if (isset($_POST['ed'])) {
        if(isset($_GET['edit']) && !empty($_GET['edit'])){
            $edit_genre = trim(strtolower(sanitize_input($_POST['edit_genre'])));
            $ed_id = (int)$_GET['edit'];
            $ed_id = Sanitize_input($ed_id); 

            $sql_check_ed = "SELECT * FROM genre WHERE genre = '$edit_genre'";
            $sql_query_check_ed = mysqli_query($db_connect,$sql_check_ed);
            $sql_row_check_ed = mysqli_num_rows($sql_query_check_ed);
            if ($sql_row_check_ed > 0) {
                $error[] = 'The genre already exist';
                echo display_errors($error[0]);
            } else {
                    // edit data to database
                $ed_sql = "UPDATE genre SET genre = ? WHERE id = ?";
                $stmt = mysqli_stmt_init($db_connect);
                if (!mysqli_stmt_prepare($stmt, $ed_sql)) {
                    $error[] = 'There was an error';
                    echo display_errors($error[0]);
                } else {
                    mysqli_stmt_bind_param($stmt, "si", $edit_genre, $ed_id);
                    mysqli_stmt_execute($stmt);
                    $error[] = 'Edited Successfuly';
                    echo display_errors($error[0]);
                }
            }
            
        }    
    }
    
 
?>




<div class="pos-middle">
    <div class="samples margin col-6">
        <table id="t01" class="col-12">
            
            <tr>
                <th></th>
                <th>Genre</th>
                <th></th>
            </tr>
            <?php while($sql_gnr_fetch = mysqli_fetch_assoc($sql_gnr_query)) :  ?>
            <tr>
                <td><a href="genre.php?ed=<?= $sql_gnr_fetch['id']; ?>" title="edit"><i class="fas fa-pencil"></i></a></td>
                <td><?= $sql_gnr_fetch['genre']; ?></td>
                <td><a href="genre.php?del=<?= $sql_gnr_fetch['id'];?>" title="delete"><i class="fas fa-remove"></i></a></td>
            </tr>
            <?php endwhile;  ?>
        </table>
    </div>
</div>







<?php
    include 'Includes/footer.php';
?>