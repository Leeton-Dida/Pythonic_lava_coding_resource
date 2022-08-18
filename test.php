<?php
//start session and check if user is logged in or not and if not redirect to login page 
session_start();
if(isset($_SESSION['user'])){
    echo "Welcome " . $_SESSION['user'];
}else{
    echo "<script type='text/javascript'>alert('You are not logged in');</script>";
    // header('Location: ./login.php');
}

?>