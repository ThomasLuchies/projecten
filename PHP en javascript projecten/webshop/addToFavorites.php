<?php
    $conn = mysqli_connect("localhost", "root", "", "webshop");
    session_start();

    $userId = $_SESSION["userId"];
    $productId = $_POST["productId"];

    $sql = "SELECT * FROM favorites WHERE userId = ? and productId = ?";

    if($stmt = mysqli_prepare($conn, $sql))
    {
        mysqli_stmt_bind_param($stmt, "ii", $userId, $productId);
        if(mysqli_stmt_execute($stmt))
        {
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) > 0)
            {
                mysqli_stmt_close($stmt);
                $sql = "DELETE FROM favorites WHERE userId = ? && productId = ?";
                if($stmt = mysqli_prepare($conn, $sql))
                {
                    mysqli_stmt_bind_param($stmt, "ii", $userId, $productId);
                    if(mysqli_stmt_execute($stmt))
                    {
                        echo "deleted";
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
                mysqli_stmt_close($stmt);
                $sql = "INSERT INTO favorites VALUES(null, ?, ?)";
                if($stmt = mysqli_prepare($conn, $sql))
                {
                    mysqli_stmt_bind_param($stmt, "ii", $userId, $productId);
                    if(mysqli_stmt_execute($stmt))
                    {
                        echo "added";
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