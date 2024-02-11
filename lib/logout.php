<?php require("../lib/config.php");

require("../lib/functions.php");

session_start();

session_unset();


if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}

//setcookie("user_name", "", time()-3600);




header("location:../index.php");



?>

