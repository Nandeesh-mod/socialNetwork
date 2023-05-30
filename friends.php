<?php 
session_start();

include('component/connect.php');
include('functions.php');
if(isset($_POST['search']))
{
   $email = $_POST['search_value'];
   $result = search($email,$conn);
   $following_result_bool = following_status($result[0]['user_id'],$_SESSION['user_data'][0]['user_id'],$conn);
   if(!isset($result))
   {
      header('location:'.'friends.php');
   }
}
if(isset($_GET['user_id']))
{
   $follow_result = follow($_SESSION['user_data'][0]['user_id'],$conn,$_GET['user_id']);
}
?>
<?php
include('menu.php');
echo "<br><br><br><br><br><br>";
?>
<style>
   <?php include('css/friends.css');?>
</style>
<body>
       <div class="friends-outer">
       <form method="post" action=<?php echo $_SERVER['PHP_SELF']?>>
            <input type="email" name="search_value" placeholder="email">
            <input class="search" type="submit" value="search" name="search">
        </form>
       </div>
      <br><br><br><br> 
       <div class="result">

       <div class="user-details">
       <center>
       <p style="color: red;">
            <?php
               if(isset($_SESSION['search_error']))
               {
                  echo $_SESSION['search_error'];
                  unset($_SESSION['search_error']);
                  
               }
            ?>
         </p>
       </center>
       </div>
       <?php if(isset($result)) { ?>
         <div class="user-details">
            <div class="inner-details">
               <div class="profile-img" style="background-image: url('profile/<?php echo $result[0]['profile_img'] ?>');">
               </div>
               <div class="detail">
               <p><?php echo $result[0]['user_name']; ?></p>
               <p><?php echo $result[0]['email'];?></p>
               </div>
               <?php  if($following_result_bool == true) { ?>
                  <button class="follow"><a href="#">Following
                     
                  </a></button>
                  <?php }else {?>
                     <button class="follow"><a href="friends.php?user_id=<?php echo $result[0]['user_id'];?>">Follow</a></button>
                  <?php } ?>
            </div>
         </div>
        <?php } ?>
       </div>
</body>
</html>