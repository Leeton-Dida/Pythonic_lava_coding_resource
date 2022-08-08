<?php
include './config/connection.php';
$username = @$_SESSION['user_name'];
$surname = @$_SESSION['user_surname'];
$user_id = @$_SESSION['user_id'];
?>



<div><a class="btn btn-primary btn-customized open-menu" role="button" style="margin-top: 2px;padding-top: 9px;padding-bottom: 10px;margin-right: 1687px;"><i class="fa fa-navicon"></i>&nbsp;Menu</a>
    <div class="sidebar" style="background: rgb(33,37,41);"><img class="rounded" loading="lazy" src="assets/img/bs4_team_01.jpg" style="text-align: center;border-style: none;transform: scale(0.97);max-height: 100px;max-width: 100px;margin-left: 20px;margin-top: 19px;">
        <div class="dismiss"><i class="fa fa-caret-left"></i></div>
        <div class="brand" style="padding: 15px 20px;">
            <h5 class="text-start"><?php echo $username .' '. $surname[0]?></h5>
        </div>
        <nav class="navbar navbar-dark navbar-expand">
            <div class="container-fluid">
                <ul class="navbar-nav flex-column me-auto">
                    <h3 style="margin-top: 2px;padding-top: 9px; text-align: center; background: 00FFFFFF">Course work</h3>
                    <li class="nav-item">
                        <div class="accordion bg-dark bg-gradient border rounded border-1 border-dark shadow-lg" role="tablist" id="accordion-1" style="width: 214px;margin-left: -12px;margin-top: 28px;">
                            <div class="accordion-item">
                                <?php

                                
                                // $student_id = $_SESSION['id'] ?? 0;
                                $student_id = 1; // for testing remove this line later on

                                #get all week names and ids from database and display them in the menu
                                $sql = "SELECT * FROM weeks";
                                $result = $conn->query($sql);
                                $week_names = array();
                                $week_id = array();
                                $weekCounter = 0;
                                $lesson_id = array();
                                $content_id = array();
                                $lesson_title = array();
                                $student_content_id = array();




                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $week_names[] = $row['week_name'];
                                        $week_id[] = $row['id'];
                                    }
                                }


                                #loop to loop though all week names and display them in the menu
                                foreach ($week_names as $week) {

                                    #get content id for current week from database
                                    $sql = "SELECT * FROM content WHERE week_id = '$week_id[$weekCounter]'";
                                    $result = $conn->query($sql);
                                    $content_id = array();

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $content_id[] = $row['id'];
                                        }
                                    }

                                    #loop to collect lesson_title from content table for current week and store it in an array
                                    $lesson_title = array();
                                    $lesson_id = array();
                                    foreach ($content_id as $id) {
                                        $sql = "SELECT * FROM content WHERE id = '$id'";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $lesson_title[] = $row['lesson_title'];
                                                $lesson_id[] = $row['id'];
                                            }
                                        }
                                    }

                                    #loop to collect all content_id from student_content where student_id is equal to current student_id and store it in an array
                                    foreach ($content_id as $id) {
                                        $sql = "SELECT * FROM student_content WHERE student_id = '$student_id' AND content_id = '$id'";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $student_content_id[] = $row['content_id'];
                                            }
                                        }
                                    }

                                    $content_id_counter = 0;

                                    echo "<h2 class='accordion-header' role='ta''>
                                                <button class='accordion-button border rounded border-1 border-dark shadow-lg' data-bs-toggle='collapse' data-bs-target='#accordion-1 .item-" . $weekCounter . "' aria-expanded='true' aria-controls='accordion-1 .item-" . $weekCounter . "' style='color: rgb(255,255,255);background: rgb(59,59,59);'>" . $week_names[$weekCounter] . "</button></h2>
                                                <div class='accordion-collapse collapse item-" . $weekCounter . " bg-dark' role='tabpanel' data-bs-parent='#accordion-1'>
                                                    <div class='accordion-body'>
                                                        <form>";

                                    foreach ($lesson_title as $title) {
                                        $contentId = $content_id[$content_id_counter];

                                        echo "<div class='form-check'>
                                                
                                                <button id = '$contentId' onclick = 'submitForm()' type='button'  class='btn btn-outline-light' for='formCheck-1' style='color: rgb(255,255,255); background: #3B3B3B'>" . $title . ': ' . $contentId . "</button>
                                                
                                                <label id = 'status' style='margin-left : 10px'> ";
                                                
                                                if (in_array($contentId, $student_content_id)) {
                                                    echo "Completed";
                                                } else {
                                                    echo "Not completed";
                                                }
                                                
                                                
                                                echo "</label>

                                            </div>";
                                        $content_id_counter++;
                                    }

                                    echo "  </form>
                                            </div>
                                        </div>";

                                    $weekCounter++;
                                }

                                ?>

                                <script>
                                    function submitForm() {
                                        //get id of clicked button
                                        var contentId = event.target.id;
                                        //set value of hidden input to id of clicked button
                                        document.getElementById('hiddenContentId').value = contentId;

                                        <?php $_SESSION['contentId'] = $contentId; ?>

                                        document.getElementById("weeklyMenu").submit();
                                    }
                                </script>

                            </div>
                        </div>

                        <!-- #hidden input to store the content id of the selected lesson -->
                        <form action='controller/contentController.php' method='post' id='weeklyMenu'>
                            <input type='hidden' id='hiddenContentId' name='contentId' value=''>
                        </form>

                        <hr style="margin: 25px 0px 16px;margin-top: 31px;">
                    </li>
                    <li class="nav-item">
                        <div id="Modal-button-wrapper-1" class="text-center"><a class="shadow-sm bs4_modal_trigger" href="Hall of fame.php" data-modal-id="bs4_team" style="color: rgb(255,255,255);">hall of fame</a>
                            <hr style="margin: 25px 0px 16px;margin-top: 31px;">
                        </div>
                    </li>
                    <li class="nav-item"><a class="btn btn-primary text-truncate shadow float-end tenant-continue-btn" role="button" data-bss-hover-animate="pulse" style="margin-right: 45px;margin-top: 99px;background: rgba(51,51,51,0.2);width: 103px;" onclick = <?php logout();?> >Log out&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-logout continue-icon" style="transform: scale(1.09);">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                                <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
                            </svg></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="overlay"></div>
</div>
<nav class="navbar navbar-dark navbar-expand-md textwhite bg-dark text-white shadow-lg py-3" style="transform-style: preserve-3d;opacity: 0.83;filter: brightness(160%) saturate(200%);background: rgb(33, 37, 41);">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="index.php"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bezier">
                    <path fill-rule="evenodd" d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"></path>
                    <path d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z"></path>
                </svg></span><span>Pythonic lava</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-5"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-5">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="content.php">Content</a></li>
                <li class="nav-item"><a class="nav-link" href="practice.php">Practice</a></li>
                <li class="nav-item"><a class="nav-link" href="quiz.php">Quiz</a></li>
                <li class="nav-item"><a class="nav-link" href="assignments.php">Assignments</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Ask teacher</a></li>
            </ul>
        </div>
    </div>
</nav>

<?php
#function to logout and destroy session and redirect to login page
function logout()
{
    session_destroy();
    header("Location: login.php");
}

// js function to logout and destroy session and redirect to login page
?>