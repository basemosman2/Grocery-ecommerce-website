<?php
    include('../database_config/db-conn.php');
    include ('../database_config/cart-item.php');
    
    $address = $_SESSION['user']['address'];
    $postcode = $_SESSION['user']['postcode'];


    $cartList = new Cart();
    $products = $cartList -> details();
    $sub = 0;
    $total = 0;
    $serCharge=0;
    $deliCharg =4.00;
    $f_Total=0;
    if (count($_SESSION['cart'])>0) {
        foreach ($_SESSION['cart'] as $id => $qty) {
            $sub = (int)$qty * (double)$products[$id]['product_price'];
            $itemName = $products[$id]['product_name'];
            $total += $sub;
            $serCharge= $total * 0.10;
            $f_Total= $total+$serCharge+$deliCharg;
            ?>

<div class='item-container'>
    <p><?=$qty.'x '.$itemName?></p>
    <p><?= sprintf("£%0.2f", $sub)?></p>
</div>


<?php
        }
        $_SESSION['bill']['total-pay'] = round($f_Total, 2);
        $_SESSION['bill']['sub-total'] = round($total, 2);
        $_SESSION['bill']['serCharge'] = round($serCharge, 2);
        $_SESSION['bill']['delivery'] = round($deliCharg, 2);
        ?>

<div class="OI_price">
    <div class="OI_SubPrice">
        <p>Subtotal</p>
        <p><?= sprintf("£%0.2f", $total)?></p>
        <p>Delivery Fee</p>
        <p><?= sprintf("£%0.2f", $deliCharg)?></p>
        <p>Service</p>
        <p><?=sprintf("£%0.2f", $serCharge)?></p>
    </div>
    <div class="IO_total">
        <p>total</p>
        <p><?= sprintf("£%0.2f", $f_Total)?></p>
    </div>
</div>
<div class="IO_delivery_info">
    <i class="fas fa-truck"></i>
    <span>Delivery ASAP To</span>
    <p><?= $address.', '.$postcode?></p>
</div>

<?php
    }
?>