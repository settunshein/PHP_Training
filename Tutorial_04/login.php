<?php
include('header.php');
?>

<div class="container">
<?php if( isset($_SESSION['auth']) ): ?>	
	<div class="row py-5">
		<?php if( isset($_SESSION['msg']) ): ?>
		<div class="col-12 alert alert-success">
			<span class="">
				<?= $_SESSION['msg']; ?>
				<?php unset($_SESSION['msg']); ?>
			</span>
			<a href="#" class="close" data-dismiss="alert">
				&times;
			</a>
		</div>
		<?php endif; ?>

		<div class="col-12 px-0">
			<nav>
	  			<ol class="breadcrumb">
		    		<li class="breadcrumb-item active">Dashboard</li>
		    		<li class="breadcrumb-item"><a href="logout.php">Logout</a></li>
		  		</ol>
			</nav>
		</div>
	</div>
<?php else: ?>
 	<div class="row vh-100 justify-content-center align-items-center">
		<div class="col-5 px-0">
			<form action="login_action.php" method="POST">
		        <div class="card">
		            <div class="card-header">
		            	<h4 class="mb-0">LOGIN</h4>
		            </div>
		                        
		            <div class="card-body">
		                <div class="form-row">
		                    <div class="form-group col-12">
		                        <label for="email">Email<strong class="text-danger">*</strong></label>
                        		<input type="text" class="form-control rounded-0 <?= isset($_SESSION['email_error']) ? 'is-invalid' : ''; ?>" 
		                        id="email" name="email" autofocus>
	                        	<span class="text-danger"><?= $_SESSION['email_error'] ?? ""; ?></span>
		                    </div>

		                    <div class="form-group col-12">
		                        <label for="password">Password<strong class="text-danger">*</strong></label>
		                        <input type="password" class="form-control rounded-0 <?= isset($_SESSION['password_error']) ? 'is-invalid' : ''; ?>" 
		                        id="password" name="password">
	                        	<span class="text-danger"><?= $_SESSION['password_error'] ?? ""; ?></span>
		                    </div>
		                </div>
		            </div>
		                        
		            <div class="card-footer">
		                <button type="submit" class="btn btn-block btn-outline-dark rounded-0" name="login">
		                    LOGIN
		                </button>
		            </div>
		        </div>
		    </form>
		</div>
	</div>
<?php endif; ?>
</div>

<?php include('footer.php'); ?>