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
                    <h2>Signup</h2>
                </div>
                <form action = "register.php" method = "post" id="login" enctype="multipart/form-data">
                    <p><input type="text" name="email" placeholder="email" class="black"></p>
                    <p><input type="text" name="username" placeholder="username" class="black"></p>
                    <p><input type="password" name="password" placeholder="password" class="black"></p>
                    <p><input type="file" name="img" id="normal"></p>
                    <p><input type="submit" name="submit" value="registeren" id="submitlog"></p>
                </form>
                <?php 
                    if(isset($_POST["submit"]) && isset($_FILES['img'])){
                        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
                        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
                        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
                        $file = $_FILES['img'];
                        $filename = $_FILES['img']['name'];
                        $fileTmpName = $_FILES['img']['tmp_name'];
                        $filesize = $_FILES['img']['size'];
                        $fileError = $_FILES['img']['error'];
                        $filetype = $_FILES['img']['type'];
                        $fileExt = explode("/", $filetype);
                        $fileExtlower = strtolower(end($fileExt));
                        $allowedExt = array("jpg", "jpeg", "png", "gif");
                        if($email && $username && $password){
                            $sqlusername = "SELECT Username FROM users WHERE Username = ?";
                            if($stmt = mysqli_prepare($connect, $sqlusername)){
                                mysqli_stmt_bind_param($stmt, "s", $username);
                                mysqli_stmt_execute($stmt);
                                mysqli_stmt_store_result($stmt);
                                if(mysqli_stmt_num_rows($stmt) === 0){
                                $passwordencrypt = password_hash($password, PASSWORD_BCRYPT);
                                if($filesize !== 0){
                                    if(in_array($fileExtlower, $allowedExt)){
                                        if($fileError === 0){
                                            if($filesize < 20971520){      
                                                $filenameupload = uniqid('', true) . "." . $fileExtlower;
                                                $dir = "img/profile_pictures/" . $filenameupload;
                                                move_uploaded_file($fileTmpName, $dir);
                                            }
                                            else{
                                                echo "A file cannot exceed 20MB";     
                                            }
                                        }
                                        else{
                                            echo "There acoured an error";
                                        }
                                    }
                                    else{
                                        echo "You uploaded a unsupported file";
                                    }
                                }
                                else{
                                $dir = "img/standardprofilepicture.png";
                                move_uploaded_file($fileTmpName, $dir);
                                }
                                $sql = "INSERT INTO Users VALUES(NULL, ?, ?, ?, ?)";
                                if($stmt = mysqli_prepare($connect, $sql)){
                                    mysqli_stmt_bind_param($stmt, "ssss", $username, $passwordencrypt, $email, $dir);
                                    $result = mysqli_stmt_execute($stmt);
                                    echo mysqli_error($connect);
                                    if($result == false){
                                        echo "your account has not been made";
                                    }
                                    else{
                                        echo "your account has been made";
                                        mysqli_stmt_close($stmt);
                                        $sqlid = "SELECT UserID FROM users WHERE username = ?";
                                        if($stmt = mysqli_prepare($connect, $sqlid)){
                                            mysqli_stmt_bind_param($stmt, "s", $username);
                                            mysqli_stmt_execute($stmt);
                                            mysqli_stmt_bind_result($stmt, $ID);
                                            mysqli_stmt_fetch($stmt);
                                            session_start();
                                            $_SESSION["login"] = true;
                                            $_SESSION["ID"] = $ID;
                                            $_SESSION["username"] = $username;
                                            $_SESSION["picture"] = $dir;
                                            header("location:index.php");
                                        }
                                        else{
                                            echo mysqli_error($connect);
                                        }
                                        mysqli_stmt_close($stmt);                                     
                                    }
                                }
                                else{
                                    echo mysqli_error($connect);
                                }
                                }
                                else{ 
                                    echo "username already exists";
                                }
                            }
                        else{
                            echo "please enter a valid input";
                        }
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
