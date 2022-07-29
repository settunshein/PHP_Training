<?php
include('include/header.php');
login();
?>

<div class="container-fluid">
    <div class="row justify-content-center vh-100 align-items-center">
        <div class="col-md-4 custom-px-70">
            
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <h3 class="login-title mb-4 text-center">LOGIN</h3>
            
                <div class="form-group mb-4">
                    <input class="form-control rounded-0" type="email" name="email" 
                    placeholder="Enter Your Email Address" autocomplete="off" autofocus>
                </div>

                <div class="form-group mb-4">
                    <input class="form-control rounded-0" type="password" name="password" 
                    placeholder="Enter Your Password">
                </div>

                <div class="form-group">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="forgot_password.php" class="forgot-pwd-link">Forgot Password</a>
                        <button class="btn btn-outline-dark rounded-0" type="submit" name="post_login">
                            <i class="fa fa-unlock mr-1"></i>
                            LOGIN
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>