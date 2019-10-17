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
        <a href="show.php">Display Train Data</a>
        <a class="active" href="search.php">Search Train Data</a>
        <a href="insert1.php">Insert Customer Data</a>
        <a href="show1.php">Display Customer Data</a>
        <a href="search1.php">Search Customer Data</a>
        <a href="booking.php">Bookings</a>
        <a href="logout.php">Logout</a>
        </div>

    </header>

    <div><img src="../img/header.jpg" alt="" width=100%></div>
    
    <div>
    <!--search train details-->
    <h1><center>Train Data</center></h1>
       
    <center>
    <form method="post" name="se0" id="se0">
 
    <input type="text" placeholder="Search Train" name="str" id="str"><br><br>
    <input type="submit" name="strb" id="strb" value = "Search"><br><br>
    
    </form>
    </center><br><br>


    <?php
                   if(isset($_POST["strb"])){
                    $tr = $_POST['str'];
                    $res = mysqli_query($link,"select *from train where concat(train_id,train_name) LIKE '%".$tr."%'");
                    
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
                    echo"<br>";
                    echo"<br>";
                    echo"<br>";
                   }

    ?>

    <!--search route details-->
    <h1><center>Route Data</center></h1>
    <center>
    <form action="" method="post" name="se1" id="se1">
 
    <input type="text" placeholder="Search Route by No" name="sr" id="sr"><br><br>
    <input type="submit" name="srb" id="srb" value = "Search"><br><br>
    
    </form>
    </center><br><br>

    <?php
                   if(isset($_POST["srb"])){
                    $sr = $_POST['sr'];
                    $res = mysqli_query($link,"select *from route where concat(route_no,starting_place,ending_place) LIKE '%".$sr."%'");
                    
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
                    echo"<br>";
                    echo"<br>";
                    echo"<br>";
                   }

    ?>

    <!--search time details-->
    <h1><center>Time Data</center></h1>
    <center>
    <form action="" method="post" name="se2" id="se2">
 
    <input type="text" placeholder="Search Time by ID" name="st" id="st"><br><br>
    <input type="submit" name="stb" id="stb" value = "Search"><br><br>
    
    </form>
    </center><br><br>


    <?php
                   if(isset($_POST["stb"])){
                    $st = $_POST['st'];
                    $res = mysqli_query($link,"select *from t_time where concat(time_id,start_time,end_time) LIKE '%".$st."%'");
                    
                    echo "<center>";
                    echo"<table border=1>";
                    
                    echo "<tr>";
                            echo "<th>"; echo "Time ID"; echo "</th>";
                            echo "<th>"; echo "Start Time"; echo "</th>";
                            echo "<th>"; echo "End Time"; echo "</th>";
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
                    echo"<br>";
                    echo"<br>";
                    echo"<br>";
                   }

    ?>



    </div>

    <footer>

        <p><center>Copyrigth &copy; CGR</center></p>

    </footer>
    
</body>
</html>