
# 📌 Estudos de Programação Orientada a Objetos (POO) em PHP

Este repositório contém estudos e testes relacionados à **Programação Orientada a Objetos (POO)** em PHP.  
O objetivo é entender conceitos como criação de classes, instância de objetos, manipulação de atributos e métodos.

---

## 📌 Requisitos

Para rodar os exemplos deste repositório, você precisa:

- Ter o **PHP** instalado (`>= 7.4` recomendado)
- Um ambiente de desenvolvimento como **XAMPP**, **Laravel Sail**, **Docker** ou **PHP CLI**
- Um editor de código, como **VS Code** ou **PHPStorm**

---

## 📌 Criando uma conta e manipulando saldo

O código abaixo demonstra a criação de uma conta bancária usando a classe `Conta`:

```php
require 'src/Conta.php';

$firstAccount = new Conta();
$firstAccount->cpfTitular = '189-954-478-67';
$firstAccount->nomeTitular = 'Carlos Esposito';
$firstAccount->saldo = 1000;

var_dump($firstAccount);

```
## 📌  Teste de referência em PHP

Em PHP, quando atribuímos um objeto a outra variável, ele é passado por referência (não por cópia).
Isso significa que qualquer alteração feita em $teste também será refletida em $firstAccount:

```php 
$teste = $firstAccount;
$teste->saldo -= 200;
var_dump($teste);
```

Saída esperada:

```php 
object(Conta)#1 (3) {
  ["cpfTitular"]=>
  string(14) "189-954-478-67"
  ["nomeTitular"]=>
  string(15) "Carlos Esposito"
  ["saldo"]=>
  float(800)
}
```
Verificando o saldo da $firstAccount e sua saida esperada: 

```php
 var_dump($firstAccount);


 object(Conta)#1 (3) {
  ["cpfTitular"]=>
  string(14) "189-954-478-67"
  ["nomeTitular"]=>
  string(15) "Carlos Esposito"
  ["saldo"]=>
  float(800)
}
```

## Criando uma nova conta ($secondAccount) e testando operações:

```php
$secondAccount = new Conta();
$secondAccount->depositar(0);  // Teste com valor inválido

Valor de depósito inválido.

$secondAccount->depositar(1000);

Depósito de R$ 1000 realizado com sucesso. Saldo atual: R$ 1000.

echo $secondAccount->saldo;

$secondAccount->sacar(500);
Saque de R$ 500 realizado com sucesso. Saldo atual: R$ 500.

$secondAccount->sacar(50);
Saque de R$ 50 realizado com sucesso. Saldo atual: R$ 450.

echo $secondAccount->saldo;
450
```





