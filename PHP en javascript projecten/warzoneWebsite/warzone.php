<!DOCTYPE html>
<html>
    <head>
        <title>Warzone</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="img/logo.ico"/>
        <meta content="width=device-width, initial-scale=1" name="viewport" />
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
                    <div id="mainContentLeft" class="alignStart">
                        <h1 class="header">Warzone</h1>
                        <p class="text">The tourney's will be warzone kill-races. This means you get 1 point each kill, and points for placements.<br><br>
                        At first. You need to register for Quads, Trios, Duo's or special Solo games. These will be organized monthly and the exact schedule can be found on "Calendar".  Don't have a full team? Join the discord and find yourself some awesome teammates!<br><br>
                        Once you have registered your team you(the team captain) will be invited to the discord category "Tournament Chat" and you will be getting the game specific information there.<br><br>
                        Before the time begins to count down, all the players will receive de clantagg fort he event. EVERY PLAYER OF THE TEAM! NEEDS TO GET THE CLANTAG IN THEIR NAME! Without the clantag shown, games are not being counted. The kill-races do normally have a time window of 3-hours, in which you have to submit the best 3 games. This means you submit the first 3 games in the discord, and then only the games who are better than the 3 you have submitted. You can play as many games as you want in those 3 hours. After the time limit has been reached, no games being started. And there will be only one winner with the most points!</p>
                        <h2 class="subHeader">Points System:</h2>
                        <table class="pointsTable">
                            <tr>
                                <th>Sort:</th>
                                <th>Points:</th>
                            </tr>
                            <tr>
                                <td>1st</td>
                                <td>25</td>
                            </tr>
                            <tr>
                                <td>2th</td>
                                <td>20</td>
                            </tr>
                            <tr>
                                <td>3th</td>
                                <td>15</td>
                            </tr>
                            <tr>
                                <td>4th</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>5th</td>
                                <td>5</td>
                            </tr> 
                            <tr>
                                <td>Each Kill</td>
                                <td>1</td>
                            </tr>  
                        </table>
                        <h2 class="subHeader">Rules:</h2>
                        <p class="rulesText">Breaking the rules will result in exclusion of the event, resulting in a DSQ, and you wont get a refund.</p>
                        <ul>
                            <li>At all times, the tourney rules must be followed as well as instructions of the tourney organizers and moderators.</li>
                            <li>You have to submit the first 4 games you play within 30min's after the game has been finished. After that you will only submit games that will make your overall points/placement higher.</li>
                            <li>You need to submit the games not only by photo of the scoreboard, placement but also a link to the cod.tracker.gg game information of that game for official placement. If not possible, the game will not count.</li>
                            <li>You will have to submit your games within 30min's after the time limit has been reached.</li>
                            <li>Every game that has not been submitted by then will not count.</li>
                            <li>Every person playing on pc has to be able to show a stream or video proof of the tournament period if asked by the moderators if hacking is being suspected. If not possible, exclusion of the event will be taken in place.</li>
                            <li>At least one of the team members must be able to have video proof of the games played in case of a hacking allegation. </li>
                            <li>Any modifications to (anything related with) the scoreboard is forbidden.</li>
                            <li>Random fill's are forbidden</li>
                            <li>Any game without the clantag's of the specific tourney won't count</li>
                            <li>Any conditions that are not on purpose in the game that will help you to win, will result in a direct disqualification (see, hacks, exploits, glitches.)</li>
                            <li>Any sort of unsportive behaviour will be resulting in a penalty depending on the misbehave. -25 point count at least, to even a DISQUALIFY.</li>
                            <li>You can not start a new match in the last 5 minutes before the time limit has been reached. The game will not count.</li>
                            <li>If the entrance-fee is not payed, you can't start the tournament.</li>
                            <li>All changes between teammembers must be announced to the moderators at least 15 minutes before the start. After that, no changes in teammates will be tolerated. Any team changes during the event is forbidden and will result in a DSQ.</li>
                            <li>Any actions that are in violation of the general tournament & activision terms of service will be resulting in a disqualification.</li>
                            <li>CROSSPLAY MUST BE ENABLED!  If not, and being checked, DSQ will happen.</li>
                            <li>The games must be played in public matches.</li>
                            <li>Accusations/disputes must be sent to the moderators within 15min's after the tournament. After that time limit, no accusations will be taken. Only actions from the moderators themselves will be leading.</li>
                            <li>The team leader must be 18+ to claim the prize money.</li>
                        </ul>
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