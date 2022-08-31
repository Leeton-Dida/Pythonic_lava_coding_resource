<?php
session_start();
$student_id = $_SESSION['user_id'];

//get code from hidden input field in content.php
$code = @$_GET['code'];
$code = str_replace("'", "\'", $code);
$content_id = @$_GET['content_id'] ;


include '../config/connection.php';

#send student_id and content_id and code to student_content database
$sql = "INSERT INTO student_content (student_id, content_id, code) VALUES ('$student_id', '$content_id', '$code')";
$result = mysqli_query($conn, $sql);
if ($result) {
    //javascript alert to tell user that code has been submitted
    echo "<script>
        alert('Good job! Topic completed, work saved!');
        window.location.href='../content.php?content_id=$content_id';
        </script>";
} else {
    //javascript alert to tell user that code has not been submitted
    echo "<script>
        alert('Failed to save work!');
        </script>";
    //print error message
    echo mysqli_error($conn);
}

?>