<?php
    include("connect.php");
    session_start();
    $tournamentId = $_COOKIE["tournamentId"];
    $sql = "SELECT eventUserId FROM eventUsers WHERE teamName = ? && tournamentId = ?";
    if($stmt = mysqli_prepare($conn, $sql))
    {
        mysqli_stmt_bind_param($stmt, "si", $teamName, $tournamentId);
        if(mysqli_stmt_execute($stmt))
        {
            mysqli_stmt_store_result($stmt);
            mysqli_stmt_fetch($stmt);
            if(mysqli_stmt_num_rows($stmt) == 0)
            {
                mysqli_stmt_close($stmt);
                $sql = "INSERT INTO eventUsers VALUES(null, ?, ?, ?, ?, ?, 0)";
                if($stmt = mysqli_prepare($conn, $sql))
                {
                    $teamName = $_SESSION["teamName"];
                    $contestantsArray = $_SESSION["teamMembers"];
                    $userId = $_SESSION["userId"];
                    $paymentId = $_POST["paymentId"];
                    $jsonArray = json_encode($contestantsArray);
                    mysqli_stmt_bind_param($stmt, "iisss", $tournamentId, $userId, $jsonArray, $teamName, $paymentId);
                    if(mysqli_stmt_execute($stmt))
                    {
                        $_SESSION["paymentId"] = mysqli_insert_id($conn);
                        echo "succes";
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
                mysqli_stmt_close($stmt);
            }
            else
            {
                echo "<h1>team name is already registered</h1>";
                mysqli_stmt_close($stmt);
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
?>
