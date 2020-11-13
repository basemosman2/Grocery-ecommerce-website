<?php

include ('database_config/db-conn.php');
include ('database_config/products-sql.php');
$pro = new Products();
$product = $pro->getrundproduct('قسم البقالة');                       
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include('head.php')?>
    <title>Home</title>
  </head>
  <body>
  <?php
       include ('header.php');
       include ('sidebar.php');
       
      ?>
    <main>
      <div class="slideshow-container" id="slides">
        <div class="mySlides fade">
          <div class="slide">
            <div class="text"><p>
              <ul>
                <li>You set your order online, and pay the for performa invoice.</li>
                <li>We contact you by WhatsApp with estimated delivery time. </li>
                <li>We will do our best to complete your full shopping list but we cannot guarantee that; due to current circumstances. </li>
                <li>In case of out of stock items, we will bring other similar items unless you notify us otherwise in advance.</li>
                <li>In case you received partial  delivery, we will refund you the amount of missing items; this will take up to 5-10 days according to your bank (unless you are happy to keep it as credit for next order)</li>
                <li>We collect the orders during the day, but delivery will take up to 24 hours, depend on orders we have. </li>
                <li>We encourage the customers to order what they need only, they don’t need to store.</li>
                <li>Please pay by card to minimise the risk of COVID 19.</li>
              </ul>
            </p></div>
            <img src="./img/slide01.png" />
          </div>
        </div>

        <div class="mySlides fade">
          <div class="slide">
            <div class="text">
              <ul>
                <li>Due to current Corona virus circumstances</li>
                <li>not all items are available in the market </li>
                <li>we are trying to keep prices updated on our website but some prices could not reflect the actual price in the shops</li>
                <li>if the item itself not available in the market we will bring the most similar one </li>
                <li>Delivery available up to 50 miles from Newcastle upon Tyne </li>
                <li>by completing your order you agree to the above </li>
              </ul>
          </div>
            <img src="./img/slide02.png" />
          </div>
        </div>

        <div class="mySlides fade">
          <div class="slide">
            <div class="text">
              <ul>
                <li><span><i class="fas fa-cart-arrow-down"></i></span><span>You order your favorite products online</span></li>
                <li><span><i class="fas fa-shopping-bag"></i></span><span>A personal assistant collects the products from your list</span></li>
               <li><span><i class="fas fa-truck"></i></span><span>We deliver to the door at a time convenient for you</span></li>
              </ul>
          </div>
            <img src="./img/slide03.png" />
          </div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>

      <div class="cat-text">
        <i class="fas fa-home"><span>Home</span></i>
        <i class="fas fa-angle-right"></i>
        <i>Product catalog</i>
      </div>
      <div class="h-title"><h1>Product catalog</h1></div>

      <div class="all-cards">
        <?php 
        //var_dump($_SESSION["cart"]);
        if(is_array($product) && !empty($product)){
            foreach($product as $id => $row){?>
            <div class="card-product">
            <div id="eAdd<?= $row['product_id']?>"class="added"></div>
              <img src="./images/<?=$row['product_image']?>" alt="img" />
              <h4><?=$row['product_category']?></h4>
              <h3><?=$row['product_name']?></h3>
              <div class="card-price-content">
                <span>£<?=$row['product_price']?></span
                ><a class="pdt-add" onclick="cart.add(<?= $row['product_id'] ?>);"><i class="fas fa-shopping-cart">+</i></a>
               </div>
            </div>
          <?php }
        }else{
          echo '<h1> NO Products found</h1>';
        }
        
        ?>
      </div>

      <footer>
        <div class="f-container">
          <h1>Shopping</h1>
          <div class="f-contents">
            <div class="categories-list">
              <h1>Product List</h1>
              <ul>
                <li><a href="">Bakery</a></li>
                <li><a href="">Fruits</a></li>
                <li><a href="">Dairy</a></li>
                <li><a href="">Meat</a></li>
                <li><a href="">Fish</a></li>
              </ul>
            </div>
            <div class="menu-list">
              <h1>Company</h1>
              <ul>
                <li><a href="">About us</a></li>
                <li><a href="">Contacts</a></li>
                <li><a href="">Check out</a></li>
              </ul>
            </div>
            <div class="app-content">
              <h1>Download our app</h1>
              <div class="iso">
                <i class="fab fa-apple"></i>
                <div class="a-content">
                  <h2>Download on the</h2>
                  <h3>App Store</h3>
                </div>
              </div>
              <div class="android">
                <i class="fab fa-google-play"></i>
                <div class="a-content">
                  <h2>Download on the</h2>
                  <h3>Google Play</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="copyright-content">
          <div class="c-text">
            <h1>
            shopping
              &copy All Rights Reserved. developed by <a href="">Basem osman</a>
            </h1>
          </div>
          <div class="card-icon">
            <i class="fab fa-cc-visa"></i>
            <i class="fab fa-cc-mastercard"></i>
          </div>
        </div>
      </footer>

    </main>
    <script src="./JScript/script.js"></script>
    <script src="./JScript/showslide.js"></script>
    <script src="./JScript/cart.js"></script>
  </body>
</html>
