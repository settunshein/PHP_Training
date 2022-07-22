<?php 
include('include/header.php'); 

use chillerlan\QRCode\QRCode;

if( isset($_REQUEST['generate']) ){
	$qr_str  = $_REQUEST['qr_str'];
	if( !empty($qr_str) ){
		$qr_code = (new QRCode())->render($qr_str);
	}
}

if( isset($_REQUEST['delete']) ){
    unset($qr_str);
}
?>

<div class="container">
	 <div class="row justify-content-center vh-100 align-items-center">
	 	<div class="col-5">
	 		<form action="" method="GET">
		        <div class="card">
		            <div class="card-header">
		                <div class="d-flex justify-content-center align-items-center">
		                    <p class="mb-0 py-1">Generate QR Code</p>
		                </div>
		            </div>

		            <div class="card-body">
		            	<div class="form-group">
		            		<label for="qr_str">QR Code Content<b class="text-danger ml-1">*</b></label>
		            		<input type="text" class="form-control form-control-sm rounded-0" name="qr_str" id="qr_str" required autofocus>
		            	</div>

		            	<div class="text-center">
		            		<?php if( isset($qr_code) ): ?>
	            				<img src="<?= $qr_code; ?>" class="img-fluid" width="200" height="200">
								<a href="index.php?delete" class="d-block del-qr">[ Delete QR ]</a>		            			
		            		<?php else: ?>
		            			<img src="img/qr.png" class="img-fluid" width="220" height="220">
		            		<?php endif; ?>
		            	</div>
		            </div>

		            <div class="card-footer d-flex justify-content-center">
		                <button type="submit" class="btn btn-sm btn-outline-dark rounded-0" name="generate">
		                    Generate
		                </button>
		            </div>
		        </div>
	    	</form>
    	</div>
	 </div>
</div>

<?php include('include/footer.php'); ?>

