<?php

 require_once "config.php";
    \Stripe\Stripe::setVerifySslCerts(false);




$productID = $_GET['id'];
if(!isset($_POST['stripeToken']) || !isset($products[$productID])){
            header('Location: index.php');
            exit();
}
$token = $_POST['stripeToken'];
$email = $_POST["stripeEmail"];

$charge = \Stripe\Charge::create([
    'amount' =>$products[$productID]["price"],
    'currency' => 'usd',
    'description' => $products[$productID]["Title"],
    'source' => $token,
]);
?>