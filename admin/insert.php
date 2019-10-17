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
        <a class="active" href="insert.php">Insert Train Data</a>
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
    
        <!-- Insert Time and Route -->
        <form name="myform" action="" method="post">
        <center>
        <h1>Route Details</h1>
            
            <input type="text" name="sp" id="sp" placeholder="Starting Place" required><br><br>

            <input type="text" name="ep" id="ep" placeholder="Ending Place" required><br><br>
        
        
        <h1>Time Details</h1>
            
            <input type="text" name="st" id="st" placeholder="Starting Time" required><br><br>

            <input type="text" name="et" id="et" placeholder="Ending Time" required><br><br>

            <input type="submit" name="submit2" id="submit2" value="Insert">
        
        </center>
        </form>

        <?php

            if(isset($_POST["submit2"])){

                    $sp = $_POST['sp'];
                    $ep = $_POST['ep'];
                    //Query Updated
                    mysqli_query($link,"insert into route(starting_place,ending_place) values('$sp','$ep')");

                    $st = $_POST['st'];
                    $et = $_POST['et'];
                    //Query Updated
                    mysqli_query($link,"insert into t_time(start_time,end_time) values('$st','$et')");


                    ?>
                    <script>
                    
                        alert("Sucessfully added!");
                    
                    </script>
                    <?php
                    
                    

            }

        ?>

        <!-- Insert Train-->
        <form name="myform" action="" method="post">
        <center>
        <h1>Train Details</h1>
                    <select name="ron1" id="ron1" required>
                                    <option value="rn">Select Route Number</option>
                        <?php
                                $res = mysqli_query($link,"select route_no from route");
                                while($row = mysqli_fetch_array($res)){
                                    ?>
                                    <option value="<?php echo $row["route_no"];?>"><?php echo $row["route_no"];?></option>
                                    <?php
                                }

                        ?>
                    </select><br><br>

                    <select name="tid1" id="tid1" required>
                                    <option value="rn">Select Time ID</option>
                        <?php
                                $res = mysqli_query($link,"select time_id from t_time");
                                while($row = mysqli_fetch_array($res)){
                                    ?>
                                    <option value="<?php echo $row["time_id"];?>"><?php echo $row["time_id"];?></option>
                                    <?php
                                }

                        ?>
                    </select><br><br>
            <input type="text" name="tn" id="tn" placeholder="Train Name" required><br><br>

            <input type="submit" name="submit3" id="submit3" value="Insert">
        
        </center>
        </form>

        <?php

        if(isset($_POST["submit3"])){
                $tn = $_POST['tn'];
                $ron1 = $_POST['ron1'];
                $tid1 = $_POST['tid1'];
                //Query Updated
                mysqli_query($link,"insert into train(train_name,route_no,time_id) values('$tn','$ron1','$tid1')");



                ?>
                <script>
                
                    alert("Train sucessfully added!");
                
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