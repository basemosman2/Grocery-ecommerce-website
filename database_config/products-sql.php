<?php
class Products extends DB {

function getadmin(){

  $pro_view = $this->fetch("SELECT * FROM admin");
  return $pro_view;
}

  function get ($cate) {
  // get () : get all products

  $pro_view = $this->fetch(
    // "SELECT * FROM `products` WHERE `product_category`=?", [$cate]
      "SELECT * FROM `products` WHERE (`department`='$cate' OR `product_category_ar` LIKE '%$cate%'
      OR `product_category` LIKE '%$cate%'  OR `product_name_ar` LIKE '%$cate%'
      OR `product_name` LIKE '%$cate%' OR `product_culture` LIKE '%$cate%' OR `product_culture_ar` LIKE '%$cate%') AND `Availability` = 1"
  );
  return $pro_view;
  }

  function get2 ($cate) {
  // get () : get all products

  $pro_view = $this->fetch(
    // "SELECT * FROM `products` WHERE `product_category`=?", [$cate]
      "SELECT * FROM `products` WHERE `product_category_ar`=$cate
      OR `product_category` = $cate OR `department` = $cate"
  );
  return $pro_view;
  }

  function add ($name, $img, $desc, $price) {
  // add () : add new product

    return $this->exec(
      "INSERT INTO `products` (`product_name`, `product_image`, `product_description`, `product_price`) VALUES (?, ?, ?, ?)",
      [$name, $img, $desc, $price]
    );
  }

  function edit ($id, $name, $img, $desc, $price) {
  // pEdit () : update product

    return $this->exec(
      "UPDATE `products` SET `product_name`=?, `product_image`=?, `product_description`=?, `product_price`=? WHERE `product_id`=?",
      [$name, $img, $desc, $price, $id]
    );
  }

  function del ($id) {
  // del () : delete product

    return $this->exec(
      "DELETE FROM `products` WHERE `product_id`=?",
      [$id]
    );
  }
}
?>
