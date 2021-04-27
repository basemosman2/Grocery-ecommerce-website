<?php
session_start();
$total = $_SESSION['bill']['total-pay']*100;

require_once '../vendor/autoload.php';
\Stripe\Stripe::setApiKey('sk_test_51IWM02CcwrWlYxgf5F7RdXjKnFtey5RhV5Ry1xyeb8ICP2MrMNFs3oC9EnJAfEhbtqRd2HEPbnBE7dxmm0wHo7cb00B3hLYufA');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/projects2020/e-grocery';

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'GBP',
      'unit_amount' => $total,
      'product_data' => [
        'name' => 'Total Need To Pay'
      ],
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.php?type=card&session_id={CHECKOUT_SESSION_ID}',
  'cancel_url' => $YOUR_DOMAIN . '/checkout.php',
]);

echo json_encode(['id' => $checkout_session->id]);