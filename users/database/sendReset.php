<?php
            include_once "../../config.php";
                $email = $_POST['email'];

                $emailsql = "SELECT * FROM `credential` WHERE email='$email'";
                $query = mysqli_query($con, $emailsql);

                $emailcount = mysqli_num_rows($query);

                if($emailcount){
                    $userdata = mysqli_fetch_assoc($query);
                    $name = $userdata['name'];
                    $token = $userdata['token'];

                    $subject = "Think Exam Reset Password";
                    $body = "Dear $name,

    This email is sent to reset your password that you have
    provided for your Think Exam login. Your Think Exam login, in combination
    with an active Think Exam subscription, provides you with access to
    systems management capabilities through Think Exam.

    To ensure the security of the account information associated with your
    Think Exam login, please take a moment to click through the link below
    and verify that we have the correct email address.

    To reset your password, please visit the following URL:

    http://localhost/Abid/users/resetPassword.php?token=$token

    Thank you for using Think Exam.

    Account Information:
        Your name:         $name
        Your email address: $email";
                $senders_email = "From: abidsaleem003@gmail.com";
            
                    if(mail($email, $subject, $body, $senders_email)){
                        // $_SESSION['user']['msg'] = "Check your mail to reset your password";
                        // header("location:index.php");
                        echo "Check your mail to reset your password";
                    }
                    else{
                        echo "email sending failed";
                    }
            }
            else {
                echo "No email found";
            }
