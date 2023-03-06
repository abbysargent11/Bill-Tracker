<?php
session_start();
require_once "config.php";


if(isset($_POST['firstname']) &&
isset($_POST['lastname']) &&
isset($_POST['username']) &&
isset($_POST['password'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $id = NULL;
    
    function convertImage($originalImage, $outputImage, $quality)
{
    // jpg, png, gif
    $exploded = explode('.',$originalImage);
    $ext = $exploded[count($exploded) - 1]; 

    if (preg_match('/jpg|jpeg/i',$ext))
        $imageTmp=imagecreatefromjpeg($originalImage);
    else if (preg_match('/png/i',$ext))
        $imageTmp=imagecreatefrompng($originalImage);
    else if (preg_match('/gif/i',$ext))
        $imageTmp=imagecreatefromgif($originalImage);
    else 
        return 0;

    // quality is a value from 0 (worst) to 100 (best)
    imagejpeg($imageTmp, $outputImage, $quality);
    imagedestroy($imageTmp);

    return 1;
};
    $orig_file = $_FILES["avatar"]["tmp_name"];
    $target_dir = 'uploads/';
    $destination = "$target_dir$username.jpg";
    move_uploaded_file($orig_file,$destination);

    $_SESSION['picture'] = $destination; //delete after getpp.php
    

    $conn = new mysqli($hn,$un,$pw,$db);
    if ($conn->connect_error) die ("Fatal error on connect");

    $stmt = $conn->prepare('INSERT INTO users VALUES(?,?,?,?,?,?)');

    $stmt->bind_param('ssssss', $id, $firstname, $lastname, $username, $password, $destination);

    $stmt->execute();

    $stmt->close();
    $conn->close();

    header('Location: signin.html');
}




?>