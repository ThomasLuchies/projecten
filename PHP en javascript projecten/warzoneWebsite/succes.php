<head>
    <link rel="shortcut icon" href="img/logo.ico"/>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
</head>
<?php
    include("config/connect.php");
    include("config/mail.php");
    session_start();
    if(isset($_GET["paymentId"]))
    {
      $sql = "UPDATE eventUsers SET paid = 1 WHERE paymentId = ?";
      if($stmt = mysqli_prepare($conn, $sql))
      {
          $paymentId = $_GET["paymentId"];
          mysqli_stmt_bind_param($stmt, "s", $paymentId);
          if(mysqli_stmt_execute($stmt))
          {
            echo "<h1>You have been registered.</h1>
            <h1>You will receive a email shortly.</h1>
            <br>";
            mysqli_stmt_close($stmt);
            $sql = "SELECT tournamentName, startTime, endTime, teamName, extraContestant FROM tournaments INNER JOIN eventUsers ON eventUsers.tournamentId = tournaments.tournamentId WHERE paymentId = ?";
            if($stmt = mysqli_prepare($conn, $sql))
            {
              mysqli_stmt_bind_param($stmt, "s", $paymentId);
              if(mysqli_stmt_execute($stmt))
              {
                echo "test";
                mysqli_stmt_bind_result($stmt, $tournamentName, $startTime, $endTime, $teamName, $extraContestant);
                mysqli_stmt_fetch($stmt);
                $email = $_SESSION["email"];
                $username = $_SESSION["username"];
                echo $email;
                echo $username;
                sendReceipt($username, $email, $tournamentName, $startTime, $endTime, $teamName, $username, $extraContestant);
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
      echo "<h1>An error ocured no products are verified";
    }
?>
<h2>You will be redirected to the home page in 5 seconds</h2>
<script type="text/javascript">
  setTimeout(() =>
  {
      window.location = "index.php";
  }, 5000)
</script>
