<?php include 'database.php';?>
<?php
$db_query = "select * from questions";
$db_result = $db_connection->query($db_query) or die($db_connection->error);
$question_count = (int) $db_result->num_rows;
$next = $question_count + 1;
if (isset($_POST['submit'])) {
    $question_text = $_POST['question_text'];
    $correct_choice = $_POST['correct_choice'];
    $choices = array();
    for ($i = 0; $i < 4; $i ++) {
        $choices[$i] = $_POST["choice_" . $i];
    }
    $db_query = "INSERT INTO questions (question_number,question_text) VALUE ('$next','$question_text')";
    $db_result = $db_connection->query($db_query);
    if ($db_result) {
        foreach ($choices as $key => $value) {
            if ($key + 1 == $correct_choice) {
                $is_correct = 1;
            } else {
                $is_correct = 0;
            }
            $db_query = "INSERT INTO choices (question_number, is_correct, choice_text) VALUE ('$next','$is_correct','$value')";
            $db_result = $db_connection->query($db_query);
            if ($db_result) {
                continue;
            } else {
                die("ERROR: " . $db_connection->error);
            }
        }
        $msg = "Question has been added";
    } else {
        die("ERROR: " . $db_connection->error);
    }
}
?>
<html>
<head>
<meta charset="utf8">
<link rel="stylesheet" href="css\style.css" type="text/css">
</head>
<body>
	<header>
		<div class='container'>
			<h1>Quizzer</h1>
		</div>
	</header>
	<div class='container center_body'>
		<h2>Add question #<?php echo $next;?></h2>
		<?php if(isset($msg)) :?>
		<p><?php echo $msg; ?></p>
		<?php endif;?>
		<form action='add.php' method='post'>
			<p>
				<label>Question: </label><input type="text" name="question_text" required="required">
			</p>
			<p>
				<label>Choice #1: </label><input type="text" name="choice_0" id="choice_0" required="required">
			</p>
			<p>
				<label>Choice #2: </label><input type="text" name="choice_1" required="required">
			</p>
			<p>
				<label>Choice #3: </label><input type="text" name="choice_2" required="required">
			</p>
			<p>
				<label>Choice #4: </label><input type="text" name="choice_3" required="required">
			</p>
			<p>
				<label>Correct Choice # </label> <input type="number"
					name="correct_choice" required="required"  min="1" max="4">
			</p>
			<input type='submit' name='submit' value='Submit Question'>
		</form>
	</div>
	<footer>
		<div class='container'>
			Copyright &copy; <?php echo date('Y'); ?> Sunny Mishra
		</div>
	</footer>
</body>
</html>