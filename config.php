<?php

$user = 'root'; // пользователь

$password = ''; // пароль

$db = 'vcard'; // название бд

$host = 'localhost'; // хост

$charset = 'utf8'; // кодировка

// Создаём подключение

$pdo = new PDO("mysql:host=$host;dbname=$db;cahrset=$charset", $user, $password);


// $dsn = 'mysql:host=127.0.0.1;dbname=vcard';
// $username = 'root';
// $password = '';

// try {
//     $pdo = new PDO($dsn, $username, $password);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Подключение успешно!";
// } catch (PDOException $e) {
//     echo "Ошибка подключения: " . $e->getMessage();
// }