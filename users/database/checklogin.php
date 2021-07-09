<?php
        session_start();
        include_once "../../config.php";
            

        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        


            $pass = md5($password);

            $SQL = "SELECT * FROM `credential` WHERE email='$email' AND `status`='active' AND `userType`='user'";
            $QRY = mysqli_query($con, $SQL);

            $emailcount = mysqli_num_rows($QRY);

            if($emailcount){
                $email_pass = mysqli_fetch_assoc($QRY);
                $db_pass = $email_pass['password'];

                if($db_pass==$pass){
                    echo "Success";
                    $_SESSION['user']['id'] = $email_pass['id'];
                    $_SESSION['user']['name'] = $email_pass['name'];   
                    $_SESSION['user']['email'] = $email_pass['email'];
                    $_SESSION['user']['phone'] = $email_pass['phone'];
                    $_SESSION['user']['companyName'] = $email_pass['companyName'];
                    $_SESSION['user']['address'] = $email_pass['address'];
                    $_SESSION['user']['token'] = $email_pass['token'];
                }
                else {
                    echo "Invalid password";
                }
            }
            else {
                echo "Email does'nt Exist.
                Please, create account or check your mail to activate account";
            }

    ?>