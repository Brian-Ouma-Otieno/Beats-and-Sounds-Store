<?php
    require_once '../DB/beats&sounds_db.php';
    require_once '../Functions/functions.php';
    

    // check if user has logged in
    if(!is_logged_in()){
        header('Location: login.php');
    }

    include 'includes/head.php';
    include 'Includes/navbar.php';
    // $h = '100000000';
    // $selector = md5(uniqid());
    // $selector2 = 'BSS_'.uniqid();
    // // $selector3 = 'BSS_'.rand();
    // $c = strlen($selector);
    // $cc = bin2hex($selector);
    // $token = random_bytes(32);
    // echo $selector. '<br>';
    // echo $selector2. '<br>';
    // echo $cc. '<br>';
    // echo $c. '<br>';
    // // echo $token;
   
    // $a = "SELECT * FROM aaa";
    // $a_query = mysqli_query($db_connect,$a);
    // $aa = mysqli_fetch_assoc($a_query);
    // $aaa = mysqli_num_rows($a_query);
    // $x = 'BSS_'.$aaa;
    // $selector3 = 'BSS'.mt_rand(1000,9999).$aaa;
    // echo $selector3. '<br>';
    // echo $x. '<br>';
    // echo $aaa. '<br>';


    // checking number of registered users
    $checkRegisteredUsers = mysqli_num_rows( mysqli_query($db_connect,"SELECT * FROM regular_users"));

    // checking number of users online
    $checkUsersOnline = mysqli_num_rows(mysqli_query($db_connect,"SELECT reg_userStatus FROM regular_users WHERE reg_userStatus = 1"));


?>

<hr class="margin">
<div class="pos-middle">
    <div class="samples margin col-6" style="border:1px solid purpl; background-color: #C0C0C0; width:100; height:500">
        <table id="t01" class="col-12">

            <tr>
                <th>REGISTERED USERS</th>
                <th>USERS ONLINE</th>
            </tr>

            <tr>
                <td><?= $checkRegisteredUsers;?></td>
                <td><?= $checkUsersOnline;?></td>
            </tr>
            
        </table>
    </div>
</div>





<?php
    include 'Includes/footer.php';
?>