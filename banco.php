<?php
require_once 'src/Conta.php';

$firstAccount = new Conta('809.178.840-19', 'Kirvara Lima');
echo $firstAccount->deposita(10000) . PHP_EOL;
echo $firstAccount->saca(200) . PHP_EOL; 
echo $firstAccount->getSaldo();
var_dump($firstAccount);


$secondAccount = new Conta('736.709.400-90', 'Levi Castro');
var_dump($secondAccount);

