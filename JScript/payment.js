

// Create an instance of the Stripe object with your publishable API key
var stripe = Stripe(
    "pk_test_51IWM02CcwrWlYxgfTl083urqFby3F77ksOhf2KqW73ywiSOVHLEQaJzrNy2c2u5Vkw80TThmsVV3fw15efvllAVG00FzXOwkk9");
var checkoutButton = document.getElementById("checkout-card");

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

$(document).ready(function() {
    $(window).on("load",() =>{
    $.ajax({
            url:"./server/payment.php",
            method:"POST",
            success:function(res) {
                //alert(res);
                console.log(res);
                $('#OI_list').html(res);
            }
        })
    })
});

