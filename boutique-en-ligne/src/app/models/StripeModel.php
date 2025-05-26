<?php
require_once('vendor/autoload.php');

$stripe = new \Stripe\StripeClient("sk_test_51ROaOm2U29I0bBmrMEBSPnZCMnJ36mRAqeMlpF3DtpOmaFs6xizljBcqbfckX1VRlCDW1dIdTRZAZk2tvHHYHQEz00sxBgWIZL");

$product = $stripe->products->create([
  'name' => 'Starter Subscription',
  'description' => '$12/Month subscription',
]);
echo "Success! Here is your starter subscription product id: " . $product->id . "\n";

$price = $stripe->prices->create([
  'unit_amount' => 1200,
  'currency' => 'usd',
  'recurring' => ['interval' => 'month'],
  'product' => $product['id'],
]);
echo "Success! Here is your starter subscription price id: " . $price->id . "\n";

?>