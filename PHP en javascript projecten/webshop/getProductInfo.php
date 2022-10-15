<?php
    $conn = mysqli_connect("localhost", "root", "", "webshop");
    $productId = $_POST["productId"];
    $sql = "SELECT * FROM products WHERE productId = ?";
    if($stmt = mysqli_prepare($conn, $sql))
    {
        mysqli_stmt_bind_param($stmt, "s", $productId);
        if(mysqli_stmt_execute($stmt))
        {
            mysqli_stmt_bind_result($stmt, $productId, $productName, $productPrice, $productImg, $date);
            mysqli_stmt_fetch($stmt);
            $array =["productName" => $productName, "productPrice" => $productPrice, "productImg" => $productImg];
            echo json_encode($array);
        }
        else
        {
            echo mysqli_error($conn);
        }
    }
?>