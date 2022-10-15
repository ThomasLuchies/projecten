<!DOCTYPE>
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
      <div id="main">
        <p id="pageLocation"><a href="index.php">HOME</a> | <a href="shop.php">STORE</a> |
          <?php
            if(isset($_GET['action']))
            {
              echo "<a href='shop.php'>T-Shirts & POLO'S</a> | <strong id='location'></strong>";
            }
            else
            {
              echo "<strong>T-Shirts & POLO'S</strong>";
            }
          ?>
        </p>
        <div id="mainShop">
        <?php
          if(isset($_GET["action"]))
          {
              $productId = $_GET["action"];
              $sql = "SELECT * FROM products WHERE productId = ?";
              if($stmt = mysqli_prepare($conn, $sql))
              {
                  mysqli_stmt_bind_param($stmt, "i", $productId);
                  if(mysqli_stmt_execute($stmt))
                  {
                      mysqli_stmt_bind_result($stmt, $productId, $productName, $productPrice, $productImg, $date);
                      mysqli_stmt_store_result($stmt);
                      if(mysqli_stmt_num_rows($stmt) > 0)
                      {
                        while(mysqli_stmt_fetch($stmt))
                        {
                            setcookie("currentLocation", $productName);
                            setcookie("currentProduct", $productId);
                            echo "<div id='productLeft'>";
                            echo "<img src='img/products/" . $productImg . "'>";
                            echo "</div>";
                            echo "<div id='productright'>";
                            echo "<div id='productInfo'>";
                            echo "<h1><strong>ESTADO</strong></h1>";
                            echo "<h2>" . $productName . "</h2>";
                            echo "<h2 id='productPrice'>€" . $productPrice . ",-</h2>";
                            echo "<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                            Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.
                            Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.
                            In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.  </p>";
                            echo "<div id='sizes'>"
                            . "<p>SIZE</p>"
                            . "<button id='s'><span id='sText'>S</span></button>"
                            . "<button id='m'><span id='mText'>M</span></button>"
                            . "<button id='l'><span id='lText'>L</span></button>"
                            . "<button id='xl'><span id='xlText'>XL</span></button>"
                            . "</div>";
                            echo "<p id='noSizeSelectedNotice'>Please select your size</p>";
                            echo "<button id='addToCart'>Add to shopping bag</button>";
                            if(isset($_SESSION["userId"]))
                            {
                              echo "<button id='addToFavorites'>Add to wishlist</button>";
                              echo "<script src='javascript/addToFavorites.js'></script>";
                            }
                            echo "</div>";
                            echo "</div>";
                        }
                        echo "<script src='javascript/addToCart.js'></script>";
                      }
                      else
                      {
                        echo "Error 404 product not found";
                      }
                  }
              }
          }
          else
          {
              ?>
              <div id="products">
              <?php
              $sql = "SELECT * FROM products ORDER BY date DESC";
              if($stmt = mysqli_prepare($conn, $sql))
              {
                  if(mysqli_stmt_execute($stmt))
                  {
                      mysqli_stmt_bind_result($stmt, $productId, $productName, $productPrice, $productImg, $date);
                      while(mysqli_stmt_fetch($stmt))
                      {
                          setcookie("currentLocation", "");
                          echo "<a href='shop.php?action=" . $productId . "'class='shopCell' onclick='test()'>";
                          echo "<img src='img/products/" . $productImg . "'>";
                          echo "<p>" . $productName . "</p>";
                          echo "<p class='productPrice'>€" . $productPrice . ",-</p>";
                          echo "<p>4 Colours</p>";
                          echo "</a>";
                      }
                  }
                  else
                  {
                      echo "error " . mysqli_error($conn);
                  }
              }
              else
              {
                  echo "error " . mysqli_error($conn);
              }
              ?>
              </div>
              <?php
          }
      ?>
        </div>
      </div>
      <?php
        include("footer.php");
      ?>
    </div>
    <script src="javascript/getCookie.js"></script>
    <script src="javascript/cart.js"></script>
    <script src='javascript/sizeButtons.js'></script>
    <script src="javascript/account.js"></script>
    <script src='javascript/changePageLocation.js'></script>
  </body>
</html>
