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
        <a class="active" href="index.php">Booking</a>
        <a href="schedule.php">Schedule</a>
        
        </div>

    </header>

    <div><img src="img/header.jpg" alt="" width=100%></div>
    
    <div>
    
        <!-- Booking Details -->
        <form name="myform" action="" method="post">
        <center>
        <h1>Book Train</h1>
            <input type="number" name="uid" id="uid" placeholder="Customer ID" required><br><br>
            
                
                    <select name="route_no" id="route_no" required>
                        <option value="rn">Select Route Number</option>
            <?php
                    $res = mysqli_query($link,"select route_no from route");
                    while($row = mysqli_fetch_array($res)){
                        ?>
                        <option value="<?php echo $row["route_no"];?>"><?php echo $row["route_no"];?></option>
                        <?php
                    }

            ?>
                    </select><br>
           
            <p><a href="schedule.php">View train schedule</a></p>

            <input type="number" name="tid" id="tid" placeholder="Train ID" required><br><br>
            
            <input type="text" name="date" id="date" placeholder="2018-10-28" required><br><br>

            <input type="number" name="f_t" id="f_t" placeholder="Full Tickets" required><br><br>
            
            <input type="number" name="h_t" id="h_t"  placeholder="Half Tickets" required><br><br>

            <input type="submit" name="submit1" id="submit1" value="Book">
        
        </center>
        </form>

        <?php
            // Insert booking data in to the database
            if(isset($_POST["submit1"])){

                $userid = $_POST['uid']; // Customer Id 

                $trainid = $_POST['tid']; //Train Id

                $sql_uid = "select * from customer where cust_id = '$userid'";

                $sql_tid = "select * from train where train_id = '$trainid'";

                $res_uid = mysqli_query($link,$sql_uid);

                $res_tid = mysqli_query($link,$sql_tid);


                $tid = $_POST['tid'];
                $uid = $_POST['uid'];
                $route_no = $_POST['route_no'];
                $date = $_POST['date'];
                $f_t = $_POST['f_t'];
                $h_t = $_POST['h_t'];
                


                if(mysqli_num_rows($res_uid)<=0 || mysqli_num_rows($res_tid)<=0){
                    ?>
                    <script>
                    
                        alert("Sorry! Invalid Customer ID or Train ID");
                    
                    </script>
                    <?php
                }

                else{
                    //Query Updated
                    mysqli_query($link,"insert into booking(train_id,cust_id,route_no,date,full_ticket,half_ticket) values('$tid','$uid','$route_no','$date','$f_t','$h_t')");
                    ?>
                    <script>
                    
                        alert("Successfully Booked!");
                    
                    </script>
                    <?php
                    }

            }

        ?>
    
    </div>

    <footer>

        <p><center>Copyrigth &copy; CGR</center></p>

    </footer>
    
</body>
</html>