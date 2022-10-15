<?php
  $conn = mysqli_connect("localhost", "root", "", "webshop");
  $input = $_POST["input"];

  $sql = "SELECT code, discount, minAmount FROM discountCodes WHERE code = ?";
  if($stmt = mysqli_prepare($conn, $sql))
  {
    mysqli_stmt_bind_param($stmt, "s", $input);
    if(mysqli_stmt_execute($stmt))
    {
      mysqli_stmt_bind_result($stmt, $code, $discount, $minAmount);
      mysqli_stmt_store_result($stmt);
      if(mysqli_stmt_num_rows($stmt) > 0)
      {
        mysqli_stmt_fetch($stmt);
        echo json_encode(array("code" => $code, "discount" => $discount,  "minAmount" => $minAmount));
      }
      else
      {
        echo "false";
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
