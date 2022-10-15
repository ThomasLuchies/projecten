<!DOCTYPE html>
<html>
    <head>
        <title>Twitter</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        
        <?php
            if(!isset($_GET["action"])){
                header("location:pm.php");
            }
            require("connect.php");
            session_start();
            if(!isset($_SESSION["login"])){
                header("location:index.php");
            }
        ?>
        <script>
                function scrollBottom() {window.scrollTo(0, 99999);}
                if (document.addEventListener) document.addEventListener("DOMContentLoaded", scrollBottom, false)
                else if (window.attachEvent) window.attachEvent("onload", scrollBottom);
        </script>
    </head>
    <body>
        <div id="container">
            <div id="menu">
                <div id="logo">
                <img src = "img/logo.jpg" alt = "logo">
                <?php
                    require("menu.php")
                ?>
            </div>
            </div>
            <div id="messages">
                <div id="header">
                    <a href='pm.php'><h2>&lt&lt back</h2></a>
                    <?php
                        $sender = $_GET["action"];
                        $sql = "SELECT username, picture FROM users WHERE userid = ?";
                        if($stmt = mysqli_prepare($connect, $sql)){
                            mysqli_stmt_bind_param($stmt, "s", $sender);
                            if(mysqli_stmt_execute($stmt)){
                                mysqli_stmt_bind_result($stmt, $username, $profilepic);
                                mysqli_stmt_fetch($stmt);
                                echo "<img class='imgpm' class='img' src='" . $profilepic . "' alt='profilepicsender'><p>" . $username . "</p>";
                            }
                            else{
                                echo mysqli_error($connect);
                            }
                        }
                        else{
                            echo mysqli_error($connect);
                        }
                        mysqli_stmt_close($stmt);
                    ?>
                </div>
                <div id="pmmessagesuser">
                <?php
                    $receiver = $_SESSION["ID"];
                    $sql = "SELECT message, sendto, sendby, datetimesent FROM private_messages WHERE sendto = ? && sendby = ? OR sendto = ? && sendby = ?";
                    if($stmt = mysqli_prepare($connect, $sql)){
                        mysqli_stmt_bind_param($stmt, "ssss", $receiver, $sender, $sender, $receiver);
                        if(mysqli_stmt_execute($stmt)){
                            mysqli_stmt_bind_result($stmt, $message, $sendto, $sendby, $datetime);
                            while(mysqli_stmt_fetch($stmt)){
                                if($sendby == $receiver){
                                    $datetimearray = explode(" ", $datetime);
                                    $date = strtotime($datetimearray[0]);
                                    $time = $datetimearray[1];
                                    $datetoday = strtotime(date("Y-m-d"));
                                    $datediff = $date - $datetoday;
                                    $difference = floor($datediff/(60*60*24));
                                    echo "<div class='send'>" . 
                                    $message . "<br><br>";
                                    if($difference == 0 ){
                                        echo "<span class='bottomright'>today " . $time . "</span>";
                                    }
                                    elseif($difference == -1){
                                        echo "<span class='bottomright'>yesterday " . $time . "</span>";
                                    }
                                    else{
                                        echo "<span class='bottomright'>" . $datetime . "</span>";
                                    }
                                   echo "</div>";
                                }
                                else{
                                    $datetimearray = explode(" ", $datetime);
                                    $date = strtotime($datetimearray[0]);
                                    $time = $datetimearray[1];
                                    $datetoday = strtotime(date("Y-m-d"));
                                    $datediff = $date - $datetoday;
                                    $difference = floor($datediff/(60*60*24));
                                    echo "<div class='received'>" . 
                                    $message;
                                    if($difference == 0 ){
                                        echo "s<span class='bottomrightreceived'>today " . $time . "</span>";
                                    }
                                    elseif($difference == -1){
                                        echo "<span class='bottomrightreceived'>yesterday " . $time . "</span>";
                                    }
                                    else{
                                        echo "<span class='bottomrightreceived'>" . $datetime . "</span>";
                                    }
                                   echo "</div>";
                                }
                            }
                        }    
                        else{
                            echo mysqli_error($stmt);
                        }
                    }
                    mysqli_stmt_close($stmt);
                ?>
                </div>
                <form action=<?php echo "pmuser.php?action=" . $sender?> method="POST" class="pmmessageform">
                    <textarea name="message" class="pmmessagetextarea" placeholder="message"></textarea>
                    <input type="submit" value="verzenden" name="submit" class='pmmessagesubmit'>
                </form>
                <?php 
                    if(isset($_POST["submit"])){
                        $datetime = date("Y-m-d H:i:s");
                        $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);
                        $sql = "INSERT INTO private_messages VALUES (NULL, ?, ?, ?, ?)";
                        if($stmt = mysqli_prepare($connect, $sql)){
                            mysqli_stmt_bind_param($stmt, "siis", $message, $receiver, $sender, $datetime);
                            if(mysqli_stmt_execute($stmt)){
                              echo mysqli_error($connect);  
                            }
                        }
                        else{
                            echo mysqli_error($connect);
                        }
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
