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
        <a class="active" href="insert1.php">Insert Customer Data</a>
        <a href="show1.php">Display Customer Data</a>
        <a href="search1.php">Search Customer Data</a>
        <a href="booking.php">Bookings</a>
        <a href="logout.php">Logout</a>
        
        
        </div>

    </header>

    <div><img src="../img/header.jpg" alt="" width=100%></div>
    
    <div>
    
        
        
        <!-- Insert Customer-->
        <form name="myform" action="" method="post">
        <center>
        <h1>Customer Details</h1>
                   
            <input type="text" name="cn" id="cn" placeholder="Name" required><br><br>

            <input type="text" name="cad" id="cad" placeholder="Address" required><br><br>

            <input type="number" name="ct" id="ct" placeholder="Telephone" required><br><br>

            <input type="submit" name="submit3" id="submit3" value="Insert">
        
        </center>
        </form>

        <?php
        
        
        if(isset($_POST["submit3"])){
                $cn = $_POST['cn'];
                $cad = $_POST['cad'];
                $ct = $_POST['ct'];
                //Query Updated
                mysqli_query($link,"insert into customer(cust_name,cust_address,cust_tele) values('$cn','$cad','$ct')");



                ?>
                <script>
                
                    alert("Customer sucessfully added!");
                
                </script>
                <?php 
                
                

        }

        ?>
    
    </div>

    <footer>

        <p><center>Copyrigth &copy; CGR</center></p>

    </footer>
    
</body>
</html>