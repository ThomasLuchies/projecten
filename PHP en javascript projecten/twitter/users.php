<div id="users">
                <h2>New users</h2>
                    <hr>
                    <?php
                        $sqlusers = "SELECT userid,username, picture FROM users ORDER BY userid DESC";
                        if($stmt = mysqli_prepare($connect, $sqlusers)){
                            $result = mysqli_stmt_execute($stmt);
                            mysqli_stmt_bind_result($stmt, $ID, $usernamedb, $pictureuser);
                            if($result == false){
                                echo "could not display users";
                            }
                            else{
                                echo "<ol>";
                                for($x = 0; $x < 5; $x++){
                                    mysqli_stmt_fetch($stmt);
                                    echo "<a href='profile.php?action=". $ID .  "'><li><img src='" . $pictureuser . "'alt='profilepicture' align='left'><h3>" . $usernamedb . "<h3></li></a>";
                                }
                                echo "</ol>";
                            }
                            mysqli_stmt_close($stmt);
                        }
                    ?>
                </div>
