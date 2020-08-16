<?php
header('Content-Type: text/html; charset=utf-8');

define('GOLD', 5000); // Кол-во голда которые будет выдано

$config = array
(
    'host'	=>	'localhost',	// Хост
    'user'	=>	'root',			// Имя пользователя
    'pass'	=>	'root',  // Пароль от БД
    'name'	=>	'pw',			// Название БД
);

$link = mysql_connect(
    $config['host'],
    $config['user'],
    $config['pass']
) or die ("Нет соединения с MySQL");
mysql_select_db($config['name'], $link)
or die ("Базы <b><font color=red>".$config['name']."</b></font> не существует");

session_start();