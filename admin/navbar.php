<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("location: ../login.php");
}
?>

<head>


<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script src="../assets/js/adminJs.js" type="text/javascript"></script>
</head>

<!-- <nav class="navbar navbar-dark navbar-expand-md textwhite bg-dark text-white shadow-lg py-3" style="transform-style: preserve-3d;opacity: 0.83;filter: brightness(160%) saturate(200%);background: rgb(33, 37, 41);"> -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark ext-white shadow-lg py-3"  style="background: rgb(33, 37, 41);" >
  <a class="navbar-brand nav-link disabled" href="#">Pythonic lava (admin)</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a  style="font-size: 18px;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Select Page
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a href="admin-index.php" class="dropdown-item">Admin</a>

          <a class="dropdown-item" href="assignment-index.php">Assignments</a>
          <a class="dropdown-item" href="content-index.php">Content</a>
          <a class="dropdown-item" href="message-index.php">Student questions</a>
          <a class="dropdown-item" href="quiz-index.php">Quiz</a>
          <a class="dropdown-item" href="student_assignment-index.php">Student assignments</a>
          <a class="dropdown-item" href="student_content-index.php"> Student content</a>
          <a class="dropdown-item" href="users-index.php">Users</a>
          <a class="dropdown-item" href="weeks-index.php">Weeks</a>
          <!-- TABLE_BUTTONS -->
        </div>
      </li>
      <li style="float: left;margin-left: 1300px;">

        <span class="nav-link enabled" href="#" style="font-size: 18px;">
          <?php echo  $_SESSION['user_name'] . ' ' . $_SESSION['user_surname'][0] . '.'; ?>
        </span>
      </li>
      <li>
        <button  style="padding: 3px;"class="btn btn-outline-secondary" ><a class="nav-link" href="../controller/logoutController.php">Logout</a></button>
      </li>
    </ul>
  </div>
</nav>