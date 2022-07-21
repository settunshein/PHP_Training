<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('header.php');

$current_age;
if( isset($_POST['calculate']) ){
    $user_input   = $_POST['dob'];
    $current_date = date('Y-m-d');
    if($user_input > $current_date){
        $_SESSION['msg'] = "Invalid Date of Birth.&nbsp;<i class='far fa-times-circle'></i>";
    }else{
        $current_age  = date('Y') - date('Y', strtotime($user_input));
    }
}
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <?php if( isset($_SESSION['msg']) ): ?>
        <div class="col-12">
            <div class="col-12 alert alert-danger">
                <span class="">
                    <?= $_SESSION['msg']; ?>
                    <?php unset($_SESSION['msg']); ?>
                </span>
                <a href="#" class="close" data-dismiss="alert">
                    &times;
                </a>
            </div>
        </div>
        <?php endif; ?>

        <div class="col-12">
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="card">
                    <div class="card-header">
                        Calculate Age by User Input Date
                    </div>
                                
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="dob">Date Of Birth<strong>*</strong></label>
                                <input type="date" class="form-control form-control-sm rounded-0 dob" id="dob" name="dob">
                            </div>
                        </div>
                    </div>
                                
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-sm btn-outline-dark rounded-0" name="calculate">
                            <i class="fa fa-edit"></i>&nbsp;
                            Calculate
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if( isset($current_age) ): ?>
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="alert alert-success">
                <p class="mb-0"><?= "Your Current Age is {$current_age} Years Old."; ?></p>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php include('footer.php'); ?>