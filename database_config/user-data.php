<?php

class user extends DB {
    function IsEmailExsist($email){
        $pro_view = $this->fetch(
              "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1"
          );
          return $pro_view;
          }

          function addUser ($name, $email, $password, $mobile,$postcode,$address) {
              return $this->exec(
                "INSERT INTO user_info (first_name, email, password, mobile,address2,address1) VALUES (?,?,?,?,?,?)",
                [$name, $email, $password, $mobile,$postcode,$address]
              );
            }

            function IsUserExsist($email, $password){
              $result = $this->fetch(
                "SELECT * FROM user_info WHERE email = '$email' AND password = '$password'"
              );
              return $result;
            }

            function delivery($postcode){
              $result = $this->fetch(
                "SELECT * FROM `delivery` WHERE `Postcode`='$postcode'"
              );
              return $result;
            }

}
?>