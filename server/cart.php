<?php

// session_start();
// if (!isset($_SESSION['cart'])) { $_SESSION['cart'] = []; }

include ('../database_config/db-conn.php');
include ('../database_config/cart-item.php');

switch ($_POST['req']) {
    /* [INVALID REQUEST] */
    default:
      echo "INVALID REQUEST";
      break;


      case "add":
        if (isset($_SESSION['cart'][$_POST['product_id']])) {
          $_SESSION['cart'][$_POST['product_id']] ++;
        } else {
          $_SESSION['cart'][$_POST['product_id']] = 1;
        }
        echo "Item added to cart ";
        break;

        case "count":
            $total = 0;
            if (count($_SESSION['cart'])>0) {
              foreach ($_SESSION['cart'] as $id => $qty) {
                $total += $qty;
              }
            }
            echo $total;
            break;
        
            case "price":
            $cartLib = new Cart();
            $products = $cartLib->details();
            $totalprice = 0;
            $sub = 0;
              if (count($_SESSION['cart'])>0) {
                foreach ($_SESSION['cart'] as $id => $qty) {
                  $sub = (int)$qty * (double)$products[$id]['product_price'];
                  $totalprice += $sub;
                }
              }
              echo sprintf("£%0.2f", $totalprice);
              break;

            case 'cartlist':
              $cartLib = new Cart();
              $products = $cartLib -> details();
              if (count($_SESSION['cart'])>0) {
                foreach ($_SESSION['cart'] as $id => $qty) {
                  $sub = (int)$qty * (double)$products[$id]['product_price'];
                 ?>

<div class="cart-item" id="item<?=$id?>">
    <div class="item-content">
        <img src="./images/<?= $products[$id]['product_image'] ?>" alt="icon">
        <h3><?= $products[$id]['product_name'] ?></h3>
        <p><?= sprintf("£%0.2f", $sub) ?></p><small>x</small><span id="qty_<?=$id?>"><?= $qty?></span>
    </div>
    <i class="fa fa-window-close" onclick="cart.remove(<?=$id?>);"></i>
</div><?php
                }
              }
              break;

              case 'remove':
                  $qty = $_POST['qty'] -1;
                  if($qty == 0){
                    unset($_SESSION['cart'][$_POST['product_id']]);
                    echo $qty;
                  }else{
                    $_SESSION['cart'][$_POST['product_id']] = $qty;
                    echo $qty;
                  }
                break;

                case 'chout-cartlist':
                  $cartLib = new Cart();
                  $products = $cartLib -> details();
                  if (count($_SESSION['cart'])>0) {
                    foreach ($_SESSION['cart'] as $id => $qty) {
                      $sub = (int)$qty * (double)$products[$id]['product_price'];
                     ?>

<div class="chout-cartItem" id="choutItem<?=$id?>">
    <div class="item-content">
        <img src="./images/<?= $products[$id]['product_image'] ?>" alt="icon">
        <h3><?= $products[$id]['product_name'] ?></h3>
        <input id='choutQty_<?= $id ?>' onchange='cart.change(<?= $id ?>);' type='number' value='<?= $qty ?>' />
    </div>
    <i class="fa fa-window-close" onclick="cart.choutRemove(<?=$id?>);"></i>
</div><?php
                    }
                  }
                  break;

                  case 'chout-remove':
                     unset($_SESSION['cart'][$_POST['product_id']]);
                  break;

                  case "change":
                    if ($_POST['qty'] == 0) {
                      unset($_SESSION['cart'][$_POST['product_id']]);
                    } else {
                      $_SESSION['cart'][$_POST['product_id']] = $_POST['qty'];
                    }
                    echo "Cart updated";
                    break;
    }

?>