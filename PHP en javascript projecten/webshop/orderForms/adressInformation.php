<?php
    $firstName = "";
    $lastName = "";
    $streetName = "";
    $houseNumber = "";
    $zipCode = "";
    $city = "";
    $email = "";
    $phoneNumber = "";
    if(isset($_POST["submitAdressInformation"]))
    {
        $conn = mysqli_connect("localhost", "root", "", "webshop");
        $firstName = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_STRING);
        $lastName = filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_STRING);
        $streetName = filter_input(INPUT_POST, "streetName", FILTER_SANITIZE_STRING);
        $houseNumber = filter_input(INPUT_POST, "houseNumber");
        $zipCode = filter_input(INPUT_POST, "zipCode", FILTER_SANITIZE_STRING);
        $city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $phoneNumber = filter_input(INPUT_POST, "phoneNumber");
        $userId = $_SESSION["userId"];
        if($firstName && $lastName && $streetName && $houseNumber && $zipCode && $city && !empty($_POST["email"]))
        {
            $zipCodeCheck = preg_match("/^\W*[1-9]{1}[0-9]{3}\W*[a-zA-Z]{2}\W*$/",$zipCode);
            if($zipCodeCheck)
            {
                if(is_numeric($houseNumber))
                {
                    if($email)
                    {
                        if(empty($_POST["phoneNumber"]) || is_numeric($phoneNumber))
                        {
                            $sql = "INSERT INTO orders VALUES(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0)";

                            if($stmt = mysqli_prepare($conn, $sql))
                            {
                                mysqli_stmt_bind_param($stmt, "isssisssis", $userId, $firstName, $lastName, $streetName, $houseNumber, $zipCode, $city, $email, $phoneNumber, $_COOKIE["currentProductsInCart"]);
                                if(mysqli_execute($stmt))
                                {
                                    $_SESSION["currentOrder"] = mysqli_insert_id($conn);
                                    header("location: order.php?page=2");
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
                            echo "invalid phoneNumber";
                        }
                    }
                    else
                    {
                        echo "invalid email";
                    }
                }
                else
                {
                    echo "invalid houseNumber";
                    $houseNumber = "";
                }
            }
            else
            {
                echo "invalid zipcode";
                $zipCode = "";
            }
        }
        else
        {
            echo "please fill in all fields";
        }
    }
?>
<form id="adressInformationForm" method="post" action<?php echo $_SERVER["PHP_SELF"]?>>
    <div class="textFieldColumnRow">
        <input type="text" name="firstName" value = "<?php echo $firstName; ?>" placeholder="Firstname"/>
        <input type="text" name="lastName" value = "<?php echo $lastName; ?>" placeholder="Lastname"/>
    </div>
    <div class="textFieldColumnRow">
        <input type="text" name="streetName" value = "<?php echo $streetName; ?>" placeholder="Streetname"/>
        <input type="text" name="houseNumber" value = "<?php echo $houseNumber; ?>" placeholder="Housenumber"/>
    </div>
    <div class="textFieldColumnRow">
        <input type="text" name="zipCode" value = "<?php echo $zipCode; ?>" placeholder="Zipcode"/>
        <input type="text" name="city" value = "<?php echo $city; ?>" placeholder="City"/>
    </div>
    <div class="textFieldColumnRow">
        <input type="text" name="email" value = "<?php echo $email; ?>" placeholder="Email"/>
        <input type="text" name="phoneNumber" value = "<?php echo $phoneNumber; ?>" placeholder="Phone number (optional)"/>
    </div>
    <input type="submit" class="orderButton" name="submitAdressInformation" value="next"/>
</form>