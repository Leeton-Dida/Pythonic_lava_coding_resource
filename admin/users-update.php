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
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    $Name = trim($_POST["Name"]);
		$Surname = trim($_POST["Surname"]);
		$Email = trim($_POST["Email"]);
		$Password = trim($_POST["Password"]);
		$score = trim($_POST["score"]);
		$quized = trim($_POST["quized"]);
		$is_admin = trim($_POST["is_admin"]);
		

    // Prepare an update statement
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
        exit('Something weird happened');
    }

    $vars = parse_columns('users', $_POST);
    $stmt = $pdo->prepare("UPDATE users SET Name=?,Surname=?,Email=?,Password=?,score=?,quized=?,is_admin=? WHERE id=?");

    if(!$stmt->execute([ $Name,$Surname,$Email,$Password,$score,$quized,$is_admin,$id  ])) {
        echo "Something went wrong. Please try again later.";
        header("location: error.php");
    } else {
        $stmt = null;
        header("location: users-read.php?id=$id");
    }
} else {
    // Check existence of id parameter before processing further
	$_GET["id"] = trim($_GET["id"]);
    if(isset($_GET["id"]) && !empty($_GET["id"])){
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Set parameters
            $param_id = $id;

            // Bind variables to the prepared statement as parameters
			if (is_int($param_id)) $__vartype = "i";
			elseif (is_string($param_id)) $__vartype = "s";
			elseif (is_numeric($param_id)) $__vartype = "d";
			else $__vartype = "b"; // blob
			mysqli_stmt_bind_param($stmt, $__vartype, $param_id);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value

                    $Name = htmlspecialchars($row["Name"]);
					$Surname = htmlspecialchars($row["Surname"]);
					$Email = htmlspecialchars($row["Email"]);
					$Password = htmlspecialchars($row["Password"]);
					$score = htmlspecialchars($row["score"]);
					$quized = htmlspecialchars($row["quized"]);
					$is_admin = htmlspecialchars($row["is_admin"]);
					

                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.<br>".$stmt->error;
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);

    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<?php require_once('navbar.php'); ?>
<body>
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

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

                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="users-index.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
