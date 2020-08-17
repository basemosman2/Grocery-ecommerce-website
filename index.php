
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./Style/style-m.css" />
    <title>Document</title>
  </head>
  <body>
    <header>
      <nav>
        <div class="container">
          <div class="logo">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            <h1>Shopping</h1>
          </div>
          <div class="searchbox">
            <form action="">
              <input type="text" />
              <button type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </div>
          <div class="signbox">
            <i class="far fa-user"></i>
            <div class="signin-box-text">
              <p>Hello,Sign in</p>
              <h3>My Account</h3>
            </div>
          </div>
          <div class="cart">
            <div class="cart-icon-box">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              <span>3</span>
            </div>
            <div class="cart-text">
              <p>My cart</p>
              <h2>£25.00</h2>
              <span><i class="fas fa-sort-down"></i></span>
            </div>
            <div class="cart-list">
              <div class="cart-item">
                <div class="item-content">
                  <img src="./img/pepsi.jpg" alt="icon">
                  <h3>Frozen chicken</h3>
                  <p>£3.00</p><span>x1</span>
                </div>
                <i class="fa fa-window-close"></i>
              </div>
              <div class="cart-item">
                <div class="item-content">
                  <img src="./img/pepsi.jpg" alt="icon">
                  <h3>Frozen chicken2</h3>
                  <p>£3.00</p><span>x1</span>
                </div>
                <i class="fa fa-window-close"></i>
              </div>
              <div class="checkout">
                <div class="total">
                  <p>total:</p>
                  <span>£25.00</span>
                </div>
                <button>
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
                <p>HomePage</p>
                <span><i class="fa fa-home" aria-hidden="true"></i></span>
              </li>
              <li>
                <p>About us</p>
                <span><i class="fas fa-address-card"></i></span>
              </li>
              <li>
                <p>Contact Us</p>
                <span><i class="fas fa-phone"></i></span>
              </li>
              <li>
                <p>Check Out</p>
                <span><i class="fas fa-shopping-bag"></i></span>
              </li>
            </ul>
          </div>
          <div class="categories-menu">
            <ul>
              <li href="Grocery">
                <p>Grocery</p>
                <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
              </li>
              <div class="sCateMneu" id="Grocery">
                <a href="product_category.php?category=الأطعمة المعلبة"
                ><span>Tins</span><span>الأطعمة المعلبة</span></a>
                <a href="product_category.php?category=الصلصات"
                ><span>Sauces</span><span>الصلصات</span></a>
                <a href="product_category.php?category=العسل والمربى"
                ><span>Honey &amp; Jams</span
                ><span>العسل والمربى</span></a>
              </div>
              <li href="Fruit">
                <p>Fruit</p>
                <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
              </li>
              <div class="sCateMneu" id="Fruit">
                <a href="product_category.php?category=الأطعمة المعلبة"
                ><span>Tins</span><span>الأطعمة المعلبة</span></a>
                
              </div>
              <li>
                <p>Eggs</p>
                <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
              </li>
              <li>
                <p>Meats</p>
                <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
              </li>
            </ul>
          </div>
        </div>

        <div class="contactform">
          <div class="support">
            <i class="fas fa-headset"></i>
            <div class="s-text">
              <h2>Support</h2>
              <p>012354699885</p>
            </div>
          </div>
          <div class="email">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <e-text>
              <h2>Email</h2>
              <p>customer@example.com</p>
            </e-text>
          </div>
          <div class="social">
            <h1>Follows us</h1>
            <div class="s-icons">
              <a href=""><i class="fab fa-twitter"></i></a>
              <a href=""><i class="fab fa-facebook-f"></i></a>
              <a href=""><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>
    </aside>
    <main>
    <?php
      include ('database_config/db-conn.php');
      include ('database_config/products-sql.php');
      $pro = new Products();
      $product = $pro->getrundproduct('قسم البقالة');
    ?>
      <div class="slideshow-container">
        <div class="mySlides fade">
          <div class="slide">
            <div class="text"><p>
              <ul>
                <li>You set your order online, and pay the for performa invoice.</li>
                <li>We contact you by WhatsApp with estimated delivery time. </li>
                <li>We will do our best to complete your full shopping list but we cannot guarantee that; due to current circumstances. </li>
                <li>In case of out of stock items, we will bring other similar items unless you notify us otherwise in advance.</li>
                <li>In case you received partial  delivery, we will refund you the amount of missing items; this will take up to 5-10 days according to your bank (unless you are happy to keep it as credit for next order)</li>
                <li>We collect the orders during the day, but delivery will take up to 24 hours, depend on orders we have. </li>
                <li>We encourage the customers to order what they need only, they don’t need to store.</li>
                <li>Please pay by card to minimise the risk of COVID 19.</li>
              </ul>
            </p></div>
            <img src="./img/slide01.png" />
          </div>
        </div>

        <div class="mySlides fade">
          <div class="slide">
            <div class="text">
              <ul>
                <li>Due to current Corona virus circumstances</li>
                <li>not all items are available in the market </li>
                <li>we are trying to keep prices updated on our website but some prices could not reflect the actual price in the shops</li>
                <li>if the item itself not available in the market we will bring the most similar one </li>
                <li>Delivery available up to 50 miles from Newcastle upon Tyne </li>
                <li>by completing your order you agree to the above </li>
              </ul>
          </div>
            <img src="./img/slide02.png" />
          </div>
        </div>

        <div class="mySlides fade">
          <div class="slide">
            <div class="text">
              <ul>
                <li><span><i class="fas fa-cart-arrow-down"></i></span><span>You order your favorite products online</span></li>
                <li><span><i class="fas fa-shopping-bag"></i></span><span>A personal assistant collects the products from your list</span></li>
               <li><span><i class="fas fa-truck"></i></span><span>We deliver to the door at a time convenient for you</span></li>
              </ul>
          </div>
            <img src="./img/slide03.png" />
          </div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>

      <div class="cat-text">
        <i class="fas fa-home"><span>Home</span></i>
        <i class="fas fa-angle-right"></i>
        <i>Product catalog</i>
      </div>
      <div class="h-title"><h1>Product catalog</h1></div>
      <div class="all-cards">
        <?php 


        if(is_array($product) && !empty($product)){
            foreach($product as $id => $row){?>
            <div class="card-product">
              <img src="./images/<?=$row['product_image']?>" alt="img" />
              <h4><?=$row['product_category']?></h4>
              <h3><?=$row['product_name']?></h3>
              <div class="card-price-content">
                <span><?=$row['product_price']?></span
                ><a href=""><i class="fas fa-shopping-cart">+</i></a>
               </div>
            </div>
          <?php }
        }else{
          echo '<h1> NO Products found</h1>';
        }
        
        ?>
      </div>

      <footer>
        <div class="f-container">
          <h1>Shopping</h1>
          <div class="f-contents">
            <div class="categories-list">
              <h1>Product List</h1>
              <ul>
                <li><a href="">Bakery</a></li>
                <li><a href="">Fruits</a></li>
                <li><a href="">Dairy</a></li>
                <li><a href="">Meat</a></li>
                <li><a href="">Fish</a></li>
              </ul>
            </div>
            <div class="menu-list">
              <h1>Company</h1>
              <ul>
                <li><a href="">About us</a></li>
                <li><a href="">Contacts</a></li>
                <li><a href="">Check out</a></li>
              </ul>
            </div>
            <div class="app-content">
              <h1>Download our app</h1>
              <div class="iso">
                <i class="fab fa-apple"></i>
                <div class="a-content">
                  <h2>Download on the</h2>
                  <h3>App Store</h3>
                </div>
              </div>
              <div class="android">
                <i class="fab fa-google-play"></i>
                <div class="a-content">
                  <h2>Download on the</h2>
                  <h3>Google Play</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="copyright-content">
          <div class="c-text">
            <h1>
            shopping
              &copy All Rights Reserved. developed by <a href="">Basem osman</a>
            </h1>
          </div>
          <div class="card-icon">
            <i class="fab fa-cc-visa"></i>
            <i class="fab fa-cc-mastercard"></i>
          </div>
        </div>
      </footer>

    </main>
    <script src="./JScript/script.js"></script>
  </body>
</html>
