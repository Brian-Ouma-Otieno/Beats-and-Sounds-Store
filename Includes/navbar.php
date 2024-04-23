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


    // listing all the beats added to cart 
    if (isset($_SESSION['reg_user'])) {       
        $cartCount = $_SESSION['reg_user'];        
        $cartCountnumRows = mysqli_num_rows(mysqli_query($db_connect,"SELECT * FROM cart WHERE reg_userCartid = $cartCount"));
        $cartCount = true;
    }else {
        $cartCount = false;
    }
    
?>
    
<!-- navbar -->
<nav class="margin pos-sp-btwn">
    <div>
        <a title="home" href="/Beats and sounds store/"><i class="fas fa-home"></i></a>
        <button id="genre-btn" title="show genres">Genres</button>
    </div>
    <div class="l-nav pos-middle" style="display:flex; flex-direction:row;">
        <a title="cart" href="/Beats and sounds store/cart/cart.php">Cart <i class="fas fa-shopping-cart"><span style="color: red;"><?=((isset($_SESSION['reg_user']) && $cartCountnumRows > 0 )? $cartCountnumRows:'');?></span> </i></a>

        <?php 
            if(isset($_SESSION['reg_user'])){
                echo '<a title="downloads" href="/Beats and sounds store/download.php">Downloads</a>';
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


