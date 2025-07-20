<?php
require 'src/OrderKuota.php';

use YuF1Dev\OrderKuota;

$username = '';
$token = '123456:abcdefghi...........';
$orderkuota = new OrderKuota($username, $token);

/** 
return @type json
 */

// Get All Transaction
// echo $orderkuota->getTransactionQris();


// Get Kredit
// echo $orderkuota->getTransactionQris('kredit');

// Get Debit
// echo $orderkuota->getTransactionQris('debet');
