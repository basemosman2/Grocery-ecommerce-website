<?php

include ('../database_config/db-conn.php');
include ('../database_config/products-sql.php');

$cate = $_POST['search'];

$pro = new Products();
$products = $pro->get($cate);

if(!empty($products)){

    foreach ($products as $key => $value) {
        ?>
<div class="swiper-slide catStyle">
    <div id="eAdd<?= $value['product_id']?>" class="added">
    </div>
    <img src="./images/<?=$value['product_image']?>" alt="img" />
    <h2><?=$value['product_name']?></h2>
    <div class="itemNo">
        <div class="minus" onclick="qtyCount(-1, <?= $value['product_id']?>);">
            <i class="fa fa-minus"></i>
        </div>
        <input type="text" value="1" disabled class="qtyValue" id="input<?= $value['product_id']?>">
        <div class="plus" onclick="qtyCount(1,<?= $value['product_id']?>);">
            <i class="fa fa-plus"></i>
        </div>
    </div>
    <div class="carticon">
        <h3>£<?=$value['product_price']?></h3>
        <div class="cart-icon" onclick="cart.add(<?= $value['product_id'] ?>);">
            <i class="fas fa-cart-arrow-down"></i>
        </div>
    </div>
</div>
<?php
    }
}

?>