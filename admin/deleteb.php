<?php
//For bookings
    $link = mysqli_connect("localhost","root","");
    mysqli_select_db($link,"train");

    $id = $_GET['id'];

    $del = mysqli_query($link,"delete from booking where book_id = '$id'");

    header("location:booking.php");

?>