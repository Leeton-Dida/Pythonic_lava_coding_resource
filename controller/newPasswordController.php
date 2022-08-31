<?php

session_start();
include '../config/connection.php';

//get emil from session
$email = $_SESSION['email'];

//get password from new password form
$password = $_POST['Password'];

//update password in database with new password 
$sql = "UPDATE users SET Password = '$password' WHERE Email = '$email'";
$result = mysqli_query($conn, $sql);

//if password is updated then show bootstrap alert and redirect to login page
if ($result) {
    echo "<script type='text/javascript'>alert('Password updated');</script>";
    header("refresh:0;url=../login.php");
} else {
    //if password is not updated then show sql error and redirect to new password page
    echo "<script type='text/javascript'>alert('" . mysqli_error($conn) . "');</script>";   
}

?>