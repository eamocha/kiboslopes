<?php

if(!defined('DB_HOST')) define('DB_HOST','localhost');

if(!defined('DB_USER')) define('DB_USER','bluerang_bus');

if(!defined('DB_PASSWORD')) define('DB_PASSWORD','surgin123');

if(!defined('DB_NAME')) define('DB_NAME','bluerang_bus');

$connection=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD)or die('Could not connect to the database : '.mysqli_error($conn)());

mysqli_select_db(DB_NAME) or die('Could not select the database : '.mysqli_error($conn)());


?>