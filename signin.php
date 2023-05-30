<?php
include('component/connect.php');
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        <?php include('css/signin.css');?>
        @import url('https://fonts.googleapis.com/css2?family=Solway&display=swap');
    </style>
</head>
<body>
     <div class="main-box">
        <div class="sub-box">
            <div class="company">
                <h1 class="logo">SIT network</h1>
                <h2 class="logo">Connect People</h2>
            </div>
            <div class="form-box">
                <form method="POST">
                    <h2 class="Sign-in">Sign In</h2>
                    <input type="email" name="email" placeholder="e-mail">
                    <input type="password" name="password" placeholder="password">
                    <input class="submit" type="submit" name="sign_submit" value="SignIn">
                </form>
                <hr style="width: 310px;">
                <br>
                <button class="signin"><a href="sign-up.php">Sign-up</a></button>
                <br>
                <h4 style="color: red;">
                    <?php
                    if(isset($_SESSION['error']))
                    {
                        echo $_SESSION['error'];
                        session_unset();
                    }
                    ?>
                </h4>
            </div>
        </div>
     </div>
     <?php
     if(isset($_POST['sign_submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM user WHERE email ='$email';";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) > 0)
            {
                $userdata = mysqli_fetch_all($result,MYSQLI_ASSOC);
                if($userdata[0]['password']==$password)
                {
                    $_SESSION['user_data'] = $userdata;
                    $_SESSION['name'] = $userdata[0]['user_name']; 
                    header('location:'.'user.php');
                }else{
                    $_SESSION['error'] = 'Invalid password';
                    header('location:'.'signin.php');
                }
            }
            else
            {
                $_SESSION['error'] = 'Invalid email';
                header('location:'.'signin.php');
            }
     }
     ?>
     <?php
     ob_end_flush();
     ?>
</body>

</html>