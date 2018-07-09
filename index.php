<?php include 'database.php';?>
<?php
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
		<p>This is a MCQ quiz to test your PHP knowledge!</p>
		<ul>
			<li><span class='bold_text_span'>Number of questions:</span> <?php echo $question_count; ?></li>
			<li><span class='bold_text_span'>Correct answer:</span> 5 points</li>
			<li><span class='bold_text_span'>Wrong answer:</span> -2 points</li>
			<li><span class='bold_text_span'>Estimated time:</span> <?php echo $question_count * 0.5;?> minutes</li>
		</ul>

		<a href='questions.php?n=1'><div class='start_button'>Start Quiz!</div></a>

	</div>
	<footer>
		<div class='container'>
			Copyright &copy; <?php echo date('Y'); ?> Sunny Mishra
		</div>
	</footer>
</body>
</html>