<?php
require_once 'main.php';
?>
<?php if (isAdmin($mysqli)): ?>
    <div class="cards">
        <h1 class="text-center" style="margin-top: 40px;">Все оформленные заказы</h1>
        <?php
        require_once "../php/admin/orderDelete.php";
        require_once "../php/admin/orders.php";
        ?>
    </div>
<?php else: ?>
    <h1 class="text-danger text-center">У вас нет прав</h1>
<?php endif; ?>
</div>

