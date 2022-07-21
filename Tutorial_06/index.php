<?php include('include/header.php'); ?>

<div class="container">
	 <div class="row justify-content-center py-3">
	 	<div class="col-8">
	 		<form action="action.php" method="POST" enctype="multipart/form-data">
		        <div class="card">
		            <div class="card-header">
		                <div class="d-flex justify-content-between align-items-center">
		                    <p class="mb-0 py-1">Image</p>
		                </div>
		            </div>

		            <div class="card-body">
		            	<div class="form-group">
		            		<label for="folder_name">Folder Name<b class="text-danger ml-1">*</b></label>
		            		<input type="text" class="form-control form-control-sm rounded-0" name="folder_name" id="folder_name">
		            		<span class="text-danger err-msg"><?= $_SESSION['folder_name_err'] ?? ""; ?></span>
		            	</div>
		            	<div class="form-group">
		            		<label for="image">Choose Your Image<b class="text-danger ml-1">*</b></label>
		                	<input type="file" class="dropify" name="image" id="image">
		                	<span class="text-danger err-msg"><?= $_SESSION['image_err'] ?? ""; ?></span>
		            	</div>
		            </div>

		            <div class="card-footer">
		                <button type="submit" class="btn btn-sm btn-outline-dark float-right rounded-0" name="upload">
		                    <i class="fa fa-upload pr-1"></i>
		                    Upload
		                </button>
		            </div>
		        </div>
	    	</form>
    	</div>
	 </div>
</div>

<?php include('include/footer.php'); ?>

