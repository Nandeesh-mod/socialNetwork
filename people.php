<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php
            include 'css/peoples.css';
         ?>
    </style>
</head>
<body>
    <div class="header-menu">
        <?php 
            include 'index.php';
        ?> 
    </div>  
    <br> 
    <div class="people-outer">
        <?php
        include 'userdata.php';
        ?>
    </div>
</body>
</html>