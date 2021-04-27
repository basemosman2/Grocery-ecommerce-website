<?php
include('../database_config/db-conn.php');
include('../database_config/user-data.php');


    if (isset($_POST["name"])) {
        $fname = $_POST['name'];
        $phone = $_POST['mobile'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $postcode = $_POST['postcode'];
        $password = $_POST['password'];
	    $repassword = $_POST['repassword'];
        //$payment_type = $_POST['radio-group'];
        $name = "/^[a-zA-Z ]+$/";
	    $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
        $number = "/^[0-9]+$/";
        $message="";
        $error=false;
        
        if(!preg_match($number,$phone) || !(strlen($phone) == 11)){
            $message = "<li>This ** $phone ** is not valid phone number..</li>";
            $error=true;
        }

        if(!isPostcodeValid($postcode)){
            $message .="<li>This ** $postcode ** is not valid PostCode..!</li>";
            $error=true;
        }

        if(!preg_match($emailValidation,$email)){
            $message .="<li>this ** $email ** is not valid email Address..!</li>";
            $error=true;
        }
        if($password != $repassword){
            $message .="<li>Password is not match..!</li>";
            $error=true;
        }

        if($error){
            echo $message;
            exit();
        }

        $query = new user();
        $isUserExsist = $query->IsEmailExsist($email);
        if (count($isUserExsist) > 0) {
            echo "Email is already exsist";
            exit();
        }else{
            $password = md5($password);
            $postcode = preg_replace('/\s/', '', $postcode);
            $postcode = strtoupper($postcode);
        
            $result = $query->addUser($fname, $email, $password, $phone,$postcode,$address);
            
            if ($result) {
                echo "success";
            }else{
                echo "Something went wrong, Try again later";
            }
            
        }
    }


    if (isset($_POST['login_email']) && isset($_POST['login_password'])) {
        $email = $_POST['login_email'];
        $password = md5($_POST['login_password']);
        
        $query = new user();
        $result = $query->IsUserExsist($email,$password);
        if (count($result) == 1) {
            foreach ($result as $key => $value) {
                $_SESSION["user"]["uid"] = $value["user_id"];
                $_SESSION["user"]["name"] = $value["first_name"];
                $_SESSION["user"]["address"] = $value["address1"];
                $_SESSION["user"]["postcode"] = $value["address2"];
                $_SESSION["user"]["email"] = $value["email"];
                $_SESSION["user"]["mobileNo"] = $value["mobile"];
                
            }
            echo "login_success";
        }else{
            echo"Something Wrong with Email or Password";
        }
    }

    function isPostcodeValid($postcode) {
        //remove all whitespace
    $postcode = preg_replace('/\s/', '', $postcode);

    //make uppercase
    $postcode = strtoupper($postcode);

    if(preg_match("/^[A-Z]{1,2}[0-9]{2,3}[A-Z]{2}$/",$postcode)
        || preg_match("/^[A-Z]{1,2}[0-9]{1}[A-Z]{1}[0-9]{1}[A-Z]{2}$/",$postcode)
        || preg_match("/^GIR0[A-Z]{2}$/",$postcode)){
        return true;
    }else{return false;}
    }
?>