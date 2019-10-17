<?php
//For Train
    $link = mysqli_connect("localhost","root","");
    mysqli_select_db($link,"train");

    $id = $_GET['id'];

    $del = mysqli_query($link,"delete from train where train_id = '$id'");

    header("location:show.php");

?>