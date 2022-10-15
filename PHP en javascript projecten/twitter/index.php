<!DOCTYPE html>
<html>
    <head>
        <title>Twitter</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <?php
            session_start();
            require("connect.php");
            setcookie("like", 0, time() + (10 * 365 * 24 * 60 * 60));
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
                    <h2>Messages</h2>
                </div>
                <div id="submit">
                    <?php
                    if(isset($_SESSION["login"])){
                        echo "<form action = 'index.php' method = 'post'>
                            <p><textarea placeholder = 'write your message here' name='message'></textarea></p>
                            <p><input type='submit' value='send' name='submit' id='submitform'></p>
                        </form>";
                        if(isset($_POST["submit"])){
                            if(isset($_SESSION["login"])){
                                $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);
                                $Userid = $_SESSION["ID"];
                                if($message){
                                    $sql = "INSERT INTO messages VALUES (NULL, ?, ?)";
                                    if($stmt = mysqli_prepare($connect, $sql)){
                                        mysqli_stmt_bind_param($stmt, "is", $Userid, $message);
                                        $result = mysqli_stmt_execute($stmt);
                                        if($result == false){
                                            echo "your message has not been uploaded";
                                        }
                                        else{
                                            echo "your message has been uploaded";
                                            header("location:index.php");
                                        }
                                        mysqli_stmt_close($stmt);
                                    }
                                    else{
                                        echo mysqli_error($connect);
                                    }
                                }
                                echo "please enter a message";
                                echo mysqli_error($connect);
                            }
                            else{
                                echo "you need to be logged in to post a message";
                            }
                        }
                    }
                    else{
                        echo "<h2 class='center'>please login in to send a message</h2>";
                    }
                    ?>
                </div>
                <?php
                    $sql = "SELECT users.UserID, msgid, Username, picture, message FROM `users` INNER JOIN messages ON messages.UserID = users.UserID ORDER BY msgID DESC";
                    if($stmt = mysqli_prepare($connect, $sql)){
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt, $ID, $msgid, $Username, $picture, $messagedb);
                        echo mysqli_error($connect);
                        while(mysqli_stmt_fetch($stmt)){
                            echo mysqli_error($connect);
                          echo "<div class='message'>"
                          . "<div class='profile'><a href='profile.php?action=" . $ID . "'><img src='" . $picture . "'></a></div>"
                          . "<div class='messagebox'><a href='profile.php?action=" . $ID . "'><h3><strong>" . $Username . "</strong></h3></a><br>"
                          . "<p>" . $messagedb . "</p></div>"
                          . "<button class='like'>like</button>";
                          echo "</div>"; 
                        }
                        mysqli_stmt_close($stmt);   
                    }   
                    else{
                        echo mysqli_error($connect);
                    } 
                ?>
                <script src="likesystem.js"></script>
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
