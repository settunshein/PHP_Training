<?php

function createTables()
{
    global $conn;
    $query1 = "CREATE TABLE IF NOT EXISTS tbl_users(
        id         INT(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
        name       VARCHAR(255) NOT NULL,
        email      VARCHAR(255) NOT NULL UNIQUE,
        password   VARCHAR(255) NOT NULL,
        phone      VARCHAR(255) DEFAULT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );";

    $query2 = "CREATE TABLE IF NOT EXISTS tbl_tokens(
        id         INT(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
        email      VARCHAR(255) NOT NULL,
        token      VARCHAR(255) NOT NULL,
        exp_date   DATETIME NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );";
    mysqli_query($conn, $query1);
    mysqli_query($conn, $query2);
}



function insertDummyUser()
{
    global $conn;
    $password = password_hash('123123123', PASSWORD_BCRYPT);
    $query    = "INSERT INTO tbl_users (name, email, password, phone) 
                 VALUES ('Set Tun Shein', 'setwebdev@gmail.com', '$password', '09123123123')";
    mysqli_query($conn, $query);
}



function login()
{
    global $conn;
    if( isset($_POST['post_login']) ){
        $email    = $_POST['email'];
        $password = $_POST['password'];
        $query    = "SELECT * FROM tbl_users WHERE email='$email'";
        $result   = mysqli_query($conn, $query);
        $authUser = mysqli_fetch_object($result);

        if($authUser){
            if( password_verify($password, $authUser->password) ){
                $_SESSION['auth']     = true;
                $_SESSION['authUser'] = $authUser->name;
                $_SESSION['success']  = "
                    <script>
                        toastr.success('LoggedIn Successfully &nbsp;<i class=\"far fa-check-circle\"></i>', 'SUCCESS')
                    </script>
                ";
                header('location: admin/dashboard.php');
                exit();
            }else{
                $_SESSION['error'] = "
                    <script>
                        toastr.error('Credential Does Not Match &nbsp;<i class=\"far fa-times-circle\"></i>', 'ACCESS DENIED')
                    </script>
                ";
                header('location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }else{
            $_SESSION['error'] = "
                <script>
                    toastr.error('Credential Does Not Match &nbsp;<i class=\"far fa-times-circle\"></i>', 'ACCESS DENIED')
                </script>
            ";
            header('location: ' . $_SERVER['HTTP_REFERER']);
            exit();     
        }
    }
}



function logout()
{
    if( isset($_GET['action']) && $_GET['action'] == 'logout' ){
        session_start();
        session_destroy();
        header('location: ../dashboard.php');
        exit();
    }
}
logout();



function forgotPassword()
{
    global $conn;
    if( isset($_POST['forgot_pwd']) && isset($_POST['email']) ){
        $email  = $_POST['email'];

        $token    = generateToken();
        $exp_date = generateExpDate();

        $query  = "SELECT * FROM tbl_users WHERE email='$email'";
        $result = mysqli_query($conn, $query);

        if( mysqli_num_rows($result) ){
            $query = "INSERT INTO tbl_tokens (email, token, exp_date) VALUES ('$email', '$token', '$exp_date')";
            mysqli_query($conn, $query);

            $link  = "http://localhost/Learn_PHP/Tutorial_10/reset_password.php?email=$email&token=$token";
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP();
            $mail->Host       = "smtp.gmail.com";
            $mail->SMTPAuth   = true;
            $mail->SMTPSecure = "tls";
            $mail->Port       = "587";
            $mail->Username   = "ddktestweb01@gmail.com";
            $mail->Password   = "nlkdjviowuaqnokx";

            $mail->Subject = 'Reset Password';
            $mail->SetFrom("ddktestweb01@gmail.com", "Admin Team");
            $mail->Body = "Click On This Link to Reset Password " . $link . '';
            $mail->AddAddress($email);
            $mail->IsHTML(true);

            if($mail->send()){
                $_SESSION['success'] = "
                    <script>
                        toastr.success('Email Sent Successfully &nbsp;<i class=\"far fa-check-circle\"></i>', 'SUCCESS')
                    </script>
                ";
                header('location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }else{
                $_SESSION['error'] = "
                    <script>
                        toastr.error('Email Sending Fail &nbsp;<i class=\"far fa-check-circle\"></i>', 'SUCCESS')
                    </script>
                ";
                header('location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }else{
            $_SESSION['error'] = "
                <script>
                    toastr.error('Invalid Email Address &nbsp;<i class=\"far fa-check-circle\"></i>', 'ACCESS DENIED')
                </script>
            ";
            header('location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}



function resetPassword()
{
    global $conn;
    if( isset($_POST['reset_pwd']) ){
        $data     = $_POST;
        $token    = $data['token'];
        $email    = $data['email'];
        $cur_date = date("Y-m-d H:i:s");
        $query    = "SELECT * FROM tbl_tokens WHERE token='$token' && email='$email'";
        $result   = mysqli_query($conn, $query);

        if( mysqli_num_rows($result) < 0 ){
           $_SESSION['error'] = "
                <script>
                    toastr.error('This Link is Invalid &nbsp;<i class=\"far fa-times-circle\"></i>', 'ACCESS DENIED')
                </script>
            ";
            header('location: forgot_password.php');
            exit();
        }else{
            $row      = mysqli_fetch_assoc($result);
            $exp_date = $row['exp_date'];
            if($exp_date >= $cur_date){
                if( $data['password'] == $data['password_confirmation'] ){
                    $hash_password = password_hash($data['password'], PASSWORD_BCRYPT);

                    $query1 = "UPDATE tbl_users SET password='$hash_password' WHERE email='$email'";
                    mysqli_query($conn, $query1);

                    $query2 = "DELETE FROM tbl_tokens WHERE token='$token' && email='$email'";
                    mysqli_query($conn, $query2);

                    $_SESSION['error'] = "
                        <script>
                            toastr.success('Password Updated Successfully &nbsp;<i class=\"far fa-check-circle\"></i>', 'SUCCESS')
                        </script>
                    ";
                    header('location: login.php');
                    exit();
                }else{
                    $_SESSION['error'] = "
                        <script>
                            toastr.error('The Password Confirmation Does Not Match &nbsp;<i class=\"far fa-times-circle\"></i>', 'ACCESS DENIED')
                        </script>
                    ";
                    header('location: ' . $_SERVER['HTTP_REFERER']);
                    exit();
                }
            }else{
                 $_SESSION['error'] = "
                    <script>
                        toastr.error('This Link is Expired &nbsp;<i class=\"far fa-times-circle\"></i>', 'ACCESS DENIED')
                    </script>
                ";
                header('location: forgot_password.php');
                exit();
            }
        }
    }
}



function generateToken()
{
    $token = md5( uniqid(time()) );
    $token = sha1($token);
    $token = crypt($token, $token);
    return $token;
}



function generateExpDate()
{
   $exp_format  = mktime( date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y") );
   $exp_date    = date("Y-m-d H:i:s", $exp_format);
   return $exp_date;
}