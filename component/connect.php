<?php 
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dbms';

$conn = mysqli_connect($server,$username,$password,$dbname) or die(mysqli_error());
?>