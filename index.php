<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php')?>
    <title>Home</title>
    <link rel="stylesheet" href="./Style/swiper.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
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
            <i>Product catalog</i>
        </div>
        <div class="h-title">
            <h1>Product catalog</h1>
        </div>
        <div class="prod-catalog" id="Products">

        </div>

        <?php
            include ('footer.php');
        ?>

    </main>

    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="./JScript/swiper.js"></script>
    <!-- Initialize Swiper -->

    <script src="./JScript/script.js"></script>
    <script src="./JScript/cart.js"></script>
    <script src="./JScript/displayProducts.js"></script>
</body>

</html>