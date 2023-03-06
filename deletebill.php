<?php
session_start();
require_once "config.php";
require_once "tools.php";
require_once "bills.php";

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

$name = $_POST['nameofdelete'];

$query = "DELETE FROM bills WHERE name='$name'";
$result = $conn->query($query);

if ($conn->query($query) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();

header("location: bills.php");
?>