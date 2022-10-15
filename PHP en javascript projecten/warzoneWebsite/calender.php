<!DOCTYPE html>
<html>
    <head>
        <title>Calender</title>
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
                <div id="mainContent">
                    <div id="mainContentLeft">
                        <?php
                            if(isset($_GET["tournament"]))
                            {
                                $tournamentId = $_GET["tournament"];
                                echo "<table class='calender'>";
                                echo "<tr>
                                <th class='lastColumn'>Teamname</th>
                                </tr>";
                                $sql = "SELECT teamName FROM eventUsers WHERE tournamentId = ?";
                                if($stmt = mysqli_prepare($conn, $sql))
                                {
                                    mysqli_stmt_bind_param($stmt,  "i", $tournamentId);
                                    if(mysqli_stmt_execute($stmt))
                                    {
                                        mysqli_stmt_bind_result($stmt, $groupName);
                                        while(mysqli_stmt_fetch($stmt))
                                        {
                                            echo "<tr>
                                            <td class='lastColumn'>" . $groupName . "</td>
                                            </tr>";
                                        }
                                    }
                                    else
                                    {
                                        echo mysqli_error($conn);
                                    }
                                    mysqli_stmt_close($stmt);
                                }
                                echo "</table>";
                            }
                            else
                            {
                                echo " <table class='calender'>"
                                . "<tr>
                                <th>Event</th>
                                <th>Gamemode</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Free spots</th>
                                </tr>";
                                $sql = "SELECT tournaments.tournamentId, tournamentName, tournamentType, max_contestants, startTime, endTime, COUNT(eventUsers.userId) FROM tournaments LEFT OUTER JOIN eventUsers ON eventUsers.tournamentId = tournaments.tournamentId WHERE endTime > curdate() GROUP BY tournaments.tournamentId";
                                if($stmt = mysqli_prepare($conn, $sql))
                                {
                                    if(mysqli_stmt_execute($stmt))
                                    {
                                        mysqli_stmt_bind_result($stmt, $tournamentId, $tournamentName, $tournamentType, $maxContestants, $startTime, $endTime, $totalSingedupContestants);
                                        while(mysqli_stmt_fetch($stmt))
                                        {
                                            $date = date("j M Y", strtotime(explode(" ", $startTime)[0]));
                                            $startTime = explode(" ", $startTime)[1];
                                            $endTime = explode(" ", $endTime)[1];
                                            echo "<tr onclick='document.location=\"calender.php?tournament=" . $tournamentId . "\";'>"
                                            . "<td>" . $tournamentName . "</td>"
                                            . "<td>" . $tournamentType . "</td>"
                                            . "<td>" . $date . "</td>"
                                            . "<td>" . $startTime . "</td>"
                                            . "<td>" . $endTime . "</td>"
                                            . "<td class='lastColumn'>" . ($maxContestants - $totalSingedupContestants) . "</td>"
                                            . "</tr>";
                                        }
                                    }
                                    else
                                    {
                                        echo mysqli_error($conn);
                                    }
                                }
                                else
                                {
                                    echo mysqli_error($conn);
                                }
                            }
                            echo "</table>";
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
        <?php
            include("config/loginAndSignup.php");
        ?>
        <script type='text/javascript' src="config/javascript/account.js"></script>
        <script type="text/javascript" src="config/javascript/main.js"></script>
    </body>
</html>
