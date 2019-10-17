<?php
// For customers
    $link = mysqli_connect("localhost","root","");
    mysqli_select_db($link,"train");

    $id = $_GET['id'];

    $del = mysqli_query($link,"delete from customer where cust_id = '$id'");

    header("location:show1.php");

?>