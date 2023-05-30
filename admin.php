<?php
include('component/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            margin-top: 200px;
            width: 100px;
            height: 100px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <center>
        <h2>Admin</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="admin Name">
            <input type="password" name="password" placeholder="password">
            <input type="submit" name="submit">
            <div>
                <?php
                if(isset($_SESSION["admin_try"]))
                {
                    echo $_SESSION["admin_try"];
                }
                ?>
            </div>
        </form>
    </center>
    <?php
if(isset($_POST['submit'])){
    $username = $_POST["username"];
    $password = $_POST["password"];
   
    $sql = "SELECT * FROM admin WHERE admin_name = '$username';";
    $result = mysqli_query($conn,$sql);
    if(isset($result))
    {
        $trueresult = mysqli_fetch_all($result,MYSQLI_ASSOC);
        print_r($trueresult);
        if($trueresult[0]['password'] == $password){
            $_SESSION['admin_try'] = "success";
            header("Location:"."report.php");
        }else{
            $_SESSION['admin_try'] = "failed";
            header("Location:"."admin.php");
        }
    }else{
        $_SESSION['admin_try'] = "failed";
        header("Location:"."admin.php");
    }

}
?>
</body>
</html>