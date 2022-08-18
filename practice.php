<?php
//start session and check if user is logged in or not and if not redirect to login page 
session_start();
if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Pythonic lava</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Animation-Cards-1.css">
    <link rel="stylesheet" href="assets/css/Animation-Cards.css">
    <link rel="stylesheet" href="assets/css/Button-Modal-popup-team-member-1.css">
    <link rel="stylesheet" href="assets/css/Button-Modal-popup-team-member.css">
    <link rel="stylesheet" href="assets/css/Continue-Button.css">
    <link rel="stylesheet" href="assets/css/Customizable-Carousel-swipe-enabled.css">
    <link rel="stylesheet" href="assets/css/Hero-Features.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="assets/css/Login-Animate.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Ultimate-Accordion-with-caret-icon.css">
    <link rel="stylesheet" href="assets/css/Ultimate-Sidebar-Menu-BS5.css">


</head>

<body>


    <?php include 'layouts/side navbar.php' ?>


    <h1 class="display-3 text-center" style="text-align: center;color: rgb(255,255,255);margin-bottom: 42px;margin-top: 42px;">Practice</h1>
    <div style="margin-bottom: 104px;">
        <div class="container text-center" style="margin-top: 55px;">

        <?php include "./layouts/blockly.php"?>

        </div>
    </div>
    <div class="container" style="margin-top: -19px;">
        <div class="card shadow-lg" data-bss-hover-animate="tada" style="width: 33rem;border-top-left-radius: 20px;border-top-right-radius: 20px;border-bottom-right-radius: 20px;border-bottom-left-radius: 20px;box-shadow: 5px 5px 16px 2px rgba(0,0,0,0.25);margin: 14px;min-width: 280px;max-width: 300px;margin-bottom: 20px;background: rgb(0,209,255);padding-right: 0px;transform: scale(1.25);margin-top: 76px;margin-left: 501px;">
            <div style="width: 100%;height: 200px;background: url(&quot;assets/img/karytonndev_background.jpg&quot;) center / contain;border-top-left-radius: 20px;border-top-right-radius: 20px;"></div>
            <div class="card-body d-flex flex-column" style="height: 262px;text-align: center;margin-top: -10px;">
                <div></div>
                <p>Take quizzes to rank high on the in the hall of fame</p><a class="align-self-end card-link" data-bss-hover-animate="tada" href="quiz.php" style="padding: 4px;background: var(--bs-indigo);color: rgb(255,255,255);border-radius: 17px;padding-right: 14px;padding-left: 14px;padding-bottom: 6px;font-family: 'Source Sans Pro', sans-serif;margin-top: auto;transform: scale(1.22);margin-right: 10px;">Go to Quiz</a>
            </div>
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