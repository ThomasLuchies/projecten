<!DOCTYPE html>
<html>
    <head>
        <title>Twitter</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <?php
            session_start();
            require("connect.php");
            if(!isset($_SESSION["login"])){
                header("location:index.php");
            }
        ?>
    </head>
    <body>
        <div id="container">
            <div id="menu">
                <div id="logo">
                <img src = "img/logo.jpg" alt = "logo">
                <?php
                    require("menu.php");
                ?>
            </div>
            </div>
            <div id="messages">
                <div id="header">
                    <h2>Profile</h2>
                </div>
                <div id="profilepage">
                    <?php
                        $sql = "SELECT users.userid, username, picture, COUNT(msgID) FROM users JOIN messages ON users.UserID = messages.UserID WHERE users.UserID = ?";
                        if($stmt = mysqli_prepare($connect, $sql)){
                            if(isset($_GET["action"])){
                                $uid = $_GET["action"];
                            }
                            else{
                                $uid = $_SESSION["ID"];
                            }
                            mysqli_stmt_bind_param($stmt, "s", $uid);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_bind_result($stmt, $ID, $username, $picture, $countmessage);
                            mysqli_stmt_fetch($stmt);
                            echo
                            "<img src='" . $picture . "' alt='profilepic'>
                            <h2>" . $username . "</h2>
                            <h3>Number of messages: " . $countmessage . "</h3>";
                            if(isset($_GET["action"])){
                                echo "<a href='pmuser.php?action=" . $ID . "'>Send message</a>";
                            }
                            mysqli_stmt_close($stmt);
                        }
                        else{
                            echo mysqli_error($connect);
                        }
                    ?>
                </div>    
                <div id="Ymessages">
                    <h2>Your messages</h2>
                </div>
                <?php
                    $sql = "SELECT Username, picture, message FROM `users` INNER JOIN messages ON messages.UserID = users.UserID WHERE users.UserID = ? ORDER BY msgID DESC";
                    if($stmt = mysqli_prepare($connect, $sql)){
                        if(isset($_GET["action"])){
                            $uid = $_GET["action"];
                        }
                        else{
                            $uid = $_SESSION["ID"];
                        }
                        mysqli_stmt_bind_param($stmt, "s", $uid);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt, $Username, $picture, $messagedb);
                        echo mysqli_error($connect);
                        while(mysqli_stmt_fetch($stmt)){
                            echo mysqli_error($connect);
                          echo "<div class='message'>"
                          . "<div class='profile'><img src='" . $picture . "'></div>"
                          . "<div class='messagebox'><h3><strong>" . $Username . "</strong></h3><br>"
                          . "<p>" . $messagedb . "</p></div>"
                          . "</div>"; 
                        }
                        mysqli_stmt_close($stmt);   
                    }   
                    else{
                        echo mysqli_error($connect);
                    } 
                ?>
            </div>
            <div id="right">
               <?php
                include("users.php");
               ?>
            </div>
            <div id="test">
                
            </div>
        </div>
    </body>
</html>
