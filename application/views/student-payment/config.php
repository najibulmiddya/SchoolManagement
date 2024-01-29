<?php
require APPPATH. 'third_party/stripe-php-master/init.php';
$Publishablekey = 'pk_test_51OER6GSJvDLln23H4yH1dsYXdVKchMwAijyWWZPqOFMqIzb4x5V0rTWbn70YVcJybdY48XKcMLomsXnWGbCkkpXU00G7tMLjF5';
$Secretkey = 'sk_test_51OER6GSJvDLln23HtZveX3QojmuvS1lVNssUx1RFbEafJNCwUBgUFMoPtr4gcnDwuig9t11Xt1VNHTdR8Z6lhlpy00XABasOEJ';
\Stripe\Stripe::setApiKey($Secretkey);
?>