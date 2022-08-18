<?php 
session_start();

include '../config/connection.php';

$user_id = $_SESSION['user_id'];

#get the question from the form
$question = $_POST['question'];

#add current date to the question
$date = date('d-m-y');


#inert into message table in the database
$sql = "INSERT INTO message (user_id, message, date) VALUES ('$user_id', '$question', '$date')";
$result = mysqli_query($conn, $sql);

if($result){
    echo "<script>alert('Question sent successfully')</script>";
    echo "<script>window.location.href='../ask teacher.php'</script>";
}
else{
    echo "fail";
}

?>