<?php
    // afro beat query
    // $sql_afro = "SELECT id FROM beats";
    $sql_afro = "SELECT id FROM beats WHERE genre = 'afrobeats' AND featured = 0";
    $afro_query = mysqli_query($db_connect,$sql_afro);
    
    if (mysqli_num_rows($afro_query) < 0 ) {
        if (isset($x)) {
            $x = '';
        }
        
    } else if(mysqli_num_rows($afro_query) > 0 ) {
        $afro_fetch = mysqli_fetch_assoc($afro_query);
        $x = $afro_fetch['id'];
        
    }
   
    

    // amapiano query
    $sql_amapiano = "SELECT id FROM amapiano";
    $amapiano_query = mysqli_query($db_connect,$sql_amapiano);
    $amapiano_fetch = mysqli_fetch_assoc($amapiano_query);

    // trap query
    $sql_trap = "SELECT id FROM trap";
    $trap_query = mysqli_query($db_connect,$sql_trap);
    $trap_fetch = mysqli_fetch_assoc($trap_query);
 
?>
    
<!-- navbar -->
<nav class="margin pos-sp-btwn">
    <div>
        <a title="home" href="/Beats and sounds store/"><i class="fas fa-home"></i></a>
        <button id="genre-btn" title="show genres">Genres</button>
    </div>
    <div class="l-nav pos-middle" style="display:flex; flex-direction:row;">
        <a title="cart" href="/Beats and sounds store/cart/cart.php">Cart <i class="fas fa-shopping-cart"></i></a>

        <?php 
            if(isset($_SESSION['reg_user'])){
                echo '<a title="logout" href="/Beats and sounds store/Users/logout.php">Logout</a>';
            }else {
                echo '<a title="signup" href="/Beats and sounds store/Users/signup.php">Signup</a>';
                echo '<a title="login" href="/Beats and sounds store/Users/login.php">Login</a>';
            }
        ?>
    </div>
    
</nav>

<!-- genres -->   
<div id="genre-modal" class="genres margin">
    <div class="genre-1">
        <span id="genre-close" style="font-size:40px;cursor:pointer;padding-top: 10px;position:absolute; top:0;right:10px">&times;</span>
        <a href="/Beats and sounds store/genres/afrobeats.php?id=<?= (($x)?$x:'');?>" title="Afrobeat genre">AfroBeats</a>
        <a href="/Beats and sounds store/genres/amapiano.php?id=<?= $amapiano_fetch['id']; ?>" title="Amapiano genre">Amapiano</a>
        <a href="/Beats and sounds store/genres/trap.php?id=<?= $trap_fetch['id']; ?>" title="Trap genre">Trap</a>
    </div>   
</div>




<!-- login form -->
<!-- <div class="form-content  pos-middle" id="form-content2">        
    <div class="form-container">
        <span class="close" style="color: white;" onclick="login.style.display = 'none' "> &#10006; </span>
        <form action="/Beats and sounds store/users/login.php" method="POST" class="form1" id="log_form">
                <div class="form-control error">
                <label for="">Email</label>
                <input type="email" placeholder="Email" name="log_mail" id="log_email">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            </div>
            <div class="form-control">
                <label for="">Password</label>
                <input type="password" placeholder="Password" name="log_password" id="log_pswd">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            </div>
            <button type="submit" id="log_btn" name="login">Login</button>
            <small class="login-error-message"></small> <br>
            <p>Forgot password?</p><a href="/Beats and sounds store/users/reset-password.php" class="links">Click here</a>
        </form>
    </div>    
</div> -->


<!-- signup form -->
<!-- <div class="form-content  pos-middle" id="form-content">        
    <div class="form-container">
        <div class="header">
            <h2>SignUp</h2>
        </div>
        <span class="close" style="color: white;" onclick="signup.style.display = 'none' "> &#10006; </span>
        <div class="form1"></div>
        <form action="/Beats and sounds store/users/signup.php" method="POST" class="form1" id="form1">
            <div class="form-control success">
                <label for="">Username</label>
                <input type="text" placeholder="Username" name="username_1" id="uname">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            </div>
            <div class="form-control error">
                <label for="">Email</label>
                <input type="email" placeholder="Email" name="email_1" id="mail">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            </div>
            <div class="form-control">
                <label for="">Password</label>
                <input type="password" placeholder="Password" name="password1" id="pswd">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            </div>
            <div class="form-control">
                <label for="">Confirm Password</label>
                <input type="password" placeholder="Confirm Password" name="password2" id="password2">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            </div>
            <button id="signup-btn" name="signup" type="submit">SignUp</button>
            <small class="signup-error-message"></small>
            <p class="signup-error-message"></p>
        </form>
    </div>    
</div> -->


