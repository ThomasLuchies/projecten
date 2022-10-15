<!DOCTYPE html>
<html>
    <head>
        <title>777league</title>
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
                    <div id="mainContentLeft" class="alignStart">
                    <h1 class="header">777League</h1>
                        <p class="text">
                            Starting end november, 777Tourneys will begin to organize a league for Call of Duty Cold War. There will be 3-4 leagues every year, depending on the team's idea's and wishes.<br><br>
                            The tournament will be a 16 teams(if more teams, there will be a A and a B league with 1 final). The teams will battle it out across a 10 week weekly tournament program.<br>
                            Every week there will be a elimination bracket,  to gain points for the overall rankings.<br><br>
                            At the end of the league, the team with the lowest overall score will win the league.<br><br>
                            What is the vision for the league for the 777 League? The main goal is to invest in the grow of the 777 League, to get a 4-division league with a promotion and degradation system.<br>
                            In this process where we would like to go, our importance goes to the growth of our teams and organizations as well to get to a higher level together!<br><br>
                            The entry fee for the 10 week program, including promotions, opportunities, referee's for the matches, organisational costs, and a big prize pool of €2600,-(if 16 teams attend) will be 350 EUR.<br><br> 
                            More information about the league and the schedule will be released and teased soon!<br><br>    
                            Are you interested in joining the league or do you have any questions about the league? Don't hesitate and send a mail to contact@777tourneys.com</p>
                        <h2 class="subHeader">Points System:</h2>
                        <table class="pointsTable">
                            <tr>
                                <th>Sort:</th>
                                <th>Points:</th>
                            </tr>
                            <tr>
                                <td>1st</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>2th</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>3th</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>4th</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>5-8</td>
                                <td>5</td>
                            </tr> 
                            <tr>
                                <td>9-16</td>
                                <td>6</td>
                            </tr>  
                        </table>
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