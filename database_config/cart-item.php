<?php
class Cart extends DB {
  function details () {
  // details() : get details of items in cart

    // Empty
    if (count($_SESSION['cart'])==0) {
      return false;
    }

    // Get products in cart
    $sql = "SELECT * FROM `products` WHERE `product_id` IN (";
    $sql .= str_repeat('?,', count($_SESSION['cart']) - 1) . '?';
    $sql .= ")";
    return $this->fetch($sql, array_keys($_SESSION['cart']), "product_id");
  }

  function checkout ($paytype) {
  // checkout() : checkout, create new order
  // PARAM $name : customer's name
  //       $email : customer's email address
    // Init
    $userid = $_SESSION['uid'];
    $f_price = $_SESSION['amount']['f_price'];
    $subtotal = $_SESSION['amount']['sub-total'];
    $serCharge = $_SESSION['amount']['service'];
    $deliCharg =  $_SESSION['amount']['del-charge'];

    $this->start();

    // Create the order entry first
    $pass = $this->exec(
    "INSERT INTO `orders` (`user_id`,`payment_type`,`final_total`,`sub_total`,`service_charge`,`deli_charge`) VALUES (?,?,?,?,?,?)",
    [$userid, $paytype,$f_price,$subtotal,$serCharge,$deliCharg]
    );

    if ($pass) {
      $sql = "INSERT INTO `orders_items` (`order_id`, `product_id`, `qty`) VALUES ";
      $cond = [];
      foreach ($_SESSION['cart'] as $id=>$qty) {
        $sql .= "(?, ?, ?),";
        array_push($cond, $this->lastID, $id, $qty);
      }
      $sql = substr($sql, 0, -1) . ";";
      $pass = $this->exec($sql, $cond);
    }

    // $pass = $this->exec(
    //   "INSERT INTO orders (user_id,product_id, qty,payment_type) VALUES (?,?,?,?)",
    //   [$userid,"55", "22","cash"]
    // );

    // Insert the items
      // $sql = "INSERT INTO `orders` ('user_id',`product_id`, `qty`,'payment_type') VALUES ";
      // $cond = [];
      // foreach ($_SESSION['cart'] as $id=>$qty) {
      //   $sql .= "(?,?,?,?),";
      //   array_push($userid, $id, $qty,"cash");
      // }
      // $pass = $this->exec($sql, $cond);


    // Finalize
    $this->end($pass);
    return $pass;
  }

  // function check_postcode () {
  // // get () : get order
  // // PARAM $id : order ID
  //
  // return true;
  // }


  function get () {
  // get () : get order
  // PARAM $id : order ID

    $orderid = $this->fetch(
      "SELECT order_id FROM orders ORDER BY order_id DESC LIMIT 1"
    );

    $id =$orderid[0]['order_id'];

    $order = $this->fetch(
      "SELECT * FROM `orders` WHERE `order_id`=?", [$id]
    );
    $order['items'] = $this->fetch(
      "SELECT * FROM `orders_items` LEFT JOIN `products` USING (`product_id`) WHERE `orders_items`.order_id=?",
      [$id], "product_id"
    );
    return $order;
  }
}
?>
