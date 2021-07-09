<?php 
    session_start();
    if(!isset($_SESSION['admin']['name'])){
      header("location:index.php");
    }
?>


<?php

    require '../../config.php';

    $category = $_REQUEST['category'];
    $question = $_REQUEST['question'];
    $option1 = $_REQUEST['option1'];
    $option2 = $_REQUEST['option2'];
    $option3 = $_REQUEST['option3'];
    $option4 = $_REQUEST['option4'];
    $answer = $_REQUEST['answer'];

    $sql = "INSERT INTO `question` (`category`, `question`, `option1`, `option2`, `option3`, `option4`, `correctOption`) VALUES ('$category', '$question', '$option1', '$option2', '$option3', '$option4', '$answer');";
    $qry = mysqli_query($con, $sql);

    echo "Your Question added";


?>