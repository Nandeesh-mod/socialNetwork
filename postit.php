<?php
session_start();
ob_start();
?>
<?php
include('menu.php');
echo "<br><br><br><br><br><br>";?>
<?php 
if(isset($_SESSION['user_data']))
{
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>';
   
    include('error.php');

   echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
     <div class="main-box">
            <div class="form-box">
                <form method="post" action="processpost.php" enctype="multipart/form-data">
                <h2 class="Sign-in">Post here</h2>
                <br><br>
                    <center>
                    <label for="post">
                        <i class="fa fa-camera"></i>
                    </label>
                    </center>
                    <br>    
                   <input id="post" type="file" name="post" >
                   <input type="text" name="heading" placeholder="heading" required>
                    <textarea  class="descript" name="about" id="about" cols="5" rows="3" placeholder="description" required></textarea> 
                    <input class="submit" type="submit" name="post_submit" value="Post">
                </form>
                <h4 style="color: red;">';
                    if(isset($_SESSION['post_error']))
                    {
                        echo $_SESSION['post_error'];
                        unset($_SESSION['post_error']);
                    }
               echo'</h4>
                </div>
            </div>
        </div>
     </body>
    </html>';
}
else
{
    echo "<center><h4 style='color:red;'>Session expired Login to continue</h4></center>";
    header('Location:'.'signin.php');
    ob_end_flush();
}
?>