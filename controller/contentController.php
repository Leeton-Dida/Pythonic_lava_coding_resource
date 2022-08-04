<?php
session_start();
include '../config/connection.php';

//get content id from hidden input field in content.php
$content_id = $_POST['contentId'];

//loop to collect all the content from the database using the content id
$sql = "SELECT * FROM content WHERE id = '$content_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
//collect task_description from the database
$task_description = $row['task_description'];
//collect lesson_title from the database
$lesson_title = $row['lesson_title'];

//redirect to content.php with the task_description and lesson_title as session variables
header("Location: ../content.php?task_description=$task_description&lesson_title=$lesson_title");



?>