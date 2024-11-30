<?php
require 'vendor/autoload.php'; // Include Stripe's PHP SDK

\Stripe\Stripe::setApiKey('YOUR_STRIPE_SECRET_KEY'); // Replace with your secret Stripe key

// Get the payment method ID and amount from the frontend
$paymentMethod = $_POST['payment_method'];
$amount = $_POST['amount']; // Amount in cents (RM * 100)

// Create the payment intent
$paymentIntent = \Stripe\PaymentIntent::create([
    'amount' => $amount,
    'currency' => 'myr',
    'payment_method' => $paymentMethod,
    'confirmation_method' => 'manual',
    'confirm' => true,
]);

// Return the client secret to the frontend
echo json_encode(['client_secret' => $paymentIntent->client_secret]);
?>
