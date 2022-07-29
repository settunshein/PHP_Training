<?php
include('include/header.php');
forgotPassword();
?>

<div class="container-fluid">
    <div class="row justify-content-center vh-100 align-items-center">
        <div class="col-md-4 custom-px-70">

            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <h3 class="login-title mb-4 text-center text-uppercase">Forgot Password</h3>
            
                <div class="form-group mb-4">
                    <input class="form-control rounded-0" type="email" name="email" 
                    placeholder="Enter Your Email" required>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-outline-dark rounded-0 btn-block text-uppercase" type="submit" name="forgot_pwd">
                        Continue
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>