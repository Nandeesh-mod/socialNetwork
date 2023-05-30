<?php 
class myclass
{
    function display()
    {
        echo '
        <link rel="stylesheet" href="css/style.css">
        <style>
        @import url("https://fonts.googleapis.com/css2?family=Solway&display=swap");
        </style>
        <body>
        <!-- ****************************************nav bar ***************************************** -->
         <nav class="nav-bar">
             <div class="logo">
                 <h2 class="logo-img">Piper network</h2>
             </div>
             <div class="menus">
                 <a class="items" href="#"><div class="menu">Post</div></a>
                 <a class="items" href="#"><div class="menu">Create</div></a>
                 <a class="items" href="#"><div class="menu">People</div></a>
                 <a class="items" href="#"><div class="menu">Following</div></a>
              </div>
              <div class="sign-bar">
                 <a href="#"><div class="menu">Login</div></a>
                 <a href="#"><div class="menu">Logout</div></a>
              </div>
     </nav>
        <!-- ****************************************end nav-bar ************************************* -->
     </body>
     
        ';
    }
}
?>
