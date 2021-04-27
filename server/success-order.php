<?php 

include ('../database_config/db-conn.php');
include ('../database_config/order-complete.php');

    

    if (isset($_POST['Type'])) {
        $jsonObj = array();
        $checkoutLib = new Order();
        $payType = $_POST['Type'];
        $userId = $_SESSION['user']['uid'];
        $cartItems = $_SESSION['cart'];
        $total = $_SESSION['bill']['total-pay'];
        $subTotal = $_SESSION['bill']['sub-total'];
        $serCharge = $_SESSION['bill']['serCharge'];
        $delivery = $_SESSION['bill']['delivery'];

        $checkout = $checkoutLib->checkout($payType,$userId,$cartItems,$total,$subTotal,$serCharge,$delivery);
        $jsonObj['checkoutStatus'] = $checkout;
        if ($checkout) {
            $_SESSION['cart'] = [];
		    $_SESSION['bill'] = [];
            $jsonObj[] = emailConfimation();
        }

        echo json_encode($jsonObj);



    }else{
        $jsonObj['error'] = "Try Again Later...";
    }

    function emailConfimation(){
        $checkoutLib = new Order();
        $order = $checkoutLib->getOrder();
        $jsonObj = array();
        $jsonObj['order_id'] = $order[0]['order_id'];

//        $to = $_SESSION['user']['email'];
        $to = "basymo007@gmail.com";
        $subject = "Order Confirmation";
        $order_items = "";
        
        foreach ($order['items'] as $key => $value) {
            $order_items .= '<tr style="border: 1px solid #EEE; padding:5px; text-align: center;">'.
            '<td style="width:100px;">'.$value['product_id'] .'</td>'.
            '<td style="width:100px;">'.$value['product_name'] .'</td>'.
            '<td style="width:100px;">'.$value['qty'].'</td>'.
            '<td style="width:100px;">'.$value['product_price'].'</td>'.
            '</tr>';
        }

        $body= '<div id="table" style="width:300px; margin:auto;">
    <table style="font-size:.9em;">
        <td style="width:120px; text-align: center;">
            <h2>Order Number:</h2>
        </td>
        <td style="width:120px; text-align:center;">
            <h2>'.$order[0]['order_id'].'</h2>
        </td>
        <td style="width:120px; text-align: center;">
            <h2>Deliver To:</h2>
        </td>
        <td style="width:120px; text-align:center;">
            <h2>'.$_SESSION['user']['address'].', '.$_SESSION['user']['postcode'].'</h2>
        </td>
        </tr>
        <tr style="font-size: .5em;">
            <td style="width:100px; text-align: center;">
                <h2>Payment Method:</h2>
            </td>
            <td></td>
            <td style="width:100px; text-align:center;">
                <h2>'.$_POST['Type'].'</h2>
            </td>
        </tr>

        <tr class="tabletitle" style="font-size: .5em; background: #EEE;">
            <td style="width:100px; text-align: center;" class="item">
                <h2>id</h2>
            </td>
            <td style="width:100px; text-align: center;" class="item">
                <h2>Item</h2>
            </td>
            <td style="width:100px; text-align: center;" class="Hours">
                <h2>Qty</h2>
            </td>
            <td style="width:100px; text-align: center;" class="Rate">
                <h2>Price</h2>
            </td>
        </tr>
        '.$order_items.'
        <tr style="font-size: .5em; background: #EEE; text-align: center;">
            <td></td>
            <td>
                <h2>Sub Total</h2>
            </td>
            <td>
                <h2>'.sprintf("£%0.2f",$order[0]['sub_total']).'</h2>
            </td>
        </tr>
        <tr style="font-size:.5em; background: #EEE; text-align: center;">
            <td></td>
            <td>
                <h2>Service Charge</h2>
            </td>
            <td>
                <h2>'.sprintf("£%0.2f",$order[0]['service_charge']).'</h2>
            </td>
        </tr>
        <tr style="font-size:.5em; background: #EEE; text-align: center;">
            <td></td>
            <td>
                <h2>Delivery Charge</h2>
            </td>
            <td>
                <h2>'.sprintf("£%0.2f",$order[0]['deli_charge']).'</h2>
            </td>
        </tr>
        </tr>
        <tr style="font-size: .5em; background: #EEE; text-align: center;">
            <td></td>
            <td>
                <h2>Total</h2>
            </td>
            <td>
                <h2>'.sprintf("£%0.2f",$order[0]['final_total']).'</h2>
            </td>
        </tr>
    </table>
    <p>Thanks For Shopping With Us</p>
    <p><strong>Incorrect Information Please Cantact Us</strong></p>
</div>';
        $headers = implode("\r\n", [
          'MIME-Version: 1.0',
          'Content-type: text/html; charset=utf-8',
          'From: basymo007@gmail.com'
        ]);

        if (@mail($to, $subject, $body, $headers)) {
            $jsonObj['emailStatus'] = "Email successfully sent to $to";
        }else{
            $jsonObj['emailStatus']= "Email sending failed...";
        }

        return $jsonObj;
    }
?>