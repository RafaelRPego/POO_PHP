
Estudos relacionados a programação orientada a objetos.
As linhas abaixo demonstram o funcionamento do processso de criação de contas utilizando 

 require 'src/Conta.php';
$firstAccount = new Conta();
$firstAccount->cpfTitular = '189-954-478-67';
$firstAccount->nomeTitular = 'Carlos Esposito';
$firstAccount->saldo = '1000';
var_dump($firstAccount);


php > $teste = $firstAccount;
php > $teste->saldo -= 200;
php > var_dump($teste);
object(Conta)#1 (3) {
  ["cpfTitular"]=>
  string(14) "189-954-478-67"
  ["nomeTitular"]=>
  string(15) "Carlos Esposito"
  ["saldo"]=>
  float(800)
}
php > var_dump($firstAccount);
object(Conta)#1 (3) {
  ["cpfTitular"]=>
  string(14) "189-954-478-67"
  ["nomeTitular"]=>
  string(15) "Carlos Esposito"
  ["saldo"]=>
  float(800)

  $secondAccount = new Conta();
  $secondAccount->depositar(0);
  Valor de depósito inválido.
  $secondAccount->depositar(1000);
  Depósito de R$ 1000 realizado com sucesso. Saldo atual: R$ 1000.
  echo $secondAccount->saldo;
  1000
  $secondAccount->sacar(500);
  Saque de R$ 500 realizado com sucesso. Saldo atual: R$ 500.
  $secondAccount->sacar(50);
  Saque de R$ 50 realizado com sucesso. Saldo atual: R$ 450.
  echo $secondAccount->saldo;
  450
}

