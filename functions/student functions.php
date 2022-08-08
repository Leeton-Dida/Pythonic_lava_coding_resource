<?php
session_start();
$student_id = $_SESSION['user_id'];

//get code from hidden input field in content.php
$code = $_GET['code'];
$code = str_replace("'", "\'", $code);
$content_id = $_GET['content_id'] ;

include '../config/connection.php';

#send student_id and content_id and code to student_content database
$sql = "INSERT INTO student_content (student_id, content_id, code) VALUES ('$student_id', '$content_id', '$code')";
$result = mysqli_query($conn, $sql);
if ($result) {
    #javascript alert to tell user that code has been submitted
    header("Location: ../content.php?content_id=$content_id");
    echo "<script>alert('Code submitted successfully!')</script>";
} else {
    #javascript alert to tell user that code has not been submitted
    echo "<script>alert('Code not submitted!')</script>";
    #print error message
    echo mysqli_error($conn);
}

?>