<!DOCTYPE html>
<html lang="en">

<head>
    <title>Check out</title>
    <?php include('head.php')?>
</head>

<body>
    <?php
       include ('header.php');
       include ('sidebar.php');
       
      ?>
    <main>
        <div class="cat-text">
            <i class="fas fa-home"><span>Home</span></i>
            <i class="fas fa-angle-right"></i>
            <i>Checkout</i>
        </div>
        <div class="chout-title">
            <h1>Checkout</h1>

        </div>
        <form method="post" action="./login.php" id="form-data">
            <div class="order_details">
                <div class="cart_details">
                    <h1>Your order</h1>
                    <div class="chout-cart-list" id="chout-cart"></div>
                </div>
            </div>
        </form>
    </main>
    <script src="./JScript/script.js"></script>
    <script src="./JScript/cart.js"></script>
    <script>
    window.addEventListener("load", cart.checkout);
    </script>

</body>

</html>