<?php
    if(isset($_SESSION["login"])){
        $picture = $_SESSION["picture"];
        $username = $_SESSION["username"];
        echo "<div id='account'>"   
        . "<img src ='" . $picture . "' alt='profilepic'>"
        . "</div>";
        echo "<a href='index.php'><h2>Home</h2></a>"
        . "<a href='profile.php'><h2>Profile</h2></a>"
        . "<a href='pm.php'><h2>Messages</h2></a>"
        . "<a href='logout.php'><h2>Logout</h2></a>";                         
    }
    else{
        echo "<a href='index.php'><h2>Home</h2></a>"
        . "<a href='register.php'><h2>Register</h2></a>"
        . "<a href='login.php'><h2>Login</h2></a>";
    }
?>
