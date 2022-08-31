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
  <div class="border rounded-pill border-secondary shadow-lg login-card" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100" data-aos-once="true" style="
        font-family: Roboto, sans-serif;
        background: rgba(0, 0, 0, 0.075);
        margin-top: 153px;
      ">
    <p class="profile-name-card">
      <i class="fa fa-unlock-alt d-inline" style="width: 0; height: 0; font-size: 68px; color: var(--bs-indigo)"></i>
    </p>
    <form class="form-signin" method="post" action="controller/loginController.php">
      <span class="reauth-email" style="margin: 11px"> </span>
      <input name="txtEmail" class="form-control" type="email" id="inputEmail" required="" placeholder="Email address" autofocus="" />
      <input name="txtPassword" class="form-control" type="password" id="inputPassword" required="" placeholder="Password" />
      <div class="form-check" style="color: white">
        <input class="form-check-input" type="radio" name="rdoAdmin" id="admin" value="admin">
        <label class="form-check-label" for="admin">
          Admin
        </label>
      </div>
      <div class="form-check" style="float: right; margin-top: -25px; color: white">
        <input class="form-check-input" type="radio" name="rdoAdmin" id="user" value="user" checked>
        <label class="form-check-label" for="user">
          Student
        </label>
      </div>
      <button class="btn btn-primary btn-lg border-0 shadow-lg d-block btn-signin w-100" data-bss-hover-animate="rubberBand" name="submit" style="
            font-family: Roboto, sans-serif;
            font-size: 16px;
            font-weight: normal;
            font-style: normal;
            background: var(--bs-indigo);
          " type="submit">
        Sign in
      </button>
    </form>
    <a href="register.php" style="margin-left: 105px">Register</a>
    <a style = "margin-left: 67px" href="forgot password.php" style="margin-left: 105px">Forgot password?</a>
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