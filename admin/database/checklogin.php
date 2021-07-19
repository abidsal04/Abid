<?php
        session_start();
        include_once "../../config.php";
            

        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        


            $pass = md5($password);

            $SQL = "SELECT * FROM `credential` WHERE email='$email' AND `userType`='Admin'";
            $QRY = mysqli_query($con, $SQL);

            $emailcount = mysqli_num_rows($QRY);

            if($emailcount){
                $email_pass = mysqli_fetch_assoc($QRY);
                $db_pass = $email_pass['password'];

                if($db_pass==$pass){
                    echo "Success";
                    $_SESSION['admin']['id'] = $email_pass['id'];
                    $_SESSION['admin']['name'] = $email_pass['name'];   
                    $_SESSION['admin']['email'] = $email_pass['email'];
                    $_SESSION['admin']['phone'] = $email_pass['phone'];
                    $_SESSION['admin']['companyName'] = $email_pass['companyName'];
                }
                else {
                    echo "Invalid password";
                }
            }
            else {
                echo "You are not an admin";
            }

    ?>