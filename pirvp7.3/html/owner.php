<?php require_once 'main.php'; ?>
<?php if (isAdmin($mysqli) or isAuthorized($mysqli)): ?>
    <?php include '../php/staff/addOwner.php'; ?>
    <h1 class="text-center" style="margin-top: 40px;">Добавить владельца</h1>
    <form method="post">
        <div class="d-flex flex-column align-items-center">
            <div style="margin: 20px 0px;" class=" mb3 col-8 text-danger"><h3><?php foreach ($messages as $key => $value) { echo($value);} ?></h3></div>
            <div style="margin-bottom: 30px;" class="mb3 col-8">
                <label class="form-label"><h3>Имя</h3></label>
                <input class="form-control" type="text" name="name" required>
            </div>
            <div style="margin-bottom: 30px;" class="mb3 col-8">
                <label class="form-label"><h3>Фамилия</h3></label>
                <input class="form-control" type="text" name="lastname" required>
            </div>
            <div class="mb3 col-8">
                <label class="form-label"><h3>Номер телефона</h3></label>
                <input class="form-control" type="text" name="phone_number" required>

                <input style="margin-top: 50px;" type="submit" class="btn btn-lg btn-primary " name="submit"
                       value="Добавить">
            </div>
        </div>
    </form>
<?php else: ?>
    <h1 class="text-danger text-center">У вас нет прав</h1>
<?php endif; ?>
</div>



