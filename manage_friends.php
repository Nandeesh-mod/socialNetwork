<?php 
session_start();
include('component/connect.php');
include('functions.php');
$result = following_friends_details($_SESSION['user_data'][0]['user_id'],$conn);
// print_r($result);
?>
<?php
include('menu.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
   <?php include('css/friends.css');?>
    </style>
</head>

<body>
      <br><br><br><br><br><br>
       <div style="width: 500px;" class="result">

       <?php foreach($result as $friends){ ?>
         <div style="padding:6px;" class="user-details">
            <div class="inner-details">
               <div class="profile-img" style="background-image: url('profile/<?php echo $friends['profile_img']; ?>');">
               </div>
               <div class="detail">
               <p><?php echo $friends['user_name']; ?></p>
               <p><?php echo $friends['email']; ?></p>
               </div>
               <button class="follow"><a href="friendsresult.php?user_id=<?php echo $friends['user_id'];?>">View</a></button>
            </div>
         </div>
         <br><br>
        <?php }?>

       </div>
</body>
</html>