<div id="orderOverview">
    <div id="productOverview">
        <?php
            $cookie = $_COOKIE["currentProductsInCart"];
            $products = json_decode($cookie);

            foreach($products as $product)
            {
                echo "<div class='cartProductCell'>";
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
                echo "</div>";
            }
        ?>
    </div>
    <div id="priceOverview">
        <div id="priceOverviewCenter">
            <?php
                $total = 0;
                foreach($products as $product)
                {
                    $total += $product[1] * $product[4];
                }
                echo "<h2 id='orderOverviewPrice'>Price:</h2>";
                echo "<h2>Subtotal: €<span id='subTotalAmount'>" . round(($total / 1.21), 2) . "</span>,-</h2>";
                echo "<h2>Tax: €<span id='tax'>" . round(($total - ($total / 1.21)), 2) . "</span>,-</h2>";
                echo "<h2 id='orderOverviewTotal'>Total: €<span id='totalPrice'>" . $total . "</span>,-</h2>";
            ?>
        </div>
    </div>
</div>
<form method="post" action = <?php echo $_SERVER["PHP_SELF"] . "?page=3" ?>>
    <input type="submit" class="orderButton" name="orderOverviewSubmit" value="next">
</form>