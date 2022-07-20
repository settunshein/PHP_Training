<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('header.php');

$current_age;
if( isset($_POST['calculate']) ){
    $dob          = $_POST['dob'];
    $current_year = date('Y');
    $current_age  = $current_year - date('Y', strtotime($dob));
}
?>

<div class="container my-5">
    <div class="row justify-content-center">
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
                                <input type="text" class="form-control form-control-sm rounded-0 dob" id="dob" name="dob">
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