<?php
require 'src/OrderKouta.php';

use YuF1Dev\OrderKuota;

$username = '';
$password = '';
$otp = '';
$token = '123456:abcdefghi...........';
$orderkuota = new OrderKuota($username, $token);

/** 
@ step 1
return @type json and send OTP to Email
 */
echo $orderkuota->loginRequest($username, $password);

/** 
@ step 2
return @type json contain <token> 
 */
echo $orderkuota->getAuthToken($username, $otp);
