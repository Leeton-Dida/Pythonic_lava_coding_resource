<?php
session_start();

include '../config/connection.php';

#get the quiz list item id
$quiz_list = $_POST['quizList'] ?? '';

#get all quiz questions and answer from database
$sql = "SELECT * FROM quiz";
$result = mysqli_query($conn, $sql);



$count = 0;
$score = 0;
$rdoBtnNameCounter = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if (($row['quiz_list'] ?? '') == $quiz_list) {
            #store quiz questions and answers in an array
            $quiz_questions[] = $row['question'];
            $answer_array = $row['answer'];
            #split answer into an array using the comma as a delimiter
            $answer_array = explode(',', $answer_array);
            #store the correct answer in a variable
            $correct_answer = $row['correctAnswer'];
        }
    }
}

#if the submit button is clicked, check if the user has selected an answer and if the answer is correct or not
if (isset($_POST['submit'])) {
    $score = 0;
    $rdoBtnNameCounter = 0;
    foreach ($quiz_questions as $question) {
        $answer = $_POST['question_' . $rdoBtnNameCounter . '_rdoBtn'] ?? '';
        if ($answer == $correct_answer - 1) {
            $score++;
        }
        $count ++;
        $rdoBtnNameCounter++;
    }

    echo "<script>alert('You scored $score out of $count questions')</script>";
}

#get current user email from session
$user_email = $_SESSION['user'] ?? '';
#get current user score from database and add the new score to the current score
$sql = "SELECT * FROM users WHERE email = '$user_email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $current_score = $row['score'] ?? '';
        $new_score = $current_score + $score;
    }
}
#update the user score and quized in the database
$sql = "UPDATE users SET score = '$new_score', quized = 1 WHERE email = '$user_email'";
$result = mysqli_query($conn, $sql);

#check if score has been updated in the database using $result
if ($result) {
    echo "<script>alert('Score updated successfully')</script>";
    #redirect to the hall of fame page
    header("Location: ../Hall of fame.php");
} else {
    echo "<script>alert('Score update failed')</script>";
}

?>
