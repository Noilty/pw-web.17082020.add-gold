<?php
require_once ('config.php');

function auth($login, $passwd) {
    $passHash = base64_encode(md5($login.$passwd, true));
    $userSearch = MySQL_Query("select * from `users` WHERE `name`='$login'");
    $userData = mysql_fetch_assoc($userSearch);

    if ($userData['passwd'] === $passHash) {
        $_SESSION['auth'] = true;
        $_SESSION['userId'] = $userData['ID'];
    } else {
        $_SESSION['auth'] = false;
    }
}

function addGold($userId) {
    if (MySQL_Query("call usecash({$userId},1,0,1,0,".GOLD.",1,@error)")) {
        echo 'Голд выдан';
    } else {
        echo 'Голд не выдан';
    }
}

function logout() {
    $_SESSION['auth'] = '';
}

if (isset($_POST['auth'])) {
    auth($_POST['gameLogin'], $_POST['gamePasswd']);
}

if (isset($_POST['goLogout'])) {
    logout();
}

if (isset($_POST['goCash'])) {
    addGold($_SESSION['userId']);
}