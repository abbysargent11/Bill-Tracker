<?php
session_start();
require_once "config.php";
require_once "tools.php";

// Create connection
$conn = new mysqli($hn,$un,$pw,$db);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$username = $_SESSION['username'];
$userID = $_SESSION['userID'];
$query = "SELECT userID FROM users WHERE username='$username'";
$result = $conn->query($query);

$rows = $result->num_rows;
foreach($result as $item) {
    $userID = $item['userID'];
}

$query = "SELECT name,amount FROM bills WHERE userID='$userID'";
$result = $conn->query($query);
$rows = $result->num_rows;

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo $row["name"] . "<br>" . "$" . $row["amount"] . "<br>" . "<br>";
  }
} else {
  echo "No bills added.";
}



$conn->close();
?>