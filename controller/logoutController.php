<?php
session_start();
 
if(session_destroy()) {;
    echo "<script type='text/javascript'>alert('Loged out.');</script>";
    header("refresh:0;url=../login.php");
    // header('Location: ../login.php');
} else {
    echo "<script type='text/javascript'>alert('Logout failed.');</script>";
}

?>