<?php 
$title = 'Student | Index';
include('include/header.php'); 

$students = getAllStudents();

if( isset($_GET['del_student_id']) ){
    $id = $_GET['del_student_id'];
    deleteStudent($id);
}
?>

<div class="container py-5">
	 <div class="row justify-content-center">
	 	<div class="col-12">
	        <div class="card">
	            <div class="card-header">
	                <div class="d-flex justify-content-between align-items-center">
	                    <p class="mb-0 card-ttl">User List Table</p>
	                    <a href="student_create.php" class="btn btn-sm btn-outline-dark rounded-0">
                        	Create&nbsp;
                        	<i class="fa fa-plus"></i>
                    	</a>
	                </div>
	            </div>

	            <div class="card-body">
            		<table class="table table-bordered">
            			<thead>
            				<tr>
	            				<th>#</th>
	            				<th>Name</th>
	            				<th>Email</th>
	            				<th>Language</th>
	            				<th>Age</th>
	            				<th>Address</th>
	            				<th>Action</th>
            				</tr>
            			</thead>

            			<tbody>
            				<?php foreach($students as $key => $student): ?>
            				<tr>
            					<td><?= ++ $key ?></td>
            					<td><?= $student->name ?></td>
            					<td><?= $student->email ?></td>
            					<td><?= $student->language ?></td>
            					<td><?= $student->age ?></td>
            					<td><?= $student->address ?></td>
            					<td>
            						<a href="student_edit.php?edit_student_id=<?=$student->id?>" 
                        			class="btn-sm btn btn-outline-dark rounded-0">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="javascript:;" class="btn btn-sm btn-outline-dark rounded-0" 
                                    data-toggle="modal" data-target="#showDeleteStudentModal<?=$student->id?>">
                                        <i class="fa fa-trash-alt"></i>
                                    </a>
                                    <?php include('student_delete.php'); ?>
            					</td>
            				</tr>
            			<?php endforeach; ?>
            			</tbody>
            		</table>
	            </div><!-- /.card-body -->
	        </div><!-- /.card -->
    	</div>
	 </div>
</div>

<?php 
include('include/footer.php'); 
if( isset($_SESSION['success']) ){
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
?>

