<?php
require_once 'main.php';
?>
    <div class="cards">
        <h1 class="text-center" style="margin-top: 40px;">Корзина</h1>
        <?php
        require_once '../php/cart/addToCart.php';
        require_once '../php/cart/removeFromCart.php';
        require_once '../php/cart/cartOutput.php';
        ?>
    </div>

</div>

