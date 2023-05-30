<?php 
session_start();
ob_start();
include('menu.php');
echo "<br><br><br><br>";
?>
<?php
include('component/connect.php');
include('functions.php');
?>
<?php 
if(isset($_GET['user_id'])){
$user_id = $_GET['user_id'];
$result = retrive_userdeatils($user_id,$conn);
$no_of_post = no_of_post($user_id,$conn);
$following = following($user_id,$conn);
$followers = followers($user_id,$conn);
}
if(isset($_GET['friend_id']))
{
    $unfollow = unfollow($_SESSION['user_data'][0]['user_id'],$_GET['friend_id'],$conn);
    header('Location:'.'manage_friends.php');
    ob_end_flush();
}
if(isset($result)){ 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style><?php
        include 'css/edit.css';
    ?></style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <br><br><br>
    <div class="container">
        <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body mycard">
                <div class="profile-pic-div profile" style="background-image: url(profile/<?php echo $result[0]['profile_img']; ?>);">
                    <!-- profile image -->
                </div>
                <br>
                <center><h3 style="color: white;"><?php echo $result[0]['user_name']; ?></h3></center>
            </div>
        </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="row mt-5"> <div class="col border-right text-center"> <h2 class="font-light"><?php echo $no_of_post[0]['count']; ?></h2> <h4 class="textstyle">Posts</h4> </div> <div class="col border-right text-center"> <h2 class="font-light"><?php echo $followers[0]['count']; ?></h2> <h4 class="textstyle">Followers</h4> </div> <div class="col text-center"> <h2 class="font-light"><?php echo $following[0]['count'];?></h2> <h4 class="textstyle">Following</h4> </div> </div><br><br>
        <div class="card h-90" id="hellocard">
            <div class="card-body">
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mb-2 text-primary">Personal Details</h6>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <p style="font-weight:600"><?php echo $result[0]['user_name']; ?></p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="eMail">Email</label>
                            <p style="font-weight:600"><?php echo $result[0]['email']; ?></p>
                        </div>
                    </div>
                    <br><br><br><br>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">DOB</label>
                            <p style="font-weight:600"><?php echo $result[0]['dob']; ?></p>
                        </div>
                    </div>

                    
                    <br><br><br><br>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">Department</label>
                            <p style="font-weight:600"><?php echo $result[0]['dept_name']; ?></p>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">College</label>
                            <p style="font-weight:600"><?php echo $result[0]['college_name']; ?></p>
                        </div>
                    </div>

                    <br><br><br><br>
                    
                    <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">
                            <button type="button" id="submit"  name="Cancel" class="btn btn-primary"><a style="text-decoration: none; color:white;" href="manage_friends.php">Back</a></button>
                            <button type="button" id="submit"  name="Cancel" class="btn btn-primary"><a style="text-decoration: none; color:white;" href="friendsresult.php?friend_id=<?php echo $result[0]['user_id'];?>">Unfollow</a></button>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
</body>
</html>
<?php }?>


