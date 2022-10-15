<?php
    include("connect.php");
    session_start();
    $sql = "SELECT eventUserId FROM eventUsers WHERE userId = ? && tournamentId = ? && paid = 1";
    if($stmt = mysqli_prepare($conn, $sql))
    {
        $userId = $_SESSION["userId"];
        $tournamentId = $_POST["tournamentId"];
        mysqli_stmt_bind_param($stmt, "ii", $userId, $tournamentId);
        if(mysqli_stmt_execute($stmt))
        {
            mysqli_stmt_store_result($stmt);
            mysqli_stmt_fetch($stmt);
            if(mysqli_stmt_num_rows($stmt) == 0)
            {
                mysqli_stmt_close($stmt);
                echo "false";
            }
            else
            {
                echo "true";
                mysqli_stmt_close($stmt);
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
?>
