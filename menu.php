    <style>
        <?php 
        include 'css/style.css';
        ?>
    </style>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Solway&display=swap');
    </style>
    
</head>
<body>
   <!-- ****************************************nav bar ***************************************** -->

    <nav class="nav-bar">
        <div class="logo">
            <h2 class="logo-img" style=" font-family: 'Solway', serif; color: white; font-size: 30px;">SIT network</h2>
        </div>
        <div class="menus">
            <a style="text-decoration: none;" class="items" href="user.php"><div  class="menu">Post</div></a>
            <a style="text-decoration: none;" class="items" href="postit.php"><div class="menu">Create</div></a>
            <a style="text-decoration: none;" class="items" href="friends.php"><div class="menu">People</div></a>
            <a style="text-decoration: none;" class="items" href="logout.php"><div class="menu">Logout</div></a>
         </div>
         <div class="sign-bar">
            <p style="font-size: 18px; margin-top:12px; color:white; font-family:sans-serif;"><?php echo $_SESSION['user_data'][0]['user_name']; ?></p>
             <a style="text-decoration: none;" class="items" href="manage.php"><div class="user" style="background-image: url('profile/<?php echo $_SESSION['user_data'][0]['profile_img']; ?>');"></div></a>
            <a style="text-decoration: none;" class="items" href="signin.php"><div class="menu">Login</div></a>
         </div>
</nav>
<script src="js/menu.js">
</script>
   <!-- ****************************************end nav-bar ************************************* -->
</body>
