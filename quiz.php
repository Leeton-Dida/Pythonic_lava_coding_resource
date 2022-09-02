<?php
//start session and check if user is logged in or not and if not redirect to login page 
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
} else {
    $user_id = $_SESSION['user_id'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Pythonic lava</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" />
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css" />
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css" />
    <link rel="stylesheet" href="assets/css/Animation-Cards-1.css" />
    <link rel="stylesheet" href="assets/css/Animation-Cards.css" />
    <link rel="stylesheet" href="assets/css/Button-Modal-popup-team-member-1.css" />
    <link rel="stylesheet" href="assets/css/Button-Modal-popup-team-member.css" />
    <link rel="stylesheet" href="assets/css/Continue-Button.css" />
    <link rel="stylesheet" href="assets/css/Customizable-Carousel-swipe-enabled.css" />
    <link rel="stylesheet" href="assets/css/Hero-Features.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link rel="stylesheet" href="assets/css/Login-Animate.css" />
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/Ultimate-Accordion-with-caret-icon.css" />
    <link rel="stylesheet" href="assets/css/Ultimate-Sidebar-Menu-BS5.css" />
</head>

<body>

    <?php include 'layouts/side navbar.php' ?>

    <h1 class="display-3 text-center" style="
        text-align: center;
        color: rgb(255, 255, 255);
        margin-bottom: 42px;
        margin-top: 42px;
      ">
        Quiz time 
    </h1>
    <div class="container" id="quiz_questions_container" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100" data-aos-once="true">
        <form class="text-start text-white" id="quiz_form" method="post" action="controller/quizController.php">

            <?php

            include './config/connection.php';

            $quized = '';

            #get quized from users table where user_id = $user_id
            $sql = "SELECT * FROM users WHERE id = $user_id";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $quized = $row['quized'];
                }
            }


            if ($quized == 1) 
            {
                 #if user has already quized
                echo '<div class="alert alert-success" role="alert">
                You have already quized. Please wait for another quiz to be available.
                </div>';

            } else {



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



                            echo "<ul class='list-group' id='quizList'>
                        <li class='list-group-item shadow-lg'
                            style='background: rgba(0, 0, 0, 0.08); color: rgb(255, 255, 255)' >
                            <div>
                                <p style='text-align: center'>"
                                . $quiz_questions[$count] . "
                                </p>
                                <div class='form-check'>
                                    <input class='form-check-input' type='radio' id='formCheck-4'
                                        name='question_" . $rdoBtnNameCounter . "_rdoBtn' value = '0' /><label class='form-check-label' for='formCheck-4' >" . $answer_array[0] . "
                                        </label>
                                </div>
                                <div class='form-check' style='text-align: justify'>
                                    <input class='form-check-input' type='radio' id='formCheck-4'
                                        name='question_" . $rdoBtnNameCounter . "_rdoBtn' value = '1' /><label class='form-check-label' for='formCheck-4' >" . $answer_array[1] . "</label>
                                </div>
                                <div class='form-check'>
                                    <input class='form-check-input' type='radio' id='formCheck-6'
                                        name='question_" . $rdoBtnNameCounter . "_rdoBtn' value = '2' /><label class='form-check-label' for='formCheck-6' >" . $answer_array[2] . "</label>
                                </div>
                                <div class='form-check'>
                                    <input class='form-check-input' type='radio' id='formCheck-5'
                                        name='question_" . $rdoBtnNameCounter . "_rdoBtn' value = '3' /><label class='form-check-label' for='formCheck-5' >" . $answer_array[3] . "</label>
                                </div>
                            </div>
                        </li>
                    </ul>";
                            $count++;
                            $rdoBtnNameCounter++;
                        }
                    }
                } else {
                    echo "<script>alert('There are no quiz today. Yay!')</script>";
                }

                echo  "<button class='btn btn-primary' data-bss-hover-animate='pulse' type='submit'  name='submit' style=' 
                    background: #360062;
                    margin-right: 65px;
                    margin-left: 618px;
                    margin-top: 31px;
                    text-align: center;
                    transform: scale(1.58);
                '>
                        Finish quiz
                    </button>
                </form>";
            }

            ?>

<!-- hidden element on bottom of page -->
<div class="hidden" style="margin-bottom: 380px">
</div>
    </div>
    
    <?php include './layouts/footer.php'; ?>

    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/Customizable-Carousel-swipe-enabled.js"></script>
    <script src="assets/js/Button-Modal-popup-team-member.js"></script>
    <script src="assets/js/Ultimate-Sidebar-Menu-BS5.js"></script>
</body>

</html>