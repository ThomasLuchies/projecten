<!DOCTYPE html>
<html>
    <head>
        <title>Twitter</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <?php require("connect.php");?>
    </head>
    <body>
        <div id="container">
            <div id="menu">
                <div id="logo">
                <img src = "img/logo.jpg" alt = "logo">
            </div>
            <?php
                require("menu.php");
                ?>
            </div>
            <div id="messages">
                <div id="header">
                    <h2>Login</h2>
                </div>
                <div id="submit">
                    <form action = "login.php" method = "post" id="login">
                        <p><input type="text" name="name" placeholder="username" class="black"></p>
                        <p><input type="password" name="password" placeholder="password" class="black"></p>
                        <p><input type="submit" value="login" name="submit" id="submitlog"></p>
                    </form>
                    <?php
                        if(isset($_POST["submit"])){
                            $username = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
                            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
                            if($username && $password){
                                $sql = "SELECT * From USERS WHERE Username = ?";
                                if($stmt = mysqli_prepare($connect, $sql)){
                                    mysqli_stmt_bind_param($stmt, "s", $username);
                                    $result = mysqli_stmt_execute($stmt);
                                    if($result == false){
                                        echo "could not find your username";
                                    }
                                    $stmtresult = mysqli_stmt_store_result($stmt);
                                    if(mysqli_stmt_num_rows($stmt) > 0){
                                        mysqli_stmt_bind_result($stmt, $ID, $usernamedb, $passworddb, $Email, $Picture);
                                        mysqli_stmt_fetch($stmt);
                                        if(password_verify($password, $passworddb)){
                                            session_start();
                                            $_SESSION["login"] = true;
                                            $_SESSION["ID"] = $ID;
                                            $_SESSION["username"] = $usernamedb;
                                            $_SESSION["picture"] = $Picture;
                                            header("location: index.php");
                                        }
                                        else{
                                            echo "this password does not match your account";
                                            echo mysqli_error($connect);
                                        }
                                    }
                                }
                                else{
                                    echo mysqli_error($connect);
                                }
                            }
                            mysqli_stmt_close($stmt);
                        }
                    ?>
                </div>
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
