<?php 
$title = 'Student | Edit';
include('include/header.php'); 

if( isset($_GET['edit_student_id']) ){
    $id = $_GET['edit_student_id'];
    $student = getStudent($id);
}

editStudent();
?>

<div class="container py-5">
	 <div class="row justify-content-center">
	 	<div class="col-12">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    	        <div class="card">
    	            <div class="card-header">
    	                <div class="d-flex justify-content-between align-items-center">
    	                    <p class="mb-0 card-ttl">Edit User</p>
    	                    <a href="student_index.php" class="btn btn-sm btn-outline-dark rounded-0">
                                <i class="fas fa-arrow-circle-left"></i>&nbsp;
                                B A C K
                            </a>
    	                </div>
    	            </div>

    	            <div class="card-body">
                		<div class="form-row">
                            <input type="hidden" name="id" value="<?= $student->id ?>">
                            <div class="form-group col-6">
                                <label>Student Name <b class="text-danger">*</b></label>
                                <input type="text" class="form-control form-control-sm" name="name" value="<?= $student->name ?>" required autofocus>
                            </div>

                            <div class="form-group col-6">
                                <label>Student Email <b class="text-danger">*</b></label>
                                <input type="email" class="form-control form-control-sm" name="email" value="<?= $student->email ?>" required>
                            </div>

                            <div class="form-group col-6">
                                <label>Language</label>
                                <input type="text" class="form-control form-control-sm" name="language" value="<?= $student->language ?>" required>
                            </div>

                            <div class="form-group col-6">
                                <label>Age</label>
                                <input type="number" class="form-control form-control-sm" name="age" value="<?= $student->age ?>">
                            </div>

                            <div class="form-group col-12">
                                <label>Address</label>
                                <textarea rows="3" class="form-control form-control-sm" name="address"><?= $student->address ?></textarea>
                            </div>
                        </div>
    	            </div><!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-dark float-right rounded-0" name="edit_student">
                            <i class="fa fa-edit"></i>&nbsp;
                            Update
                        </button>
                    </div>
    	        </div><!-- /.card -->
            </form>
    	</div>
	 </div>
</div>

<?php include('include/footer.php'); ?>