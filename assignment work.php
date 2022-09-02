<?php
//start session and check if user is logged in or not and if not redirect to login page 
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$assignment_id = $_GET['id'];
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


    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script src="../assets/js/adminJs.js" type="text/javascript"></script>
</head>

<body>

    <?php include 'layouts/side navbar.php' ?>

    <?php

    include './config/connection.php';

    #get week name from weeks table wherre assignment_id = $assignment_id
    $sql = "SELECT week_name FROM weeks WHERE assignment_id = $assignment_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $week_name = $row['week_name'];

    #get description from assignment table wherre assignment_id = $assignment_id
    $sql = "SELECT description FROM assignment WHERE id = $assignment_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $description = $row['description'];

    ?>

    <h1 id='weekHeading' class="display-3 text-center" style="text-align: center;color: rgb(255,255,255);margin-bottom: 42px;margin-top: 42px; "><?php if ($week_name != null) {
                                                                                                                                                        echo $week_name . " assignment";
                                                                                                                                                    } else {
                                                                                                                                                        echo "Assignments";
                                                                                                                                                    }; ?></h1>

    <div class="container text-left" style="color: white;">
        <h2 class="display-5 text-left" style="text-align: left;color: rgb(255,255,255);margin-bottom: 42px;margin-top: 78px;">Tasks</h2>
        <p id="taskDescription" class="text-white" style="margin-bottom: 20px"><?php if ($description != null) {
                                                                                    echo $description;
                                                                                } else {
                                                                                    echo "View your assignment tasks here.";
                                                                                }; ?><br><br></p>
    </div>
    <div>
        <div class="container text-center" style="margin-top: 55px;"><?php include "./layouts/blockly.php" ?></div>
    </div>
    <div class="container text-center">
        <button onclick="submitCode()" class="btn btn-primary text-truncate border rounded border-light shadow-none float-end tenant-continue-btn" data-bss-hover-animate="pulse" type="button" style="margin-right: 29px;margin-top: 30px;margin-bottom: 50px;background: #360062;">Submit assignment&nbsp;<i class="fas fa-greater-than continue-icon"></i></button>
    </div>

    <?php include './layouts/footer.php'; ?>

    </div>


    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/Customizable-Carousel-swipe-enabled.js"></script>
    <script src="assets/js/Button-Modal-popup-team-member.js"></script>
    <script src="assets/js/Ultimate-Sidebar-Menu-BS5.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <script src="assets/js/contentController.js"></script>

    <!-- hidden intput to store selected_conent_id -->
    <input type="hidden" id="selected_assignment_id" value="<?php echo $assignment_id; ?>">

    <script>
        // //function to collect code from generatedCode text area 
        function submitCode() {
            var selectedAssignmentId = document.getElementById("selected_assignment_id").value;
            //if content is not selected, show error message
            if (selectedAssignmentId == '') {
                alert("Please start a topic first");
            } else {
                var code = document.getElementById("generatedCode").value;
                if (code == "") {
                    alert("Please generate code first");
                } else {
                    //redirect to student functions.php with code, selected content_id and student_id
                    window.location.href = "controller/assignmentController.php?code=" + code + "&assignment_id=" + selectedAssignmentId;

                }
            }
        }
    </script>

</body>

</html>