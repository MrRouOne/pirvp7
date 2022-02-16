<?php
// Подключаем сессию и базу данных
require_once '../connect.php';
// Получаем все записи из таблицы
$query = "SELECT * FROM service_carts WHERE user = '$USER_ID'";
$res = mysqli_query($mysqli, $query);
if (!$res) die (mysqli_error($mysqli));
// Выводим информацию
while ($row = mysqli_fetch_assoc($res)) {
    $service = $row['service'];
    $id = $row['id'];
    $query2 = "SELECT * FROM services WHERE id = '$service'";

    $res2 = mysqli_query($mysqli, $query2);
    if (!$res2) die (mysqli_error($mysqli));

    $row2 = mysqli_fetch_assoc($res2);
        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];

        $button = "<form action='cart.php' method='post'>
                    <input  type='hidden' name='id' value=$id>
                    <input  type='submit' class='btn btn-danger' name='submit' value='Удалить'>
                    </form>";

        // Если сессия не пуста (пользователь авторизован), то разрешаем пользователю редактировать
        // и удалять запись, иначе просто выводим информацию
        echo "<div style='margin-top: 40px;' class='card'>
        <div class='card-body'>
            <h4 class='card-title'>$title</h4>
            <p class='card-text'>$description</p>
            <p class='card-text text-danger'>$price руб.</p>          
            $button   
        </div>
    </div>";

}

?>