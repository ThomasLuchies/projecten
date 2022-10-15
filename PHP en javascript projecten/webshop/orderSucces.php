<!DOCTYPE html>
<html>
    <head>
    <title>Estado</title>
        <link href="style.css" type="text/css" rel="stylesheet">
        <link href="fonts/1848.otf" rel="font/otf">
        <link href="fonts/1849.otf" rel="font/otf">
        <link href="fonts/1850.otf" rel="font/otf">
        <link href="fonts/1851.otf" rel="font/otf">
        <link href="fonts/Avenir.ttc" rel="font/collection">
        <?php
            $conn = mysqli_connect("localhost", "root", "", "webshop");
            session_start();
        ?>
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="container">
            <?php
                include("header.php");
            ?>
            <div id="orderSuccesMain">
                <h1>Your order has been completed.<br>You will receive a mail shortly.</h1>
                <?php
                    $currentOrder = $_SESSION["currentOrder"];
                    $sql = "UPDATE Orders set paid = 1 WHERE orderId = ?";
                    if($stmt = mysqli_prepare($conn, $sql))
                    {
                        mysqli_stmt_bind_param($stmt, "i", $currentOrder);
                        if(mysqli_stmt_execute($stmt))
                        {
                            $_SESSION["currentOrder"] = null;
                            unset($_COOKIE['currentProductsInCart']); 
                            setcookie('currentProductsInCart', null, -1); 
                        }
                        else
                        {
                            echo "test";
                            echo mysqli_error($conn);
                        }
                    }
                ?>
            </div>
            <?php
                include("footer.php");
            ?>
        </div>
        <script src="javascript/getCookie.js"></script>
        <script src="javascript/cart.js"></script>
        <script src="javascript/account.js"></script>
    <body>
</html>