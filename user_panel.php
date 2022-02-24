<?php
    require ("header.html");
    require ("menu.html");
?>

<table class="table table-bordered" style="margin: 10px">
<tr class="table-active">
    <td> Список дел </td>
    <td>  </td>
    <td>  </td>
</tr>
<?php
    session_start();


    print("<h2>Добро пожаловать, ".$_SESSION["login"]."!</h2>");

    $host="localhost";
    $user="root";
    $pass="";
    $db="users";

    $con = mysqli_connect($host, $user, $pass) or die ("no connection");
    mysqli_select_db($con, $db) or die ("no db");

    if (isset($_REQUEST['add_work']))
    {
        header("Location: /php_razr_1/add_work.php");
    }


    $s = "select * from dela";

    $result = mysqli_query($con, $s);
    while ($row = mysqli_fetch_row($result))
    {
        print("<tr>");
        print("<td>" . $row[1] . "</td>");
        print("<td><a class='nav-link' href='update.php?id=".$row[0]."&work=".$row[1]."'>Редактировать</a>");
        print("<td><a class='nav-link' href='delete.php?id=".$row[0]."'>Удалить</a>");
        print("</tr>");
    }

    if (isset($_REQUEST['exit_from_panel']))
    {
        session_destroy();
        session_abort();
        header("Location: /php_razr_1/index.php");
        exit;
    }

?>
</table>

<form>
    <input type="submit" name="add_work" value="Добавить дело" style="margin: 10px">
    <input type="submit" name="exit_from_panel" value="Выйти" style="margin: 10px">
</form>

<?php
    require("footer.html");
?>
