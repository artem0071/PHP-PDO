<?php
return [
    'connection' => 'mysql:host=127.0.0.1',
    'name' => 'test1',
    'username' => 'root',
    'password' => '',
    'options' => [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
];