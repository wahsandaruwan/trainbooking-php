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
        <a href="booking.php">Bookings</a>
        <a href="logout.php">Logout</a>
        
        </div>

    </header>

    <div><img src="../img/header.jpg" alt="" width=100%></div>
    
    <div>
    
        

        <?php
            $id = $_GET['id'];
            $m = mysqli_query($link,"select *from customer where cust_id = '$id'");
            $res = mysqli_fetch_array($m);

            // update customer data
            if(isset($_POST["submit1"])){

                $cname = $_POST['cname'];
                $cad = $_POST['cad'];
                $ctel = $_POST['ctel'];

                $edit = mysqli_query($link,"update customer set cust_name = '$cname', cust_address = '$cad', cust_tele = '$ctel' where cust_id = '$id'");

                if(!$edit){
                    echo mysqli_error();
                }

                else{
                    header("location:show1.php");
                }

            }
        ?>

        <!-- Update Customer -->
        <form name="myform" action="" method="post">
        <center>
        <h1>Edit Customer Details</h1>
            <input type="text" name="cname" id="cname" value="<?php echo $res['cust_name'];?>" placeholder="Customer Name" required><br><br>
            <input type="text" name="cad" id="cad" value="<?php echo $res['cust_address'];?>" placeholder="Customer Address" required><br><br>
            <input type="number" name="ctel" id="ctel" value="<?php echo $res['cust_tele'];?>" placeholder="Customer Telephone" required><br><br>

            <input type="submit" name="submit1" id="submit1" value="Edit">
        
        </center>
        </form>
    
    </div>

    <footer>

        <p><center>Copyrigth &copy; CGR</center></p>

    </footer>
    
</body>
</html>