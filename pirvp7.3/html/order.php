<?php require_once 'main.php'; ?>
<?php if (isAdmin($mysqli) or isAuthorized($mysqli)): ?>
<h1 class="text-center" style="margin-top: 40px;">Оформить заказ</h1>
    <?php
    include '../php/staff/addOrder.php';
    include '../php/staff/allSelects.php';
    ?>
<form method="post">
    <div class="d-flex flex-column align-items-center">
        <div style="margin: 20px 0px;" class=" mb3 col-8 text-danger"><h3><?php foreach ($messages as $key => $value) { echo($value);} ?></h3></div>
        <div style="margin-bottom: 30px;" class="mb3 col-8">
            <label class="form-label"><h3>Автомобиль</h3></label>
            <select class="form-select" name="car">
                <option selected disabled value="">---------</option>
                <?php
                foreach ($cars as $id => $data) {
                    echo "<option value='$id'>" . $data . '</option>';
                }
                ?>
            </select>
        </div>
        <div style="margin-bottom: 30px;" class="mb3 col-8">
            <label class="form-label"><h3>Дата и время въезда</h3></label>
            <input class="form-control" type="datetime-local" name="entry_date" required>
        </div>
        <div style="margin-bottom: 30px;" class="mb3 col-8">
            <label class="form-label"><h3>Период (в днях)</h3></label>
            <input class="form-control" type="cost" name="period" required>
        </div>
        <div style="margin-bottom: 30px;" class="mb3 col-8">
            <label class="form-label"><h3>Стоимость</h3></label>
            <input class="form-control" type="cost" name="cost" required>
        </div>
        <div style="margin-bottom: 30px;" class="mb3 col-8">
            <label class="form-label"><h3>Скидка (в %)</h3></label>
            <input class="form-control" type="text" name="sale" required>
        </div>
        <div style="margin-bottom: 30px;" class="mb3 col-8">
            <label class="form-label"><h3>Задолженность</h3></label>
            <input class="form-control" type="text" name="arrears" required>
        </div>
        <div class="mb3 col-8">
            <label class="form-label"><h3>Место</h3></label>
            <select class="form-select" name="place">
                <option selected disabled value="">---------</option>
                <?php
                foreach ($places as $id => $data) {
                    echo "<option value='$id'>" . $data . '</option>';
                }
                ?>
            </select>

            <input style="margin-top: 50px;" type="submit" class="btn btn-lg btn-primary " name="submit"
                   value="Добавить">
        </div>
    </div>

</form>
<?php else: ?>
    <h1 class="text-danger text-center">У вас нет прав</h1>
<?php endif; ?>
</div>



