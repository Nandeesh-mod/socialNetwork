<?php
include('functions.php');
include('component/connect.php');
likes($_GET['post_id'],$conn);
// header('Location:'.'user.php');
?>