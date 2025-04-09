<?php
$user = 'root'; // пользователь
$password = ''; // пароль
$db = 'vcard'; // название бд
$host = 'localhost'; // хост
$charset = 'utf8'; // кодировка

//Создаём подключение
$dsn = "mysql:host=$host;dbname=$db";
try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Подключение успешно!";
} catch (PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
}