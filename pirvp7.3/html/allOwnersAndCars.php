<?php require_once 'main.php'; ?>
<?php if (isAdmin($mysqli) or isAuthorized($mysqli)): ?>
    <h1 class="text-center" style="margin-top: 40px;">Владельцы автомобилей</h1>
    <?php require_once '../php/staff/allOwnersOutput.php'; ?>
<?php else: ?>
    <h1 class="text-danger text-center">У вас нет прав</h1>
<?php endif; ?>
</div>


