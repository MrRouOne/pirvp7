<?php
require_once 'main.php';
?>
<?php if (isAuthorized($mysqli)): ?>
    <div class="cards">
        <h1 class="text-center" style="margin-top: 40px;">Заказы</h1>
        <?php
        require_once "../php/order/orderAdd.php";
        require_once '../php/order/orderOutput.php';
        ?>
    </div>
<?php else: ?>
    <h1 class="text-danger text-center">У вас нет прав</h1>
<?php endif; ?>
</div>

