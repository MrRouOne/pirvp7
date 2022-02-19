<?php
require_once 'main.php';
?>

<?php include '../php/auth/login.php'; ?>
<h1 class="text-center" style="margin-top: 40px;">Авторизация</h1>
<div style="margin: 20px 0px;" class=" mb3 col-8 text-danger"><h3 class="text-center"><?= $message ?? ''; ?></h3></div>
<form method="post">
    <div class="d-flex flex-column align-items-center">
        <div style="margin-bottom: 30px;" class="mb3 col-8">
            <label class="form-label"><h3>E-mail</h3></label>
            <input class="form-control" type="email" name="email" required>
        </div>
        <div class="mb3 col-8">
            <label class="form-label"><h3>Пароль</h3></label>
            <input class="form-control" type="password" name="password" required>

            <input style="margin-top: 50px;" type="submit" class="btn btn-lg btn-primary " name="submit"
                   value="Вход">
        </div>
    </div>

</form>
</div>
