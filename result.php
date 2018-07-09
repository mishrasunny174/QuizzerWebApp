<?php session_start(); ?>
<?php 
    if(!isset($_SESSION['score']))
        echo "ERROR: Session expired";
        die();
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
		<h3 style="text-align: center">Congrats!</h3>
		<p>You have completed the quiz</p>
		<p>Your final score is <?php echo $_SESSION['score']; unset($_SESSION['score']);?></p>
		<a href="questions.php?n=1"><div class="start_button">Take Again</div></a>
	</div>
	<footer>
		<div class='container'>
			Copyright &copy; <?php echo date('Y'); ?> Sunny Mishra
		</div>
	</footer>
</body>
</html>