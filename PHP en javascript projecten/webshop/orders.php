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
          $conn = mysqli_connect("localhost", "root", "");
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

      </div>
      <?php
        include("footer.php");
      ?>
    </div>
    <script src="javascript/getCookie.js"></script>
    <script src="javascript/cart.js"></script>
    <script src="javascript/account.js"></script>
  </body>
</html>
