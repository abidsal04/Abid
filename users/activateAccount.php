<?php 
include "../config.php";
    session_start();
    
    if(isset($_GET['token'])){
        $token = $_GET['token'];

        $updatequery = "UPDATE `credential` SET `status` = 'active' WHERE `token` = '$token'";
        $query = mysqli_query($con, $updatequery);

        if($query){
            if(isset($_SESSION['user']['msg'])){
                $_SESSION['user']['msg'] = "Account activated succesfully";
                header("location:index.php");
            }
            else{
                $_SESSION['user']['msg'] = "You are logged out";
                header("location:index.php");
            }
        }
        
        else{
            $_SESSION['user']['msg'] = "Account not activated";
            header("location:signup.php");
        }
        
    }
?>