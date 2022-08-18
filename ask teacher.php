<?php
//start session and check if user is logged in or not and if not redirect to login page 
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}
$user_id = $_SESSION['user_id'];
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

    <!-- container div -->
    <div class="border rounded-pill border-secondary shadow-lg container" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100" data-aos-once="true" style="
        font-family: Roboto, sans-serif;
        background: rgba(0, 0, 0, 0.075);
        margin-top: 153px;
        color: white;
      ">
        <h1 class="text-center" style="margin-top: 20px;margin-bottom: 20px;">Ask teacher</h1>
        <form action="./controller/askController.php" method="POST" style="margin-left: 225px">
            <textarea name="question" placeholder="                                                                                           Ask anything" style="width: 800px; height: 250px"></textarea>

            <button class="btn btn-primary btn-lg border-0 shadow-lg d-block btn-signin w-10" data-bss-hover-animate="rubberBand" name="submit" style="
            font-family: Roboto, sans-serif;
            font-size: 16px;
            font-weight: normal;
            font-style: normal;
            background: var(--bs-indigo);
            margin-left: 350px;
            margin-bottom: 20px;
            margin-top: 20px;
          " type="submit">
                Submit question
            </button>
        </form>
    </div>

    <div class="container" style="margin-top: 50px;" >
        <?php
        include './config/connection.php';

        echo "<h1 style='color: white;' class='text-center'>My Questions</h1>";
        #get all questions and replies and date from the database where user_id is equal to the user_id of the current user
        $sql = "SELECT * FROM message WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $sql);

        #loop to display the users name and surname in bootstrap table format with table headers
        if ($result->num_rows > 0) {
            echo "<table  class='shadow-lg' id='hall_of-fame_list' style='color: rgb(255,255,255);text-align: left;padding-left: 0;width: 1000px;margin-left: 170px;'>
            <thead>
            <tr>
                <th scope='col'>Date</th>
                <th scope='col'>Question</th>
                <th scope='col'>Reply</th>
            </tr>
            </thead><tbody>";
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["date"] . "</td><td>" . $row["message"] . "</td><td>" . $row["reply"] . "</td></tr>";
                $i++;
            }
            echo "</tbody></table>";
        } else {
            echo "0 results";
        }

        ?>
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