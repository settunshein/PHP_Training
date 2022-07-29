<?php
include('include/header.php');
resetPassword();
?>

<div class="container-fluid">
    <div class="row justify-content-center vh-100 align-items-center">
        <div class="col-md-4 custom-px-70">

            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <h3 class="login-title mb-4 text-center text-uppercase">Reset Password</h3>
                <input type="hidden" name="email" value="<?= $_GET['email']; ?>"> 
                <input type="hidden" name="token" value="<?= $_GET['token']; ?>">           

                <div class="form-group mb-4">
                    <input class="form-control rounded-0" type="password" name="password" 
                    placeholder="Enter Your New Password" required>
                </div>

                <div class="form-group mb-4">
                    <input class="form-control rounded-0" type="password" name="password_confirmation" 
                    placeholder="Confirm Your New Password" required>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-outline-dark rounded-0 btn-block text-uppercase" type="submit" name="reset_pwd">
                        Reset Password
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>