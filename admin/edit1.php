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
            $m = mysqli_query($link,"select *from route where route_no = '$id'");
            $res = mysqli_fetch_array($m);

            // update route
            if(isset($_POST["submit1"])){

                $sp = $_POST['sp'];
                $ep = $_POST['ep'];

                $edit = mysqli_query($link,"update route set starting_place = '$sp', ending_place = '$ep' where route_no = '$id'");

                if(!$edit){
                    echo mysqli_error();
                }

                else{
                    header("location:show.php");
                }

            }
        ?>

        <!-- Update Route -->
        <form name="myform" action="" method="post">
        <center>
        <h1>Edit Route Details</h1>
            <input type="text" name="sp" id="sp" value="<?php echo $res['starting_place'];?>" placeholder="Train Name" required><br><br>

            <input type="text" name="ep" id="ep" value="<?php echo $res['ending_place'];?>" placeholder="Train Name" required><br><br>

            <input type="submit" name="submit1" id="submit1" value="Edit">
        
        </center>
        </form>
    
    </div>

    <footer>

        <p><center>Copyrigth &copy; CGR</center></p>

    </footer>
    
</body>
</html>