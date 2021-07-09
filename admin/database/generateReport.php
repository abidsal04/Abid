<?php 
    session_start();
    if(!isset($_SESSION['admin']['name'])){
      header("location:index.php");
    }
?>

<?php
    include '../../config.php';

    $test_id = $_GET['test_id'];

    $getSql = "SELECT * FROM `result`";
    $getQuery = mysqli_query($con, $getSql);

    while ($rows = mysqli_fetch_array($getQuery)) {

        $name = $rows['name'];
        $email = $rows['email'];
        $score = $rows['score'];
        $status = $rows['status'];

        $to_mail = "$email";
        $subject = "Think Exam Result Announcement";
        $body = "Hello $name,
    On the basis of your perfomance.
    We analyse that You are $status in this test.
    Thank you for using Think Exam.

    Account Information:
        Your name:         $name
        Your email address: $email";
        $headers = "From: abidsaleem003@gmail.com";

    if(mail($to_mail, $subject, $body, $headers)){
        $updateSql = "UPDATE `testinfo` SET `report` = 'Generated' WHERE `test_id` = '$test_id';";
        $updateqry = mysqli_query($con, $updateSql);
        header("location:../tests.php");

    }
    else{
        echo "Something went wrong";
    }
    }

?>