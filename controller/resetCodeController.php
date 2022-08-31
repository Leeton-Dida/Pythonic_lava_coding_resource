<?php
session_start();

//get reset code from reset code form
$resetCode = $_POST['code'];

//get session reset code
$code = $_SESSION['resetCode'];

//check if reset code is correct
if ($resetCode == $code) {
    //redirect to change password page
    header("Location: ../new password.php");
} else {
    //if reset code is incorrect then show bootstrap alert and redirect to reset code page
    echo "<script type='text/javascript'>alert('Reset code is incorrect');</script>";
    header("refresh:0;url=../reset code.php");
}

?>