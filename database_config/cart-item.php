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