<?php

include './config/connection.php';

//get user Name from users table for the user_id in admin table
$sql_user = "SELECT Name FROM users where id = 1";
$result_user = mysqli_query($conn, $sql_user);
$row_user = mysqli_fetch_assoc($result_user);
$user_name = $row_user['Name'];

echo $user_name;

?>