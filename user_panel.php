<table border=1>
<tr>
    <td> Список дел </td>
    <td> Редактировать </td>
    <td> Удалить </td>
</tr>
<?php
    require ("header.html");
    require ("menu.html");

    $host="localhost";
    $user="root";
    $pass="";
    $db="users";

    $con = mysqli_connect($host, $user, $pass) or die ("no connection");
    mysqli_select_db($con, $db) or die ("no db");

    $s = "select * from dela";

    $result = mysqli_query($con, $s);
    while ($row = mysqli_fetch_row($result))
    {
        print("<tr>");
        print("<td>".$row[1]."</td>");
        print("<td><a class='nav-link' href='update.php?id=".$row[0]."'>Редактировать</a>");
        print("<td><a class='nav-link' href='delete.php?id=".$row[0]."'>Удалить</a>");
        print("</tr>");
    }

?>

