<?php
// Include config file
require_once "config.php";
require_once "helpers.php";

// Define variables and initialize with empty values
$student_id = "";
$assignment_id = "";
$code = "";
$submitted = "";
$date = "";
$mark = "";

$student_id_err = "";
$assignment_id_err = "";
$code_err = "";
$submitted_err = "";
$date_err = "";
$mark_err = "";


// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    $student_id = trim($_POST["student_id"]);
		$assignment_id = trim($_POST["assignment_id"]);
		$code = trim($_POST["code"]);
		$submitted = trim($_POST["submitted"]);
		$date = trim($_POST["date"]);
		$mark = trim($_POST["mark"]);
		

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

    $vars = parse_columns('student_assignment', $_POST);
    $stmt = $pdo->prepare("UPDATE student_assignment SET student_id=?,assignment_id=?,code=?,submitted=?,date=?,mark=? WHERE id=?");

    if(!$stmt->execute([ $student_id,$assignment_id,$code,$submitted,$date,$mark,$id  ])) {
        echo "Something went wrong. Please try again later.";
        header("location: error.php");
    } else {
        $stmt = null;
        header("location: student_assignment-read.php?id=$id");
    }
} else {
    // Check existence of id parameter before processing further
	$_GET["id"] = trim($_GET["id"]);
    if(isset($_GET["id"]) && !empty($_GET["id"])){
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM student_assignment WHERE id = ?";
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

                    $student_id = htmlspecialchars($row["student_id"]);
					$assignment_id = htmlspecialchars($row["assignment_id"]);
					$code = htmlspecialchars($row["code"]);
					$submitted = htmlspecialchars($row["submitted"]);
					$date = htmlspecialchars($row["date"]);
					$mark = htmlspecialchars($row["mark"]);
					

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
<link rel="stylesheet" href="../assets/css/styles.css" />
        <link rel="stylesheet" href="../assets/css/admin.css" />
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
                                <label>student_id</label>
                                    <select class="form-control" id="student_id" name="student_id">
                                    <?php
                                        $sql = "SELECT *,id FROM users";
                                        $result = mysqli_query($link, $sql);
                                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            $duprow = $row;
                                            unset($duprow["id"]);
                                            $value = implode(" | ", $duprow);
                                            if ($row["id"] == $student_id){
                                            echo '<option value="' . "$row[id]" . '"selected="selected">' . "$value" . '</option>';
                                            } else {
                                                echo '<option value="' . "$row[id]" . '">' . "$value" . '</option>';
                                        }
                                        }
                                    ?>
                                    </select>
                                <span class="form-text"><?php echo $student_id_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>assignment_id</label>
                                    <select class="form-control" id="assignment_id" name="assignment_id">
                                    <?php
                                        $sql = "SELECT *,id FROM assignment";
                                        $result = mysqli_query($link, $sql);
                                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            $duprow = $row;
                                            unset($duprow["id"]);
                                            $value = implode(" | ", $duprow);
                                            if ($row["id"] == $assignment_id){
                                            echo '<option value="' . "$row[id]" . '"selected="selected">' . "$value" . '</option>';
                                            } else {
                                                echo '<option value="' . "$row[id]" . '">' . "$value" . '</option>';
                                        }
                                        }
                                    ?>
                                    </select>
                                <span class="form-text"><?php echo $assignment_id_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>code</label>
                                <input type="text" name="code" maxlength="1000"class="form-control" value="<?php echo $code; ?>">
                                <span class="form-text"><?php echo $code_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>submitted</label>
                                <input type="text" name="submitted" maxlength="10"class="form-control" value="<?php echo $submitted; ?>">
                                <span class="form-text"><?php echo $submitted_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>date</label>
                                <input type="text" name="date" maxlength="25"class="form-control" value="<?php echo $date; ?>">
                                <span class="form-text"><?php echo $date_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>mark</label>
                                <input type="number" name="mark" class="form-control" value="<?php echo $mark; ?>">
                                <span class="form-text"><?php echo $mark_err; ?></span>
                            </div>

                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="student_assignment-index.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
