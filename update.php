<form>
    <input type="text" name="workname" value="<?php print($_REQUEST['work']); ?>" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" style="margin: 10px">;
    <input type="submit" name="add_work" value="Изменить дело" style="margin: 10px">;
    <input type="hidden" value="<?php print($_REQUEST['id']); ?> >
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
            $delo = $_REQUEST['workname'];
            $s = "UPDATE `delo` SET `delo`='$delo'";

            mysqli_query($con, $s);
            header("Location: /php_razr_1/index.php");
        }
    }
