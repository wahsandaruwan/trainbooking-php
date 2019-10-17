<!DOCTYPE html>
<?php
session_start();

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
        
        
        </div>

    </header>

    <div><img src="../img/header.jpg" alt="" width=100%></div>
    
    <div>
    
        <!-- Login Form -->
        <form name="myform" action="" method="post">
        <center>
        <h1>LOGIN</h1>
            
            <input type="text" name="username" id="username" placeholder="Username" required><br><br>

            <input type="password" name="password" id="password" placeholder="Password" required><br><br>

            <input type="submit" name="lg" id="lg" value="Login">
        
        
        </form>

        <?php
                //Login Form
                $message="";
                if(!empty($_POST["lg"])) {

                    $username = $_POST['username'];
                    $pass = $_POST['password'];

                    $sql1 = "select * from cgr where username = '$username'";

                    $sql2 = "select * from cgr where password = '$pass'";

                    $res1 = mysqli_query($link,$sql1);

                    $res2 = mysqli_query($link,$sql2);


                    if(mysqli_num_rows($res1)<=0 && mysqli_num_rows($res2)<=0){
                        ?>
                        <script>
                        
                            alert("Sorry! Invalid Username or Password");
                        
                        </script>
                        <?php
                    }

                    else{
                        $res = mysqli_query($link,"select * from cgr where username='$_POST[username]' && password='$_POST[password]'");
                        while($row=mysqli_fetch_array($res)){

                            $_SESSION["admin"] = $row["username"];

                                    header("location:insert.php");
                        
                            }
                    }
                }


        ?>

    </div>

    <footer>

        <p><center>Copyrigth &copy; CGR</center></p>

    </footer>
    
</body>
</html>