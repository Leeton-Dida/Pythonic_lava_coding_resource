<?php
session_start();

include '../config/connection.php';


#get quiz correct answer from database
$sql = "SELECT * FROM quiz ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$quiz_list = $_POST['quizList'] ?? '';

$count = 0; $score = 0; $rdoBtnNameCounter = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if (($row['quizList'] ?? '') == $quiz_list) {
            #store quiz questions and answers in an array
            $quiz_question = $row['question'];
            $correct_answer = $row['correctAnswer'];

            #print current quiz question to screen
            echo "<h3>Question: " . $quiz_question . "</h3>";
            #print correct answer to screen
            echo "<h3>Correct Answer: " . $correct_answer . "</h3>";
            #print rdoBtnNameCounter to screen
            echo "<h3>RdoBtnNameCounter: " . $rdoBtnNameCounter . "</h3>";
            

            // #retreive selected answer from radio button
            // $selected_answer = $_POST["question_".$rdoBtnNameCounter."_rdoBtn"];
            // #check if selected answer is correct
            // if ($selected_answer == $correct_answer) {
            //     $score++;
            // }
            $rdoBtnNameCounter++;
        }
    }
}





?>