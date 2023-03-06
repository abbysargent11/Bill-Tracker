<?php
session_start();
require_once "config.php";
require_once "tools.php";



if(isset($_POST['name']))  {
        $conn = new mysqli($hn,$un,$pw,$db);
        
        $paid_id = NULL;
        $name = $_POST['name'];
        $date = $_POST['date'];
        

        session_start();
        $username = $_SESSION['username'];
        $userID = $_SESSION['userID'];

        $query = "SELECT userID FROM users WHERE username='$username'";
        $result = $conn->query($query);
        $rows = $result->num_rows;
        foreach($result as $item) {
            $userID = $item['userID'];
        }

        //add bill to paid
        $stmt = $conn->prepare('INSERT INTO paid VALUES(?,?,?,?)');
        $stmt->bind_param('ssss',$userID,$name,$paid_id,$date);
        $stmt->execute();
        $stmt->close();

        $conn->close();


        header("location: bills.php");
    }


$conn->close();
?>