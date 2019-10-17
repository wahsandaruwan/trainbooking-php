<?php
//For route
    $link = mysqli_connect("localhost","root","");
    mysqli_select_db($link,"train");

    $id = $_GET['id'];

    $del = mysqli_query($link,"delete from route where route_no = '$id'");

    header("location:show.php");

?>