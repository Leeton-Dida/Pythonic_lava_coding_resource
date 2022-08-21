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
if($_SERVER["REQUEST_METHOD"] == "POST"){
        $student_id = trim($_POST["student_id"]);
		$assignment_id = trim($_POST["assignment_id"]);
		$code = trim($_POST["code"]);
		$submitted = trim($_POST["submitted"]);
		$date = trim($_POST["date"]);
		$mark = trim($_POST["mark"]);
		

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

        $vars = parse_columns('student_assignment', $_POST);
        $stmt = $pdo->prepare("INSERT INTO student_assignment (student_id,assignment_id,code,submitted,date,mark) VALUES (?,?,?,?,?,?)");

        if($stmt->execute([ $student_id,$assignment_id,$code,$submitted,$date,$mark  ])) {
                $stmt = null;
                header("location: student_assignment-index.php");
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

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="student_assignment-index.php" class="btn btn-secondary">Cancel</a>
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