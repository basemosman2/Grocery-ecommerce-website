<!DOCTYPE html>
<html lang="en">

<body>
    <aside>
        <div class="side-menu">
            <div class="btn-box">
                <button class="cate">Categories</button>
                <button class="menu">Menu</button>
            </div>
            <div class="menus">
                <div class="main-menu">
                    <ul>
                        <li>
                            <a href="index.php">HomePage</a>
                            <span><i class="fa fa-home" aria-hidden="true"></i></span>
                        </li>
                        <li>
                            <a href="checkout.php">Check Out</a>
                            <span><i class="fas fa-shopping-bag"></i></span>
                        </li>
                        <li>
                            <?php
                if (!isset($_SESSION['user'])) {
                    echo '
                        <a href="login.php">Sign In</a>
                        <span><i class="far fa-user"></i></span>
                        ';
                
                }else{
                    echo '<div class="login-wel">
                    <div class="signin-box-text">
                        <h2>Hello,</h2>
                        <h3>'.$_SESSION['user']['name'].'</h3>
                    </div>
                    <a href="logout.php" class="logout-link">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>';
                }
            ?>
                        </li>
                    </ul>
                </div>
                <div class="categories-menu">
                    <ul>
                        <li href="Grocery">
                            <p>Grocery</p>
                            <span id="Grocery_angle"><i class="fa fa-angle-down" data-cat='grocery'></i></span>
                        </li>
                        <div class="sCateMneu" id="Grocery">
                            <a href="cat_products.php?iSearch=canned"><span>Tins</span></a>
                            <a href="cat_products.php?iSearch=rice"><span>Rice</span></a>
                            <a href="cat_products.php?iSearch=pasta"><span>Pasta</span></a>
                            <a href="cat_products.php?iSearch=spices"><span>Spices</span></a>
                            <a href="cat_products.php?iSearch=honey"><span>Honey</span></a>
                            <a href="cat_products.php?iSearch=oli"><span>Oli</span></a>
                        </div>
                        <li href="Fruit">
                            <p>Fruit-Veg</p>
                            <span id="Fruit_angle"><i class="fa fa-angle-down" data-cat='fruit'></i></span>
                        </li>
                        <div class="sCateMneu" id="Fruit">
                            <a href="cat_products.php?iSearch=Fresh%Fruit"><span>Fresh Fruit</span></a>
                            <a href="cat_products.php?iSearch=Fresh%Vegetables"><span>Fresh Vegetables</span></a>
                            <a href="cat_products.php?iSearch=Frozen%Vegetables"><span>Frozen Vegetables</span></a>
                        </div>
                        <li href="Milks">
                            <p>Milks</p>
                            <span id="Milks_angle"><i class="fa fa-angle-down" data-cat='milks'></i></span>
                        </li>
                        <div class="sCateMneu" id="Milks">
                            <a href="cat_products.php?iSearch=cheese"><span>Cheese</span></a>
                            <a href="cat_products.php?iSearch=yoghurt"><span>Yoghurt</span></a>
                            <a href="cat_products.php?iSearch=Milk%powder"><span>Milk Powder</span></a>
                            <a href="cat_products.php?iSearch=Fresh%and%Longlife%Milk"><span>Milk</span></a>
                        </div>
                        <li href="Meats">
                            <p>Meats</p>
                            <span id="Meats_angle"><i class="fa fa-angle-down" data-cat='meats'></i></span>
                        </li>
                        <div class="sCateMneu" id="Meats">
                            <a href="cat_products.php?iSearch=Fresh%Chicken"><span>Fresh Chicken</span></a>
                            <a href="cat_products.php?iSearch=Frozen%Chicken"><span>Frozen Chicken</span></a>
                            <a href="cat_products.php?iSearch=Fresh%Meat"><span>Fresh Meat</span></a>
                        </div>
                        <li href="Snacks">
                            <p>Snacks</p>
                            <span id="Snacks_angle"><i class="fa fa-angle-down" data-cat='snacks'></i></span>
                        </li>
                        <div class="sCateMneu" id="Snacks">
                            <a href="cat_products.php?iSearch=Snacks"><span>Snacks</span></a>
                        </div>
                    </ul>
                </div>
            </div>


        </div>
    </aside>
</body>

</html>