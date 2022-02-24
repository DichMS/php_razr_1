<?php
    require("header.html");
    require ("menu.html");
?>
    <form>
        <input type="text" name="workname" class="form-control" value=" " aria-label="Large" aria-describedby="inputGroup-sizing-sm" style="margin: 10px">
        <input type="submit" name="add_work" value="Добавить дело" style="margin: 10px">
    </form>
<?php
    if (isset($_REQUEST['workname']))
    {
        $host="localhost";
        $user="root";
        $pass="";
        $db="users";

        $con = mysqli_connect($host, $user, $pass) or die("connection error");
        mysqli_select_db($con, $db) or die("db error");

        if (isset($_REQUEST['add_work']))
        {
            $deloname = $_REQUEST['workname'];
            $add = "INSERT INTO `dela`(`id`, `delo`) VALUES (NULL, '$deloname')";

            mysqli_query($con, $add);
            header("Location: /php_razr_1/index.php");
        }
    }
    else
    {
        print("Задайте имя делу!");
    }
?>

    <?php
require("footer.html");
?>