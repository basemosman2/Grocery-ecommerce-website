<!DOCTYPE html>
<html lang="en">

<head>
    <title>Check out</title>
    <?php include('head.php')?>
</head>

<body onload="cart.checkout()">
    <?php
         include ('database_config/db-conn.php');
       include ('header.php');
       include ('sidebar.php');
       
      ?>
    <main>
        <?php
         var_dump($_SESSION["cart"]);
        ?>
        <div class="cat-text">
            <i class="fas fa-home"><span>Home</span></i>
            <i class="fas fa-angle-right"></i>
            <i>Checkout</i>
        </div>
        <div class="chout-title">
            <h1>Checkout</h1>
            <h4>Delivery Details</h4>
        </div>
        <form action="" method="post">
            <div class="order_details">
                <div class="deli_details">
                    <div class="input_group">
                        <div class="firstname_group">
                            <label>
                                First name
                                <span>*</span>
                            </label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="input_group">
                        <div class="lastname_group">
                            <label>
                                Last name
                                <span>*</span>
                            </label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="input_group">
                        <div class="phonenumber_group">
                            <label>
                                Phone number
                                <span>*</span>
                            </label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="input_group">
                        <div class="email_group">
                            <label>
                                Email Address
                                <span>*</span>
                            </label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="input_group address">
                        <div class="address_group">
                            <label>
                                Address
                                <span>*</span>
                            </label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="input_group">
                        <div class="note_group">
                            <label>
                                Order note
                                <span>*</span>
                            </label>
                            <textarea name="" id="" cols="20" rows="7"
                                placeholder="Please write here any additional information"></textarea>
                        </div>
                    </div>
                </div>
                <div class="cart_details">
                    <h1>Your order</h1>
                    <div class="chout-cart-list" id="chout-cart"></div>
                    <div class="chout-subtotal">
                        <div class="subtotal">
                            <span>Subtotal:</span>
                            <span id="chout-price">£0.00</span>
                        </div>
                        <div class="delivery">
                            <span>Delivery:</span>
                            <span>£0.00</span>
                        </div>
                    </div>
                    <div class="chout-total">
                        <p>£0.00</p>
                    </div>
                    <div class="chout-payment-type">
                        <div class="card">
                            <div class="credit" id="credit-input">
                                <input type="radio" id="credit" name="radio-group" checked>
                                <span class="checkmark"></span>
                                <label for="credit">Credit Card</label>
                                <i class="fas fa-credit-card"></i>
                            </div>
                        </div>
                        <div class="card-details" id="card-info">
                            <div class="cardnum">
                                <input type="text" placeholder="Card Number">
                            </div>
                            <div class="ex-date">
                                <input type="text" placeholder="MM/YY">
                            </div>
                            <div class="snum">
                                <input type="text" placeholder="CVC">
                            </div>
                        </div>
                        <div class="card">
                            <div class="cash">
                                <input type="radio" id="cash" name="radio-group">
                                <span class="checkmark"></span>
                                <label for="cash">Cash on delivery</label>
                                <i class="fas fa-wallet"></i>
                            </div>
                        </div>
                    </div>
                    <button class="btn-submit">Place Order</button>
                </div>
            </div>
        </form>
    </main>
    <script src="./JScript/script.js"></script>
    <script src="./JScript/cart.js"></script>
</body>

</html>