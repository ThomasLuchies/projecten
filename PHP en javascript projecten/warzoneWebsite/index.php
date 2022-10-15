<!DOCTYPE html>
<html>
    <head>
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <title>Home</title>
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
                        <div id="nextTournaments">
                          <h1 class="indexHeader" style="margin-top:0px;">This weeks tournaments.</h1>
                          <table class="calender">
                            <tr>
                              <th>
                                Event
                              </th>
                              <th>
                                Gamemode
                              </th>
                              <th>
                                Start Date
                              </th>
                              <th>
                                End Date
                              </th>
                              <th>
                                Free Spots
                              </th>
                            </tr>
                            <?php
                              $sql = "SELECT tournaments.tournamentId, tournamentName, tournamentType, max_contestants, startTime, endTime, COUNT(eventUsers.userId) FROM tournaments LEFT OUTER JOIN eventUsers ON eventUsers.tournamentId = tournaments.tournamentId WHERE WEEK(startTime) = WEEK(curdate()) AND YEAR(startTime) = YEAR(curdate()) GROUP BY tournaments.tournamentId";

                              if($stmt = mysqli_prepare($conn, $sql))
                              {
                                if(mysqli_stmt_execute($stmt))
                                {
                                  mysqli_stmt_bind_result($stmt, $tournamentId, $tournamentName, $tournamentType, $maxContestants, $startTime, $endTime, $totalSingedupContestants);
                                  while(mysqli_stmt_fetch($stmt))
                                  {
                                    echo "<tr>";
                                    $date = date("j M Y", strtotime(explode(" ", $startTime)[0]));
                                    $startTime = explode(" ", $startTime)[1];
                                    $endTime = explode(" ", $endTime)[1];
                                    echo "<td>" . $tournamentName . "</td>"
                                    . "<td>" . $tournamentType . "</td>"
                                    . "<td>" . $startTime. "</td>"
                                    . "<td>" . $endTime . "</td>"
                                    . "<td>" . ($maxContestants - $totalSingedupContestants) . "</td>";
                                    echo "</tr>";
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
                            ?>
                          </table>
                          <h1 class="indexHeader">Next weeks tournaments.</h1>
                          <table class="calender">
                            <tr>
                              <th>
                                Event
                              </th>
                              <th>
                                Gamemode
                              </th>
                              <th>
                                Start Date
                              </th>
                              <th>
                                End Date
                              </th>
                              <th>
                                Free Spots
                              </th>
                            </tr>
                            <?php
                              $sql = "SELECT tournaments.tournamentId, tournamentName, tournamentType, max_contestants, startTime, endTime, COUNT(eventUsers.userId) FROM tournaments LEFT OUTER JOIN eventUsers ON eventUsers.tournamentId = tournaments.tournamentId WHERE WEEK(startTime) = WEEK(curdate()) + 1 AND YEAR(startTime) = YEAR(curdate()) GROUP BY tournaments.tournamentId";

                              if($stmt = mysqli_prepare($conn, $sql))
                              {
                                if(mysqli_stmt_execute($stmt))
                                {
                                  mysqli_stmt_bind_result($stmt, $tournamentId, $tournamentName, $tournamentType, $maxContestants, $startTime, $endTime, $totalSingedupContestants);
                                  while(mysqli_stmt_fetch($stmt))
                                  {
                                    echo "<tr>";
                                    $date = date("j M Y", strtotime(explode(" ", $startTime)[0]));
                                    $startTime = explode(" ", $startTime)[1];
                                    $endTime = explode(" ", $endTime)[1];
                                    echo "<td>" . $tournamentName . "</td>"
                                    . "<td>" . $tournamentType . "</td>"
                                    . "<td>" . $startTime. "</td>"
                                    . "<td>" . $endTime . "</td>"
                                    . "<td>" . ($maxContestants - $totalSingedupContestants) . "</td>";
                                    echo "</tr>";
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
                            ?>
                          </table>
                        </div>
                        <div class="news">
                          <?php
                            $sql = "SELECT * FROM news ORDER BY dateTime DESC LIMIT 3";
                            if($stmt = mysqli_prepare($conn, $sql))
                            {
                              if(mysqli_stmt_execute($stmt))
                              {
                                mysqli_stmt_bind_result($stmt, $newsId, $header, $text, $dateTime);
                                while(mysqli_stmt_fetch($stmt))
                                {
                                  if(strlen($text) > 650)
                                  {
                                      $text = substr($text, 0, 650) . " ...";
                                  }
                                  echo "<div class='newsCell'>"
                                  . "<h1 class='newsHeader'>" . $header . "</h1>"
                                  . "<p class='newsDateTime'>" . $dateTime . "</p>"
                                  . "<p class='newsText'>" . $text ." <a href='news.php?newsId=" . $newsId . "' class='seeMore'>Read more &gt &gt</a></p>"
                                  . "</div>";
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
                          ?>
                        </div>
                    </div>
                    <div id="mainContentMedia">
                        <img src="img/discord.png">
                        <img src="img/twitter.png" onclick="twitter()">
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
        <script type="text/javascript" src="config/javascript/main.js"></script>
        <script type='text/javascript' src="config/javascript/account.js"></script>
    </body>
</html>
