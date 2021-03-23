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
        <?php var_dump($_SESSION['total-pay']);?>
        <div class="PayTypeSection">
            <button type="button" id="checkout-button">Pay By Card</button>
            <button type="button" id="checkout-button">Cash On Delivery</button>
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
// Create an instance of the Stripe object with your publishable API key
var stripe = Stripe(
    "pk_test_51IWM02CcwrWlYxgfTl083urqFby3F77ksOhf2KqW73ywiSOVHLEQaJzrNy2c2u5Vkw80TThmsVV3fw15efvllAVG00FzXOwkk9");
var checkoutButton = document.getElementById("checkout-button");

checkoutButton.addEventListener("click", function() {
    fetch("server/create-checkout-session.php", {
            method: "POST",
        })
        .then(function(response) {
            return response.json();
        })
        .then(function(session) {
            return stripe.redirectToCheckout({
                sessionId: session.id
            });
        })
        .then(function(result) {
            // If redirectToCheckout fails due to a browser or network
            // error, you should display the localized error message to your
            // customer using error.message.
            if (result.error) {
                alert(result.error.message);
            }
        })
        .catch(function(error) {
            console.error("Error:", error);
            console.log(error);
        });
});
</script>

</html>