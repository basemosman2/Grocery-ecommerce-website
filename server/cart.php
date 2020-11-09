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
    }

?>