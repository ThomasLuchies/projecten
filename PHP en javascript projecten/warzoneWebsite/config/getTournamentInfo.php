<?php
    include("connect.php");
    $tournamentId = $_POST["tournamentId"];

    $sql = "SELECT tournamentName, tournamentType, startTime, endTime FROM tournaments WHERE tournamentId = ?";
    if($stmt = mysqli_prepare($conn, $sql))
    {
        mysqli_stmt_bind_param($stmt, "i", $tournamentId);
        if(mysqli_stmt_execute($stmt))
        {
            mysqli_stmt_bind_result($stmt, $tournamentName, $tournamentType, $startTime, $endTime);
            mysqli_stmt_fetch($stmt);
            $date = date("j M Y", strtotime(explode(" ", $startTime)[0]));
            $startTime = explode(" ", $startTime)[1];
            $endTime = explode(" ", $endTime)[1];
            $tournamentArray = array("tournamentName" => $tournamentName, "tournamentType" => $tournamentType, "date" => $date, "startTime" => $startTime, "endTime" => $endTime);
            echo json_encode($tournamentArray);
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
?>
