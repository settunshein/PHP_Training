<?php
session_start();

if( isset($_POST['login']) ){
	$email    = $_POST['email'];
	$password = $_POST['password'];

	if( empty($email) || empty($password) || !filter_var($email, FILTER_VALIDATE_EMAIL) ){
		if( empty($email) ){
			$_SESSION['email_error'] = "Email field is required.";
		}else{
			if( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
				$_SESSION['email_error'] = "Email must be a valid email address.";
			}
		}

		if( empty($password) ){
			$_SESSION['password_error'] = "Password field is required";
		}
		header('location: ' . $_SERVER['HTTP_REFERER']);
	}else{
		unset($_SESSION['email_error']);
		unset($_SESSION['password_error']);
			
		$_SESSION['auth'] = true;
		$_SESSION['msg']  = "Logged In Successfully&nbsp;<i class='far fa-check-circle'></i>";
		header('location: ' . $_SERVER['HTTP_REFERER']);
	}
}