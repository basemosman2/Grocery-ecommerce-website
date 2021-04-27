<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php")?>
    <title>Success Order</title>
    <link rel="stylesheet" href="./Style/success.css">
</head>

<body>
    <div class="loader">
        <div class="spinner"></div>
        <p>loading...</p>
    </div>
    <div class="success_body_container">
        <input type="hidden" id="payType" value="<?= $_GET['type']?>">
        <div class="card-body">
            <h2 class="htitle">Thank you for your order!</h2>
            <p class="fs-sm mb-2">Your order has been placed and will be processed as soon as possible.</p>
            <p class="fs-sm mb-2">Make sure you make note of your order number, which is <span class="order_id"></span>
            </p>
            <p class="fs-sm">You will be receiving an email shortly with confirmation of your order. <u>You can now:</u>
            </p>
            <a class="btn btn-secondary mt-3 me-3" href="./index.php">Go back shopping</a>
        </div>
    </div>
</body>
<script src="./JScript/success.js"></script>

</html>