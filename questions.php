<?php
include './config/connection.php';
?>
<?php session_start(); ?>
<?php
//Set question number
$number = (int) $_GET['n'];

//Get total number of questions
$query = "select * from question";
$results = $conn->query($query) or die($conn->error.__LINE__);
$total=$results->num_rows;

// Get Question
$query = "select * from `question` where question_number = $number";

//Get result
$result = $conn->query($query) or die($conn->error.__LINE__);
$question = $result->fetch_assoc();


// Get Choices
$query = "select * from `choices` where question_number = $number";

//Get results
$choices = $conn->query($query) or die($conn->error.__LINE__);

?>
<div class="container">
    <div class="current">Question <?php echo $number; ?> of <?php echo $total; ?></div>
    <p class="question">
<!--        --><?php //echo $question['question'] ?>
    </p>
    <form method="post" action="validate_quiz.php">
        <ul class="choices">
            <?php while($row=$choices->fetch_assoc()): ?>
                <li><input name="choice" type="radio" value="<?php echo $row['id']; ?>" />
                    <?php echo $row['choice']; ?>
                </li>
            <?php endwhile; ?>
        </ul>
        <input type="submit" value="submit" />
        <input type="hidden" name="number" value="<?php echo $number; ?>" />
    </form>
</div>