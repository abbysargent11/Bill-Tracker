<?php

session_start();
require_once "config.php";
require_once "tools.php";



$username = $_SESSION['username'];
$filepath = "uploads/$username.jpg";


?>