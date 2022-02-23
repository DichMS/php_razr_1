<?php
    $host="localhost";
    $user="root";
    $pass="";
    $db="users";

    $con = mysqli_connect($host, $user, $pass) or die ("no connection");
    mysqli_select_db($con, $db) or die ("no db");

    $id = $_REQUEST['id'];

    $s = "DELETE FROM `dela` WHERE id = '$id' ";

    mysqli_query($con, $s);
    header('Location: /php_bd_books/index.php');
?>