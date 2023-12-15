<?php
$cookie_name = "bbb";
$cookie_value = "Brian";
setcookie($cookie_name, $cookie_value, time() + (2), "/");



if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!".'<br>';
    echo "Cookie 'user' is deleted.".'<br>';
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name].'<br>';
}

if(count($_COOKIE) > 0) {
    echo "Cookies are enabled.";
} else {
    echo "Cookies are disabled.";
}
//setcookie($cookie_name, $cookie_value, time() + (-2), "/");