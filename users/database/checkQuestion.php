<?php 
    session_start();
    if(!isset($_SESSION['name'])){
        header("location: http://localhost/Login_signup/index.php");
    }
?>

<?php 
    include "config.php"; 

    if(isset($_POST['submit'])){
            $test_id = $_POST['test_id'];

            $selected = $_POST['question'];
            // print_r($selected);

            $testSql = "SELECT * FROM `testinfo` WHERE test_id='$test_id'";
            $testQuery = mysqli_query($con, $testSql);

            $testRow = mysqli_fetch_assoc($testQuery);

            $category = $testRow['category'];
            $ctg_arr = explode (",", $category);


            $result=0;
            $count=0;
            for ($i=0; $i <count($ctg_arr) ; $i++) {
                $ctgInd = $ctg_arr[$i];
                $queSql = "SELECT * FROM `question` WHERE `category`='$ctgInd'";
                $queQuery = mysqli_query($con, $queSql);
                // $j = 0;
                while ($rows = mysqli_fetch_array($queQuery)) {
                    $qid = $rows['qid'];
                    if($rows['correctOption']==$selected[$qid]){
                        $result++;
                    }
                    $count++;
                }
            }
            // echo $result;



            $getsql = "SELECT * FROM `testinfo` WHERE `test_id`='$test_id'";
            $getquery = mysqli_query($con, $getsql);
            $testinfo = mysqli_fetch_assoc($getquery);
            $passingMarks = $testinfo['passingMarks'];


            $score = ($result/$count)*100;
    
            if($score>=$passingMarks){
                $status = 'Pass';
            }
            else{
                $status = 'Fail';
            }

            $name = $_SESSION['name'];
            $email = $_SESSION['email'];
    
            $insertsql = "INSERT INTO `result` (`name`, `email`, `score`, `status`, `test_id`) VALUES ('$name', '$email', '$score', '$status', '$test_id')";
            $insertquery = mysqli_query($con, $insertsql);


    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title>Think Exam - Admin</title>

    <style>
        .button {
            width: 115px;
            height: 25px;
            background: grey;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            color: white;
            line-height: 25px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <p style="text-align: center;"><img class="activeTyIcon" src="https://cdn.jotfor.ms/img/check-icon.png" alt="" width="128" height="128" /></p>
    <div style="text-align: center;">
    <h1 style="text-align: center;">Thank You!</h1>
    <p style="text-align: center;">Your submission has been received. We will notify you on mail.</p>
    <p style="text-align: center;">   
        <a class="button" href="http://localhost/Abid/users/profile.php">Home</a>
    </p>
</div>
</body>
</html>


