<?php
//var_dump($_POST);
include 'config.php'; // Файл с настройками базы данных

// выполняем SQL-выражение
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = $_POST['category'];
    $type = $_POST['type'];
    $size = $_POST['size'];
    $qual = $_POST['qual'];

    $stmt = "INSERT INTO tovar (category, type, size, qual) VALUES (?,?,?,?)";
    $stmt = $pdo->prepare($stmt);
    // через массив передаем значения параметрам по позиции
    $rowsNumber = $stmt->execute(array($category, $type, $size, $qual));
    if ($rowsNumber) {
        header('Location: /');
        //echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
 }