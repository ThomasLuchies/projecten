<div id="loginScreen">
    <div id="loginScreenContent">
    <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
        <input type="text" name="userNameLogin" placeholder="username or email"/>
        <input type="password" name="passwordLogin" placeholder="password"/>
        <input type="submit" name="login" value="login" />
    </form>
    <?php
        if(isset($_POST["login"]))
        {
        echo "test";
        $userName = filter_input(INPUT_POST, "userNameLogin", FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, "passwordLogin");

        if($userName && $password)
        {
            echo "test";
            $sql = "SELECT * FROM users WHERE userName = ?";
            if($stmt = mysqli_prepare($conn, $sql))
            {
                mysqli_stmt_bind_param($stmt, "s", $userName);
                if(mysqli_stmt_execute($stmt))
                {
                    mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt) > 0)
                    {
                        echo $userName;
                        mysqli_stmt_bind_result($stmt, $userId, $userName, $passwordDb, $email);
                        mysqli_stmt_fetch($stmt);
                        echo "passworddb = " . $userId;

                        if(password_verify($password, $passwordDb))
                        {
                            $_SESSION["userId"] = $userId;
                            $_SESSION["userName"] = $userName;
                            $_SESSION["email"] = $email;
                            echo "succes";
                        }
                        else
                        {
                            echo "password isn't correct";
                        }
                    }
                    else
                    {
                    echo "incorrect username";
                    }
                    mysqli_stmt_close($stmt);
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
            echo "error";
        }
        }
    ?>
    <div id="closeLogin">
    </div>
    </div>
    <div id="signupScreenContent">
    <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
        <input type="text" name="email" placeholder="email" />
        <input type="text" name="username" placeholder="username"/>
        <input type="password" name="password" placeholder="password"/>
        <input type="password" name="passwordVerify" placeholder="verify password" />
        <input type="submit" name="signup" value="signup" />
    </form>
    <div id="closeSignup">
    </div>
    <?php
        if(isset($_POST["signup"]))
        {
        $userName = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, "password");
        $passwordVerify = filter_input(INPUT_POST, "passwordVerify");
        if($userName && $email && $password && $passwordVerify)
        {
            if($password == $passwordVerify)
            {
            $sql = "insert into users values(null, ?, ?, ?)";
            if($stmt = mysqli_prepare($conn, $sql))
            {
                $passwordHash = password_hash($password, PASSWORD_BCRYPT);
                mysqli_stmt_bind_param($stmt, "sss", $userName, $passwordHash, $email);
                if(mysqli_stmt_execute($stmt))
                {
                echo "succes";
                }
                else
                {
                echo mysqli_error($conn);
                }
                mysqli_stmt_close($stmt);
            }
            }
            else
            {
                echo "passwords don't match";
            }
        }
        else
        {
            echo "error";
        }
        }
        ?>
    </div>
</div>