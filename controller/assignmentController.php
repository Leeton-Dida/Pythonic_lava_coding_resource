<?php
session_start();

$student_id = 1;

//get code from hidden input field in content.php
$code = @$_GET['code'];
$code = str_replace("'", "\'", $code);
$assignment_id = @$_GET['assignment_id'];

include '../config/connection.php';
//insert into student_assignment database and change submitted to true
$sql = "INSERT INTO student_assignment (student_id, assignment_id, code, submitted) VALUES ('$student_id', '$assignment_id', '$code', 'true')";
$result = mysqli_query($conn, $sql);
if ($result) {
    //javascript alert to tell user that code has been submitted
    echo "<script>
        alert('Assignment submitted successfully! Good job!');
        window.location.href='../assignments.php?id=$assignment_id';
        </script>";
} else {
    //javascript alert to tell user that code has not been submitted
    echo "<script>
        alert('Failed to save work!');
        </script>";
    //print error message
    echo mysqli_error($conn);
}
