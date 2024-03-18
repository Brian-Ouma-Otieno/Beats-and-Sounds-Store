<?php
  require_once '../DB/beats&sounds_db.php';
  require_once '../Functions/functions.php';
  
  // check if user has logged in
  if(!is_logged_in()){
      login_error_redirect();
  }

  include 'includes/head.php';
  include 'Includes/navbar.php';
  

  $userQuery = mysqli_query($db_connect, "SELECT * FROM admin_editor_users ORDER BY username");
?>


<h2 class="h3 margin">Users</h2>

<hr class="margin">

<div class="pos-middle">
    <div class="samples margin col-6">
        <table id="t01" class="col-12">         
          <tr>
            <th colspan='2'>USER NAME</th>
            <th>EMAIL</th>
            <th colspan='2'>JOIN DATE</th>
            <th colspan='4'>LAST LOGIN</th>
            <th colspan='3'>PERMISSION</th>
          </tr>
          <?php while($user = mysqli_fetch_assoc($userQuery)) : ?>
            <tr>
              <td colspan='2'><?=$user['username']; ?></td> <br>
              <td><?=$user['email']; ?></td> <br>
              <td colspan='2'><?=pretty_date($user['join_date']); ?></td> <br>
              <td colspan='4'><?=(($user['last_login'] == '0000-00-00 00:00:00')?'Never':pretty_date($user['last_login'])); ?></td> <br>
              <td colspan='3'><?=$user['permissions']; ?></td>
            </tr>
          <?php endwhile; ?>
        </table>
    </div>
</div>











<?php
    include 'Includes/footer.php';
?>