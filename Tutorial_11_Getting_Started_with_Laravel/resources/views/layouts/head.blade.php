<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit&display=swap');

        body{ 
            font-family: 'Kanit', sans-serif;
        }

        .fa-trash-alt{
            padding-left: 1.5px;
            padding-right: 1.5px;
        }

        /* Custom Styling Sweet Alert 2 */
        .swal2-popup {
            font-size: 12.5px !important;
        }

        .swal2-styled.swal2-confirm {
            padding-left: 25px !important;
            padding-right: 25px !important;
        }

        .btn,
        .swal2-styled.swal2-cancel,
        .swal2-styled.swal2-confirm {
            box-shadow: none !important; 
            outline: none !important;
            border-radius: 0 !important;
        }

        .task-status-btn{
            color: #1c1e1f;
        }
        .task-status-icon{
            padding-top: 6px;
            padding-right: 10px;
        }

        .line-through{
            text-decoration: line-through;
        }
    </style>
</head>