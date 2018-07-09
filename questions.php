<?php include 'database.php';?>
<?php session_start(); ?>
<?php
    if(!isset($_GET['n']))
    {
        echo "ERROR: ACCESS DENIED";
        exit();
    }
    $question_number = (int) $_GET['n'];
    $db_query = "SELECT * from questions where question_number=$question_number";
    $db_query_result = $db_connection->query($db_query) or die($db_connection->error);
    $question = $db_query_result->fetch_assoc();
    $db_query = "SELECT * from choices where question_number=$question_number";
    $db_result_choices = $db_connection->query($db_query) or die($db_connection->error);
    $db_query = "select * from questions";
    $db_result = $db_connection->query($db_query) or die($db_connection->error);
    $question_count = (int)$db_result->num_rows;
?>
<html>
<head>
<meta charset="utf8">
<link rel="stylesheet" href="css\style.css" type="text/css">
<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
	<header>
		<div class='container'>
			<h1>Quizzer</h1>
		</div>
	</header>
	<div class='container center_body'>
		<div class='title'>
			<h3>Question number <?php echo $question_number; ?> of <?php echo $question_count; ?></h3>
		</div>
		<div class='question'>
			<p><?php echo $question['question_text'];?></p>
			<form onsubmit="return validate_question()" method="post" action='process.php'>
				<ul>
				<?php while($choice = $db_result_choices->fetch_assoc()) : ?>
					<li><input type="radio" name="choice" value="<?php echo $choice['id'];?>"> <?php echo $choice['choice_text']; ?></li>
				<?php endwhile;?>
				</ul>
				<input type="hidden" name="question_number" value="<?php echo $question_number;?>">
				<input type="submit" name="submit" value="Next Question"">
			</form>
		</div>
	</div>
	<footer>
		<div class='container'>
			Copyright &copy; <?php echo date('Y'); ?> Sunny Mishra
		</div>
	</footer>
</body>
</html>