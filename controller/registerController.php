<?php

include '../config/connection.php';

#collect txtName, txtSurname, txtEmail, txtPassword, txtRepeatPassword from the form
$txtName = $_POST['txtName'];
$txtSurname = $_POST['txtSurname'];
$txtEmail = $_POST['txtEmail'];
$txtPassword = $_POST['txtPassword'];
$txtRepeatPassword = $_POST['txtRepeatPassword'];
$rdoAdmin = $_POST['rdoAdmin'];



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

            #if the user is an admin, insert the user id into the admin table
            if ($rdoAdmin == "admin") {
                $sql = "INSERT INTO admin (user_id) VALUES ((SELECT id FROM users WHERE Email = '$txtEmail'))";
                if (mysqli_query($conn, $sql)) {

                    // //set is_admin to 1 in the users table
                    // $sql = "UPDATE users SET is_admin = 1 WHERE Email = '$txtEmail'";
                    // if (mysqli_query($conn, $sql)) {
                    //     echo "<script type='text/javascript'>alert('Account created successfully.');</script>";
                    //     echo "<script>window.location.href='../login.php'</script>";
                    //     // header("Location: ../Login.php");
                    // } else {
                    //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    // }

                    echo "<script type='text/javascript'>alert('Account created successfully.');</script>";
                        echo "<script>window.location.href='../login.php'</script>";
                }else{
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "<script type='text/javascript'>alert('Account created successfully.');</script>";
                echo "<script>window.location.href='../login.php'</script>";
                // header("Location: ../Login.php");
            }

        } else {
            #if the user is not inserted into the database, redirect to the register page
            echo "<script type='text/javascript'>alert('Could not create account');</script>";
            echo "<script>window.location.href='../register.php'</script>";
           # header("refresh:0;url=../Register.html");
        }
    } else {
        #if the passwords do not match, redirect to the register page
        echo "<script type='text/javascript'>alert('Passwords do not match!');</script>";
        header("refresh:0;url=../register.php");
    }
   
}

