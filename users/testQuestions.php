<?php 
    session_start();
    if(!isset($_SESSION['name'])){
        header("location: http://localhost/Abid/users/index.php");
    }

    include 'database/config.php';
    $test_id = $_GET['test_id'];

    $email = $_SESSION['email'];
    $testSql = "SELECT `test_id` FROM `result` WHERE `email`='$email'";
    $testQuery = mysqli_query($con, $testSql);
    $testGiven = array();
    while($get = mysqli_fetch_array($testQuery)){
        array_push($testGiven, $get['test_id']);
    }

    if (in_array($test_id, $testGiven)){
        header("location: http://localhost/Abid/users/tests.php");
    }
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

        <link rel="stylesheet" href="../assets/css/quiz.css">

        <style>
            .cancel{
                width: 115px;
                height: 25px;
                background: red;
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
    

        <form action="database/checkQuestion.php" method="POST">
            <!-- questions -->
            <?php
                    
                                    
                    $testSql = "SELECT * FROM `testinfo` WHERE test_id='$test_id'";
                    $testQuery = mysqli_query($con, $testSql);

                    $testRow = mysqli_fetch_assoc($testQuery);

                    $category = $testRow['category'];
                    $ctg_arr = explode (",", $category);


                    $k = 1;
                    for ($i=0; $i <count($ctg_arr) ; $i++) {
                        $ctgInd = $ctg_arr[$i];
                        $queSql = "SELECT * FROM `question` WHERE `category`='$ctgInd'";
                        $queQuery = mysqli_query($con, $queSql);

                        while ($rows = mysqli_fetch_array($queQuery)) {
            ?>
                
            <input type="hidden" name="test_id" value="<?php echo $test_id; ?>">

            <div class="container mt-5">
                <div class="d-flex justify-content-center row">
                    <div class="col-md-10 col-lg-10">
                        <div class="border">
                            <div class="question bg-white p-3 border-bottom">
                                <div class="d-flex flex-row justify-content-between align-items-center mcq">
                                <h3 class="text-danger">Q.</h3>
                                <h5 class="mt-1 ml-2"><?php echo $rows['question']; ?></h5><span>(<?php echo $k; ?>)</span>
                                </div>
                            </div>
                            <div class="question bg-white p-3 border-bottom">

                                <!-- options -->
                                <input type="hidden" name="question[<?php echo $rows['qid']; ?>]" value="<?php echo '0'; ?>">

                                <div class="ans ml-2">
                                    <label class="radio"> <input type="radio" name="question[<?php echo $rows['qid']; ?>]" value="<?php echo '1'; ?>"> <span><?php echo htmlentities($rows['option1']); ?></span>
                                    </label>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio"> <input type="radio" name="question[<?php echo $rows['qid']; ?>]" value="<?php echo '2'; ?>"> <span><?php echo htmlentities($rows['option2']); ?></span>
                                    </label>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio"> <input type="radio" name="question[<?php echo $rows['qid']; ?>]" value="<?php echo '3'; ?>"> <span><?php echo htmlentities($rows['option3']); ?></span>
                                    </label>
                                </div>
                                <div class="ans ml-2">
                                    <label class="radio"> <input type="radio" name="question[<?php echo $rows['qid']; ?>]" value="<?php echo '4'; ?>"> <span><?php echo htmlentities($rows['option4']); ?></span>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php $k++; }
                }?>

            <br><br>
            <div class="text-center">
                <button class="btn btn-primary border-success align-items-center btn-success" type="submit" name="submit">Submit<i class="fa fa-angle-right ml-2"></i></button>
            </div><br>

            <p style="text-align: center;">   
                <a class="cancel" href="http://localhost/Abid/users/tests.php">Cancel</a>
            </p>
            
            <!-- footer -->
            <hr>
            <div class="text-center">
                <p>Powered by <a href="https://www.Abid.com/" target="_blank" style="color:red">Think Exam</a></p>
            </div>
        
        </form>

    </body>
</html>