<?php
    require ("header.html");
    require ("menu.html");

    if (session_status() == 0)
        header("Location: /php_razr_1/user_panel.php");
    else
        require ("login.php");

    require ("footer.html");
?>