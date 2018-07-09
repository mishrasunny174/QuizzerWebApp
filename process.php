<?php include 'database.php';?>
<?php session_start(); ?>

<?php 
    if(!isset($_SESSION['score'])){
        $_SESSION['score'] = 0;
    }
    if(isset($_POST['submit'])){
        $question_number = $_POST['question_number'];
        $next = $question_number+1;
        $choice = $_POST['choice'];
        $db_query = "select is_correct from choices where id = $choice";
        $db_result = $db_connection->query($db_query) or die($db_connection->error);
        $is_correct = $db_result->fetch_assoc()['is_correct'];
        $db_query = "select * from questions";
        $db_result = $db_connection->query($db_query) or die($db_connection->error);
        $question_count = (int)$db_result->num_rows;
        if($is_correct == 1){
            $_SESSION['score'] += 5;
        }
        else{
            $_SESSION['score'] -= 2;
        }
        if($question_number < $question_count) {
            header("Location: questions.php?n=".$next);
        } else {
            header("Location: result.php");
        }
        exit();
    } else {
        echo "ERROR: ACCESS DENIED";
        exit();
    }
?>