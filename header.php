<header>
    <nav>
        <div class="container">
            <a href="./index.php" class="logo-link">
                <div class="logo">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    <h1>Shopping</h1>
                </div>
            </a>
            <div class="searchbox">
                <form action="">
                    <input type="text" />
                    <button type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
            <div class="m-display-icons">
                <button class="m-sicon">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
                <i class="far fa-user m-user-icon"></i>
                <div class="cart-icon-box m-cart">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span>1</span>
                </div>
            </div>
            <i class="fas fa-bars menu-bars"></i>
            <a href="./login.php" class="login-link">
                <div class="signbox">
                    <i class="far fa-user"></i>
                    <div class="signin-box-text">
                        <p>Hello,Sign in</p>
                        <h3>My Account</h3>
                    </div>
                </div>
            </a>

            <div class="cart">
                <div class="cart-icon-box">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span id="page-cart-count">0</span>
                </div>
                <div class="cart-text">
                    <p>My cart</p>
                    <h2 id="itemsprice1">£0.00</h2>
                    <span><i class="fas fa-sort-down"></i></span>
                </div>
                <div class="cart-list">
                    <div id="cart-items-container">
                    </div>
                    <div class="checkout">
                        <div class="total">
                            <p>total:</p>
                            <span id="itemsprice2">£0.00</span>
                        </div>
                        <button onclick="location.href='checkout.php';">
                            <i class="fa fa-credit-card"></i>
                            <span>Checkout</span>
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </nav>
</header>