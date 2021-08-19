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
                <form method="GET" action="cat_products.php" id="search_form">
                    <input type=" text" name="iSearch" id="i_Search" />
                    <button type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
            <div class="m-display-icons">
                <button class="m-sicon">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
                <a href="./login.php">
                    <i class="far fa-user m-user-icon"></i>
                </a>
                <div class="cart-icon-box m-cart">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span id="m-cart-count">0</span>
                </div>
                <div class="menu-bar-box">
                    <i class="fas fa-bars"></i>
                </div>
            </div>





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