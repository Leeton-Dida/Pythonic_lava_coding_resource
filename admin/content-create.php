<?php
// Include config file
require_once "config.php";
require_once "helpers.php";

// Define variables and initialize with empty values
$week_id = "";
$task_description = "";
$lesson_title = "";
$max_blocks = "";

$week_id_err = "";
$task_description_err = "";
$lesson_title_err = "";
$max_blocks_err = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
        $week_id = trim($_POST["week_id"]);
		$task_description = trim($_POST["task_description"]);
		$lesson_title = trim($_POST["lesson_title"]);
		$max_blocks = trim($_POST["max_blocks"]);
		

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

        $vars = parse_columns('content', $_POST);
        $stmt = $pdo->prepare("INSERT INTO content (week_id,task_description,lesson_title,max_blocks) VALUES (?,?,?,?)");

        if($stmt->execute([ $week_id,$task_description,$lesson_title,$max_blocks  ])) {
                $stmt = null;
                header("location: content-index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
                                <label>week_id</label>
                                    <select class="form-control" id="week_id" name="week_id">
                                    <?php
                                        $sql = "SELECT *,id FROM weeks";
                                        $result = mysqli_query($link, $sql);
                                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                            $duprow = $row;
                                            unset($duprow["id"]);
                                            $value = implode(" | ", $duprow);
                                            if ($row["id"] == $week_id){
                                            echo '<option value="' . "$row[id]" . '"selected="selected">' . "$value" . '</option>';
                                            } else {
                                                echo '<option value="' . "$row[id]" . '">' . "$value" . '</option>';
                                        }
                                        }
                                    ?>
                                    </select>
                                <span class="form-text"><?php echo $week_id_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>task_description</label>
                                <input type="text" name="task_description" maxlength="300"class="form-control" value="<?php echo $task_description; ?>">
                                <span class="form-text"><?php echo $task_description_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>lesson_title</label>
                                <input type="text" name="lesson_title" maxlength="50"class="form-control" value="<?php echo $lesson_title; ?>">
                                <span class="form-text"><?php echo $lesson_title_err; ?></span>
                            </div>
						<div class="form-group">
                                <label>max_blocks</label>
                                <input type="number" name="max_blocks" class="form-control" value="<?php echo $max_blocks; ?>">
                                <span class="form-text"><?php echo $max_blocks_err; ?></span>
                            </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="content-index.php" class="btn btn-secondary">Cancel</a>
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