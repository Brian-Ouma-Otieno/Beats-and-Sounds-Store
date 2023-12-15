<?php
    require_once '../DB/beats&sounds_db.php';
    require_once '../Functions/functions.php';
    
    // check if user has logged in
    if(!is_logged_in()){
        login_error_redirect();
    }

    include 'Includes/head.php';
    include 'Includes/navbar.php';
    

    // $sql_gnr = "SELECT * FROM genre WHERE parent = 0";
    // $sql_gnr_query = mysqli_query($db_connect, $sql_gnr);
    // $password = 'paswword';
    //     $hashed = password_hash($password,PASSWORD_DEFAULT);
    //     echo $hashed;
    $userQuery = mysqli_query($db_connect, "SELECT * FROM admin_editor_users ORDER BY username");
?>


<h2>Users</h2>

<?php while($user = mysqli_fetch_assoc($userQuery)) : ?>
        <tr>     
          <td>
            <?php if($user['id'] != $user_data['id'] ) : ?>
              <a href="users.php?delete=<?=$user['id']; ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove-sign"></span></a>
            <?php endif; ?>
          </td>
          <td><?=$user['username']; ?></td> <br>
          <td><?=$user['email']; ?></td> <br>
          <td><?=pretty_date($user['join_date']); ?></td> <br>
          <td><?=(($user['last_login'] == '0000-00-00 00:00:00')?'Never':pretty_date($user['last_login'])); ?></td> <br>
          <td><?=$user['permissions']; ?></td>
        </tr>
      <?php endwhile; ?>













<?php
    include 'Includes/footer.php';
?>