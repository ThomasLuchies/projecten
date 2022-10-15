<!DOCTYPE html>
<html>
    <head>
        <title>Twitter</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <?php
            require("connect.php");
            session_start();
            if(!isset($_SESSION["login"])){
                header("location:index.php");
            }
        ?>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('.search-box input[type="text"]').on("keyup input", function(){
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if(inputVal.length){
                    $.get("backend-search.php", {term: inputVal}).done(function(data){
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else{
                    resultDropdown.empty();
                }
            });
            
            // Set search input value on click of result item
            $(document).on("click", ".result p", function(){
                $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                $(this).parent(".result").empty();
            });
        });
        </script>
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
                <div id="sendpm">
                    <form method="post" action="pm.php" id="sendpmform">
                        <div class="search-box">
                            <input type="text" name="receiver" autocomplete="off" class="black" placeholder="send to username">
                            <div class="result"></div>
                        </div>
                        <textarea name="message" class="black" placeholder="Enter your message"></textarea>
                        <input type="submit" value="send message" name="submit" id="submitform" class="center">
                    </form>
                    <?php
                        if(isset($_POST["submit"])){
                            $receiver = filter_input(INPUT_POST, "receiver", FILTER_SANITIZE_STRING);
                            $sender = $_SESSION["ID"];
                            $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);
                            $datetime = date("Y-m-d H:i:s");
                            if(!empty($receiver) && !empty($message)){
                                $sql = "SELECT UserID FROM users WHERE Username = ?"; 
                                if($stmt = mysqli_prepare($connect, $sql)){
                                    mysqli_stmt_bind_param($stmt, "s", $receiver);
                                    mysqli_stmt_execute($stmt);
                                    mysqli_stmt_bind_result($stmt, $messagereceiver);
                                    mysqli_stmt_store_result($stmt);
                                    mysqli_stmt_fetch($stmt);
                                }
                                else{
                                    echo mysqli_error($connect);
                                }
                                if(!mysqli_stmt_num_rows($stmt) == 0){
                                $sql = "INSERT INTO private_messages VALUES(NULL, ?, ?, ?, ?)";
                                if($stmt = mysqli_prepare($connect, $sql)){
                                    mysqli_stmt_bind_param($stmt, "siis", $message, $sender, $messagereceiver, $datetime);
                                    if(mysqli_stmt_execute($stmt)){
                                        echo "message has been send";
                                    }
                                    else{
                                        echo "message has not been send";
                                    }
                                }
                                else{
                                    echo mysqli_error($connect);
                                }
                                }
                                else{
                                    echo "username does not exist";
                                }
                            }
                            else{
                                echo "please enter a username and message";
                            }
                        }
                        
                    ?>
                </div>
                <?php
                    $ID = $_SESSION["ID"];
                    $sql = "SELECT DISTINCT sendby, sendto FROM private_messages WHERE sendto = ? OR sendby = ?";
                    if($stmt = mysqli_prepare($connect, $sql)){
                        mysqli_stmt_bind_param($stmt, "ii", $ID, $ID);
                        if(mysqli_stmt_execute($stmt)){
                            mysqli_stmt_bind_result($stmt, $sendby , $sendto);
                            $users = array();
                            while(mysqli_stmt_fetch($stmt)){
                                if($sendby === $ID){
                                    array_push($users, $sendto);
                                }
                                else{
                                    array_push($users, $sendby);    
                                }
                            }
                        }
                        else{
                            echo mysqli_error($connect);
                        }
                    }
                    else{
                        echo mysqli_error($connect);
                    }
                    $usersstring = implode(" OR UserID = ", $users);
                    $sql = "SELECT userid, username, picture FROM users WHERE UserID = " . $usersstring;
                    if($stmt = mysqli_prepare($connect, $sql)){
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt, $userid, $username, $profilepic);
                        mysqli_stmt_store_result($stmt);
                        while(mysqli_stmt_fetch($stmt)){
                           echo "<a href='pmuser.php?action=" . $userid . "'class='pmusers'>"
                            . "<img class='img' src='" . $profilepic . "' alt ='profilepicture'>"
                            . $username
                            . "</a>";
                        }
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
