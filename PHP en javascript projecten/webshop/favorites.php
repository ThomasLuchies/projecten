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
            <div id="mainFavorites">
                <?php
                    $sql = "SELECT products.productId, productName, price, picture FROM favorites JOIN products ON favorites.productId = products.productId WHERE userId = ?";
                    if($stmt = mysqli_prepare($conn, $sql))
                    {
                        mysqli_stmt_bind_param($stmt, "i", $_SESSION["userId"]);
                        if(mysqli_stmt_execute($stmt))
                        {
                            mysqli_stmt_bind_result($stmt, $productId, $productName, $price, $picture);
                            while(mysqli_stmt_fetch($stmt))
                            {
                                echo "<a href='shop.php?action=" . $productId . "' class='favoriteCell'>"
                                . "<div class='favoriteCellLeft'>"
                                . "<img src='img/products/" . $picture . "' alt='test'>"
                                . "</div>"
                                . "<div class='favoriteCellRight'>"
                                . "<h1>" . $productName ."</h1>"
                                . "<h2>€" . $price .",-</h2>"
                                . "</div>"
                                . "</a>";
                            }
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