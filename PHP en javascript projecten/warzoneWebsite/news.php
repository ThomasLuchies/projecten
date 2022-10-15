<!DOCTYPE html>
<html>
    <head>
        <title>News</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="img/logo.ico"/>
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <?php
            session_start();
            include("config/connect.php");
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
                            if(isset($_GET["newsId"]))
                            {
                                $newsId = $_GET["newsId"];
                                $sql = "SELECT * FROM news WHERE newsId = ?";
                                if($stmt = mysqli_prepare($conn, $sql))
                                {
                                    mysqli_stmt_bind_param($stmt, "i", $newsId);
                                    if(mysqli_stmt_execute($stmt))
                                    {
                                        mysqli_stmt_bind_result($stmt, $newsId, $title, $text, $date);
                                        mysqli_stmt_fetch($stmt);
                                        echo "<div id='newsArticle'>"
                                            . "<h1 class='newsHeader'>" . $title . "</h1>"
                                            . "<p class='newsDateTime'>" . $date . "</p>"
                                            . "<p>" . $text . "</p>"
                                            . "</div>";
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
                            else
                            {
                                echo "<div class='news'>";
                                $sql = "SELECT * FROM news";
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
                                echo "</div>";
                            }
                        ?>
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