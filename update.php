<?php
    require("header.html");
    require ("menu.html");

    session_start();
?>

<form>
    <input type="text" name="workname" value="<?php print($_REQUEST['work']); ?>" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" style="margin: 10px">
    <input type="submit" name="add_work" value="Изменить дело" style="margin: 10px">
    <input type="hidden" name="id_num" value="<?php print($_REQUEST['id']); ?> >
</form>
<?php
    if (isset($_REQUEST['workname']))
    {
        require_once 'db_connect.php';

        if (isset($_REQUEST['add_work']))
        {
            $delo = $_REQUEST['workname'];
            $s = "UPDATE `dela` SET `delo`='$delo' where id=".$_REQUEST['id_num'];

            mysqli_query($con, $s);
            header("Location: /php_razr_1/user_panel.php");
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
