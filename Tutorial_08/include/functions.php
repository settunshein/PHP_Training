<?php

/* DB Setup Module */
function createTable()
{
    global $conn;
    $query = "CREATE TABLE IF NOT EXISTS tbl_students(
        id        INT(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
        name      VARCHAR(255) NOT NULL,
        email     VARCHAR(255) NULL,
        language  TEXT NULL,
        age       INT(11) NULL,
        address   TEXT NULL,
    );";
    mysqli_query($conn, $query);
}


function insertData()
{
    global $conn;
    $json = file_get_contents('files/students.json');
    $objs = json_decode($json);

    foreach( $objs as $obj ){
        $age = rand(20, 30);
        $query = "
            INSERT INTO 
                tbl_students (name, email, language, age, address)
            VALUES
                ('$obj->name', '$obj->email', '$obj->lang', '$age', '$obj->address')
        ";
        mysqli_query($conn, $query);
    }
}


function truncateTable()
{
    global $conn;
    $query = "TRUNCATE TABLE tbl_students";
    mysqli_query($conn, $query);
}


function dropTable()
{
    global $conn;
    $query = "DROP TABLE tbl_students";
    mysqli_query($conn, $query);
}


/* Students Module */
function getAllStudents()
{
	global $conn;
	$students = [];
    if( $result = mysqli_query($conn, "SELECT * FROM tbl_students") ){
    	while( $row = mysqli_fetch_object($result) ){
    		$students[] = $row;
    	}
    }
    return $students;
}


function getStudent($id)
{   
    global $conn;
    $result  = mysqli_query($conn, "SELECT * FROM tbl_students WHERE id=$id");
    $student = mysqli_fetch_object($result);
    return $student;
}


function createStudent()
{
	global $conn;
	if( isset($_POST['create_student']) ){
        $name     = $_POST['name'];
        $email    = $_POST['email'];
        $lang     = $_POST['language'];
        $age      = $_POST['age'];
        $address  = $_POST['address'];
    
        $query = "INSERT INTO tbl_students (name, email, language, age, address) 
                  VALUES ('$name', '$email', '$lang', '$age', '$address')";
        $result = mysqli_query($conn, $query);
        if($result){
            $_SESSION['success'] = "
            	<script>
            		toastr.success('New Student Created Successfully &nbsp;<i class=\"far fa-check-circle\"></i>', 'SUCCESS')
        		</script>
        	";
            header('location: student_index.php');
        }
    }
}


function editStudent()
{
    global $conn;
    if( isset($_POST['edit_student']) ){
        $id      = $_POST['id'];
       	$name    = $_POST['name'];
        $email   = $_POST['email'];
        $lang    = $_POST['language'];
        $age     = $_POST['age'];
        $address = $_POST['address'];
    
        $query  = "UPDATE tbl_students SET name='$name', email='$email', language='$lang', age='$age', address='$address' WHERE id=$id";
        $result = mysqli_query($conn, $query);
        if($result){
            $_SESSION['success'] = "
            	<script>
            		toastr.success('Student Updated Successfully &nbsp;<i class=\"far fa-check-circle\"></i>', 'SUCCESS')
            	</script>
        	";
            header('location: student_index.php');
        }
    }
}


function deleteStudent($id)
{ 
    global $conn;
    mysqli_query($conn, "DELETE FROM tbl_students WHERE id=$id");
    $_SESSION['success'] = "
        <script>
            toastr.success('Student Deleted Successfully &nbsp;<i class=\"far fa-check-circle\"></i>', 'SUCCESS')
        </script>
    ";
    header('location: student_index.php');

}
