<?php
// Подключаем сессию и базу данных
session_start();
require_once '../connect.php';

// Получаем все записи из таблицы
$query = "SELECT * FROM services";
$res = mysqli_query($mysqli, $query);
if (!$res) die (mysqli_error($mysqli));

// Выводим информацию
while ($row = mysqli_fetch_assoc($res)) {
    $title = $row['title'];
    $description = $row['description'];
    $price = $row['price'];

    // Если сессия не пуста (пользователь авторизован), то разрешаем пользователю редактировать
    // и удалять запись, иначе просто выводим информацию

    echo "<div style='margin-top: 40px;' class='card'>
        <div class='card-body'>
            <h4 class='card-title'>$title</h4>
            <p class='card-text'>$description</p>
            <p class='card-text text-danger'>$price руб.</p>
        </div>
    </div>";

}
?>