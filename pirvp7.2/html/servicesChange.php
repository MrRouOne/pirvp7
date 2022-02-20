<?php
require_once 'main.php';
?>
<?php if (isAdmin($mysqli)): ?>
    <?php include '../php/admin/servicesChange.php'; ?>
    <h1 class="text-center" style="margin-top: 40px;">Редактирование товара</h1>
    <form method="post">
        <div class="d-flex flex-column align-items-center">
            <div style="margin: 20px 0px;" class=" mb3 col-8 text-danger">
                <h3><?php foreach ($messages as $key => $value) {
                        echo($value);
                    } ?></h3></div>
            <input type='hidden' name='id' value="<?= $_POST['id'] ?>">
            <div style="margin-bottom: 30px;" class="mb3 col-8">
                <label class="form-label"><h3>Название</h3></label>
                <input class="form-control" type="text" name="title" required value="<?= $_POST['title'] ?>">
            </div>
            <div style="margin-bottom: 30px;" class="mb3 col-8">
                <label class="form-label"><h3>Описание</h3></label>
                <input class="form-control" type="text" name="description" required
                       value="<?= $_POST['description'] ?>">
            </div>
            <div class="mb3 col-8">
                <label class="form-label"><h3>Цена</h3></label>
                <input class="form-control" type="text" name="price" required value="<?= $_POST['price'] ?>">

                <input style="margin-top: 50px;" type="submit" class="btn btn-lg btn-primary " name="submit"
                       value="Обновить">
            </div>
        </div>

    </form>
<?php else: ?>
    <h1 class="text-danger text-center">У вас нет прав</h1>
<?php endif; ?>
</div>


