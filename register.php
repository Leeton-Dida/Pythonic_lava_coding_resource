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
    <div class="container">
        <div class="row register-form">
            <div class="col-md-8 offset-md-2">
                <form action="controller/registerController.php" method="post" class="border rounded border-0 border-secondary shadow-lg custom-form" style="background: rgba(0,0,0,0.1);color: var(--bs-white);text-align: center;">
                    <h1 class="text-white">Register new account</h1>
                    <div class="row form-group">
                        <div class="col-sm-4 label-column"><label class="col-form-label text-white" for="name-input-field">First name </label></div>
                        <div class="col-sm-6 input-column"><input name="txtName" class="form-control" type="text" required=""></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4 label-column"><label class="col-form-label text-white" for="name-input-field">Last name</label></div>
                        <div class="col-sm-6 input-column"><input name="txtSurname" class="form-control" type="text" required=""></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4 label-column"><label class="col-form-label text-white" for="email-input-field">Email address</label></div>
                        <div class="col-sm-6 input-column"><input name="txtEmail" class="form-control" type="email" required=""></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4 label-column"><label class="col-form-label text-white" for="pawssword-input-field">Password </label></div>
                        <div class="col-sm-6 input-column"><input name="txtPassword" class="form-control" type="password" required=""></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-4 label-column"><label class="col-form-label text-white" for="repeat-pawssword-input-field">Repeat Password </label></div>
                        <div class="col-sm-6 input-column"><input name="txtRepeatPassword" class="form-control" type="password" required=""></div>
                    </div>
                    <div class="form-check" style="margin-left: 199px;"><input class="form-check-input" type="checkbox" id="formCheck-3" required="" style="margin-left: -61px;margin-right: 140px;">
                        <label class="form-check-label" for="formCheck-3" style="margin-left: -211px;">I've read and accept the terms and conditions</label>
                    </div>

                    <div class="form-check" style="color: white; margin-right:550px;margin-left:220px">
                        <input class="form-check-input" type="radio" name="rdoAdmin" id="admin" value="admin">
                        <label class="form-check-label" for="admin">
                            Admin
                        </label>
                    </div>
                    <div class="form-check" style="float: right; margin-top: -25px; color: white; margin-right: 120px">
                        <input class="form-check-input" type="radio" name="rdoAdmin" id="user" value="user" checked>
                        <label class="form-check-label" for="user">
                            Student
                        </label>
                    </div>

                    <button class="btn btn-light border rounded border-0 shadow-lg submit-button" data-bss-hover-animate="pulse" type="submit" style="background: var(--bs-indigo);margin-left:250px">Register</button>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/Customizable-Carousel-swipe-enabled.js"></script>
    <script src="assets/js/Button-Modal-popup-team-member.js"></script>
    <script src="assets/js/Ultimate-Sidebar-Menu-BS5.js"></script>
</body>

</html>