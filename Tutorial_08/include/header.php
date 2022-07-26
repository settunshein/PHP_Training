<?php 
session_start();
include('include/db.php');
include('include/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- toastr Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
    <style>
        body{ 
            font-family: 'Manrope', sans-serif; 
        }

        strong{
            color: #f82249;
            margin-left: 5px;
        }

        .card-header{
            font-size: 13px;  
        }

        .card-ttl{
            font-size: 14px;
        }

        label, 
        input, 
        table,
        button,
        textarea{
            font-size: 12.5px !important;
        }

        /*table{
            font-size: 12.5px;
        }*/

        table tr{
            text-align: center;
        }

        table tr th,
        table tr td{
            text-align: center;
            vertical-align: middle !important;
        }

        input,
        textarea{
            border-radius: 0 !important;
            resize: none;
        }

        #toast-container>div { width: 340px !important; }
    </style>
</head>
<body>