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
        <a href="search.php">Search Train Data</a>
        <a href="insert1.php">Insert Customer Data</a>
        <a href="show1.php">Display Customer Data</a>
        <a href="search1.php">Search Customer Data</a>
        <a class="active" href="booking.php">Bookings</a>
        <a href="logout.php">Logout</a>
        
        </div>

    </header>

    <div><img src="../img/header.jpg" alt="" width=100%></div>
    
    <div>
    
    <h1><center>Train Data</center></h1>
   
    <?php
            // display booking data
                    $res = mysqli_query($link,"select booking.book_id,booking.date,booking.full_ticket,booking.half_ticket,booking.route_no,train.train_id,train_name,time_id,customer.cust_id,cust_name,cust_address,cust_tele from booking inner join train on (booking.train_id = train.train_id) inner join customer on (booking.cust_id = customer.cust_id)");
                    
                    echo "<center>";
                    echo"<table border=1>";
                    
                    echo "<tr>";
                            echo "<th>"; echo "Book ID"; echo "</th>";
                            echo "<th>"; echo "Book Date"; echo "</th>";
                            echo "<th>"; echo "Full Ticket"; echo "</th>";
                            echo "<th>"; echo "Half Ticket"; echo "</th>";
                            echo "<th>"; echo "Train ID"; echo "</th>";
                            echo "<th>"; echo "Train Name"; echo "</th>";
                            echo "<th>"; echo "Route Number"; echo "</th>";
                            echo "<th>"; echo "Time ID"; echo "</th>";
                            echo "<th>"; echo "Customer ID"; echo "</th>";
                            echo "<th>"; echo "Customer Name"; echo "</th>";
                            echo "<th>"; echo "Customer Address"; echo "</th>";
                            echo "<th>"; echo "Customer Telephone"; echo "</th>";
                            echo "<th>"; echo "Delete"; echo "</th>";
                            
                    echo "</tr>";
                    while($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                            echo "<td>"; echo $row["book_id"]; echo "</td>";
                            echo "<td>"; echo $row["date"]; echo "</td>";
                            echo "<td>"; echo $row["full_ticket"]; echo "</td>";
                            echo "<td>"; echo $row["half_ticket"]; echo "</td>";
                            echo "<td>"; echo $row["train_id"]; echo "</td>";
                            echo "<td>"; echo $row["train_name"]; echo "</td>";
                            echo "<td>"; echo $row["route_no"]; echo "</td>";
                            echo "<td>"; echo $row["time_id"]; echo "</td>";
                            echo "<td>"; echo $row["cust_id"]; echo "</td>";
                            echo "<td>"; echo $row["cust_name"]; echo "</td>";
                            echo "<td>"; echo $row["cust_address"]; echo "</td>";
                            echo "<td>"; echo $row["cust_tele"]; echo "</td>";

                            ?>
                            <td><a href="deleteb.php?id=<?php echo $row["book_id"];?>">Delete</a></td>
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