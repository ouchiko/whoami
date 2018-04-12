<?php
$mysql = [
    "host" => $_SERVER['mysql-host'],
    "database" => "IP2",
    "user" => $_SERVER['mysql-user'],
    "password" => $_SERVER['mysql-password']
];

$GLOBALS['db'] = new \PDO(
    sprintf(
        "mysql:host=%s;dbname=%s;charset=utf8",
        $mysql['host'],
        $mysql['datbase']
    ),
    $mysql['user'],
    $mysql['password']
);

$GLOBALS['db']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
