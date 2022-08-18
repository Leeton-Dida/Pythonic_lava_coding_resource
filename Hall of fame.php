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
    <nav class="navbar navbar-dark navbar-expand-md textwhite bg-dark text-white shadow-lg py-3" style="transform-style: preserve-3d;opacity: 0.83;filter: brightness(160%) saturate(200%);background: rgb(33, 37, 41);">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="index.php"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bezier">
                        <path fill-rule="evenodd" d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"></path>
                        <path d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z"></path>
                    </svg></span><span>Pythonic lava</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-5"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-5">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="content.php">Content</a></li>
                    <li class="nav-item"><a class="nav-link" href="practice.php">Practice</a></li>
                    <li class="nav-item"><a class="nav-link" href="quiz.php">Quiz</a></li>
                    <li class="nav-item"><a class="nav-link" href="assignments.php">Assignments</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Ask teacher</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div><a class="btn btn-primary btn-customized open-menu" role="button" style="margin-top: 2px;padding-top: 9px;padding-bottom: 10px;margin-right: 1687px;"><i class="fa fa-navicon"></i>&nbsp;Menu</a>
        <div class="sidebar" style="background: rgb(33,37,41);"><img class="rounded" loading="lazy" src="assets/img/bs4_team_01.jpg" style="text-align: center;border-style: none;transform: scale(0.97);max-height: 100px;max-width: 100px;margin-left: 60px;margin-top: 19px;">
            <div class="dismiss"><i class="fa fa-caret-left"></i></div>
            <div class="brand" style="padding: 15px 20px;">
                <h5 class="text-start">Name Surname</h5>
            </div>
            <nav class="navbar navbar-dark navbar-expand">
                <div class="container-fluid">
                    <ul class="navbar-nav flex-column me-auto">
                        <li class="nav-item">
                            <div class="accordion bg-dark bg-gradient border rounded border-1 border-dark shadow-lg" role="tablist" id="accordion-1" style="width: 214px;margin-left: -12px;margin-top: 28px;">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" role="tab"><button class="accordion-button border rounded border-1 border-dark shadow-lg" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-1" aria-expanded="true" aria-controls="accordion-1 .item-1" style="color: rgb(255,255,255);background: rgb(59,59,59);">Week 1</button></h2>
                                    <div class="accordion-collapse collapse show item-1 bg-dark" role="tabpanel" data-bs-parent="#accordion-1">
                                        <div class="accordion-body">
                                            <form>
                                                <div class="form-check">
                                                    <input id="formCheck-1" class="form-check-input" type="radio" checked name="week_1" />
                                                    <label class="form-check-label" for="formCheck-1" style="color: rgb(0,0,0);">Stuff </label><label style="margin-left : 10px">(Visited)</label>
                                                </div>
                                                <div class="form-check">
                                                    <input id="formCheck-3" class="form-check-input" type="radio" name="week_1" /><label class="form-check-label" for="formCheck-3" style="color: #FFFFFF">Stuff</label>
                                                </div>
                                                <div class="form-check">
                                                    <input id="formCheck-2" class="form-check-input" type="radio" name="week_1" /><label class="form-check-label" for="formCheck-2" style="color: #FFFFFF;">Stuff</label>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" role="tab"><button class="accordion-button collapsed border rounded border-1 border-dark shadow-lg" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-2" aria-expanded="false" aria-controls="accordion-1 .item-2" style="color: rgb(255,255,255);background: rgb(59,59,59);">Week 2</button></h2>
                                    <div class="accordion-collapse collapse item-2" role="tabpanel" data-bs-parent="#accordion-1">
                                        <div class="accordion-body">
                                            <form>
                                                <div class="form-check">
                                                    <input id="formCheck-1" class="form-check-input" type="radio" checked name="week_1" />
                                                    <label class="form-check-label" for="formCheck-1" style="color: rgb(0,0,0);">Stuff</label>
                                                </div>
                                                <div class="form-check">
                                                    <input id="formCheck-3" class="form-check-input" type="radio" name="week_1" /><label class="form-check-label" for="formCheck-3" style="color: #FFFFFF">Stuff</label>
                                                </div>
                                                <div class="form-check">
                                                    <input id="formCheck-2" class="form-check-input" type="radio" name="week_1" /><label class="form-check-label" for="formCheck-2" style="color: #FFFFFF;">Stuff</label>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" role="tab"><button class="accordion-button collapsed border rounded border-1 border-dark shadow-lg" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-3" aria-expanded="false" aria-controls="accordion-1 .item-3" style="color: rgb(255,255,255);background: rgb(59,59,59);">Week 3</button></h2>
                                    <div class="accordion-collapse collapse item-3" role="tabpanel" data-bs-parent="#accordion-1">
                                        <div class="accordion-body">
                                            <form>
                                                <div class="form-check">
                                                    <input id="formCheck-1" class="form-check-input" type="radio" checked name="week_1" />
                                                    <label class="form-check-label" for="formCheck-1" style="color: rgb(0,0,0);">Stuff</label>
                                                </div>
                                                <div class="form-check">
                                                    <input id="formCheck-3" class="form-check-input" type="radio" name="week_1" /><label class="form-check-label" for="formCheck-3" style="color: #FFFFFF">Stuff</label>
                                                </div>
                                                <div class="form-check">
                                                    <input id="formCheck-2" class="form-check-input" type="radio" name="week_1" /><label class="form-check-label" for="formCheck-2" style="color: #FFFFFF;">Stuff</label>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" role="tab"><button class="accordion-button collapsed border rounded border-1 border-dark shadow-lg" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-4" aria-expanded="false" aria-controls="accordion-1 .item-4" style="color: rgb(255,255,255);background: rgb(59,59,59);">Week 4</button></h2>
                                    <div class="accordion-collapse collapse item-4" role="tabpanel" data-bs-parent="#accordion-1">
                                        <div class="accordion-body">
                                            <form>
                                                <div class="form-check">
                                                    <input id="formCheck-1" class="form-check-input" type="radio" checked name="week_1" />
                                                    <label class="form-check-label" for="formCheck-1" style="color: rgb(0,0,0);">Stuff</label>
                                                </div>
                                                <div class="form-check">
                                                    <input id="formCheck-3" class="form-check-input" type="radio" name="week_1" /><label class="form-check-label" for="formCheck-3" style="color: #FFFFFF">Stuff</label>
                                                </div>
                                                <div class="form-check">
                                                    <input id="formCheck-2" class="form-check-input" type="radio" name="week_1" /><label class="form-check-label" for="formCheck-2" style="color: #FFFFFF;">Stuff</label>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" role="tab"><button class="accordion-button collapsed border rounded border-1 border-dark shadow-lg" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-5" aria-expanded="false" aria-controls="accordion-1 .item-5" style="color: rgb(255,255,255);background: rgb(59,59,59);">Week 5</button></h2>
                                    <div class="accordion-collapse collapse item-5" role="tabpanel" data-bs-parent="#accordion-1">
                                        <div class="accordion-body">
                                            <form>
                                                <div class="form-check">
                                                    <input id="formCheck-1" class="form-check-input" type="radio" checked name="week_1" />
                                                    <label class="form-check-label" for="formCheck-1" style="color: rgb(0,0,0);">Stuff</label>
                                                </div>
                                                <div class="form-check">
                                                    <input id="formCheck-3" class="form-check-input" type="radio" name="week_1" /><label class="form-check-label" for="formCheck-3" style="color: #FFFFFF">Stuff</label>
                                                </div>
                                                <div class="form-check">
                                                    <input id="formCheck-2" class="form-check-input" type="radio" name="week_1" /><label class="form-check-label" for="formCheck-2" style="color: #FFFFFF;">Stuff</label>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr style="margin: 25px 0px 16px;margin-top: 31px;">
                        </li>
                        <li class="nav-item">
                            <div id="Modal-button-wrapper-1" class="text-center"><a class="shadow-sm bs4_modal_trigger" href="Hall of fame.php" data-modal-id="bs4_team" style="color: rgb(255,255,255);">hall of fame</a>
                                <hr style="margin: 25px 0px 16px;margin-top: 31px;">
                            </div>
                        </li>
                        <li class="nav-item"><a class="btn btn-primary text-truncate shadow float-end tenant-continue-btn" role="button" data-bss-hover-animate="pulse" style="margin-right: 45px;margin-top: 99px;background: rgba(51,51,51,0.2);width: 103px;" href="login.php">Log out&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-logout continue-icon" style="transform: scale(1.09);">
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
    <h1 class="display-3 text-center" style="text-align: center;color: rgb(255,255,255);margin-bottom: 42px;margin-top: 42px;">Hall of fame</h1>
    <div style="margin-bottom: 104px;">
        <div class="container text-center" style="margin-top: 55px;">
            

                <?php

                include './config/connection.php';
                #collect users name and surname from database and display them in the list in the hall of fame page orderd by the score in descending order
                $sql = "SELECT * FROM users ORDER BY score DESC";
                $result = $conn->query($sql);
                #loop to display the users name and surname in bootstrap table format with table headers
                if ($result->num_rows > 0) {
                    echo "<table  class='shadow-lg' id='hall_of-fame_list' style='color: rgb(255,255,255);text-align: left;padding-left: 0;width: 915px;margin-left: 170px;'>
                    <thead>
                    <tr>
                        <th scope='col'>Pos</th>
                        <th scope='col'>Name</th>
                        <th scope='col'>Surname</th>
                        <th scope='col'>Score</th>
                    </tr>
                    </thead><tbody>";
                    $i = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><th scope='row'>" . $i . "</th><td>" . $row["Name"] . "</td><td>" . $row["Surname"] . "</td><td>" . $row["score"] . "</td></tr>";
                        $i++;
                    }
                    echo "</tbody></table>";
                } else {
                    echo "0 results";
                }


                ?>
         
        </div>
    </div>
    <div class="card text-center" data-bss-hover-animate="tada" style="width: 33rem;border-top-left-radius: 20px;border-top-right-radius: 20px;border-bottom-right-radius: 20px;border-bottom-left-radius: 20px;box-shadow: 5px 5px 16px 2px rgba(0,0,0,0.25);margin: 14px;min-width: 280px;max-width: 300px;margin-bottom: 20px;background: var(--bs-info);padding-right: 0px;transform: scale(1.25);margin-left: 707px;margin-top: -32px;">
        <div style="width: 100%;height: 200px;background: url(&quot;assets/img/karytonndev_background.jpg&quot;) center / contain;border-top-left-radius: 20px;border-top-right-radius: 20px;"></div>
        <div class="card-body d-flex flex-column" style="height: 262px;text-align: center;margin-top: -15px;">
            <div>
                <p style="text-align: left;"><br>Take quizzes to rank high in the hall of fame.</p>
            </div><a class="align-self-end card-link" data-bss-hover-animate="pulse" href="quiz.php" style="padding: 4px;background: var(--bs-indigo);color: rgb(255,255,255);border-radius: 17px;padding-right: 14px;padding-left: 14px;padding-bottom: 6px;font-family: 'Source Sans Pro', sans-serif;margin-top: auto;transform: scale(1.22);margin-right: 7px;">Try some quiz&nbsp;</a>
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