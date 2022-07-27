<?php

include '../config/connection.php';

// get input from $_POST and issert $txtEmail and $txtPassword 
$txtEmail = $_POST['txtEmail'];
$txtPassword = $_POST['txtPassword'];

// check if the email is already in the database
$sql = "SELECT * FROM users WHERE Email = '$txtEmail'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    #check if the password is correct
    $row = mysqli_fetch_assoc($result);
    if ($row['Password'] == $txtPassword) {
        // if the password is correct, set the session variable and redirect to the home page
        $_SESSION['user'] = $txtEmail;
        header("Location: ../index.html");
    } else {
        // if the password is incorrect, reload the login page
        echo "<script type='text/javascript'>alert('Incorrect Email or password');</script>";
		header("refresh:0;url=../login.html");
    }
 
} else {
    // redirect to the Register page
    header("Location: ../Register.html");
}

mysqli_close($conn);
?>

