<?php
    include 'config.php'; // Файл с настройками базы данных
?>
<div>
<div class="bd-example">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Категория</th>
        <th scope="col">Тип</th>
        <th scope="col">Размер</th>
        <th scope="col">Колличество</th>
      </tr>
    </thead>
    <tbody>
        <?php
            // выполняем SQL-выражение
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $sql = "SELECT * FROM tovar";
                $result = $pdo->query($sql);
                //$result = $result->fetch();
                $colors = ['table-secondary', 'table-primary', 'table-success', 'table-danger', 'table-warning', 'table-info'];
                $colorIndex = 0;
                foreach($result as $row){
                  $id = $row["id"];
                  $category = $row["category"];
                  $type = $row["type"];
                  $size = $row["size"];
                  $qual = $row["qual"];
                  $colorClass = $colors[$colorIndex % count($colors)];
                  $colorIndex++;
                    // отрисовка ячеек в таблице
                    echo('<tr class='.$colorClass.'>');
                    echo('<th scope="row">'.$id.'</th>');
                    echo('<td>'.$category.'</th>');
                    echo('<td>'.$type.'</th>');
                    echo('<td>'.$size.'</th>');
                    echo('<td>'.$qual.'</th>');
                    echo('</tr>');
                }
            }
        ?>
    </tbody>
  </table>
</div>
<?php
// Обработка сообщений
if (isset($_GET['success'])) {
    switch ($_GET['success']) {
        case '1':
            echo '<div class="alert alert-success">Количество товара успешно обновлено!</div>';
            break;
        case 'product_added':
            echo '<div class="alert alert-success">Товар успешно добавлен!</div>';
            break;
    }
}

if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'update_failed':
            echo '<div class="alert alert-danger">Не удалось обновить количество товара</div>';
            break;
        case 'product_exists':
            echo '<div class="alert alert-danger">Товар с такими параметрами уже существует!</div>';
            break;
        case 'db_error':
            echo '<div class="alert alert-danger">Ошибка базы данных</div>';
            break;
    }
}
?>
<div class="add_tovar_form">
    <br>
<form action="add_tovar.php" method="POST">
    <h2>Добавление товара.</h2>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Категория товара</label>
    <input type="text" class="form-control" id="category" name="category" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Тип товара</label>
    <input type="text" class="form-control" id="text" name="type">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Размер</label>
    <input type="number" class="form-control" id="size" name="size">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Колличество</label>
    <input type="number" class="form-control" id="qual" name="qual">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Заготовка</label>
  </div>
  <button type="submit" class="btn btn-primary">Отправить</button>
</form>
</div>
<br>
        </div>
        <div></div>
        <div></div>