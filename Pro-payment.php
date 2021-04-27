<!DOCTYPE html>
<html lang="en">

<head>
    <title>Order-Payment</title>
    <?php include("head.php")?>
    <link rel="stylesheet" href="./Style/payment_page.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>

</head>

<body>
    <?php include("header.php")?>
    <section class="p-container">
        <div class="PayTypeSection">
            <img src="./img/slide03.png" alt="">
            <h1>How do you want to pay?</h1>
            <button type="button" id="checkout-card">Pay By Card</button>
            <a href="success.php?type=cash" id="checkout-cash">Cash On Delivery</a>
        </div>
        <div class="orderInfo">
            <div class="OI_container">
                <div class="OI_title">
                    <h1> Your Order</h1>
                </div>
                <div class="OI_cart_list" id="OI_list">
                </div>
            </div>
        </div>
    </section>

</body>
<script src="./JScript/cart.js"></script>
<script src="./JScript/payment.js"></script>
<script type="text/javascript">

</script>

</html>