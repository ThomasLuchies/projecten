<!DOCTYPE html>
<html>
    <head>
        <title>Signup</title>
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="img/logo.ico"/>
        <?php
            include("config/connect.php");
            session_start();
        ?>
    </head>
    <body>
        <div id="container">
            <?php
                include("config/header.php");
            ?>
            <div id="main">
                <?php
                    include("config/navbar.php");
                ?>
                <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script src="https://js.stripe.com/v3/"></script>
                <div id="mainContent">
                    <div id="mainContentLeft" class="alignStart">
                        <?php
                            if(isset($_GET["gamemode"]))
                            {
                                $sql = "SELECT tournaments.tournamentId, tournamentName, tournamentType, max_contestants, starttime, endtime, SUM(case when eventUsers.paid = 1 then 1 else 0 end) FROM tournaments LEFT OUTER JOIN eventUsers ON eventUsers.tournamentId = tournaments.tournamentId WHERE tournamentType = ? AND endTime > curdate() GROUP BY tournaments.tournamentId";
                                if($stmt = mysqli_prepare($conn, $sql))
                                {
                                    $gamemode = $_GET["gamemode"];
                                    mysqli_stmt_bind_param($stmt, "s", $gamemode);
                                    if(mysqli_stmt_execute($stmt))
                                    {
                                        mysqli_stmt_bind_result($stmt, $tournamentId, $tournamentName, $tournamentType, $maxContestants, $startDateTime, $endTime, $totalSingedupContestants);
                                        while(mysqli_stmt_fetch($stmt))
                                        {
                                            $date = date("j M Y", strtotime(explode(" ", $startDateTime)[0]));
                                            $startTime = explode(" ", $startDateTime)[1];
                                            $endTime = explode(" ", $endTime)[1];
                                            echo
                                            "<table class='calender' data-id = ". $tournamentId.">"
                                                . "<tr>"
                                                    . "<th>Tournament</th>"
                                                    . "<th>Date</th>"
                                                    . "<th>Start Time</th>"
                                                    . "<th>End Time</th>"
                                                    . "<th>Free spots</th>"
                                                    . "<th>Register</th>"
                                                . "</tr>"
                                                . "<tr>"
                                                    . "<td>" . $tournamentName  . "</td>"
                                                    . "<td>" . $date  . "</td>"
                                                    . "<td>" . $startTime  . "</td>"
                                                    . "<td>" . $endTime  . "</td>"
                                                    . "<td>" . ($maxContestants - $totalSingedupContestants)  . "</td>";
                                                    if(($maxContestants - $totalSingedupContestants) > 0)
                                                    {
                                                      if($startDateTime > date('Y-m-d H:i:s'))
                                                      {
                                                        echo "<td onclick='register(" . $tournamentId . ")' class='registerButton'>open</td>";
                                                      }
                                                      else
                                                      {
                                                        echo "<td>closed</td>";
                                                      }
                                                    }
                                                echo "</tr>"
                                            . "</table>";
                                        }
                                    }
                                    else
                                    {
                                        echo mysqli_error($conn);
                                    }
                                    mysqli_stmt_close($stmt);
                                }
                                else
                                {
                                    echo mysqli_error($conn);
                                }
                            }
                            else
                            {
                                echo "<div class='gamemodeTypeMain'>
                                        <a href='signup.php?gamemode=quads' class='gamemodeType' style='background-image: url(\"img/quad.jpg\");'>
                                        <div class='gamemodeTypeOverlay'>
                                            <h1>Warzone Quads</h1>
                                        </div>
                                    </div>"
                                . "</a>"
                                . "<div class='gamemodeTypeMain'>"
                                . "<a href='signup.php?gamemode=trios' class='gamemodeType' style='background-image: url(\"img/trios.jpg\");'>"
                                . "<div class='gamemodeTypeOverlay'>
                                    <h1>Warzone Trios</h1>
                                  </div>"
                                . "</a>"
                                . "</div>"
                                . "<div class='gamemodeTypeMain'>"
                                . "<a href='signup.php?gamemode=duos' class='gamemodeType' style='background-image: url(\"img/duos.jpg\");'>"
                                . "<div class='gamemodeTypeOverlay'>
                                    <h1>Warzone Duos</h1>
                                  </div>"
                                . "</a>"
                                . "</div>";
                            }
                        ?>
                    </div>
                    <div id="mainContentMedia">
                        <img src="img/discord.png">
                        <img src="img/twitter.png">
                        <img src="img/instagram.png">
                    </div>
                </div>
            </div>
            <?php
                include("config/footer.php");
            ?>
        </div>
        <div id="registerScreen" class="blackScreen">
            <div id="registerScreenCenter">
                <?php
                    if(isset($_SESSION["userId"]))
                    {
                ?>
                <img src="img/close.png" alt="close" class="close" onclick="closeRegister()">
                <div id="registerOverview">
                    <div class="registerOverviewCell">
                        <p><strong>Tournament name: </strong></p>
                        <p><strong>Gamemode: </strong></p>
                        <p><strong>Date: </strong></p>
                        <p><strong>Start time: </strong></p>
                        <p><strong>End time: </strong></p>
                    </div>
                    <div class="registerOverviewCell">
                        <p id="tournamentName"></p>
                        <p id="tournamentType"></p>
                        <p id="tournamentDate"></p>
                        <p id="tournamentStartTime"></p>
                        <p id="tournamentEndTime"></p>
                    </div>
                </div>
                <form method="post" id="extraMembers">
                    <?php
                        if(isset($_GET["gamemode"]))
                        {
                            $gamemode = $_GET["gamemode"];
                            $extraMembers = 0;
                            switch($gamemode)
                            {
                                case "quads":
                                    $extraMembers = 3;
                                    break;
                                case "trios":
                                    $extraMembers = 2;
                                    break;
                                case "duos":
                                    $extraMembers = 1;
                                    break;
                            }
                            echo "<p id='registerMessage' class='textAlignCenter'>Please enter your team name teammates below. <br>Dont enter your own username this is already linked to your account!</p>";
                            for($i = 1  ; $i <= $extraMembers; $i++)
                            {
                                echo "<div class='inputWrapper'>"
                                    . "<input type='text' name='extraContestant" . $i . "' placeholder='Teammate " . $i . "'>"
                                    . "</div>";
                            }
                            echo "<div class='inputWrapper'>"
                                 . "<input type='text' name='teamName' placeholder='Team name'>"
                                 . "</div>";
                        }
                    ?>
                    <div id="payment">
                        <input type="submit" name="checkout" id="checkoutButton" value="checkout">
                    </div>
                </form>
                <script type='text/javascript' src="config/javascript/checkout.js"></script>
                <?php
                        if(isset($_POST["checkout"]))
                        {
                            $teamName = filter_input(INPUT_POST, "teamName", FILTER_SANITIZE_STRING);
                            $contestantsArray = array();
                            $notAllFieldFilledIn = false;
                            if($teamName)
                            {
                                for($i = 1; $i <= $extraMembers; $i++)
                                {
                                    if(filter_input(INPUT_POST, "extraContestant" . $i, FILTER_SANITIZE_STRING))
                                    {
                                        array_push($contestantsArray, filter_input(INPUT_POST, "extraContestant" . $i, FILTER_SANITIZE_STRING));
                                    }
                                    else
                                    {
                                        $notAllFieldFilledIn = true;
                                    }
                                }
                            }
                            else
                            {
                                echo "Please fill in a team name.";
                            }

                            if($notAllFieldFilledIn == false)
                            {
                                $_SESSION["teamName"] = $teamName;
                                $_SESSION["teamMembers"] = $contestantsArray;
                                echo "<script>checkout()</script>";
                            }
                            else
                            {
                                echo "<p>please fill in all contestants</p>";
                            }
                        }
                    }
                    else
                    {
                        echo "<img src='img/close.png' alt='close' class='close' onclick='closeRegister()'>";
                        echo "<div id='loginToRegister'>";
                        echo "<h1>please login to register</h1>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
        <?php
            include("config/loginAndSignup.php");
        ?>
        <script type='text/javascript' src="config/javascript/tournament.js"></script>
        <script type='text/javascript' src="config/javascript/account.js"></script>
        <script type='text/javascript' src="config/javascript/checkout.js"></script>
        <script type="text/javascript" src="config/javascript/main.js"></script>
    </body>
</html>
