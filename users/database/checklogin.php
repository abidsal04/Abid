<?php
        session_start();
        include_once "config.php";
            

        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        


            $pass = md5($password);

            $emailsearch = "SELECT * FROM `credential` WHERE email='$email' AND `status`='active'";
            $query = mysqli_query($con, $emailsearch);

            $emailcount = mysqli_num_rows($query);

            if($emailcount){
                $email_pass = mysqli_fetch_assoc($query);
                $db_pass = $email_pass['password'];
                $pass = md5($password);

                


                if($db_pass==$pass){
                    echo "Success";
                    $_SESSION['id'] = $email_pass['id'];
                    $_SESSION['name'] = $email_pass['name'];   
                    $_SESSION['email'] = $email_pass['email'];
                    $_SESSION['phone'] = $email_pass['phone'];
                    $_SESSION['profession'] = $email_pass['profession'];
                    $_SESSION['token'] = $email_pass['token'];
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