<?php
//var_dump($_POST);
include 'config.php'; // Файл с настройками базы данных

// выполняем SQL-выражение
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = $_POST['category'];
    $type = $_POST['type'];
    $size = $_POST['size'];
    $qual = $_POST['qual'];

/////////
try{
    $stmt = $pdo->prepare("SELECT id FROM tovar WHERE category=? AND type=? AND size=?");
    $stmt->execute([$category, $type, $size]);
    if ($stmt->fetch()) {
        header("Location: /?error=product_exists");
        exit();
    }
    $insert = $pdo->prepare("INSERT INTO tovar (category, type, size, qual) VALUES (?,?,?,?)");
        if ($insert->execute([$category, $type, $size, $qual])) {
            header("Location: /?success=product_added");
            exit();
        }
    }catch (PDOException $e){
        error_log("DB error: " . $e->getMessage());
        header("Location: /?error=db_error");
        exit();
    }
/////////

    // $stmt = "INSERT INTO tovar (category, type, size, qual) VALUES (?,?,?,?)";
    // $stmt = $pdo->prepare($stmt);
    // // через массив передаем значения параметрам по позиции
    // $rowsNumber = $stmt->execute(array($category, $type, $size, $qual));
    // if ($rowsNumber) {
    //     header('Location: /');
    //     //echo "Registration successful!";
    // } else {
    //     echo "Error: " . $stmt->errorInfo()[2];
    // }
 }