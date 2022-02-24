<?php
/*
 * 1. верстка (дело\ред\удалить —> на другую html)
 * ниже под таблицей поле + кнопка добавить
 * create, read, update and delete
 * страница должна быть доступна только авторизованным пользователям
 */

    if (isset($_REQUEST['send']))
    {
        if ($_REQUEST['login'] != "" && $_REQUEST['password'] != "")
        {
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "users";

            $con = mysqli_connect($host, $user, $pass) or die("connection error");
            mysqli_select_db($con, $db) or die("db error");

            $s = "SELECT * FROM `user` WHERE `login`='".$_REQUEST['login']."'and `password`='".$_REQUEST['password']."'";
            $res = mysqli_query($con, $s);

            $user = mysqli_fetch_assoc($res);
            if (empty($user))
            {
                print("Неверный логин или пароль");
            }
            else
            {
                session_start();
                $_SESSION["login"] = $user["login"];
                $_SESSION["password"] = $user["password"];

                header("Location: /php_razr_1/user_panel.php");
            }
        }
        else
        {
            print("Введите логин и пароль!");
        }
    }
?>

<div tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-5 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h2 class="fw-bold mb-0">Авторизация</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form class="">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-4" id="floatingInput" name="login" placeholder="name@example.com">
                        <label for="floatingInput"> Логин </label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control rounded-4" id="floatingPassword" name="password" placeholder="Пароль">
                        <label for="floatingPassword">Пароль</label>
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit" name="send">Авторизация</button>
                </form>
            </div>
        </div>
    </div>
</div>