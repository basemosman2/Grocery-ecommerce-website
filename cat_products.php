<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./Style/swiper.css">
    <?php include('head.php')?>
    <title>Category Product</title>
</head>

<body>
    <?php
       include ('header.php');
       include ('sidebar.php');
      ?>
    <main>
        <div class="img-container">
            <img src="./img/panner.png" alt="">
        </div>
        <div class="cat-text">
            <i class="fas fa-home"><span>Home</span></i>
            <i class="fas fa-angle-right"></i>
            <i>Product Categroy</i>
        </div>
        <div class="h-title">
            <input type="hidden" id="iSearch" value="<?=$_GET['iSearch']?>" />
            <h1>Product Categroy</h1>
        </div>

        <div class="pro-cate" id="Products_cate">

        </div>

        <?php
            include ('footer.php');
        ?>
    </main>
    <script src="./JScript/script.js"></script>
    <script src="./JScript/cart.js"></script>
    <script src="./JScript/cat_products.js"></script>
</body>

</html>