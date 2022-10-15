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
        <?php
            include("loginAndSignup.php");
        ?>
        <div id="container">
            <?php
                include("header.php");
            ?>
            <div id="mainCart">
              <div id="mainCartCenter">
                <div id="mainCartLeft">
                  <div id="mainCartItems">
                    <?php
                      if(isset($_COOKIE["currentProductsInCart"]))
                      {
                        $currentProductsInCart = json_decode($_COOKIE["currentProductsInCart"]);
                        foreach($currentProductsInCart as $product)
                        {
                          echo "<a href='shop.php?action='" . "class='cartProductCell'>";
                          echo "<div class='cartProductCellImg'>"
                          . "<img src='img/products/" . $product[2] . "'>"
                          . "</div>";
                          echo "<div class='cartProductInfo'>"
                          . "<p><strong>" . $product[0] . "</strong></p>"
                          . "<p><strong>Size: </strong>" . strtoupper($product[3]) . "</p>"
                          . "<p><strong>Amount: </strong>" . $product[4] . "</p>"
                          . "</div>";
                          echo "<div class='cartProductPrice'>"
                          . "<p>€" . $product[1] * $product[4]. ",-</p>"
                          . "</div>";
                          echo "</a>";
                        }
                      }
                      else
                      {
                        echo "No items in cart";
                      }
                    ?>
                  </div>
                  <div id="mainCartDiscount">
                    <div id="discountInputContainer">
                      <input type="text" id="discountCodeInput" placeholder="Discount code" />
                    </div>
                    <button id="discountCodeSubmit">Submit</button>
                  </div>
                </div>
                <div id="mainCartRight">
                  <div id="mainCartRightInfo">
                    <h1>Summary</h1>
                    <?php
                      if(isset($_COOKIE["currentProductsInCart"]))
                      {
                        $total = 0;
                        foreach($currentProductsInCart as $product)
                        {
                          $total += $product[1] * $product[4];
                        }
                        echo "<h2>Subtotal: €<span id='subTotalAmount'>" . round(($total / 1.21), 2) . "</span>,-</h2>";
                        echo "<h2>Tax: €<span id='tax'>" . round(($total - ($total / 1.21)), 2) . "</span>,-</h2>";
                        echo "<h2>Total: €<span id='totalPrice'>" . $total . "</span>,-</h2>";
                      }
                    ?>
                    <a id="order" href="order.php?page=1">order</a>
                  </div>
                </div>
              </div>
            </div>
            <?php
                include("footer.php");
            ?>
        </div>
        <script src="javascript/getCookie.js"></script>
        <script src="javascript/cart.js"></script>
        <script src="javascript/account.js"></script>
        <script src="javascript/discount.js"></script>
    <body>
</html>
