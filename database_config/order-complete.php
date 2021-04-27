<?php

class Order extends DB{

    function checkout ($paytype,$userId,$cartItems,$total,$subTotal,$serCharge,$delivery) {
        // checkout() : checkout, create new order
        // PARAM $name : customer's name
        //       $email : customer's email address
          // Init
   
          $this->start();
      
          // Create the order entry first
          $pass = $this->exec(
          "INSERT INTO `orders` (`user_id`,`payment_type`,`final_total`,`sub_total`,`service_charge`,`deli_charge`) VALUES (?,?,?,?,?,?)",
          [$userId, $paytype,$total,$subTotal,$serCharge,$delivery]
          );
      
          if ($pass) {
            $sql = "INSERT INTO `orders_items` (`order_id`, `product_id`, `qty`) VALUES ";
            $cond = [];
            foreach ($cartItems as $id=>$qty) {
              $sql .= "(?, ?, ?),";
              array_push($cond, $this->lastID, $id, $qty);
            }
            $sql = substr($sql, 0, -1) . ";";
            $pass = $this->exec($sql, $cond);
          }
      
          // Finalize
          $this->end($pass);
          return $pass;
        }

        function getOrder () {
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