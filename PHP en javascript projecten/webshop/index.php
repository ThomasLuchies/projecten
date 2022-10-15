<!DOCTYPE html>
<html>
    <head>
        <title>Estado</title>
        <link href="style.css" type="text/css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/e408b12b6c.js" crossorigin="anonymous"></script>
        <?php
            mysqli_connect("localhost", "root", "", "webshop");
            session_start();
        ?>
    </head>
    <body>
        <?php
            include("loginAndSignup.php");
        ?>
        <div id="container">
            <?php
                include("header.php");
            ?>
            <div id="main">
                <p id="pageLocation"><strong>HOME</strong></p>
                <div class="slideshow-container">
                  <div class="mySlides">
                    <img src="img/jordan-jumpman-t-shirt-heren-gDwq4m.jpg" style="width:100%">
                  </div>

                  <div class="mySlides">
                    <img src="img/thumb-1920-876549.png" style="width:100%">
                  </div>

                  <div class="mySlides">
                    <img src="img/zwart-mondkapje-1.jpg" style="width:100%">
                  </div>

                  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                  <a class="next" onclick="plusSlides(1)">&#10095;</a>

                </div>
                <br>
                <div style="text-align:center">
                  <span class="dot" onclick="currentSlide(1)"></span>
                  <span class="dot" onclick="currentSlide(2)"></span>
                  <span class="dot" onclick="currentSlide(3)"></span>
                </div>

            </div>
            <?php
                include("footer.php");
            ?>
        </div>
        <script src="javascript/getCookie.js"></script>
        <script src="javascript/cart.js"></script>
        <script src="javascript/account.js"></script>
        <script src="javascript/carousel.js"></script>
    </body>
</html>
