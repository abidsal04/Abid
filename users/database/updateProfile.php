<?php 
    session_start();
    if(!isset($_SESSION['user']['name'])){
        header("location: ../../index.php");
    }
?>


<?php
    require '../../config.php';

    $name = $_REQUEST['name'];
    $newEmail = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $companyName = $_REQUEST['companyName'];
    $address = $_REQUEST['address'];

    $email = $_SESSION['user']['email'];

    if($newEmail==$email){
        $updatesql= "UPDATE `credential` SET `name` = '$name', `phone` = '$phone', `companyName` = '$companyName', `address` = '$address' WHERE `email` = '$email';";
        $updateqry = mysqli_query($con, $updatesql);
    }
    else{
        $emailsql = "SELECT * FROM `credential` WHERE email='$newEmail'";
        $query = mysqli_query($con, $emailsql);

        $emailcount = mysqli_num_rows($query);

        if($emailcount>0){
            $_SESSION['user']['checkMail'] = "Email already exist.";
        }
        else{
            $sql= "UPDATE `credential` SET `name` = '$name', `changeEmail` = '$newEmail', `phone` = '$phone', `companyName` = '$companyName', `address` = '$address' WHERE `email` = '$email';";
            $qry = mysqli_query($con, $sql);

            $_SESSION['user']['checkMail'] = "Check Your mail to activate your new email.";
            $token = $_SESSION['user']['token'];

            // sending activation mail
            $subject = "Think Exam Email Verification";
            $body = "Dear $name,

    This email is sent to validate the email address that you have
    provided for your Think Exam login. Your THink Exam login, in combination
    with an active Think Exam subscription, provides you with access to
    systems management capabilities through Think Exam.

    To ensure the security of the account information associated with your
    Think Exam login, please take a moment to click through the link below
    and verify that we have the correct email address. If you do not
    confirm your email address, your Think Exam login will eventually be
    disabled.

    To confirm your email address, please visit the following URL:

    http://localhost/Abid/users/changeEmailActivate.php?token=$token

    Thank you for using Think Exam.

    Account Information:
        Your name:         $name
        Your email address: $email";
                                $senders_email = "From: abidsaleem003@gmail.com";
                            
                                if(mail($newEmail, $subject, $body, $senders_email)){
                                    $_SESSION['user']['msg'] = "Check your mail to activate your account $newEmail";
                                    echo "Please, check your email to activate your account";
                                }
                                else{
                                    echo "email sending failed";
                                }
        }
    }

        
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['email'] = $email;
        $_SESSION['user']['companyName'] = $companyName;
        $_SESSION['user']['address'] = $address;
        $_SESSION['user']['phone'] = $phone;


?>