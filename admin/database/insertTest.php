<?php 
    session_start();
    if(!isset($_SESSION['admin']['name'])){
      header("location:index.php");
    }
?>

<?php

    require '../../config.php';

    $name = $_REQUEST['testName'];
    $negativeMarking = $_REQUEST['negativeMarking'];
    $passingMarks = $_REQUEST['passingMarks'];
    $report = $_REQUEST['report'];
    $publishDate = $_REQUEST['publishDate'];
    $category = $_REQUEST['category'];

    $sql = "INSERT INTO `testinfo` (`name`, `category`, `negativeMarking`, `passingMarks`, `report`, `publishDate`) VALUES ('$name', '$category', '$negativeMarking', '$passingMarks', '$report', '$publishDate');";
    $qry = mysqli_query($con, $sql);

    // $getsql = "SELECT MAX(test_id) FROM `testinfo`";
    // $getquery = mysqli_query($con, $getsql);
    // $testinfo = mysqli_fetch_assoc($getquery);
    // $test_id = $testinfo['MAX(test_id)'];

    // $_SESSION['admin']['totalQuestions'] = $totalQuestions;
    // $_SESSION['admin']['test_id'] = $test_id;

    echo "Success";


?>