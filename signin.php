<?php

require_once "config.php";

if(isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli($hn,$un,$pw,$db);

    //SANTIZATION

    $query = "SELECT * FROM users WHERE username='$username'";

    $result = $conn->query($query);
    if(!result) die("Database access failed");

    foreach($result as $item) {
        if(password_verify($password,$item['password'])) {
            //want this to bring them to their habits
            session_start();
            $_SESSION['username'] = $username;
            header('Location: bills.php');

        
        } else {
            echo "Incorrect Password, Please Retry.";
        }
     }
}


?>