<?php
session_start(); 
?>
<?php
include('component/connect.php');
include('functions.php');
?>
<?php 
$result = retrive_userdeatils_report($conn);
$count = retrive_userdeatils_count($conn);
$no_of_post = no_of_post_report($conn);
$following = following_report($conn);
$followers = followers_report($conn);
// print_r($result);
// print_r($no_of_post);
// print_r($following);
// print_r($followers);

?>
<?php if($_SESSION['admin_try'] == 'success'){ ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
  text-align: left;
  position: relative;
  border-collapse: collapse; 
  background-color: #f6f6f6;
}/* Spacing */
td, th {
  border: 1px solid #999;
  padding: 20px;
}
th {
  background: brown;
  color: white;
  border-radius: 0;
  position: sticky;
  top: 0;
  padding: 10px;
}
.primary{
  background-color: #000000
}

tfoot > tr  {
  background: black;
  color: white;
}
tbody > tr:hover {
  background-color: #ffc107;
}

    </style>
  </head>
  <body>
    <center>
  <table>
  <tr>
    <th>Full Name</th>
    <th>DOB</th>
    <th>email</th>
    <th>department</th>
    <th>College</th>
  </tr>
  <?php for($i=0;$i<$count;$i++) {?>
  <tr>
    <td><?php echo $result[$i]['user_name'];?></td>
    <td><?php echo $result[$i]['dob'];?></td>
    <td><?php echo $result[$i]['email'];?></td>
    <td><?php echo $result[$i]['dept_name'];?></td>
    <td><?php echo $result[$i]['college_name'];?></td>
  </tr>
  <?php }?>
</table>
<br>
<br>
<br>
<button onclick="window.print()">Print</button>
    </center>
  </body>
  </html>
<?php }?>