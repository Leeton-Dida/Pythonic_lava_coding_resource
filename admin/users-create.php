<?php
// Include config file
require_once "config.php";
require_once "helpers.php";

// Define variables and initialize with empty values
$Name = "";
$Surname = "";
$Email = "";
$Password = "";
$score = "";
$quized = "";
$is_admin = "";

$Name_err = "";
$Surname_err = "";
$Email_err = "";
$Password_err = "";
$score_err = "";
$quized_err = "";
$is_admin_err = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Name = trim($_POST["Name"]);
		$Surname = trim($_POST["Surname"]);
		$Email = trim($_POST["Email"]);
		$Password = trim($_POST["Password"]);
		$score = trim($_POST["score"]);
		$quized = trim($_POST["quized"]);
		$is_admin = trim($_POST["is_admin"]);
		

        $dsn = "mysql:host=$db_server;dbname=$db_name;charset=utf8mb4";
        $options = [
          PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
          PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
        ];
        try {
          $pdo = new PDO($dsn, $db_user, $db_password, $options);
        } catch (Exception $e) {
          error_log($e->getMessage());
          exit('Something weird happened'); //something a user can understand
        }

        $vars = parse_columns('users', $_POST);
        $stmt = $pdo->prepare("INSERT INTO users (Name,Surname,Email,Password,score,quized,is_admin) VALUES (?,?,?,?,?,?,?)");

        if($stmt->execute([ $Name,$Surname,$Email,$Password,$score,$quized,$is_admin  ])) {
                $stmt = null;
                header("location: users-index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../assets/css/styles.css" />
        <link rel="stylesheet" href="../assets/css/admin.css" />
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<?php require_once('navbar.php'); ?>
<body>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add a record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                        <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="Name" maxlength="30"class="form-control" value="<?php echo $Name; ?>">
                                <span class="form-text"><?php echo $Name_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Surname</label>
                                <input type="text" name="Surname" maxlength="30"class="form-control" value="<?php echo $Surname; ?>">
                                <span class="form-text"><?php echo $Surname_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Email</label>
                                <input type="text" name="Email" maxlength="30"class="form-control" value="<?php echo $Email; ?>">
                                <span class="form-text"><?php echo $Email_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>Password</label>
                                <input type="text" name="Password" maxlength="30"class="form-control" value="<?php echo $Password; ?>">
                                <span class="form-text"><?php echo $Password_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>score</label>
                                <input type="number" name="score" class="form-control" value="<?php echo $score; ?>">
                                <span class="form-text"><?php echo $score_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>quized</label>
                                <input type="number" name="quized" class="form-control" value="<?php echo $quized; ?>">
                                <span class="form-text"><?php echo $quized_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>is_admin</label>
                                <input type="number" name="is_admin" class="form-control" value="<?php echo $is_admin; ?>">
                                <span class="form-text"><?php echo $is_admin_err; ?></span>
                            </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="users-index.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>