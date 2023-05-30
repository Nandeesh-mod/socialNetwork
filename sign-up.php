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
    <title>Sign-up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="css/sign-up.css"> -->
    <style>
        <?php include('css/sign-up.css');?>
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
                <form method="POST" action=<?php echo $_SERVER['PHP_SELF']; ?> enctype="multipart/form-data">
                    <h2 class="Sign-in">Sign Up</h2>
                    <br>
                    <input type="text" name="user_name" placeholder="User Name" required> 
                    <input type="email" name="email" placeholder="e-mail" required>
                    <input type="password" name="password" placeholder="password" required>
                    
                    
                    <input type="date" name="dob" required>

                    <select id="gender" name="gender" required>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="O">Other</option>    
                    </select>

                    <select id="category" name="branch" required>
                    <option class="option-cat" value=1>ISE</option>
                    <option class="option-cat" value=3>AI&DS</option>
                    <option class="option-cat" value=2>CSE</option>
                    <option class="option-cat" value=4>MECH</option>
                    <option class="option-cat" value=6>CIVIL</option>
                    <option class="option-cat" value=7>CHEMICAL</option>
                    <option class="option-cat" value=8>BT</option>
                    <option class="option-cat" value=9>PHYSICS</option>
                    <option class="option-cat" value=10>MATHEMATICS</option>
                    <option class="option-cat" value=5>E&C</option>
                    <option class="option-cat" value=11>E&E</option>
                    </select>

                    <select id="category" name="college" required>
                    <option class="option-cat" value=1>SIT TUMKUR</option>
                    </select>

                    <center>
                    <label for="post">
                        <i class="fa fa-camera"></i>
                    </label>
                    </center>
                    <br>    
                   <input id="post" type="file" name="profile" >
                    <input class="signup" type="submit" name="submit" value="signup">
                    <br>
                    <button class="submit"><a href="signin.php">Sign In</a></button>
                    <br>
                    <h4>
                        <?php
                        if(isset($_SESSION['error1']))
                        {
                            echo $_SESSION['error1'];
                            session_unset();
                        }
                        if(isset($_SESSION['error2']))
                        {
                            echo $_SESSION['error2'];
                            session_unset();
                        }
                        if(isset($_SESSION['error3']))
                        {
                            echo $_SESSION['error3'];
                            session_unset();
                        }
                        ?>
                    </h4>

                </form>
            </div>
        </div>
     </div>
     <!-- php goes here -->
    <?php
    if(isset($_POST['submit'])){

        //register details
        $username = $_POST['user_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $dob = date($_POST['dob']);
        $gender = $_POST['gender'];
        $department = $_POST['branch'];
        $college = $_POST['college'];
        $profile = $_FILES['profile'];
        $bio = 'need bio';

        $sql = "SELECT * FROM user WHERE email = '$email';";
        $result_email = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result_email) > 0)
        {
            $getmail = mysqli_fetch_assoc($result_email);
            if(strcmp($getmail['email'],$email)==0){
                $_SESSION['error1'] = "email already exist";
                header('location:sign-up.php');
                die();
            }
        }
        
        $file_name = $profile['name'];
        $tmp_loc = $profile['tmp_name'];
        $file_array = explode('.',$file_name);

        $type = end($file_array);


        $standard = ['png','jpeg','jpg','mp4','.mkv'];

        $profile_name = $type[0] . uniqid('',true). ".".$type;

        $destination_location = '/opt/lampp/htdocs/dbms/profile/'.$profile_name;

        if(in_array($type,$standard)){
        $sql = "INSERT INTO user(user_name,email,dob,profile_img,dept_id,college_id,password,bio) VALUES('$username','$email','$dob','$profile_name','$department','$college','$password','need bio');";
        $result = mysqli_query($conn,$sql);
        move_uploaded_file($tmp_loc,$destination_location);
        $_SESSION['error2'] = 'success';
        header('location:sign-up.php');
        }
        else
        {
            $_SESSION['error3'] = 'File not supported';
            header('location:sign-up.php');
        }

    
    }
    ?>
    <?php
    ob_end_flush();
    ?>
</body>
</html>

<!-- ******************************************************************** -->


