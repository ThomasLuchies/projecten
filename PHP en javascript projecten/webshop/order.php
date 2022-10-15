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
        <script src="https://js.stripe.com/v3/"></script>
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
            <div id="mainOrder">
              <div id="orderCenter">
                <div id="orderCenterMenu">
                  <button id="adressInformationButton" class="orderCenterMenuCell">
                    <p>Adress information</p>
                  </button>
                  <button id="orderOverviewButton" class="orderCenterMenuCell">
                    <p>Order overview</p>
                  </button>
                  <button id="paymentButton" class="orderCenterMenuCell">
                    <p>Payment</p>
                  </button>
                </div>
                <div id="orderMain">
                  <?php
                    if($_GET["page"] == 1)
                    {
                      include("orderForms/adressInformation.php");
                    }
                    elseif($_GET["page"] == 2)
                    {
                      include("orderForms/orderOverview.php");
                    }
                    elseif($_GET["page"] == 3)
                    {
                      include("orderForms/payment.php");
                    }
                  ?>
                </div>
              </div>
            </div>
            <?php
                include("footer.php");
            ?>
        </div>
    <body>
    <script src="javascript/getCookie.js"></script>
    <script src="javascript/cart.js"></script>
    <script src="javascript/account.js"></script>
    <script src="javascript/order.js"></script>
</html>
