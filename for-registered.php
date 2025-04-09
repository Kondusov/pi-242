<?php
//var_dump($_POST);
include 'config.php'; // Файл с настройками базы данных


// выполняем SQL-выражение
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    // $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];

    $stmt = "INSERT INTO users (username, email) VALUES ('test-one', 'emailTestOne')";
    echo($username);
    //die();
    if ($pdo->exec($stmt)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
 }