<?php
    $db_host = 'localhost';
    $db_user = 'sunny';
    $db_password = 'password';
    $db_name = 'quizzer';
    $db_connection = new mysqli($db_host,$db_user,$db_password,$db_name);
    if($db_connection->connect_error)
    {
        printf("Error: %s",$db_connection->connect_error);
    }
?>