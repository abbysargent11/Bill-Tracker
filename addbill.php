<?php
session_start();
require_once "config.php";
require_once "tools.php";



if(isset($_POST['name']) &&
    isset($_POST['amount']))  {
        $conn = new mysqli($hn,$un,$pw,$db);
        
        $name = sanitize($conn, $_POST['name']);
        $amount = sanitize($conn,$_POST['amount']);
        $id = NULL;
        global $id;

        session_start();
        $username = $_SESSION['username'];
        $userID = $_SESSION['userID'];

        $query = "SELECT userID FROM users WHERE username='$username'";
        $result = $conn->query($query);

        $rows = $result->num_rows;
        foreach($result as $item) {
            $userID = $item['userID'];
        }

        //add bill to bills
        $stmt = $conn->prepare('INSERT INTO bills VALUES(?,?,?,?)');
        $stmt->bind_param('ssss',$id,$userID,$name,$amount);
        $stmt->execute();
        $stmt->close();

        $conn->close();


        header("location: bills.php");
    }


?>