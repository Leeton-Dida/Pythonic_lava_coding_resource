<?php
//start session and check if user is logged in or not and if not redirect to login page 
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

include 'layouts/side navbar.php';
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



    <div class="container text-white" id="assignments_container" style="margin-top: 52px;" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100" data-aos-once="true">
        <h1 class="display-3 text-center">Assignments</h1>
        <div class="accordion bg-dark bg-gradient border rounded border-1 border-dark shadow-lg" role="tablist" id="accordion-2">
            <?php

            $weekCounter = 0;
            $week_name = array();
            $completed_assignment_ids = '' ;

            //get week id from assignment table
            $sql = "SELECT * FROM weeks";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $week_id = $row['id'];
                $assignment_ids[] = $row['assignment_id'];
            }



            //for each id, get the assignment from the database
            foreach ($assignment_ids as $id) {
                $sql = "SELECT * FROM assignment WHERE id='$id'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                while ($row = mysqli_fetch_assoc($result)) {
                    $descriptions[] = $row['description'];
                    $due_date[] = $row['due_date'];

                    //get all week names from week table where week_id is equal to week_id from assignment table     
                    $sql = "SELECT * FROM weeks WHERE id ";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $week_name[] = $row['week_name'];
                    }

                    //select all from student_assignment where student_id = 1 and assignment_id = id 
                    $sql = "SELECT * FROM student_assignment WHERE student_id='$student_id' AND assignment_id='$id'";
                    $result = mysqli_query($conn, $sql);
                    if ($resultCheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $mark = $row['mark'];
                            $completed_assignment_ids = $row['assignment_id'];
                            $submitted = $row['submitted'];
                        }
                    } else {
                        $mark = "";
                    }


                    echo "  <div class='accordion-item'>
                <h2 class='accordion-header panel-title mb-0' role='tab'><button class='accordion-button text-center text-white bg-dark border rounded border-secondary shadow-lg collapsed' data-bs-toggle='collapse' data-bs-target='#accordion-2 .item-" . $weekCounter . "' aria-expanded='true' aria-controls='accordion-2 .item-" . $weekCounter . "'><i class='fa fa-comments'></i>&nbsp;" . $week_name[$weekCounter] .' (Due: '. $due_date[$weekCounter].')'."<br></button></h2>
                <div class='accordion-collapse collapse item-" . $weekCounter . "' role='tabpanel' data-bs-parent='#accordion-2'>

                    <div class='accordion-body'>
                        <p class='text-white'><strong>Assignment breif:</strong> " . $descriptions[$weekCounter] . "</p>
                        
                        <label class='form-label text-white'>Mark: ";
          
                        if ($id == $completed_assignment_ids && $submitted == 'true') {
                            if ($mark == "") {
                                echo "Submitted (Not marked)";
                            } else {
                                echo $mark;
                            }
                        } elseif ($id == $completed_assignment_ids && $submitted == 'false') {
                            echo "Not submitted";
                        } else {
                            echo "Not submitted";
                        }
                    

                    echo "</label>

                        <button id = " . $id . " class='btn btn-primary text-truncate bg-dark border rounded border-light shadow-none float-end tenant-continue-btn' data-bss-hover-animate='pulse' type='button' onclick = 'goToAssignment()'>Continue&nbsp;<i class='fas fa-greater-than continue-icon'></i></button>
                    </div>

                </div>
            </div>";

                    $weekCounter++;
                }
            }

            ?>
            <script>
                //function to redirect to assignment page
                function goToAssignment() {
                    var id = event.target.id;
                    window.location.href = "assignment work.php?id=" + id;

                }
            </script>
        </div>
    </div>
    <!-- hidden element on bottom of page -->
    <div class="hidden" style="margin-bottom: 400px">
    </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/Customizable-Carousel-swipe-enabled.js"></script>
    <script src="assets/js/Button-Modal-popup-team-member.js"></script>
    <script src="assets/js/Ultimate-Sidebar-Menu-BS5.js"></script>
</body>
<footer>
<?php include './layouts/footer.php'; ?>
</footer>
</html>