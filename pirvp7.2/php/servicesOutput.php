<?php
require_once '../connect.php';

$res = checkResult($mysqli,"SELECT * FROM services");

while ($row = mysqli_fetch_assoc($res)) {
    arrayKeyToVariable($row);

    if (checkRole($mysqli) === 'authorized') {
        $button = "<form action='cart.php' method='post'>
                    <input  type='hidden' name='id' value='$id'>
                    <input  type='submit' class='btn btn-primary' name='submit' value='Добавить'>
                    </form>";
    }
    if (checkRole($mysqli) === 'admin') {
        $button = "<form action='servicesChange.php' method='post'>
                    <input  type='hidden' name='id' value='$id'>
                    <input  type='hidden' name='title' value='$title'>
                    <input  type='hidden' name='description' value='$description'>
                    <input  type='hidden' name='price' value='$price'>        
                    <input  type='submit' class='btn btn-primary' name='submit' value='Редактировать'>
                    </form>";
        $button_delete = "<form action='index.php' method='post'>
                    <input  type='hidden' name='id' value=$id>
                    <input  type='submit' class='btn btn-danger' name='submit' value='Удалить'>
                    </form>";
    }
    echo "<div style='margin-top: 40px;' class='card'>
        <div class='card-body'>
            <h4 class='card-title'>$title</h4>
            <p class='card-text'>$description</p>
            <p class='card-text text-danger'>$price руб.</p>      
            <div class='d-flex justify-content-between'> 
            $button
            $button_delete
            </div>        
        </div>
    </div>";
}