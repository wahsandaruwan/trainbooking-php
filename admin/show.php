<!DOCTYPE html>
<?php

session_start();

if($_SESSION["admin"]==""){

   header("location:index.php");
}

$link = mysqli_connect("localhost","root","");
mysqli_select_db($link,"train");

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Train Booking System</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <header>

        <div class="topnav">
        <a href="insert.php">Insert Train Data</a>
        <a class="active" href="show.php">Display Train Data</a>
        <a href="search.php">Search Train Data</a>
        <a href="insert1.php">Insert Customer Data</a>
        <a href="show1.php">Display Customer Data</a>
        <a href="search1.php">Search Customer Data</a>
        <a href="booking.php">Bookings</a>
        <a href="logout.php">Logout</a>
        
        </div>

    </header>

    <div><img src="../img/header.jpg" alt="" width=100%></div>
    
    <div>
    
    <h1><center>Train Data</center></h1>
   
    <?php
            // display train,route and time data
                    $res = mysqli_query($link,"select *from train");
                    
                    echo "<center>";
                    echo"<table border=1>";
                    
                    echo "<tr>";
                            echo "<th>"; echo "Train ID"; echo "</th>";
                            echo "<th>"; echo "Train Name"; echo "</th>";
                            echo "<th>"; echo "Route Number (FK)"; echo "</th>";
                            echo "<th>"; echo "Time ID (FK)"; echo "</th>";
                            echo "<th>"; echo "Edit"; echo "</th>";
                            echo "<th>"; echo "Delete"; echo "</th>";
                            
                    echo "</tr>";
                    while($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                            echo "<td>"; echo $row["train_id"]; echo "</td>";
                            echo "<td>"; echo $row["train_name"]; echo "</td>";
                            echo "<td>"; echo $row["route_no"]; echo "</td>";
                            echo "<td>"; echo $row["time_id"]; echo "</td>";

                            ?>
                            <td><a href="edit.php?id=<?php echo $row["train_id"];?>">Edit</a></td>
                            <td><a href="delete.php?id=<?php echo $row["train_id"];?>">Delete</a></td>
                            <?php

                        echo "</tr>";
                    }
                    
                    echo"</table>";
                    echo"</center>";

            ?>


            <h1><center>Route Data</center></h1>
    <?php
            // display data
                    $res = mysqli_query($link,"select *from route");
                    
                    echo "<center>";
                    echo"<table border=1>";
                    
                    echo "<tr>";
                            echo "<th>"; echo "Route Number"; echo "</th>";
                            echo "<th>"; echo "Starting Place"; echo "</th>";
                            echo "<th>"; echo "Ending Place"; echo "</th>";
                            echo "<th>"; echo "Edit"; echo "</th>";
                            echo "<th>"; echo "Delete"; echo "</th>";
                            
                    echo "</tr>";
                    while($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                            echo "<td>"; echo $row["route_no"]; echo "</td>";
                            echo "<td>"; echo $row["starting_place"]; echo "</td>";
                            echo "<td>"; echo $row["ending_place"]; echo "</td>";

                            ?>
                            <td><a href="edit1.php?id=<?php echo $row["route_no"];?>">Edit</a></td>
                            <td><a href="delete1.php?id=<?php echo $row["route_no"];?>">Delete</a></td>
                            <?php

                        echo "</tr>";
                    }
                    
                    echo"</table>";
                    echo"</center>";

            ?>

            <h1><center>Time Data</center></h1>
    <?php
            // display data
                    $res = mysqli_query($link,"select *from t_time");
                    
                    echo "<center>";
                    echo"<table border=1>";
                    
                    echo "<tr>";
                            echo "<th>"; echo "Time ID"; echo "</th>";
                            echo "<th>"; echo "Starting Time"; echo "</th>";
                            echo "<th>"; echo "Ending Time"; echo "</th>";
                            echo "<th>"; echo "Edit"; echo "</th>";
                            echo "<th>"; echo "Delete"; echo "</th>";
                            
                    echo "</tr>";
                    while($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                            echo "<td>"; echo $row["time_id"]; echo "</td>";
                            echo "<td>"; echo $row["start_time"]; echo "</td>";
                            echo "<td>"; echo $row["end_time"]; echo "</td>";

                            ?>
                            <td><a href="edit2.php?id=<?php echo $row["time_id"];?>">Edit</a></td>
                            <td><a href="delete2.php?id=<?php echo $row["time_id"];?>">Delete</a></td>
                            <?php

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