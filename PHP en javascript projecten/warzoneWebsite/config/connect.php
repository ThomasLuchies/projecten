<?php
    try
    {
        $conn = mysqli_connect("localhost", "root", "","tournaments");
    }
    catch(Exeption $e)
    {
        echo "could not connect to the database " + $e;
    }
?>
