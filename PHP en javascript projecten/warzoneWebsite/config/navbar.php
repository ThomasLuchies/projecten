<div id="navbar">
    <label id="hamburgerMenu" for="toggle">&#9776</label>
    <input type="checkbox" id="toggle">
    <div class="nav">
        <a href="index.php" class="navbarItems">
            <p>Home</p>
        </a>
        <a href="calender.php" class="navbarItems">
            <p>Calender</p>
        </a>
        <a href="warzone.php" class="navbarItems">
            <p>Warzone</p>
        </a>
        <a href="777League.php"class="navbarItems">
            <p>777League</p>
        </a>
        <a href="news.php" class="navbarItems">
            <p>News</p>
        </a>
        <a href="signup.php"class="navbarItems">
            <p>Register</p>
        </a>
        
        <div class="account">
            <?php 
            
                if(isset($_SESSION["userId"]))
                {
                    echo "<div id='accountLogedIn'>
                    <div id='dropDownButton'>
                        <p>" . $_SESSION["username"] . "</p>
                    </div>
                    <div id='dropDownContent'>
                        <a href='config/logout.php?file=" . basename($_SERVER["REQUEST_URI"]) . "'>Logout</a>
                    </div>
                    </div>";
                }
                else
                {
                    echo "<div class='navbarItems' onclick='showLoginScreen(\"signup\")'>
                    <p>Signup</p>
                    </div>
                    <div class='navbarItems' onclick='showLoginScreen(\"login\")'>
                        <p>Login</p>
                    </div>";
                }
            ?>
        </div>
    </div>
</div>