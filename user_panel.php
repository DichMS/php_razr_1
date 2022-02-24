<table class="table table-bordered">
<tr class="table-active">
    <td> Список дел </td>
    <td>  </td>
    <td>  </td>
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

    print("BLYAD");
    if (isset($_REQUEST['add_work']))
    {
        print("ROT EBAL");
        $deloname = $_REQUEST['workname'];
        $add = "INSERT INTO `dela`(`id`, `delo`) VALUES (NULL, '$deloname')";
        mysqli_query($con, $add);
    }
    $s = "select * from dela";

    $result = mysqli_query($con, $s);
    while ($row = mysqli_fetch_row($result)) {
        print("<tr>");
        print("<td>" . $row[1] . "</td>");
        print("<td><a class='nav-link' href='update.php?id=".$row[0]."&work=".$row[1]."'>Редактировать</a>");
        print("<td><a class='nav-link' href='delete.php?id=".$row[0]."'>Удалить</a>");
        print("</tr>");
    }
    print("SUKA");
    if (isset($_REQUEST['exit']))
    {
        session_destroy();
        header("Location: /php_razr_1/index.php");
    }
?>
</table>

<form>
    <input type="text" name="workname" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" style="margin: 10px">
    <input type="submit" name="add_work" value="Добавить дело" style="margin: 10px">
    <input type="submit" name="exit" value="Выйти" style="margin: 10px">
</form>
