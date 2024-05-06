<?php
use Includes\View;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Error</title>
    <style>
        h1 {
            color: red;
        }

        body {
            font-family: 'century gothic', 'comic sans ms';
            background-color: #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .box{
            padding: 10px;
            border:5px solid red;
        }
    </style>
</head>

<body>
    <div class="box">
        <h1>404 Requested Resource Not Found on Server</h1>
    </div>
</body>

</html>