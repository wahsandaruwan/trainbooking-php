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
        <a class="active" href="search1.php">Search Customer Data</a>
        <a href="booking.php">Bookings</a>
        <a href="logout.php">Logout</a>
        </div>

    </header>

    <div><img src="../img/header.jpg" alt="" width=100%></div>
    
    <div>
    <!--search customer details-->
    <h1><center>Customer Data</center></h1>
       
    <center>
    <form method="post" name="se0" id="se0">
 
    <input type="text" placeholder="Search Customer" name="sc" id="sc"><br><br>
    <input type="submit" name="scb" id="scb" value = "Search"><br><br>
    
    </form>
    </center><br><br>


    <?php
                   if(isset($_POST["scb"])){
                    $sc = $_POST['sc'];
                    $res = mysqli_query($link,"select *from customer where concat(cust_id,cust_name,cust_address,cust_tele) LIKE '%".$sc."%'");
                    
                    echo "<center>";
                    echo"<table border=1>";
                    
                    echo "<tr>";
                            echo "<th>"; echo "Customer ID"; echo "</th>";
                            echo "<th>"; echo "Customer Name"; echo "</th>";
                            echo "<th>"; echo "Customer Address"; echo "</th>";
                            echo "<th>"; echo "Customer Telephone"; echo "</th>";
                            echo "<th>"; echo "Edit"; echo "</th>";
                            echo "<th>"; echo "Delete"; echo "</th>";
                            
                    echo "</tr>";
                    while($row = mysqli_fetch_array($res)){
                        echo "<tr>";
                            echo "<td>"; echo $row["cust_id"]; echo "</td>";
                            echo "<td>"; echo $row["cust_name"]; echo "</td>";
                            echo "<td>"; echo $row["cust_address"]; echo "</td>";
                            echo "<td>"; echo $row["cust_tele"]; echo "</td>";

                            ?>
                            <td><a href="editc.php?id=<?php echo $row["cust_id"];?>">Edit</a></td>
                            <td><a href="deletec.php?id=<?php echo $row["cust_id"];?>">Delete</a></td>
                            <?php

                        echo "</tr>";
                    }
                    
                    echo"</table>";
                    echo"</center>";
                    
                   }

    ?>

    

    </div>

    <footer>

        <p><center>Copyrigth &copy; CGR</center></p>

    </footer>
    
</body>
</html>