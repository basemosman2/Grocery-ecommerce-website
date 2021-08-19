<?php

include ('../database_config/db-conn.php');
include ('../database_config/products-sql.php');

$pro = new Products();
$products = $pro->getrundproduct();


if (!empty($products)) {
    foreach ($products as $key => $row) {
        ?>
<div class="swiper-container">
    <div class="slideHeader">
        <h1><?=$key?></h1>
        <a href="./cat_products.php?iSearch=<?=$key?>">Browse all +</a>
    </div>
    <div class="swiper-wrapper">
        <?php 
            for ($i=0; $i < count($row) ; $i++) { 
                ?>
        <div class="swiper-slide">
            <div id="eAdd<?= $row[$i]['product_id']?>" class="added">
            </div>
            <img src="./images/<?=$row[$i]['product_image']?>" alt="img" />
            <h2><?=$row[$i]['product_name']?></h2>
            <div class="itemNo">
                <div class="minus" onclick="qtyCount(-1, <?= $row[$i]['product_id']?>);">
                    <i class="fa fa-minus"></i>
                </div>
                <input type="text" value="1" disabled class="qtyValue" id="input<?= $row[$i]['product_id']?>">
                <div class="plus" onclick="qtyCount(1,<?= $row[$i]['product_id']?>);">
                    <i class="fa fa-plus"></i>
                </div>
            </div>
            <div class="carticon">
                <h3>£<?=$row[$i]['product_price']?></h3>
                <div class="cart-icon" onclick="cart.add(<?= $row[$i]['product_id'] ?>);">
                    <i class="fas fa-cart-arrow-down"></i>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
<?php
    }
} 

?>