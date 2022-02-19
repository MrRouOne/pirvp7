<?php
require_once 'main.php';
?>
<?php include '../php/admin/serviceAdd.php'; ?>
<h1 class="text-center" style="margin-top: 40px;">Добавление товара</h1>

<form method="post">
    <div class="d-flex flex-column align-items-center">
        <div style="margin: 20px 0px;" class=" mb3 col-8 text-danger"><h3><?php foreach ($messages as $key => $value) {
                    echo($value);
                } ?></h3></div>
        <div style="margin-bottom: 30px;" class="mb3 col-8">
            <label class="form-label"><h3>Название</h3></label>
            <input class="form-control" type="text" name="title" required>
        </div>
        <div style="margin-bottom: 30px;" class="mb3 col-8">
            <label class="form-label"><h3>Описание</h3></label>
            <input class="form-control" type="text" name="description" required>
        </div>
        <div class="mb3 col-8">
            <label class="form-label"><h3>Цена</h3></label>
            <input class="form-control" type="text" name="price" required>

            <input style="margin-top: 50px;" type="submit" class="btn btn-lg btn-primary " name="submit"
                   value="Добавить">
        </div>
    </div>

</form>
</div>



