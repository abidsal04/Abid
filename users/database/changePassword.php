

<?php 
    session_start();
    if(!isset($_SESSION['name'])){
      header("location:index.php");
    }
?>

<?php


        include_once "config.php";

        $email = $_SESSION['email'];

        $newpassword = mysqli_real_escape_string($con, $_POST['newpassword']);
        $oldpassword = mysqli_real_escape_string($con, $_POST['oldpassword']);

        $newPass = md5($newpassword);
        $oldPass = md5($oldpassword);

        $getOldSql = "SELECT * FROM `credential` WHERE `email`='$email';";
        $getOldQuery = mysqli_query($con, $getOldSql); 
        $getArray = mysqli_fetch_assoc($getOldQuery);
        $getOldPass = $getArray['password'];


        if ($oldPass==$getOldPass) {
            $updatesql= "UPDATE `credential` SET `password` = '$newPass' WHERE `email` = '$email';";
            $updatequery = mysqli_query($con, $updatesql);

            session_destroy();
            echo "";
        }

        else
        {
            echo "Your old password does'nt match";
        }


    ?>
