<?php

        
    require 'config.php';

    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $profession = $_REQUEST['profession'];
    $password = $_REQUEST['password'];


    $token = bin2hex(random_bytes(15));
    $pass = md5($password);

    $emailsql = "SELECT * FROM `credential` WHERE email='$email'";
    $query = mysqli_query($con, $emailsql);

    $emailcount = mysqli_num_rows($query);

    if($emailcount>0){
        echo "Email already exist.";
    }
    else {
        $insertsql= "INSERT INTO `credential` (`name`, `email`, `changeEmail`, `phone`, `profession`, `password`, `token`, `status`, `userType`) VALUES ('$name', '$email', '', '$phone', '$profession', '$pass', '$token', 'inactive', 'User');";
        $insertquery = mysqli_query($con, $insertsql);

            if($insertquery){


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

    http://localhost/Abid/users/activateAccount.php?token=$token

    Thank you for using Think Exam.

    Account Information:
        Your name:         $name
        Your email address: $email";
                                $senders_email = "From: abidsaleem003@gmail.com";
                            
                                if(mail($email, $subject, $body, $senders_email)){
                                    $_SESSION['msg'] = "Check your mail to activate your account $email";
                                    echo "You've been registered successfully.
                                    Please, check your email to activate your account";
                                }
                                else{
                                    echo "email sending failed";
                                }
            }
        }
?>