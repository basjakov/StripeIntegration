<?php

 require_once "config.php";
    \Stripe\Stripe::setVerifySslCerts(false);



$token = $_POST['stripeToken'];
$email = $_POST["stripeEmail"];
$productID = $_GET['id'];

if(!isset($products[$productID])){
            header('Location: index.php');
            exit();
}

$charge = \Stripe\Charge::create([
    'amount' => 999,
    'currency' => 'usd',
    'description' => 'Example charge',
    'source' => $token,
]);
?>