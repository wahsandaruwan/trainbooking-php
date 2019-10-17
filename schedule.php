<!DOCTYPE html>
<?php

$link = mysqli_connect("localhost","root","");
mysqli_select_db($link,"train");

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Train Booking System</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <header>

        <div class="topnav">
        <a href="index.php">Booking</a>
        <a class="active" href="schedule.php">Schedule</a>
        
        </div>

    </header>

    <div><img src="img/header.jpg" alt="" width=100%></div>
    
    <div>
            
            <?php
            // display schedule
                    $res = mysqli_query($link,"select train.train_id,train.train_name,start_time,end_time,route.route_no,starting_place,ending_place from train inner join t_time on (train.time_id = t_time.time_id) inner join route on (train.route_no = route.route_no)");
                    
                    echo "<center>";
                    echo"<table border=1>";
                    
                    echo "<tr>";
                            echo "<th>"; echo "Train ID"; echo "</th>";
                            echo "<th>"; echo "Train Name"; echo "</th>";
                            echo "<th>"; echo "Start Time"; echo "</th>";
                            echo "<th>"; echo "End Time"; echo "</th>";
                            echo "<th>"; echo "Route Number"; echo "</th>";
                            echo "<th>"; echo "Starting Place"; echo "</th>";
                            echo "<th>"; echo "Ending Place"; echo "</th>";
                            
                    echo "</tr>";
                    while($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                            echo "<td>"; echo $row["train_id"]; echo "</td>";
                            echo "<td>"; echo $row["train_name"]; echo "</td>";
                            echo "<td>"; echo $row["start_time"]; echo "</td>";
                            echo "<td>"; echo $row["end_time"]; echo "</td>";
                            echo "<td>"; echo $row["route_no"]; echo "</td>";
                            echo "<td>"; echo $row["starting_place"]; echo "</td>";
                            echo "<td>"; echo $row["ending_place"]; echo "</td>";
                            
                        echo "</tr>";
                    }
                    
                    echo"</table>";
                    echo"</center>";

            ?>
                    
    
    </div>

    <footer>

        <p><center>Copyrigth &copy; CGR</center></p>

    </footer>
    
</body>
</html>