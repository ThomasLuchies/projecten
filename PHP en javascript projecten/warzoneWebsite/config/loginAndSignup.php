<div id="accountBackground" class="blackScreen">
    <div id="signup" class="justifyStart">
        <img src="img/close.png" alt="close" class="close" onclick="exitLoginScreen('signup')">
        <form class="accountForm" method="post" id="signupform">
            <div class="inputWrapper">
                <input type="text" name="username" placeholder="Username" autocomplete="off">
            </div>
            <div class="inputWrapper">
                <input type="text" name="email" placeholder="Email" autocomplete="off">
            </div>
            <select name="platform">
                <option value="xbox">Xbox</option>
                <option value="playstation">Playstation</option>
                <option value="pc">pc</option>
            </select>
            <div class="inputWrapper">
                <input type="text" name="ign" placeholder="in game username" autocomplete="off">
            </div>
            <div class="inputWrapper">
                <input type="password" name="password" placeholder="Password" autocomplete="off">
            </div>
            <div class="inputWrapper">
                <input type="password" name="passwordVerify" placeholder="Password verify" autocomplete="off">
            </div>
            <span class="checkboxText"><input type="checkbox" name="termsOfServiceAndPrivacyPolicy" autocomplete="off"> By checking this box i agree to the terms of service and the privacy policy.</span>
            <input class="checkbox" type="submit" name="signup" value="Signup">
            <?php
                include("mail.php");
                if(isset($_POST["signup"]))
                {
                    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
                    $password = filter_input(INPUT_POST, "password");
                    $passwordVerify = filter_input(INPUT_POST, "passwordVerify");
                    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
                    $ign = filter_input(INPUT_POST, "ign", FILTER_SANITIZE_STRING);
                    $platform = filter_input(INPUT_POST, "platform");
                    $platformArray = array("xbox", "playstation", "pc");
                    $termsOfServiceAndPrivacyPolicy = filter_input(INPUT_POST, "termsOfServiceAndPrivacyPolicy");
                    if($username && $password && $passwordVerify && !empty($_POST["email"]) && $ign)
                    {
                        if($email)
                        {
                            if(in_array($platform, $platformArray))
                            {
                                if($password == $passwordVerify)
                                {
                                    if(strlen($password) >= 10 && preg_match('/\d/', $password) && preg_match('/[^a-zA-Z\d]/', $password))
                                    {
                                        if($termsOfServiceAndPrivacyPolicy)
                                        {
                                            $sql = "SELECT * FROM users WHERE username = ? || email = ?";
                                            if($stmt = mysqli_prepare($conn, $sql))
                                            {
                                                mysqli_stmt_bind_param($stmt, "ss", $username, $email);
                                                if(mysqli_stmt_execute($stmt))
                                                {
                                                    mysqli_stmt_store_result($stmt);
                                                    mysqli_stmt_fetch($stmt);
                                                    if(mysqli_stmt_num_rows($stmt) == 0)
                                                    {
                                                        mysqli_stmt_close($stmt);
                                                        $sql = "INSERT INTO users VALUES(null, ?, ?, ?, ?, ?, ?, 0)";
                                                        if($stmt = mysqli_prepare($conn, $sql))
                                                        {
                                                            $passwordHash = password_hash($password, PASSWORD_BCRYPT);
                                                            $verifactionHash = md5(uniqid(rand(), true));
                                                            mysqli_stmt_bind_param($stmt, "ssssss", $username, $email, $passwordHash, $platform, $ign, $verifactionHash);
                                                            if(mysqli_stmt_execute($stmt))
                                                            {
                                                                mailVerification($username, $email, $verifactionHash);
                                                                echo "<script type='text/javascript'>document.location.href = 'verifyemail.php';</script>";
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
                                                        mysqli_stmt_close($stmt);
                                                        echo "<script type='text/javascript'>
                                                                document.getElementById('accountBackground').style.display = 'flex';
                                                                document.getElementById('signup').style.display = 'flex';
                                                                document.body.style.overflow = 'hidden';
                                                                </script>";
                                                        echo "<p class='formFeedback'>Email or username are already used.</p>";
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
                                        }
                                        else
                                        {
                                            echo "<script type='text/javascript'>
                                            document.getElementById('accountBackground').style.display = 'flex';
                                            document.getElementById('signup').style.display = 'flex';
                                            document.body.style.overflow = 'hidden';
                                            </script>";
                                            echo "<p class='formFeedback'>Please accept the user agreement and the privacy policy</p>";
                                        }
                                    }
                                    else
                                    {
                                        echo "<script type='text/javascript'>
                                        document.getElementById('accountBackground').style.display = 'flex';
                                        document.getElementById('signup').style.display = 'flex';
                                        document.body.style.overflow = 'hidden';
                                        </script>";
                                        echo "<p class='formFeedback'>A password needs to be at least 10 characters, contain 1 number and 1 special character</p>";
                                    }
                                }
                                else
                                {
                                    echo "<script type='text/javascript'>
                                    document.getElementById('accountBackground').style.display = 'flex';
                                    document.getElementById('signup').style.display = 'flex';
                                    document.body.style.overflow = 'hidden';
                                    </script>";
                                    echo "<p class='formFeedback'>password and password verify are not the same</p>";
                                }
                            }
                            else
                            {
                                echo "<script type='text/javascript'>
                                    document.getElementById('accountBackground').style.display = 'flex';
                                    document.getElementById('signup').style.display = 'flex';
                                    document.body.style.overflow = 'hidden';
                                    </script>";
                                echo "<p class='formFeedback'>not a valid platform</p>";
                            }
                        }
                        else
                        {

                            echo "<script type='text/javascript'>
                                document.getElementById('accountBackground').style.display = 'flex';
                                document.getElementById('signup').style.display = 'flex';
                                document.body.style.overflow = 'hidden';
                                </script>";
                            echo "<p class='formFeedback'>please enter a valid email adress</p>";
                        }
                    }
                    else
                    {
                        echo "<script type='text/javascript'>
                            document.getElementById('accountBackground').style.display = 'flex';
                            document.getElementById('signup').style.display = 'flex';
                            document.body.style.overflow = 'hidden';
                            </script>";
                        echo "<p class='formFeedback'>please fill in all forms</p>";
                    }
                }
            ?>
        </form>
    </div>
    <div id="login">
        <img src="img/close.png" alt="close" class="close" onclick="exitLoginScreen('login')">
        <form class="accountForm" method="post">
            <img src="img/logo.png" alt="logo">
            <div class="inputWrapper">
                <input type="text" name="username" placeholder="Email or username">
            </div>
            <div class="inputWrapper">
                <input type="password" name="password" placeholder="Password">
            </div>
            <input type="submit" name="login" value="Login">
            <?php
                if(isset($_POST["login"]))
                {
                    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
                    $password = filter_input(INPUT_POST, "password");

                    if($username && $password)
                    {
                        $sql = "SELECT userId, userName, email, password, verified FROM users WHERE username = ? or email = ?";
                        if($stmt = mysqli_prepare($conn, $sql))
                        {
                            mysqli_stmt_bind_param($stmt, "ss", $username, $username);
                            if(mysqli_stmt_execute($stmt))
                            {
                                mysqli_stmt_bind_result($stmt, $userId, $username, $email, $passwordDb, $verified);
                                mysqli_stmt_fetch($stmt);
                                if(password_verify($password, $passwordDb))
                                {
                                  if($verified)
                                  {
                                    $_SESSION["userId"] = $userId;
                                    $_SESSION["username"] = $username;
                                    $_SESSION["email"] = $email;
                                    echo "<script type='text/javascript'>document.location.href = 'index.php';</script>";
                                  }
                                  else
                                  {
                                    echo "<script type='text/javascript'>
                                        document.getElementById('accountBackground').style.display = 'flex';
                                        document.getElementById('login').style.display = 'flex';
                                        document.body.style.overflow = 'hidden';
                                        </script>";
                                    echo "<p>please verify your account</p>";
                                  }
                                }
                                else
                                {
                                    echo "<script type='text/javascript'>
                                        document.getElementById('accountBackground').style.display = 'flex';
                                        document.getElementById('login').style.display = 'flex';
                                        document.body.style.overflow = 'hidden';
                                        </script>";
                                    echo "<p>email/username or password is incorrect</p>";
                                }
                            }
                            else
                            {
                                echo mysqli_error($conn);
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
                        echo "<script type='text/javascript'>
                            document.getElementById('accountBackground').style.display = 'flex';
                            document.getElementById('login').style.display = 'flex';
                            document.body.style.overflow = 'hidden';
                            </script>";
                        echo "<p>please fill in all fields</p>";
                    }
                }
            ?>
        </form>
    </div>
</div>
