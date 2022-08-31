<?php
session_start();
include '../config/connection.php';


// get the user's data from the database
$query = "SELECT * FROM users WHERE id = '{$_SESSION['user_id']}'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
//store user name, email, last name and score from url
$user_name = $user['Name'];
$user_email = $user['Email'];
$user_last_name = $user['Surname'];
$user_score = $user['score'];

//get number of completed content and assignments
$query = "SELECT * FROM student_content WHERE student_id = '{$_SESSION['user_id']}'";
$result = mysqli_query($conn, $query);
$completed_content = mysqli_num_rows($result);

$query = "SELECT * FROM student_assignments WHERE student_id = '{$_SESSION['user_id']}'";
$result = mysqli_query($conn, $query);
$completed_assignments = mysqli_num_rows($result);


//get number of total content and assignments where week is not null
$query = "SELECT * FROM content WHERE week_id != ''";
$result = mysqli_query($conn, $query);
$total_content = mysqli_num_rows($result);

$query = "SELECT * FROM assignment WHERE week_id != ''";
$result = mysqli_query($conn, $query);
$total_assignments = mysqli_num_rows($result);


//redirect to profile.php with user's data
header("Location: ../profile.php?user_name=$user_name&user_email=$user_email&user_last_name=$user_last_name&user_score=$user_score&completed_content=$completed_content&completed_assignments=$completed_assignments&total_content=$total_content&total_assignments=$total_assignments");
// header("Location: ../profile.php?user_name=$user_name&user_email=$user_email&user_last_name=$user_last_name&user_score=$user_score&completed_content=$completed_content&completed_assignments=$completed_assignments");
// header("Location: ../profile.php?user_name=$user_name&user_email=$user_email&user_last_name=$user_last_name&user_score=$user_score");

?>