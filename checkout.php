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
        <form action="success.php" method="post" name="orderform" onsubmit="return validate()">
            <p id="invaild_title"></p>
            <div class="order_details">
                <div class="deli_details">
                    <div class="input_group">
                        <div class="firstname_group">
                            <label>
                                First name
                                <span>*</span>
                            </label>
                            <input type="text" name="f_name" value="" required>
                        </div>
                    </div>
                    <div class="input_group">
                        <div class="lastname_group">
                            <label>
                                Last name
                                <span>*</span>
                            </label>
                            <input type="text" name="l_name" value="" required>
                        </div>
                    </div>
                    <div class="input_group">
                        <div class="phonenumber_group">
                            <label>
                                Phone number
                                <span>*</span>
                            </label>
                            <input type="text" name="phonenumber" value="" required>
                        </div>
                    </div>
                    <div class="input_group">
                        <div class="email_group">
                            <label>
                                Email Address
                                <span>*</span>
                            </label>
                            <input type="text" id="email" name="email" value="" required>
                        </div>
                    </div>
                    <div class="input_group address">
                        <div class="address_group">
                            <label>
                                Address
                                <span>*</span>
                            </label>
                            <input type="text" name="address" value="" required>
                        </div>
                    </div>
                    <div class="input_group">
                        <div class="postcode_group">
                            <label>
                                Postcode
                                <span>*</span>
                            </label>
                            <input type="text" id="postcode" name="postcode" value="" required>
                        </div>
                    </div>
                    <div class="input_group">
                        <div class="note_group">
                            <label>
                                Order note
                            </label>
                            <textarea name="" id="" cols="20" rows="7" value=""
                                placeholder="Please write here any additional information"></textarea>
                        </div>
                    </div>
                </div>
                <div class="cart_details">
                    <h1>Your order</h1>
                    <div class="chout-cart-list" id="chout-cart"></div>

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
                    <button type="submit" class="btn-submit">Place Order</button>
                </div>
            </div>
        </form>
    </main>
    <script src="./JScript/script.js"></script>
    <script src="./JScript/cart.js"></script>
    <script src="./JScript/form-validation.js"></script>
</body>

</html>