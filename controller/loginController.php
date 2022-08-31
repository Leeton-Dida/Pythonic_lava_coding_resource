<?php
session_start();
include '../config/connection.php';

// get input from $_POST and issert $txtEmail and $txtPassword 
$txtEmail = $_POST['txtEmail'];
$txtPassword = $_POST['txtPassword'];
$rdoAdmin = $_POST['rdoAdmin'];

if ($rdoAdmin == 'admin') {
    #get user data from database where is_admin = 1
    $sql = "SELECT * FROM users WHERE email = '$txtEmail' AND password = '$txtPassword' AND is_admin = 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        #check if the password is correct
        $row = mysqli_fetch_assoc($result);
        if ($row['Password'] == $txtPassword) {
            // if the password is correct, set the session variable and redirect to the home page
            $_SESSION['user'] = $txtEmail;
            //store user id in session variable
            $_SESSION['user_id'] = $row['id'];
            //store user name and surname in session variable
            $_SESSION['user_name'] = $row['Name'];
            $_SESSION['user_surname'] = $row['Surname'];


            header('Location: ../admin/index.php');

        } else {
            // if the password is incorrect, reload the login page
            echo "<script type='text/javascript'>alert('Incorrect Email or password');</script>";
            header("refresh:0;url=../login.php");
        }
    } else {
        echo "<script type='text/javascript'>alert('No admin record found. Please contact super admin for additonal support');</script>";
        header("refresh:0;url=../login.php");
    }

} else {


    $sql = "SELECT * FROM users WHERE Email = '$txtEmail'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        #check if the password is correct
        $row = mysqli_fetch_assoc($result);
        if ($row['Password'] == $txtPassword) {
            // if the password is correct, set the session variable and redirect to the home page
            $_SESSION['user'] = $txtEmail;
            //store user id in session variable
            $_SESSION['user_id'] = $row['id'];
            //store user name and surname in session variable
            $_SESSION['user_name'] = $row['Name'];
            $_SESSION['user_surname'] = $row['Surname'];

            #check if session variable is set
            if (isset($_SESSION['user_id'])) {
                header('Location: ../index.php');
            } else {
                header('Location: ../login.php');
            }
        } else {
            // if the password is incorrect, reload the login page
            echo "<script type='text/javascript'>alert('Incorrect Email or password');</script>";
            header("refresh:0;url=../login.php");
        }
    } else {
        // redirect to the Register page
        header("Location: ../register.php");
    }
}


mysqli_close($conn);
