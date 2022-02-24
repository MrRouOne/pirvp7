<?php require_once 'main.php'; ?>
<?php if (isAdmin($mysqli) or isAuthorized($mysqli)): ?>
    <?php
    include '../php/staff/addCar.php';
    ?>
    <h1 class="text-center" style="margin-top: 40px;">Добавить автомобиль</h1>

    <form method="post">
        <div class="d-flex flex-column align-items-center">
            <div style="margin: 20px 0px;" class=" mb3 col-8 text-danger">
                <h3><?php foreach ($messages as $key => $value) {
                        echo($value);
                    } ?></h3></div>
            <div style="margin-bottom: 30px;" class="mb3 col-8">
                <label class="form-label"><h3>Марка</h3></label>
                <input class="form-control" type="text" name="brand" required>
            </div>
            <div style="margin-bottom: 30px;" class="mb3 col-8">
                <label class="form-label"><h3>Модель</h3></label>
                <input class="form-control" type="text" name="model" required>
            </div>
            <div style="margin-bottom: 30px;" class="mb3 col-8">
                <label class="form-label"><h3>Цвет</h3></label>
                <input class="form-control" type="color" name="color" required>
            </div>
            <div style="margin-bottom: 30px;" class="mb3 col-8">
                <label class="form-label"><h3>Номер</h3></label>
                <input class="form-control" type="text" name="number" required>
            </div>
            <div class="mb3 col-8">
                <label class="form-label"><h3>Владелец</h3></label>
                <input class="form-control" type="text" name="owner" id="ownersSearch" required>

                <input style="margin-top: 50px;" type="submit" class="btn btn-lg btn-primary " name="submit"
                       value="Добавить">
            </div>
        </div>
    </form>

    <script>
        $('#ownersSearch').autocomplete({
            source: "owners_search.php"
        });
    </script>


<?php else: ?>
    <h1 class="text-danger text-center">У вас нет прав</h1>
<?php endif; ?>
</div>



