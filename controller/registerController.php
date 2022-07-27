<?php

include '../config/connection.php';

#collect txtName, txtSurname, txtEmail, txtPassword, txtRepeatPassword from the form
$txtName = $_POST['txtName'];
$txtSurname = $_POST['txtSurname'];
$txtEmail = $_POST['txtEmail'];
$txtPassword = $_POST['txtPassword'];
$txtRepeatPassword = $_POST['txtRepeatPassword'];



#check if the email is already in the database
$sql = "SELECT * FROM users WHERE Email = '$txtEmail'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    #if the email is already in the database, redirect to the login page
    echo "<script type='text/javascript'>alert('Account with email already exists.');</script>";
    header("Location: ../Login.html");
} else {
    #check if the passwords match
    if ($txtPassword == $txtRepeatPassword) {
        #if the passwords match, insert the user into the database
        $sql = "INSERT INTO users (Name, Surname, Email, Password) VALUES ('$txtName', '$txtSurname', '$txtEmail', '$txtPassword')";
        if (mysqli_query($conn, $sql)) {
            #if the user is inserted into the database, redirect to the login page
            header("Location: ../Login.html");
        } else {
            #if the user is not inserted into the database, redirect to the register page
            echo "<script type='text/javascript'>alert('Could not create account');</script>";
           # header("refresh:0;url=../Register.html");
        }
    } else {
        #if the passwords do not match, redirect to the register page
        echo "<script type='text/javascript'>alert('Passwords do not match!');</script>";
        header("refresh:0;url=../Register.html");
    }
   
}

?>