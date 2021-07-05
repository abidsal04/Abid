<?php


        include_once "config.php";


            $password = mysqli_real_escape_string($con, $_POST['password']);
            $token = $_POST['token'];

            $pass = md5($password);

            
            $updatesql= "UPDATE `credential` SET `password` = '$pass' WHERE `token` = '$token'";
            $updatequery = mysqli_query($con, $updatesql);

            if($updatequery){
                // $_SESSION['msg'] = "Your password has been updated";
                // header("location:login.php");
                echo "Your password has been updated";
            }
            else{
                // $_SESSION['msg'] = "update error";
                // header("location:reset_password.php?token=$token");
                echo "update error";
            }
?>