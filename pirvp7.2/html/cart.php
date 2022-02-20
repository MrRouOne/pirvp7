<?php require_once 'main.php'; ?>
<?php if (isAuthorized($mysqli)): ?>
    <div class="cards">
        <h1 class="text-center" style="margin-top: 40px;">Корзина</h1>
        <?php
        require_once '../php/cart/addToCart.php';
        require_once '../php/cart/removeFromCart.php';
        require_once '../php/cart/cartOutput.php';
        ?>
    </div>
<?php else: ?>
    <h1 class="text-danger text-center">У вас нет прав</h1>
<?php endif; ?>
</div>


