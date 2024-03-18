<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beats_and_sounds";
// $dbname = "beats&sounds_store";

$db_connect = mysqli_connect($servername, $username, $password, $dbname);

if (!$db_connect) {
  die("Connection failed: " . mysqli_connect_error());
}

// start session
session_start();

// setting the default timezone
date_default_timezone_set("Africa/Nairobi");

// require_once '../Functions/functions.php';

if(isset($_SESSION['AEuser'])){
  $user_id = $_SESSION['AEuser'];
  $query = mysqli_query($db_connect, "SELECT * FROM admin_editor_users WHERE id = '$user_id'");
  $user_data = mysqli_fetch_assoc($query);
  $fn = explode(' ', $user_data['username']);
  $user_data['first'] = $fn[0];
  $user_data['last'] = $fn[1];
}

// if(isset($_SESSION['success_flash'])){
//   echo '<div class="tomato pos-middle" style="margin-top:20px;">'.$_SESSION['success_flash'].'</p></div>';
//   unset($_SESSION['success_flash']);
// }

// $cart_id = '';
// $cookie_name = "BSS";
// if(isset($_COOKIE[$cookie_name])){
//   $cart_id = sanitize($_COOKIE[$cookie_name]);
// }







// "CREATE DATABASE beats&sounds_store";

// "CREATE TABLE users(
//     id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     username VARCHAR(255) NOT NULL,
//     email VARCHAR(255) NOT NULL,
//     password VARCHAR(50) NOT NULL,
//     join_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";


// "CREATE TABLE afro_beat(
//     id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     beat_name VARCHAR(255) NOT NULL,
//     author VARCHAR(255) NOT NULL,
//     image VARCHAR(255) NOT NULL,
//     price VARCHAR(255) NOT NULL,
//     audio VARCHAR(255) NOT NULL,
//     date_uploaded TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// "CREATE TABLE amapiano(
//     id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     beat_name VARCHAR(255) NOT NULL,
//     author VARCHAR(255) NOT NULL,
//     image VARCHAR(255) NOT NULL,
//     price VARCHAR(255) NOT NULL,
//     audio VARCHAR(255) NOT NULL,
//     date_uploaded TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// "CREATE TABLE trap(
//     id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     beat_name VARCHAR(255) NOT NULL,
//     author VARCHAR(255) NOT NULL,
//     image VARCHAR(255) NOT NULL,
//     price VARCHAR(255) NOT NULL,
//     audio VARCHAR(255) NOT NULL,
//     date_uploaded TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// "CREATE TABLE samples(
//    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//    sample_name VARCHAR(255) NOT NULL,
//    author VARCHAR(255) NOT NULL,
//    image VARCHAR(255) NOT NULL,
//    price VARCHAR(255) NOT NULL,
//    sample_audio VARCHAR(255) NOT NULL,
//    instrument VARCHAR(255) NOT NULL,
//    genre VARCHAR(255) NOT NULL,
//    BPM VARCHAR(255) NOT NULL,
//    sample_key VARCHAR(255) NOT NULL,
//    sample_code VARCHAR(255) NOT NULL,
//    date_uploaded TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//  )"






?>