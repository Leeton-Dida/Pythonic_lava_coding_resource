<?php
session_start();
//get user name, email, last name and score from url
$user_name = $_GET['user_name'];
$user_email = $_GET['user_email'];
$user_last_name = $_GET['user_last_name'];
$user_score = $_GET['user_score'];
//get number of completed content and assignments
$completed_content = @$_GET['completed_content'];
$completed_assignments = @$_GET['completed_assignments'];
//get number of total content and assignments where week is not null and not duplicate
$total_content = @$_GET['total_content'];
$total_assignments = @$_GET['total_assignments'];
?>

<?php
include './config/connection.php';
$user_id = $_SESSION['user_id'];


//save image when submit button is clicked
if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {

        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = './assets/uploads/' . $fileNameNew;

                //upload file to server 
                $sql = "UPDATE users SET profile_image = '$fileDestination' WHERE id = '$user_id'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    move_uploaded_file($fileTmpName, $fileDestination);
                    //javascript alert to tell user that code has been submitted
                    echo "<script>
                        alert('Profile image uploaded!');
                        window.location.href='./controller/profileController.php';
                        </script>";
                } else {
                    //javascript alert to tell user that code has not been submitted
                    echo "<script>
                        alert('Failed to upload profile image!');
                        </script>";
                    //print error message
                    echo mysqli_error($conn);
                }
            } else {
                echo "<script>
                        alert('Your file is too big!');
                        window.location.href='./controller/profileController.php';
                        </script>";
            }
        } else {
            echo "<script>
                        alert('There was an error uploading your file!');
                        window.location.href='./controller/profileController.php';
                        </script>";
        }
    } else {
        echo "<script>
                        alert('You cannot upload files of this type!');
                        window.location.href='./controller/profileController.php';
                        </script>";
    }
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
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form-1.css">
    <link rel="stylesheet" href="assets/css/Profile-Edit-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Ultimate-Accordion-with-caret-icon.css">
    <link rel="stylesheet" href="assets/css/Ultimate-Sidebar-Menu-BS5.css">
    <link rel="stylesheet" href="assets/css/visionae-reset-password-1.css">
    <link rel="stylesheet" href="assets/css/visionae-reset-password.css">
</head>

<body>
    <?php include 'layouts/side navbar.php' ?>

    <div class="container shadow-lg profile profile-view" id="profile" style="color: rgb(255,255,255);margin-top: 168px;">
        <div class="row">
            <div class="col-md-12 alert-col relative">
                <div class="alert alert-info alert-dismissible absolue center" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <span>Profile save with success</span>
                </div>
            </div>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row profile-row" style="border-color: rgba(0,0,0,0.1);">
                <div class="col-md-4 relative">
                    <div class="avatar" style="margin-bottom: 38px;">
                        <div class="rounded-circle center"><img class="rounded-circle" src="
                        <?php
                        if ($profile_image != null) {
                            echo $profile_image;
                        } else {
                            echo "./assets/img/bs4_team_01.jpg";
                        }
                        ?>
                            " alt="Avatar" class="avatar" style="max-height: 200px;max-width: 200px;"></div>
                    </div><input class="form-control form-control" type="file" name="file">
                </div>
                <div class="col-md-8">
                    <h1>Profile </h1>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Firstname </label>
                                <input readonly class="form-control" type="text" name="firstname" value="<?php echo $user_name; ?>">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Last name </label>
                                <input readonly class="form-control" type="text" name="lastname" value="<?php echo $user_last_name; ?>">
                            </div>
                        </div>
                    </div>
                    <div class=" row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-3"><label class="form-label">Email</label>
                                <input readonly class="form-control" type="text" name="firstname" value="<?php echo $user_email; ?>">
                            </div>
                        </div>
                    </div>
                    <div class=" row">
                        <div class="col-sm-12 col-md-6" style="width: 257.656px;">
                            <div class="form-group mb-3"><label class="form-label">Rank</label>
                                <h1><?php echo $user_score; ?></h1>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6" style="width: 282.656px;">
                            <div class="form-group mb-3"><label class="form-label">Completed lessons</label>
                                <h1>
                                    <?php
                                    if ($completed_content == 0) {
                                        echo "0" . "/" . $total_content;
                                    } else {
                                        echo $completed_content . "/" . $total_content;
                                    }
                                    ?>
                                </h1>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6" style="width: 206.656px;">
                            <div class="form-group mb-3"><label class="form-label">Completed assignments</label>
                                <h1>
                                    <?php
                                    if ($completed_assignments == 0) {
                                        echo "0" . "/" . $total_assignments;
                                    } else {
                                        echo $completed_assignments . "/" . $total_assignments;;
                                    }
                                    ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 content-right">
                            <button class="btn btn-primary form-btn" data-bss-hover-animate="rubberBand" type="submit" name="submit">SAVE </button>
                            <button onclick="history.back()" class="btn btn-danger form-btn" data-bss-hover-animate="rubberBand" type="button">CANCEL </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php include './layouts/footer.php'; ?>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/Customizable-Carousel-swipe-enabled.js"></script>
    <script src="assets/js/Button-Modal-popup-team-member.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
    <script src="assets/js/Ultimate-Sidebar-Menu-BS5.js"></script>
</body>

</html>