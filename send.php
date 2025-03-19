<?php
echo 'Привет ' . htmlspecialchars($_REQUEST["name"]) . '!';
echo 'Вы ищете ' . $_POST["q"] . '!';
echo $_POST["file"];
//header("Location: index.html");
?>