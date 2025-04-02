<?php
require_once 'src/Conta.php';
require_once 'src/Titular.php';
require_once 'src/CPF.php';

$kirvara = new Titular(new Cpf ('809.178.840-19'), 'Kirvara Santos');
$firstAccount = new Conta($kirvara);
echo $firstAccount->deposita(10000) . PHP_EOL;
echo $firstAccount->saca(200) . PHP_EOL; 
echo $firstAccount->getSaldo();
var_dump($firstAccount);

$cpfLevi = new Cpf('736.709.400-90');
$Levi = new Titular($cpfLevi, 'Levi Castro');
$secondAccount = new Conta($Levi);
echo $secondAccount->getTitular()->getNome() . PHP_EOL;
echo $secondAccount->getTitular()->getCpfTitular() . PHP_EOL;
echo $secondAccount->deposita(5000) . PHP_EOL;
echo $secondAccount->saca(1000) . PHP_EOL;
echo "Saldo atual da conta {$secondAccount->getSaldo()}" . PHP_EOL;

echo 'Número de contas ativas ' . Conta::getNumeroDeContas() . PHP_EOL;

