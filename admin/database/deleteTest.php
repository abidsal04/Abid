<?php 
    session_start();
    if(!isset($_SESSION['adminName'])){
      header("location:index.php");
    }
?>


<?php

    require 'config.php';

    $test_id = $_GET['test_id'];

    $sql = "DELETE FROM `testinfo` WHERE `testinfo`.`test_id` = '$test_id';";
    $qry = mysqli_query($con, $sql);

    if($qry){
        header("location:../tests.php");
    }
    else{
        echo "Something went wrong";
    }


?>