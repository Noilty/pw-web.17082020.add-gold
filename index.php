<?php
require_once ('script.php');
?>
<meta http-equiv="content-type" content="text/html" ; charset="UTF-8" />
<? if (!$_SESSION['auth']) { ?>
    <form method="post">
        <input type="text" name="gameLogin" placeholder="Логин">
        <input type="password" name="gamePasswd" placeholder="Пароль">
        <button type="submit" name="auth">Войти</button>
    </form>
<? } else { ?>
    <form method="post">
        <h1><?=$_SESSION['userId']?></h1>
        <button type="submit" name="goCash">Получить золото</button>
        <button type="submit" name="goLogout">Выйти</button>
    </form>
<? } ?>