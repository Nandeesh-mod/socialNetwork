<?php 
session_start();
?>
<?php if(isset($_SESSION['user_data'])){ ?>
<?php
include 'menu.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php
        include('css/manage.css');
        ?>
    </style>
</head>
<body>
    <br><br><br><br><br><br>
    <?php
    include('mydetails.php');
    ?>
<div id="main">
<center>
    <hr>
<nav class="navbar">
    <!-- <a  class="manage-link" href="#">Edit Profile</a> -->
    <a  class="manage-link" href="manage_friends.php">Following</a>
    <a class="manage-link" href="manage_followers.php">Followers</a>
    <a  class="manage-link" href="managepost.php">Manage Post</a>
</nav>
<hr>
</center>
</div>
</body>
</html>

<?php }?>