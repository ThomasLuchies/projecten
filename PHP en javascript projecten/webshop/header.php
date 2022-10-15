<div id="header">
    <div id="headerLogo">
        <a href="index.php">ESTADO</a>
    </div>
    <div class="menuButton">
        <a href="new.php"><strong>NEW</strong></a>
    </div>
    <div class="menuButton">
        <a href="shop.php"><strong>STORE</strong></a>
    </div>
    <div class="menuButton">
        <a href="service.php"><strong>SERVICE</strong></a>
    </div>
    <div id="headerRight">
        <div id="account" onmouseover="showAccountHover()" onmouseout="hideAcountHover()">
            <img src="img/account.png" alt="account">
            <div id="accountHover">
                <?php
                    if(isset($_SESSION["userId"]))
                    {
                        echo "<form method='post' action='" . $_SERVER['SCRIPT_NAME1'] . "'>"
                        . "<input type='button' name='orders' value='Orders' class='accountButtons' onclick='location.href=\"orders.php\"'>"
                        . "<input type='submit' name='logout' value='logout' class='accountButtons'>"
                        . "</form>";

                        if(isset($_POST["logout"]))
                        {
                            session_destroy();
                            header("refresh:0");
                        }
                    }
                    else
                    {
                        echo "<button id='signup' class='accountButtons'>Signup</button>"
                        . "<button id='login' class='accountButtons'>Login</button>";
                    }
                ?>
            </div>
        </div>
        <?php
            if(isset($_SESSION["userId"]))
            {
                echo "<a href='favorites.php' id='favorites'>"
                . "<img src='img/Favorieten.png' alt='favorites'>"
                . "</a>";
            }
        ?>
        <div id="menuCart">
            <img src="img/Winkelmand.png" alt="winkelmand">
            <div id="menuCartHover">
                <div id="menuCartHoverTop">
                    <h1 id="cartAmount">You have 0 items in your shopping bag</h1>
                    <div id="close"></div>
                </div>
                <div id="menuCartMain">
                </div>
                <div id="menuCartHoverBottom">
                    <div id="subTotal">
                        <p><strong>SUBTOTAL</strong></p>
                        <p id="subTotalNumber"></p>
                    </div>
                    <button id="purchaseButton">Proceed to purchase</button>
                </div>
            </div>
        </div>
    </div>
</div>
