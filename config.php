<?php
        require_once "stripe-php-master/init.php";
        require_once "products.php";
        $stripeDetails = array(
            "secretKey"=>"secret key",
            "publishableKey"=>"pk_test_qpdXjjgLKiLjNJTRPI8QtYWw00SisBwXl2"
        );
        \Stripe\Stripe::setApiKey($stripeDetails['secretKey']);
?>