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

    <section style="margin-bottom: 40px;">
        <div data-bss-parallax-bg="true" style="height: 518px;background: url(&quot;assets/img/971.jpg&quot;) center / cover;margin-top: px;">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                        <div style="max-width: 350px;">
                            <h1 class="display-3 text-capitalize fw-bold" style="color: rgb(255,255,255);text-align: center;margin-right: -564px;font-size: 81px;">Welcome back <?php echo $username ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container" id="hero_container">
        <section>
            <div style="height: 600px;background: url(&quot;assets/img/PngItem_156978.png&quot;) center / cover;margin-top: -25px;transform: scale(1.46);"></div>
        </section>
    </div>
    <div class="container" id="home_cards" style="padding-bottom: 64px;margin-top: -204px;">
        <div class="row space-rows">
            <div class="col">
                <div class="card cards-shadown cards-hover" data-aos="flip-left" data-aos-duration="950" style="padding-right: 0;">
                    <div class="card-header"><span class="space"><a href="#"><i class="fa fa-suitcase text-secondary" data-bss-hover-animate="bounce" id="download-icon-1" style="--bs-secondary: #3a0066;--bs-secondary-rgb: 58,0,102;transform: scale(2.19);"></i></a></span>
                        <div class="cardheader-text">
                            <h2 class="display-6" id="heading-card-1">Content</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text sub-text-color" style="color: rgb(0,0,0);">Continue this week`s work</p><a class="btn btn-primary" role="button" data-bss-hover-animate="pulse" style="background: rgb(54,0,98);margin-left: 89px;width: 125px;" href="content.php">GO</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card cards-shadown cards-hover" data-aos="slide-right" data-aos-duration="950" style="padding-right: 0;">
                    <div class="card-header"><span class="space"><a href="#"><i class="fa fa-stack-overflow text-secondary" data-bss-hover-animate="bounce" id="download-icon-2" style="--bs-secondary: #3a0066;--bs-secondary-rgb: 58,0,102;transform: scale(2.19);"></i></a></span>
                        <div class="cardheader-text">
                            <h2 class="display-6" id="heading-card-2">Assignments</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text sub-text-color" style="color: rgb(0,0,0);">Complete assignments</p><a class="btn btn-primary" role="button" data-bss-hover-animate="pulse" style="background: #360062;margin-left: 89px;width: 125px;" href="assignments.php">Go</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card cards-shadown cards-hover" data-aos="flip-up" data-aos-duration="950" style="padding-right: 0;">
                    <div class="card-header cards-header-hover" style="height: 81;"><span class="space"><a href="#"><i class="fa fa-gamepad text-secondary" data-bss-hover-animate="bounce" id="download-icon-3" style="--bs-secondary: #3a0066;--bs-secondary-rgb: 58,0,102;transform: scale(2.19);"></i></a></span>
                        <div class="cardheader-text">
                            <h2 class="display-6" id="heading-card-3">Quiz</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text sub-text-color" style="color: rgb(0,0,0);">Challenge others in quizzes</p><a class="btn btn-primary" role="button" data-bss-hover-animate="pulse" style="background: rgb(54,0,98);margin-left: 89px;width: 125px;" href="quiz.php">Go</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="programmingTips_container" style="margin-top: 35px;margin-bottom: 100px;">
        <div id="Div_Promo_Carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <h2 style="text-align: center;color: rgb(255,255,255);margin-bottom: 42px;">Programming tips</h2>
                    <p class="text-center text-white" style="padding-left: 150px;padding-right: 150px;margin-left: 150px;margin-right: 150px;padding-bottom: 47px;">Ask for help. Getting stuck on one olace for a long period of timew does not help. Instead ask a friend for help and get the ball rolling.</p>
                </div>
                <div class="carousel-item">
                    <h2 style="text-align: center;color: rgb(255,255,255);margin-bottom: 42px;">Programming tips</h2>
                    <p style="padding-left: 150px;padding-right: 150px;margin-left: 150px;margin-right: 150px;padding-bottom: 47px;"><br><span style="color: white;">Think you don’t need to go over the basics? Think again. Like in any field, getting a good grasp of the fundamentals is critically important to achieving long-term success.</span><br><br></p>
                </div>
                <div class="carousel-item">
                    <h2 style="text-align: center;color: rgb(255,255,255);margin-bottom: 42px;">Programming tips</h2>
                    <p style="padding-left: 150px;padding-right: 150px;margin-left: 150px;margin-right: 150px;padding-bottom: 47px;"><br><span style="color: white;">Practice, practice, practice. Practice makes improvement. Put your knowledge into use and try new wways of solving problems. Explore with code and have fun while doing it.</span><br><br></p>
                </div>
            </div>
            <div><a class="carousel-control-prev" role="button" href="#Div_Promo_Carousel" data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"> </span><span class="sr-only">Prev </span></a><a class="carousel-control-next" role="button" href="#Div_Promo_Carousel" data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"> </span><span class="sr-only">Next </span></a></div>
            <ul class="carousel-indicators" role="">
                <li class="active" data-bs-slide-to="0" data-bs-target="#Div_Promo_Carousel">Item 1</li>
                <li data-bs-slide-to="1" data-bs-target="#Div_Promo_Carousel">Item 1</li>
                <li data-bs-slide-to="2" data-bs-target="#Div_Promo_Carousel">Item 1</li>
            </ul>
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