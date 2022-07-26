<?php 
$title = 'Student | Create';
include('include/header.php'); 
$students = createStudent();
?>

<div class="container py-5">
	 <div class="row justify-content-center">
	 	<div class="col-12">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    	        <div class="card">
    	            <div class="card-header">
    	                <div class="d-flex justify-content-between align-items-center">
    	                    <p class="mb-0 card-ttl">Create User</p>
    	                    <a href="student_index.php" class="btn btn-sm btn-outline-dark rounded-0">
                                <i class="fas fa-arrow-circle-left"></i>&nbsp;
                                B A C K
                            </a>
    	                </div>
    	            </div>

    	            <div class="card-body">
                		<div class="form-row">
                            <div class="form-group col-6">
                                <label>Student Name <b class="text-danger">*</b></label>
                                <input type="text" class="form-control form-control-sm" name="name" required autofocus>
                            </div>

                            <div class="form-group col-6">
                                <label>Student Email <b class="text-danger">*</b></label>
                                <input type="email" class="form-control form-control-sm" name="email" required>
                            </div>

                            <div class="form-group col-6">
                                <label>Language</label>
                                <input type="text" class="form-control form-control-sm" name="language" required>
                            </div>

                            <div class="form-group col-6">
                                <label>Age</label>
                                <input type="text" class="form-control form-control-sm" name="age">
                            </div>

                            <div class="form-group col-12">
                                <label>Address</label>
                                <textarea rows="3" class="form-control form-control-sm" name="address"></textarea>
                            </div>
                        </div>
    	            </div><!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-outline-dark float-right rounded-0" name="create_student">
                            <i class="fa fa-edit"></i>&nbsp;
                            Create
                        </button>
                    </div>
    	        </div><!-- /.card -->
            </form>
    	</div>
	 </div>
</div>

<?php include('include/footer.php'); ?>
