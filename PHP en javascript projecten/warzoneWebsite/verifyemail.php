<!DOCTYPE html>
<html>
    <head>
        <title>Verify mail</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="img/logo.ico"/>
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <?php
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
                    <?php
                    if($_GET["verification"])
                    {
                        $sql = "UPDATE users SET verified = 1 WHERE mailVerification = ?";

                        if($stmt = mysqli_prepare($conn, $sql))
                        {
                            $verifactionHash = $_GET["verification"];
                            mysqli_stmt_bind_param($stmt, "s", $verifactionHash);
                            if(mysqli_stmt_execute($stmt))
                            {
                                echo "<h1>your account has been verified</h1>";
                            }
                            else
                            {
                                mysqli_error($conn);
                            }
                            mysqli_stmt_close($stmt);
                        }
                        else
                        {
                            mysqli_error($conn);
                        }
                    }
                    else
                    {
                        echo "<h1>You will receive a mail where you can activate you account</h1>";
                    }
                    ?>
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
