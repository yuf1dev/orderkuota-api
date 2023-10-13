<?php
require 'src/OrderKouta.php';

use YuF1Dev\OrderKuota;

$username = '';
$token = '123456:abcdefghi...........';
$orderkuota = new OrderKuota($username, $token);

//Get All History Transaction QRIS
echo $orderkuota->getTransactionQris();
