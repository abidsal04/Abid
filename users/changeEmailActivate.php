<?php 
include "database/config.php";
    session_start();
    
    if(isset($_GET['token'])){
        $token = $_GET['token'];

        $sql = "SELECT * FROM `credential` WHERE `token`='$token'";
        $qry = mysqli_query($con, $sql);
        $user = mysqli_fetch_assoc($qry);

        $newEmail = $user['changeEmail'];

        $updateSql = "UPDATE `credential` SET `email` = '$newEmail', `changeEmail` = '' WHERE `token` = '$token'";
        $query = mysqli_query($con, $updateSql);

        if($query){
            if(isset($_SESSION['msg'])){
                session_destroy();
                header("location:login.php");
            }
            else{
                $_SESSION['msg'] = "You are logged out";
                header("location:login.php");
            }
        }
        
        else{
            $_SESSION['msg'] = "Account not activated";
            header("location:signup.php");
        }
        
    }
?>