<?php 
if ( !isset($_SESSION) ) {
    session_start();
}

require 'vendor/autoload.php';

include('include/db.php'); 
include('admin/include_admin/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 10</title>
    <!-- Core Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- toastr Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        *{
            font-family: 'Montserrat', sans-serif;
        }

        input,
        input::placeholder,
        button,
        .forgot-pwd-link{
            font-size: 12.5px !important;
        }

        .custom-px-70{
            padding-left: 70px;
            padding-right: 70px;
        }

        #toast-container > div{ 
            width: 340px !important; 
        }
    </style>
</head>
<body>